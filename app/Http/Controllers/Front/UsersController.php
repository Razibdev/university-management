<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class UsersController extends Controller
{
//    public function userLoginRegister(){
//        $meta_title = "User Login/Register - Ecom Website";
//        return view('users.login_register', compact('meta_title'));
//    }
//
//
//
//    public function register(Request $request)
//    {
//        if ($request->isMethod('post')) {
//            $data = $request->all();
//            $userCount = User::where('email', $data['email'])->count();
//            if ($userCount > 0) {
//                Toastr::error('Email already exists | Try another Email', 'error');
//                return redirect()->back();
//            } else {
//                $user = new User;
//                $user->name = $data['name'];
//                $user->email = $data['email'];
//                $user->password = bcrypt($data['password']);
//                date_default_timezone_set('Asia/Dhaka');
//                $user->created_at = date("Y-m-d H:i:s");
//                $user->updated_at = date("Y-m-d H:i:s");
//                $user->save();
//                //Send Register Email
////                $email = $data['email'];
////                $messageDetails = ['email' => $data['email'], 'name' => $data['name']];
////                Mail::send('admin.emails.register', $messageDetails, function ($message) use($email){
////                    $message->to($email)->subject('Registration with E-com Website');
////                });
//                // Send Confirmation Email
//                $email = $data['email'];
//                $messageData = ['email' => $data['email'], 'name' => $data['name'], 'code' => base64_encode($data['email'])];
//                Mail::send('admin.emails.confirmation', $messageData, function ($message) use($email){
//                    $message->to($email)->subject('Confirm your Ecom Account');
//                });
//
//
//                if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
//                    Session::put('frontSession', $data['password']);
//                    if(!empty(Session::get('session_id'))){
//                        $session_id = Session::get('session_id');
//                        DB::table('cart')->where(['session_id' => $session_id])->update(['user_email' => $data['email']]);
//                    }
//                    return redirect('/cart');
//                }
//            }
//        }
//    }
//
//    public function login(Request $request){
//        if ($request->isMethod('post')){
//            $data = $request->all();
//            if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
//                $userStatus = User::where('email', $data['email'])->first();
//                if($userStatus->status == 0){
//                    Toastr::error('Your account is not activated! Please Confirm your email to activate.', 'error');
//                    return redirect()->back();
//                }
//                Session::put('frontSession', $data['email']);
//                if(!empty(Session::get('session_id'))){
//                    $session_id = Session::get('session_id');
//                    DB::table('cart')->where(['session_id' => $session_id])->update(['user_email' => $data['email']]);
//                }
//                return redirect('/cart');
//            }else{
//                Toastr::error('Invalid Email or Password', 'error');
//                return redirect()->back();
//            }
//        }
//    }
//
//    public function confirmAccount($email){
//        $email = base64_decode($email);
//        $userCount = User::where('email', $email)->count();
//        if($userCount >0){
//            $userDetails = User::where('email', $email)->first();
//            if($userDetails->status == 1){
//                Toastr::success('Your Email account is already activated. You can login now');
//                return redirect('/login-register');
//            }else{
//                User::where('email', $email)->update(['status' => 1]);
//                //Send Welcome Email
//                $messageDetails = ['email' => $email, 'name' => $userDetails->name];
//                Mail::send('admin.emails.welcome', $messageDetails, function ($message) use($email){
//                    $message->to($email)->subject('Welcome to E-com Website');
//                });
//
//                Toastr::success('Your Email account is  activated.');
//                return redirect('/login-register');
//            }
//        }else{
//            abort(404);
//        }
//
//    }
//
//    public function account(Request $request){
//        $user_id = Auth::user()->id;
//        $userDetails = User::find($user_id);
//        $countries = Country::get();
//        if($request->isMethod('post')){
//            $data = $request->all();
//            if(empty($data['name'])){
//                Toastr::error('Please enter your name to update your account details!', 'error');
//                return redirect()->back();
//            }
//            if(empty($data['address'])){
//                $data['address'] = "";
//            }
//            if(empty($data['city']) ){
//                $data['city'] = "";
//            }
//            if(empty($data['state'])){
//                $data['state'] = "";
//            }
//            if(empty($data['pincode'])){
//                $data['pincode'] = "";
//            }
//            if(empty($data['mobile'])){
//                $data['mobile'] = "";
//            }
//            $user = User::find($user_id);
//            $user->name = $data['name'];
//            $user->address = $data['address'];
//            $user->city = $data['city'];
//            $user->state = $data['state'];
//            $user->country = $data['country'];
//            $user->pincode = $data['pincode'];
//            $user->mobile = $data['mobile'];
//            $user->save();
//            Toastr::success('Your account details has been successfully updated!', 'success');
//            return redirect()->back();
//        }
//        return view('users.account', compact('countries', 'userDetails'));
//    }
//
//    public function checkUserPassword(Request $request){
//        $data = $request->all();
////        echo "<pre>"; print_r($data); die;
//        $current_password = $data['current_pwd'];
//        $user_id = Auth::user()->id;
//        $check_password = User::where('id', $user_id)->first();
//        if(Hash::check($current_password, $check_password->password)){
//            echo "true";
//        }else{
//            echo "false";
//        }
//    }
//    public function updatePassword(Request $request){
//        if($request->isMethod('post')){
//            $data = $request->all();
////            echo "<pre>"; print_r($data); die;
//            $old_pwd = User::where('id', Auth::user()->id)->first();
//            $current_pwd = $data['current_pwd'];
//            if(Hash::check($current_pwd, $old_pwd->password)){
//                $new_pwd = bcrypt($data['new_pwd']);
//                User::where('id', Auth::user()->id)->update(['password' => $new_pwd]);
//                Toastr::success('Password updated successfully', 'success');
//                return redirect()->back();
//
//            }else{
//                Toastr::error('Current Password is Incorrect', 'error');
//                return redirect()->back();
//            }
//
//        }
//    }
//    public function logout(){
//        Auth::logout();
//        Session::forget('frontSession');
//        Session::forget('session_id');
//        return redirect('/');
//    }
//
//
//    public function checkEmail(Request $request){
//        $data = $request->all();
////        echo "<pre>"; print_r($data['email']); die;
//        $userCount = User::where('email', $data['email'])->count();
//        if($userCount > 0){
//            echo "false";
//        }else{
//            echo "true";
//        }
//    }
//
//public function forgotPassword(Request $request){
//        if($request->isMethod('post')){
//            $data = $request->all();
//            $userCount = User::where('email', $data['email'])->count();
//            if($userCount == 0){
//                Toastr::error('Email does not exits', 'error');
//                return redirect()->back();
//            }
//            // Get User Details
//            $userDetails = User::where('email', $data['email'])->first();
//            // Generate Random Password
//            $random_password = Str::random(8);
//            // Encode / Secure Password
//            $new_password = bcrypt($random_password);
//            // Update Password
//            User::where('email', $data['email'])->update(['password' => $new_password]);
//            // Send Forgot Password Email Script
//            $email = $data['email'];
//            $name = $userDetails->name;
//
//            $messageData = ['email' => $email, 'password' => $random_password, 'name' => $name];
//            Mail::send('admin.emails.forgot_password', $messageData, function ($message) use($email){
//                $message->to($email)->subject('New Password -E-com website');
//
//            });
//            Toastr::success('Please check your email for new password!', 'success');
//            return redirect('/login-register');
//
//        }
//        return view('users.forgot_password');
//}








}
