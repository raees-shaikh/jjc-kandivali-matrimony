<?php

namespace App\Http\Controllers\cms;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Invoice;
use App\Traits\Taxable;
use App\Models\Transaction;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Models\UserReference;
use App\Traits\Transactional;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Events\ProfileApprovedEvent;
use App\Events\ProfileRejectedEvent;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    use Transactional, Taxable;

    public function index(Request $request)
    {
        $users = User::latest();
        $users = $this->filterResults($request, $users);
        $users = $users->paginate(10);
        return view('backend.users.index', compact('users'));
    }

    public function profile(Request $request, $id)
    {
        $users = User::findOrFail($id);
        $referenceOne = $users->userReference->where('type', 'reference_one')->first();
        $referenceTwo = $users->userReference->where('type', 'reference_two')->first();
        return view('backend.users.profile', compact('users', 'referenceOne', 'referenceTwo'));
    }

    protected function filterResults($request, $users)
    {
        if ($request->q !== '' && !is_null($request->q)) {
            if (is_numeric($request->q)) {
                $request->validate(['q' => 'digits_between:3,40'], ['q.*' => 'Please enter proper Number']);
            } else {
                $request->validate(['q' => 'min:3']);
            }
        }
        if ($request !== null && $request->has('status') && $request['status'] == 'Approved') {
            //dd($appointments);
            $users = $users->where('status', '=', 'Approved');
        } elseif ($request !== null && $request->has('status') && $request['status'] == 'Rejected') {
            $users = $users->where('status', '=', 'Rejected');
            //dd($users);
        } elseif ($request !== null && $request->has('status') && $request['status'] == 'Pending') {
            $users = $users->where('status', '=', 'Pending')
                ->orWhere('status', null);
            //dd($users);
        } elseif ($request !== null && $request->has('q') && $request['q'] !== '') {
            $search = $request['q'];

            $users = $users->where('mobile', 'LIKE', '%' . $search . '%')
                ->orWhere('full_name', 'LIKE', '%' . $search . '%')
                ->orWhere('email', 'LIKE', '%' . $search . '%')
                ->orWhere('profile_no', 'LIKE', '%' . $search . '%');
        }
        return $users;
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        $orders = $user->orders()->latest()->paginate(10);
        $subscriptions = $user->subscriptions()->where('is_active', 0)->latest()->paginate(5);
        $shortlists = $user->shortlists()->latest()->paginate(10);
        //dd($shortlists);
        return view('backend.users.show', compact('user', 'orders', 'subscriptions', 'shortlists'));
    }

    public function status(Request $request, $id)
    {

        $request->validate([
            'status' => 'required|in:Approved,Rejected',
        ]);

        $user = User::findOrFail($id);
        //dd($user);
        $user->status = $request->status;
        //dd($user->email);
        if ($request->status == 'Approved') {
            // dd('hi');
            event(new ProfileApprovedEvent($user));
        }
        if ($request->status == 'Rejected') {
            // dd('hi');
            event(new ProfileRejectedEvent($user));
        }
        if ($user->save()) {
            return redirect()->route('backend.user.show', $id)->with(['alert-type' => 'success', 'message' => 'Status changed.']);
        };
        return redirect()->back()->with(['alert-type' => 'error', 'message' => 'Somethings went wrong.']);
    }

    public function create()
    {
        return view('backend.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|min:3|max:80',
            'mobile' => 'required|numeric|digits:10|unique:users,mobile',
            'gender' => 'required|in:male,female',
        ]);

        $user = new User();
        $user->filled_by = auth()->user()->id;
        $user->full_name = $request->full_name;
        $user->mobile = $request->mobile;
        $user->gender = $request->gender;
        if ($user->save()) {
            $user->profile_no = 'JJC' . rand(1000, 9999) . $user->id;
            $user->save();
            return redirect()->route('backend.user.index')->with(['alert-type' => 'success', 'message' => 'User Stored Successfully']);
        }
        return redirect()->back()->with(['alert-type' => 'error', 'message' => 'Something went wrong']);
    }

    public function FormOneEdit($id)
    {
        $users = User::findOrFail($id);
        return view('backend.users.editFormOne', compact('users'));
    }

    public function FormOneUpdate(Request $request, $id)
    {
        //dd($request);
        $request->validate(
            [
                'full_name' => 'required|min:3|max:30',
                'date_of_birth' => 'required|before:today',
                'place_of_birth' => 'required|min:3|max:30',
                'email' => 'required|email:rfc,dns|min:3|max:30|unique:users,email,' . $id,
                'gender' => 'required|in:male,female',
                'native_place' => 'required|min:3|max:30',
                'profile_image' => 'nullable|max:10240|mimes:png,jpeg,jpg',
                'martial_status' => ['required', Rule::in(User::MARTIAL_STATUS)],
                'status_of_children' => ['nullable', Rule::in(User::CHILDREN_STATUS)],
                'no_of_children' => 'required|numeric|min:0|max:99',
                'caste' => ['required', Rule::in(User::CASTE)],
                'sub_caste' => 'nullable|min:3|max:30',
                'mother_tongue' => ['required', Rule::in(User::MOTHER_TONGUE)],
                'manglik' => 'nullable|in:1,0',
                'height' => 'required|numeric|digits_between:1,4',
                'weight' => 'required|numeric|digits_between:1,4',
                'blood_group' => ['nullable', Rule::in(User::BLOOD_GROUP)],
                'handicap' => 'required|in:1,0',
                'handicap_details' => 'nullable|min:3|max:30',
                'qualification' => ['required', Rule::in(User::QUALIFICATION)],
                'education_medium' => ['required', Rule::in(User::EDUCATION_MEDIUM)],
                'education_details' => 'required|min:3|max:60',
                'occupation' => ['required', Rule::in(User::OCCUPATION)],
                'occupation_details' => 'nullable|min:3,max:120',
                'income' => 'nullable|numeric|between:0,1000',
                'occupation_address' => 'nullable|min:3|max:120',
                'residential_address' => 'required|min:3|max:120',
                'alternative_mobile' => 'required|numeric|digits:10',
                'married_sisters' => 'required|numeric|min:0|max:99',
                'unmarried_sisters' => 'required|numeric|min:0|max:99',
                'married_brothers' => 'required|numeric|min:0|max:99',
                'unmarried_brothers' => 'required|numeric|min:0|max:99',
            ],
        );
        $registerOneForm = User::findOrFail($id);
        $fileWithExtension = $request->file('profile_image');
        //dd($fileWithExtension);
        if ($fileWithExtension) {
            $filename = now()->format('dmy-his') . '-' . rand(1, 99) . '.' . $fileWithExtension->clientExtension();
            $destinationPath = storage_path('app/public/images/profile/');
            $img = Image::make($fileWithExtension->getRealPath())->resize(null, 400, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upSize();
            });
            $img->save($destinationPath . $filename, 90);
            if ($registerOneForm->profile_image) {
                Storage::disk('public')->delete('images/profile/' . $registerOneForm->profile_image);
            }
            $registerOneForm->profile_image = $filename;
        }

        $registerOneForm->full_name = $request->full_name;
        $registerOneForm->date_of_birth = $request->date_of_birth;
        $registerOneForm->place_of_birth = $request->place_of_birth;
        $registerOneForm->email = $request->email;
        $registerOneForm->gender = $request->gender;
        $registerOneForm->native_place = $request->native_place;
        $registerOneForm->martial_status = $request->martial_status;
        $registerOneForm->status_of_children = $request->status_of_children;
        $registerOneForm->no_of_children = $request->no_of_children;
        $registerOneForm->caste = $request->caste;
        $registerOneForm->sub_caste = $request->sub_caste;
        $registerOneForm->mother_tongue = $request->mother_tongue;
        $registerOneForm->manglik = $request->manglik;
        $registerOneForm->height = $request->height;
        $registerOneForm->weight = $request->weight;
        $registerOneForm->blood_group = $request->blood_group;
        $registerOneForm->handicap = $request->handicap;
        $registerOneForm->handicap_details = $request->handicap_details;
        $registerOneForm->qualification = $request->qualification;
        $registerOneForm->education_medium = $request->education_medium;
        $registerOneForm->education_details = $request->education_details;
        $registerOneForm->occupation = $request->occupation;
        $registerOneForm->occupation_details = $request->occupation_details;
        $registerOneForm->income = $request->income;
        $registerOneForm->occupation_address = $request->occupation_address;
        $registerOneForm->residential_address = $request->residential_address;
        $registerOneForm->alternative_mobile = $request->alternative_mobile;
        $registerOneForm->married_sisters = $request->married_sisters;
        $registerOneForm->unmarried_sisters = $request->unmarried_sisters;
        $registerOneForm->married_brothers = $request->married_brothers;
        $registerOneForm->unmarried_brothers = $request->unmarried_brothers;
        $registerOneForm->ip_address = $_SERVER['REMOTE_ADDR'];
        if ($registerOneForm->save()) {
            return redirect()->route('backend.user.form-two-edit', $registerOneForm->id)->with(['alert-type' => 'success', 'message' => 'Form Saved Successfully.']);
        }
        return redirect()->back()->with(['alert-type' => 'error', 'message' => 'Something Went Wrong']);
    }

    public function FormTwoEdit($id)
    {
        $users = User::findOrFail($id);
        $userReferenceOne = $users->userReference()->where('type', '=', 'reference_one')->first();
        $userReferenceTwo = $users->userReference()->where('type', '=', 'reference_two')->first();
        // dd($userReference);
        return view('backend.users.editFormTwo', compact('users', 'userReferenceOne', 'userReferenceTwo'));
    }

    public function FormTwoUpdate(Request $request, $id)
    {
        $request->validate(
            [
                'mosal_name' => 'required|min:3|max:30',
                'mosal_mobile' => 'nullable|numeric|digits:10',
                'mosal_residential_address' => 'nullable|min:3|max:120',
                'reference_one_name' => 'required|min:3|max:30',
                'reference_one_mobile' => 'required|numeric|digits:10',
                'reference_one_address' => 'nullable|min:3|max:120',
                'reference_two_name' => 'required|min:3|max:30',
                'reference_two_mobile' => 'required|numeric|digits:10',
                'reference_two_address' => 'nullable|min:3|max:120',
                'father_name' => 'required|min:3|max:30',
                'father_occupation' => ['nullable', Rule::in(User::OCCUPATION)],
                'mother_name' => 'required|min:3|max:30',
                'mother_occupation' => ['nullable', Rule::in(User::MOTHER_OCCUPATION)],
                'choice_of_life_partner' => 'nullable|in:Never Married,Seperated,Widowed,Divorced',
                'willing_to_settle_abroad' => 'nullable|in:Yes,No',
                'willing_to_marry_having_strictly_jain_foods' => 'nullable|in:Yes,No',
                'mumbai_contact_name' => 'nullable|min:3|max:30',
                'mumbai_contact_family_relation' => ['nullable', Rule::in(User::FAMILY_RELATION)],
                'mumbai_contact_address' => 'nullable|min:3|max:120',
                'mumbai_contact_mobile' => 'nullable|numeric|digits:10',
            ]
        );

        $registerTwoForm = User::findOrFail($id);
        $registerTwoForm->mosal_name = $request->mosal_name;
        $registerTwoForm->mosal_residential_address = $request->mosal_residential_address;
        $registerTwoForm->mosal_mobile = $request->mosal_mobile;
        $registerTwoForm->father_name = $request->father_name;
        $registerTwoForm->father_occupation = $request->father_occupation;
        $registerTwoForm->mother_name = $request->mother_name;
        $registerTwoForm->mother_occupation = $request->mother_occupation;
        $registerTwoForm->choice_of_life_partner = $request->choice_of_life_partner;
        $registerTwoForm->willing_to_settle_abroad = $request->willing_to_settle_abroad;
        $registerTwoForm->willing_to_marry_having_strictly_jain_foods = $request->willing_to_marry_having_strictly_jain_foods;
        $registerTwoForm->mumbai_contact_name = $request->mumbai_contact_name;
        $registerTwoForm->mumbai_contact_mobile = $request->mumbai_contact_mobile;
        $registerTwoForm->mumbai_contact_address = $request->mumbai_contact_address;
        $registerTwoForm->mumbai_contact_family_relation = $request->mumbai_contact_family_relation;
        $registerTwoForm->confirmation = 1;
        $registerTwoForm->ip_address = $_SERVER['REMOTE_ADDR'];
        if ($registerTwoForm->save()) {
            UserReference::updateOrCreate(
                [
                    'user_id' => $registerTwoForm->id,
                    'type' => 'reference_one'
                ],
                [
                    'name' => $request->reference_one_name,
                    'address' => $request->reference_one_address,
                    'mobile' => $request->reference_one_mobile,
                ]
            );
            UserReference::updateOrCreate(
                [
                    'user_id' => $registerTwoForm->id,
                    'type' => 'reference_two'
                ],
                [
                    'name' => $request->reference_two_name,
                    'address' => $request->reference_two_address,
                    'mobile' => $request->reference_two_mobile,
                ]
            );
            return redirect()->route('backend.user.index')->with(['alert-type' => 'success', 'message' => 'Form Saved Successfully.']);
        }
        return redirect()->back()->with(['alert-type' => 'error', 'message' => 'Something Went Wrong.']);
    }

    public function destroy($id)
    {
        return redirect()->back()->with(['alert-type' => 'error', 'message' => 'Work In Progress']);
        $user = User::findOrFail($id);
        if ($user->delete() && Storage::disk('public')->delete('images/profile/' . $user->profile_image)) {
            return redirect()->route('backend.user.index')->with(['alert-type' => 'success', 'message' => 'User Deleted Successfully']);
        }
        return redirect()->back()->with(['alert-type' => 'error', 'message' => 'Something Went Wrong']);
    }

    public function pdf($user_id)
    {
        $user = User::findOrFail($user_id);
        $userReferenceOne = $user->userReference()->where('type', '=', 'reference_one')->first();
        $userReferenceTwo = $user->userReference()->where('type', '=', 'reference_two')->first();
        $pdf = Pdf::loadView('frontend.pdf.profile', ['user' => $user, 'userReferenceOne' => $userReferenceOne, 'userReferenceTwo' => $userReferenceTwo]);
        // return view('frontend.pdf.profile', compact('user', 'userReferenceOne', 'userReferenceTwo'));
        return $pdf->stream(now()->format('d_m_y_h_i_s') . '.pdf');
    }

    public function createSubscription(Request $request, $user_id)
    {
        $user = User::findOrFail($user_id);
        // dd($user);
        if (!$user->full_name || !$user->mosal_name) {
            return redirect()->back()->with(toast('Please Complete User Profile.', 'info'));
        }

        if ($user->status != 'Approved') {
            return redirect()->back()->with(toast('User Profile is not Approved.', 'info'));
        }

        if ($user->getActiveSubscription()) {
            return redirect()->back()->with(toast('User is subscribed already.', 'info'));
        }

        DB::beginTransaction();

        try {

            $amount = config('app.subscription_price');
            $order_no = generateOrderNo();
            $discount = 0;

            $order = $this->createOrder($amount, [
                'api_order_id' => $order_no,
                'discount' => $discount,
                'status' => 'completed',
                'mode' => 'offline',
                'user_id' => $user->id,
            ]);

            Transaction::create([
                'order_id' => $order->id,
                'transaction_id' => generateTransactionId(),
                'transaction_date' => now(),
                'amount' => $order->total_amount,
                'status' => 'completed',
                'mode' => 'offline'
            ]);

            Subscription::create([
                'user_id' => $user->id,
                'order_id' => $order->id,
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addMonths(config('app.subscription_months')),
                'is_active' => 1
            ]);

            Invoice::create([
                'user_id' => $order->user_id,
                'order_id' => $order->id,
                'invoice_date' => now(),
            ]);

            DB::commit();
            return redirect()->back()->with(toast('Subscription has been created successfully.', 'success'));
        } catch (\Throwable $th) {

            DB::rollback();
            info('messsge: ' . $th->getMessage() . ' file: ' . $th->getFile() . ' line: ' . $th->getLine());
            return redirect()->back()->with(toast('Something Went Wrong.', 'error'));
        }
    }

}
