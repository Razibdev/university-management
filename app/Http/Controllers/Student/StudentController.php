<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class StudentController extends Controller
{

    public function login(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();

            $rules = [
                'email' => 'required|email|max:255',
                'password' => 'required',
            ];

            $customerMessage = [
                'email.required' => 'Email is required',
                'email.email' => 'Valid email is required',
                'password.required' => 'Password is required'

            ];
            $this->validate($request, $rules, $customerMessage);

            if(Auth::guard('student')->attempt(['email' => $data["email"], 'password' => $data['password']])){
                Toastr::success('Login Successfully', 'success');
                return redirect('/');
            }else{
                Session::flash('error_message', 'Invalid Username or Password');
                return redirect()->back();
            }
        }
        return view('student.student_login');
    }

    public function dashboard(){
        Session::put('page', 'dashboard');
        return view('student.student_dashboard');
    }


    public function logout(){
        Auth::guard('student')->logout();
        return redirect('/');
    }


    // admin Setting
    public function settings(){
        Session::put('page', 'settings');
        $studentDetails = Auth::guard('student')->user();
        return view('student.student_settings', compact('studentDetails'));
    }


    public function checkCurrentPassword(Request $request){
        $data = $request->all();
        if(Hash::check($data['current_pwd'], Auth::guard('student')->user()->password)){
            echo "true";
        }else{
            echo "false";
        }
    }

    public function updateCurrentPassword(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
//            echo "<pre>"; print_r($data); die;
            if (Hash::check($data["current_pwd"], Auth::guard('student')->user()->password)) {
                // check if new and confirm password is matching
                if ($data['new_pwd'] === $data['confirm_pwd']) {
                    Student::where('id', Auth::guard('student')->user()->id)->update(['password' => bcrypt($data['new_pwd'])]);
                    Toastr::success('Password has been changed successfully!', 'success');
                    return redirect('student/settings');
                } else {
                    Toastr::error('new and confirm password is not matching', 'error');
                    return redirect('student/settings');
                }
            } else {
                Toastr::error('Your Current Password is Incorrect', 'error');
                return redirect('student/settings');
            }
        }
    }


public function updateStudentDetails(Request $request){
    Session::put('page', 'update-student-details');

    $studentDetails = Auth::guard('student')->user();
    if($request->isMethod('post')){
        $data = $request->all();
//            echo "<pre>"; print_r($data); die;
        $rules = [
            'student_name'   => 'required|regex:/(^([a-zA-z ]+)(\d+)?$)/u',
            'student_mobile' => 'required|numeric',
            'address' => 'required',
        ];
        $customMessage = [
            'student_name.required' => 'Name is required',
            'student_name.regex'    => 'Valid Name is required',
            'student_mobile.required' => 'Mobile is required',
            'student_mobile.numeric'    => 'Valid Mobile is required',
            'address.required'    => 'Address is required'

        ];
        $this->validate($request, $rules, $customMessage);
        // Update Admin Details
        // image filed
        if($request->hasFile('profile_image')){
            $image_tmp = $request->file('profile_image');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                // Generate New Image Name
                $imageName = rand(1111,9999).'.'.$extension;
            }

            if (isset($studentDetails->profile_image)){
                $image_path = "image/student_image/".$studentDetails->profile_image;  // Value is not URL but directory file path
                if(File::exists($image_path)) {
                    File::delete($image_path);
                }
            }
            // Upload Image
            $imagePath = 'image/student_image/'.$imageName;
            Image::make($image_tmp)->resize('70', '70')->save($imagePath);
        }else{
            $imageName = $studentDetails->profile_image;
        }

        // Update Admin Details
        Student::where('email', Auth::guard('student')->user()->email)->update(['name' => $data['student_name'], 'profile_image' => $imageName, 'phone' => $data['student_mobile'], 'address' => $data['address'], 'status' => $data['status'], 'gender' => $data['gender']]);
        Toastr::success('Student Details has been updated', 'success');
        return redirect()->back();

    }
    return view('student.update_student_details', compact('studentDetails'));
}





























}
