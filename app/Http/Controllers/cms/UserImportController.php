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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Exception;

class UserImportController extends Controller
{
    use Transactional, Taxable;


    public function importIndex()
    {
        return view('backend.users.import');
    }

    private function validationRules()
    {
        return [
            'excel' => ['required', 'max:10240', function ($a, $file, $f) {
                $ex = $file->getClientOriginalExtension();
                $exAvil = ['csv'];
                if (!in_array($ex, $exAvil)) {
                    $f('File Must be a csv file.');
                }
            }]
        ];
    }

    public function import(Request $request)
    {
        // dd($request);
        $request->validate($this->validationRules());

        $file = $request->file('excel');
        // dd($file);
        # upload file
        $ex =  $file->getClientOriginalExtension();
        $path = storage_path('app/' . $file->storeAs('public', 'sam.' . $ex));

        # open file
        $handle = fopen($path, 'r');

        # get first row (header of sheet) to map the column
        $header = fgetcsv($handle);
        //dd($header);

        $values['gender']['M'] = "Male";
        $values['gender']['F'] = "Female";

        $values['martial_status']['DIV'] = "Divorced";
        $values['martial_status']['WID'] = "Widowed";
        $values['martial_status']['NM'] = "Unmarried";

        while ($row = fgetcsv($handle)) {
            // dd($row);
            if (!User::where('mobile', $row[1])->exists()) {
                $user = new User();
                $user->filled_by = auth()->user()->id;
                $user->profile_no = $row[0] ? $row[0] : null;
                $user->mobile = $row[1] ? $row[1] : null;
                $user->full_name = $row[2] ? $row[2] : null;
                $user->date_of_birth = $row[3] ? Carbon::parse($row[3]) : null;
                $user->place_of_birth = $row[4] ? $row[4] : null;
                $user->email = $row[5] ? $row[5] : null;
                $user->gender = $row[6] ? $values['gender'][$row[6]] : null;
                $user->native_place = $row[7] ? $row[7] : null;
                $user->martial_status = $row[8] ? $values['martial_status'][$row[8]] : null;
                $user->status_of_children = $row[9] ? ucwords($row[9]) : null;
                $user->no_of_children = $row[10] ? $row[10] : null;
                $user->caste = $row[11] ? $row[11] : null;
                $user->sub_caste = $row[12] ? $row[12] : null;
                $user->mother_tongue = $row[13] ? $row[13] : null;
                $user->manglik = $row[14] ?? $row[14] != 'Do not know' ? ($row[14] == 'Yes' ? 1 : 0) : null;
                $user->height = $row[15] ? $row[15] : null;
                $user->weight = $row[16] ? $row[16] : null;
                $user->blood_group = $row[17] ? $row[17] : null;
                $user->handicap = $row[18] ? $row[18] : null;
                $user->handicap_details = $row[19] ? $row[19] : null;
                // $user->qualification = $row[20] ? $row[20] : null;
                $user->education_medium = $row[21] ? $row[21] : null;
                $user->education_details = $row[22] ? $row[22] : null;
                // $user->occupation = $row[23] ? $row[23] : null;
                $user->occupation_details = $row[24] ? $row[24] : null;
                $user->income = $row[25] ? $row[25] : null;
                $user->occupation_address = $row[26] ? $row[26] : null;
                $user->residential_address = $row[27] ? $row[27] : null;
                $user->alternative_mobile = $row[28] ? $row[28] : null;
                $user->married_sisters = $row[29] ? $row[29] : null;
                $user->unmarried_sisters = $row[30] ? $row[30] : null;
                $user->married_brothers = $row[31] ? $row[31] : null;
                $user->unmarried_brothers = $row[32] ? $row[32] : null;
                $user->mosal_name = $row[33] ? $row[33] : null;
                $user->mosal_residential_address = $row[34] ? $row[34] : null;
                $user->mosal_mobile = $row[35] ? $row[35] : null;
                $user->father_name = $row[36] ? $row[36] : null;
                // $user->father_occupation = $row[37] ? $row[37] : null;
                $user->mother_name = $row[38] ? $row[38] : null;
                // $user->mother_occupation = $row[39] ? $row[39] : null;
                $user->choice_of_life_partner = $row[40] ? $row[40] : null;
                $user->willing_to_settle_abroad = $row[41] && $row[41] != "NA" ? $row[41] : null;
                $user->willing_to_marry_having_strictly_jain_foods = $row[42] && $row[42] != "NA" ? $row[42] : null;
                $user->mumbai_contact_name = $row[43] ? $row[43] : null;
                $user->mumbai_contact_mobile = $row[44] ? $row[44] : null;
                $user->mumbai_contact_address = $row[45] ? $row[45] : null;
                $user->mumbai_contact_family_relation = $row[46] ? $row[46] : null;
                $user->status = "Approved";
                $user->confirmation = 1;
                $user->ip_address = $_SERVER['REMOTE_ADDR'];
                if ($user->save()) {
                    if (isset($row[47]) && $row[47]) {
                        $userReference = new UserReference;
                        $userReference->user_id = $user->id;
                        $userReference->type = 'reference_one';
                        $userReference->name = isset($row[47]) && $row[47] ? $row[47] : null;
                        $userReference->address = isset($row[48]) && $row[48] ? $row[48] : null;
                        $userReference->mobile = isset($row[49]) && $row[49] ? $row[49] : null;
                        $userReference->save();
                        $userReference = new UserReference;
                        $userReference->user_id = $user->id;
                        $userReference->type = 'reference_two';
                        $userReference->name = isset($row[50]) && $row[50] ? $row[50] : null;
                        $userReference->address = isset($row[51]) && $row[51] ? $row[51] : null;
                        $userReference->mobile = isset($row[52]) && $row[52] ? $row[52] : null;
                        $userReference->save();
                    }

                    $start_date = null;
                    $end_date = null;
                    try {
                        if ($row[53] && $row[53] != "" && $row[54] && $row[54] != "") {
                            $start_date = Carbon::parse($row[53]);
                            $end_date = Carbon::parse($row[54]);
                        }

                        if ($start_date && $end_date) {
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
                                'start_date' => $start_date,
                                'end_date' => $end_date,
                                'is_active' => 1
                            ]);

                            Invoice::create([
                                'user_id' => $order->user_id,
                                'order_id' => $order->id,
                                'invoice_date' => now(),
                            ]);

                            DB::commit();
                        }
                    } catch (\Throwable $th) {
                        DB::rollBack();
                    }
                }
            } else {
                Log::info("Already Exists: Mobile - " . $row[1] . " - Profile No. - " . $row[0]);
            }
        }

        # close opend file
        fclose($handle);

        // delete file
        $filePath = storage_path('app/public/' . 'sam.' . $ex);
        unlink($filePath);
        return redirect()->route('backend.user.index')->with(['alert-type' => 'success', 'message' => 'Data Imported SuccessFully']);
        // dd($sheet_cols);
    }
}
