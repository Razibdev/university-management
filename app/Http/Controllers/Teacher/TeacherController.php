<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Teacher;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class TeacherController extends Controller
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

            if(Auth::guard('teacher')->attempt(['email' => $data["email"], 'password' => $data['password']])){
                Toastr::success('Login Successfully', 'success');
                return redirect('/');
            }else{
                Session::flash('error_message', 'Invalid Username or Password');
                return redirect()->back();
            }
        }
        return view('teacher.teacher_login');
    }

    public function dashboard(){
        Session::put('page', 'dashboard');
        return view('teacher.teacher_dashboard');
    }


    public function logout(){
        Auth::guard('teacher')->logout();
        return redirect('/');
    }


    // admin Setting
    public function settings(){
        Session::put('page', 'settings');
        $teacherDetails = Auth::guard('teacher')->user();
        return view('teacher.teacher_settings', compact('teacherDetails'));
    }

    public function checkCurrentPassword(Request $request){
        $data = $request->all();
        if(Hash::check($data['current_pwd'], Auth::guard('teacher')->user()->password)){
            echo "true";
        }else{
            echo "false";
        }

    }


    public function updateCurrentPassword(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
//            echo "<pre>"; print_r($data); die;
            if (Hash::check($data["current_pwd"], Auth::guard('teacher')->user()->password)) {
                // check if new and confirm password is matching
                if ($data['new_pwd'] === $data['confirm_pwd']) {
                    Teacher::where('id', Auth::guard('teacher')->user()->id)->update(['password' => bcrypt($data['new_pwd'])]);
                    Toastr::success('Password has been changed successfully!', 'success');
                    return redirect('teacher/settings');
                } else {
                    Toastr::error('new and confirm password is not matching', 'error');
                    return redirect('teacher/settings');
                }
            } else {
                Toastr::error('Your Current Password is Incorrect', 'error');
                return redirect('teacher/settings');
            }
        }
    }




// Update Teacher Details

    public function updateTeacherDetails(Request $request){
        Session::put('page', 'update-teacher-details');

        $teacherDetails = Auth::guard('teacher')->user();
        if($request->isMethod('post')){
            $data = $request->all();
//            echo "<pre>"; print_r($data); die;
            $rules = [
                'teacher_name'   => 'required|regex:/(^([a-zA-z ]+)(\d+)?$)/u',
                'teacher_mobile' => 'required|numeric',
                'profile_image'  => 'image|mimes:jpeg,jpg,png',
                'designation' => 'required',
                'address' => 'required',
            ];
            $customMessage = [
                'teacher_name.required' => 'Name is required',
                'teacher_name.regex'    => 'Valid Name is required',
                'teacher_mobile.required' => 'Mobile is required',
                'teacher_mobile.numeric'    => 'Valid Mobile is required',
                'profile_image.image'    => 'Valid image is required',
                'designation.required'    => 'image is required',
                'address.required'    => 'image is required'

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

                if (isset($teacherDetails->profile_image)){
                    $image_path = "image/teacher_image/".$teacherDetails->profile_image;  // Value is not URL but directory file path
                    if(File::exists($image_path)) {
                        File::delete($image_path);
                    }
                }
                // Upload Image
                $imagePath = 'image/teacher_image/'.$imageName;
                Image::make($image_tmp)->resize('70', '70')->save($imagePath);
            }else{
                $imageName = $teacherDetails->profile_image;
            }

            // Update Admin Details
            Teacher::where('email', Auth::guard('teacher')->user()->email)->update(['name' => $data['teacher_name'], 'profile_image' => $imageName, 'phone' => $data['teacher_mobile'], 'designation' => $data['designation'], 'address' => $data['address'], 'status' => $data['status'], 'gender' => $data['gender']]);
            Toastr::success('Admin Details has been updated', 'success');
            return redirect()->back();

        }
        return view('teacher.update_teacher_details', compact('teacherDetails'));
    }



    public function student(){
        Session::put('page', 'student');
        $students = Student::where('department_id', Auth::guard('teacher')->user()->department_id)->get();
        return view('teacher.student.student', compact('students'));
    }















}
