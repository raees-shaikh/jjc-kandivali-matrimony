<?php

namespace App\Http\Controllers\frontend;

use App\Models\FormDownload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class FormDownloadController extends Controller
{
    public function store(Request $request)
    {
        // dd($request);
        // return redirect()->back()->with(toast('Please Try Again Later', 'error'));
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|string|min:3|max:30',
            'email' => 'required|email:rfc,dns|min:5|max:60',
            'phone_no' => 'required|numeric|digits:10',
        ]);

        if ($validator->fails()) {
            session()->flash('download-from-error', true);
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $form_download = new FormDownload();
        $form_download->name = $request->full_name;
        $form_download->mobile_no = $request->phone_no;
        $form_download->email = $request->email;
        $form_download->downloaded = 1;
        $form_download->ip_address = $_SERVER['REMOTE_ADDR'];
        if ($form_download->save()) {

            $url = URL::temporarySignedRoute(
                'frontend.form-download.download',
                now()->addMinutes(1)
            );

            session()->flash('download-form-url', $url);

            return redirect()->back()->with(toast('Please click download link btn ', 'success'));
        } else {
            return redirect()->back()->with(toast('Something Went Wrong', 'error'));
        }
    }

    public function download(Request $request)
    {
        if (!$request->hasValidSignature()) {
            abort(401);
        }
        $file = public_path() . "/frontend/pdf/Sagpan_Form.pdf";
        $headers = array(
            'Content-Type: application/pdf',
        );
        return response()->download($file, 'form.pdf', $headers);
    }
}
