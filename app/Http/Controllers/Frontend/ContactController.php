<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index(Request $request){

        if($request->isMethod('post')){
            $data = $request->all();
//            echo "<pre>"; print_r($data); die;

//            $rules = [
//                'name' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
//                'email' => 'required|email',
//                'subject' => 'required',
//                'message' => 'required',
//                'phone' => 'required',
//            ];
//            $customMessage = [
//                'name.required' => 'Your Name is required',
//                'name.regex'    => 'Valid Your name is required',
//                'email.required'  => 'Email is required',
//                'email.email'    => 'Valid Email is required',
//                'subject.required'  => 'Subject is required',
//                'message.required'  => 'Message is required',
//                'phone.required'  => 'Phone is required',
//
//            ];
//            $this->validate($request, $rules, $customMessage);


            // Send Contact Mail

            $messageData = [
                'email' => $data['email'],
                'name'  => $data['name'],
                'subject' => $data['subject'],
                'phone' => $data['phone'],
                'comment' => $data['message']
            ];
            $email = "razibhossen88@yopmail.com";
            Mail::send('admin.emails.enquiry', $messageData, function ($message) use($email){
                $message->to($email)->subject('Enquiry from Gono University');
            });
            Toastr::success('Thanks for your enquiry. We will get back to you soon.', 'Contact Us');
            return redirect()->back();
        }

        return view('frontend.contact.contact');
    }

}
