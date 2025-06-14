<?php

namespace App\Http\Controllers\frontend;

use App\Models\Contact;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactUsController extends Controller
{
    public function submit(Request $request)
    {
        //dd($request);
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|min:3|max:30',
            'last_name' => 'required|string|min:3|max:30',
            'phone' => 'required|string|digits:10',
            'email' => 'required|string|email:rfc,dns|min:5|max:40',
            'message' => 'required|string|min:5|max:250',
        ]);

        if ($validator->fails()) {
            session()->flash('contact-from-error', true);
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $data =  (object) array();
        $data->first_name = $request->get('first_name');
        $data->last_name = $request->get('last_name');
        $data->email = $request->get('email');
        $data->phone = $request->get('phone');
        $data->message = $request->get('message');

        $contact =  new Contact;
        $contact->first_name = $request->first_name;
        $contact->last_name = $request->last_name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;
        $contact->ip_address = $_SERVER['REMOTE_ADDR'];
        if ($contact->save()) {
            Mail::to(config('app.mail_to_address'))->send(new ContactMail($data));
            if (Mail::failures()) {
                return redirect()->back()->with([
                    "message" => "Something went wrong. Please contact us via email or phone.",
                    "alert-type" => "error"
                ]);
            } else {
                return redirect()->back()->with([
                    "message" => "Message Sent Successfully",
                    "alert-type" => "success"
                ]);
            }
        }
    }
}
