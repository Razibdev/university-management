<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Teacher;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class TeacherController extends Controller
{
    public function teacher(){
        Session::put('page', 'teacher');
        $teachers = Teacher::with('department')->get();
        return view('admin.teacher.teacher', compact('teachers'));
    }

    public function addTeacher(Request $request){
        $departments = Department::all();
        Session::put('page', 'add-teacher');
        if($request->isMethod('post')){
            $data = $request->all();

            // Teacher Information validation
            $rules = [
                'name'   => 'required|regex:/(^([a-zA-z -]+)(\d+)?$)/u',
                'username' => 'required|regex:/(^([a-zA-z]+)(\d+)?$)/u',
                'email' => 'required|email',
                'password' => 'required',
                'department_id' => 'required',
                'phone' => 'required',
                'profile_image' => 'required|image',
                'designation' => 'required'

            ];
            $customMessage = [
                'name.required' => 'Teacher Name is required',
                'name.regex'    => 'Valid Teacher Name is required',
                'username.required'    => 'Username is required',
                'username.regex'    => 'Valid Username is required',
                'email.required'    => 'Email is required',
                'email.email'    => 'Valid Email is required',
                'password.required'    => 'Password is required',
                'department_id.required'    => 'Department is required',
                'phone.required'    => 'Phone is required',
                'profile_image.required'    => 'Profile Image is required',
                'profile_image.image'    => 'Valid Profile Image is required',
                'designation.required'    => 'Designation is required',


            ];
            $this->validate($request, $rules, $customMessage);

            if (empty($data['address'])){
                $data['address'] = "";
            }

            //Upload Image
            if($request->hasFile('profile_image')){
                $image_tmp = $request->file('profile_image');
                if($image_tmp->isValid()){
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111, 99999).'.'.$extension;
                    $image_path = "image/teacher_image/".$filename;
                    // Resize Image
                    Image::make($image_tmp)->resize(70, 70)->save($image_path);
                }
            }

            $teacher = new Teacher();
            $teacher->department_id = $data['department_id'];
            $teacher->name = $data['name'];
            $teacher->username = $data['username'];
            $teacher->email = $data['email'];
            $teacher->password = bcrypt($data['password']);
            $teacher->phone = $data['phone'];
            $teacher->gender = $data['gender'];
            $teacher->designation = $data['designation'];
            $teacher->profile_image = $filename;
            $teacher->address = $data['address'];
            $teacher->status = $data['status'];
            $teacher->save();

            $email = $data['email'];

            $messageDetails = ['email' => $data['email'], 'name' => $data['name'], 'password' => $data['password'], 'username' => $data['username']];
            Mail::send('admin.emails.teacher_register', $messageDetails, function ($message) use($email){
                $message->to($email)->subject('Registration with Gono University');
            });

            Toastr::success('Teacher has been added successfully', 'success');
            return redirect('/admin/teacher');

        }

        return view('admin.teacher.add_teacher', compact('departments'));
    }




    public function editTeacher(Request $request, $id=null){
        $teacherDetails = Teacher::where(['id' => $id])->first();
        $departments = Department::get();

        if($request->isMethod('post')){
            $data = $request->all();
            // Teacher Information validation
            $rules = [
                'name'   => 'required|regex:/(^([a-zA-z -]+)(\d+)?$)/u',
                'username' => 'required|regex:/(^([a-zA-z]+)(\d+)?$)/u',
                'email' => 'required|email',
                'department_id' => 'required',
                'phone' => 'required',
                'profile_image' => 'image',
                'designation' => 'required'

            ];
            $customMessage = [
                'name.required' => 'Teacher Name is required',
                'product_name.regex'    => 'Valid Teacher Name is required',
                'username.required'    => 'Username is required',
                'username.regex'    => 'Valid Username is required',
                'email.required'    => 'Email is required',
                'email.email'    => 'Valid Email is required',
                'department_id.required'    => 'Department is required',
                'phone.required'    => 'Phone is required',
                'profile_image.image'    => 'Valid Profile Image is required',
                'designation.required'    => 'Designation is required',


            ];
            $this->validate($request, $rules, $customMessage);

            if (empty($data['address'])){
                $data['address'] = "";
            }

            //Upload Image
            if($request->hasFile('profile_image')){
                $image_tmp = $request->file('profile_image');
                if($image_tmp->isValid()){
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111, 99999).'.'.$extension;
                }
                if (isset($teacherDetails->profile_image)){
                    $teacher_image_path = "image/teacher_image/".$teacherDetails->image;
                    if(File::exists($teacher_image_path)) {
                        File::delete($teacher_image_path);
                    }
                }

                $teacher_image_path = "image/teacher_image/".$filename;

                Image::make($image_tmp)->resize(70, 70)->save($teacher_image_path);

            }else{
                $filename = $data['current_image'];
            }

            Teacher::where(['id' => $id])->update(['department_id'=> $data['department_id'], 'name' => $data['name'], 'username' => $data['username'], 'email' => $data['email'], 'gender' => $data['gender'], 'designation' => $data['designation'], 'profile_image' => $filename, 'address' => $data['address'], 'phone' => $data['phone'],  'status' => $data['status']]);
            Toastr::success('Teacher has been updated successfully', 'success');
            return redirect('/admin/teacher');
        }

        return view('admin.teacher.edit_teacher', compact('teacherDetails', 'departments'));
    }






    public  function deleteTeacher($id){
        $delete_teacher = Teacher::where('id', $id)->first();

        if (isset($delete_teacher->profile_image)) {
            $teacher_image_path = "image/teacher_image/" . $delete_teacher->profile_image;
            if (File::exists($teacher_image_path)) {
                File::delete($teacher_image_path);
            }
        }

        $delete_teacher->delete();
        Toastr::success('Teacher has been deleted', 'success');
        return redirect('/admin/teacher');
    }





}
