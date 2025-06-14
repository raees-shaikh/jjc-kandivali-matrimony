<?php

namespace App\Http\Controllers\frontend;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Models\UserReference;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class FormController extends Controller
{
    public function createFormOne()
    {
        if (auth()->user()->full_name) {
            return redirect()->route('frontend.form-two');
        }
        return view('frontend.register.create-1');
    }

    public function storeFormOne(Request $request)
    {
        //dd($request);
        $request->validate(
            [
                'full_name' => 'required|min:3|max:30',
                'date_of_birth' => 'required|before:today',
                'place_of_birth' => 'required|min:3|max:30',
                'email' => 'required|min:3|max:30|unique:users,email',
                'gender' => 'required|in:male,female',
                'native_place' => 'required|min:3|max:30',
                'profile_image' => 'required|max:10240|mimes:png,jpeg,jpg',
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
                'mobile_number' => 'required|numeric|digits:10',
                'no_of_married_sisters' => 'required|numeric|min:0|max:99',
                'no_of_unmarried_sisters' => 'required|numeric|min:0|max:99',
                'no_of_married_brothers' => 'required|numeric|min:0|max:99',
                'no_of_unmarried_brothers' => 'required|numeric|min:0|max:99',
            ],
        );
        $fileWithExtension = $request->file('profile_image');
        // dd($fileWithExtension);
        $filename = now()->format('dmy-his') . '-' . rand(1, 99) . '.' . $fileWithExtension->clientExtension();
        $destinationPath = storage_path('app/public/images/profile/');
        $img = Image::make($fileWithExtension->getRealPath())->resize(null, 400, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upSize();
        });
        $img->save($destinationPath . $filename, 90);

        $registerOneForm = auth()->user();
        $registerOneForm->profile_image = $filename;
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
        $registerOneForm->alternative_mobile = $request->mobile_number;
        $registerOneForm->married_sisters = $request->no_of_married_sisters;
        $registerOneForm->unmarried_sisters = $request->no_of_unmarried_sisters;
        $registerOneForm->married_brothers = $request->no_of_married_brothers;
        $registerOneForm->unmarried_brothers = $request->no_of_unmarried_brothers;
        $registerOneForm->ip_address = $_SERVER['REMOTE_ADDR'];
        if ($registerOneForm->save()) {
            return redirect()->route('frontend.form-two')->with(['alert-type' => 'success', 'message' => 'Form Saved Successfully.']);
        }
        return redirect()->back()->with(['alert-type' => 'error', 'message' => 'Something Went Wrong']);
    }

    public function createFormTwo()
    {
        if (auth()->user()->mosal_name) {
            return redirect()->route('frontend.subscription');
        }
        return view('frontend.register.create-2');
    }

    public function storeFormTwo(Request $request)
    {
        // dd($request);
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
                'choice_of_life_partner' => 'nullable|in:Never Married,Separated,Widowed,Divorced',
                'willing_to_settle_abroad' => 'nullable|in:Yes,No',
                'willing_to_marry_having_strictly_jain_foods' => 'nullable|in:Yes,No',
                'mumbai_contact_name' => 'nullable|min:3|max:30',
                'mumbai_contact_family_relation' => ['nullable', Rule::in(User::FAMILY_RELATION)],
                'mumbai_contact_address' => 'nullable|min:3|max:120',
                'mumbai_contact_mobile' => 'nullable|numeric|digits:10',
                'confirmation' => 'required',
            ]
        );

        $registerTwoForm = auth()->user();
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
            UserReference::firstOrCreate(
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
            UserReference::firstOrCreate(
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
            return redirect()->route('frontend.subscription')->with(['alert-type' => 'success', 'message' => 'Form Saved Successfully.']);
            // return redirect()->route('frontend.profile')->with(['alert-type' => 'success', 'message' => 'Form Saved Successfully.']);
        }
        return redirect()->back()->with(['alert-type' => 'error', 'message' => 'Something Went Wrong.']);
    }

    public function editFormOne()
    {
        $user = auth()->user();
        return view('frontend.register.edit-1', compact('user'));
    }

    public function updateFormOne(Request $request)
    {
        //dd($request);
        $registerOneForm = auth()->user();

        $request->validate(
            [
                'full_name' => 'required|min:3|max:30',
                'date_of_birth' => 'required|before:today',
                'place_of_birth' => 'required|min:3|max:30',
                'email' => 'required|email:rfc,dns|min:3|max:30|unique:users,email,' . $registerOneForm->id,
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
                'mobile_number' => 'required|numeric|digits:10',
                'no_of_married_sisters' => 'required|numeric|min:0|max:99',
                'no_of_unmarried_sisters' => 'required|numeric|min:0|max:99',
                'no_of_married_brothers' => 'required|numeric|min:0|max:99',
                'no_of_unmarried_brothers' => 'required|numeric|min:0|max:99',
            ],
        );

        $fileWithExtension = $request->file('profile_image');
        // dd($fileWithExtension);
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
        $registerOneForm->residential_address = $request->residential_address;
        $registerOneForm->occupation_address = $request->occupation_address;
        $registerOneForm->alternative_mobile = $request->mobile_number;
        $registerOneForm->married_sisters = $request->no_of_married_sisters;
        $registerOneForm->unmarried_sisters = $request->no_of_unmarried_sisters;
        $registerOneForm->married_brothers = $request->no_of_married_brothers;
        $registerOneForm->unmarried_brothers = $request->no_of_unmarried_brothers;
        $registerOneForm->ip_address = $_SERVER['REMOTE_ADDR'];
        if ($registerOneForm->save()) {
            return redirect()->route('frontend.form-two.edit', $registerOneForm->id)->with(['alert-type' => 'success', 'message' => 'Form Updated Successfully.']);
        }
        return redirect()->back()->with(['alert-type' => 'error', 'message' => 'Something Went Wrong']);
    }

    public function editFormTwo()
    {
        $user = auth()->user();
        $userReferenceOne = $user->userReference()->where('type', '=', 'reference_one')->first();
        $userReferenceTwo = $user->userReference()->where('type', '=', 'reference_two')->first();
        return view('frontend.register.edit-2', compact('user', 'userReferenceOne', 'userReferenceTwo'));
    }

    public function updateFormTwo(Request $request)
    {
        // dd($request);
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
                'choice_of_life_partner' => 'nullable|in:Never Married,Separated,Widowed,Divorced',
                'willing_to_settle_abroad' => 'nullable|in:Yes,No',
                'willing_to_marry_having_strictly_jain_foods' => 'nullable|in:Yes,No',
                'mumbai_contact_name' => 'nullable|min:3|max:30',
                'mumbai_contact_family_relation' => ['nullable', Rule::in(User::FAMILY_RELATION)],
                'mumbai_contact_address' => 'nullable|min:3|max:120',
                'mumbai_contact_mobile' => 'nullable|numeric|digits:10',
                // 'confirmation' => 'required',
            ]
        );

        $registerTwoForm = auth()->user();
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
        $registerTwoForm->ip_address = $_SERVER['REMOTE_ADDR'];
        // $registerTwoForm->confirmation = 1;
        if ($registerTwoForm->save()) {
            UserReference::UpdateOrCreate(
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
            UserReference::UpdateOrCreate(
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
            return redirect()->route('frontend.profile')->with(['alert-type' => 'success', 'message' => 'Form Saved Successfully.']);
            // return redirect()->route('frontend.profile')->with(['alert-type' => 'success', 'message' => 'Form Saved Successfully.']);
        }
        return redirect()->back()->with(['alert-type' => 'error', 'message' => 'Something Went Wrong.']);
    }
}
