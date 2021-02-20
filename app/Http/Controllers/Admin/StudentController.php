<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Batch;
use App\Models\Department;
use App\Models\Student;
use App\Models\Subject;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class StudentController extends Controller
{
    public function student(){
        Session::put('page', 'student');
        $students = Student::with('department')->with('batch')->get();
//        $students = json_encode(json_decode($students));
//        echo "<pre>"; print_r($students); die;
        return view('admin.student.student', compact('students'));
    }

    public function addStudent(Request $request){
        $departments = Department::all();
        $batches= Batch::all();

        Session::put('page', 'add-student');
        if($request->isMethod('post')){
            $data = $request->all();

            // Teacher Information validation
            $rules = [
                'name'   => 'required|regex:/(^([a-zA-z -]+)(\d+)?$)/u',
                'username' => 'required|regex:/(^([a-zA-z]+)(\d+)?$)/u',
                'email' => 'required|email',
                'password' => 'required',
                'department_id' => 'required',
                'batch_id' => 'required',
                'phone' => 'required',
                'profile_image' => 'required|image',

            ];
            $customMessage = [
                'name.required' => 'Student Name is required',
                'name.regex'    => 'Valid Student Name is required',
                'username.required'    => 'Username is required',
                'username.regex'    => 'Valid Username is required',
                'email.required'    => 'Email is required',
                'email.email'    => 'Valid Email is required',
                'password.required'    => 'Password is required',
                'department_id.required'    => 'Department is required',
                'batch_id.required'    => 'Batch is required',
                'phone.required'    => 'Phone is required',
                'profile_image.required'    => 'Profile Image is required',
                'profile_image.image'    => 'Valid Profile Image is required',


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
                    $image_path = "image/student_image/".$filename;
                    // Resize Image
                    Image::make($image_tmp)->resize(600, 600)->save($image_path);
                }
            }

            $student = new Student();
            $student->department_id = $data['department_id'];
            $student->batch_id = $data['batch_id'];
            $student->name = $data['name'];
            $student->username = $data['username'];
            $student->email = $data['email'];
            $student->password = bcrypt($data['password']);
            $student->phone = $data['phone'];
            $student->gender = $data['gender'];
            $student->profile_image = $filename;
            $student->address = $data['address'];
            $student->status = $data['status'];
            $student->save();

            $email = $data['email'];

            $messageDetails = ['email' => $data['email'], 'name' => $data['name'], 'password' => $data['password'], 'username' => $data['username']];
            Mail::send('admin.emails.student_register', $messageDetails, function ($message) use($email){
                $message->to($email)->subject('Registration with Gono University');
            });

            Toastr::success('Student has been added successfully', 'success');
            return redirect('/admin/student');
        }
        return view('admin.student.add_student', compact('departments', 'batches'));
    }


    public function editStudent(Request $request, $id=null){
        $studentDetails = Student::where(['id' => $id])->first();
        $departments = Department::all();
        $batches = Batch::all();

        if($request->isMethod('post')){
            $data = $request->all();
            // Teacher Information validation
            $rules = [
                'name'   => 'required|regex:/(^([a-zA-z -]+)(\d+)?$)/u',
                'username' => 'required|regex:/(^([a-zA-z]+)(\d+)?$)/u',
                'email' => 'required|email',
                'department_id' => 'required',
                'phone' => 'required',
                'profile_image' => 'image'

            ];
            $customMessage = [
                'name.required' => 'Student Name is required',
                'product_name.regex'    => 'Valid Student Name is required',
                'username.required'    => 'Username is required',
                'username.regex'    => 'Valid Username is required',
                'email.required'    => 'Email is required',
                'email.email'    => 'Valid Email is required',
                'department_id.required'    => 'Department is required',
                'phone.required'    => 'Phone is required',
                'profile_image.image'    => 'Valid Profile Image is required'


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
                if (isset($studentDetails->profile_image)){
                    $student_image_path = "image/student_image/".$studentDetails->image;
                    if(File::exists($student_image_path)) {
                        File::delete($student_image_path);
                    }
                }

                $student_image_path = "image/student_image/".$filename;

                Image::make($image_tmp)->resize(600, 600)->save($student_image_path);

            }else{
                $filename = $data['current_image'];
            }

            Student::where(['id' => $id])->update(['department_id'=> $data['department_id'], 'batch_id'=> $data['batch_id'],  'name' => $data['name'], 'username' => $data['username'], 'email' => $data['email'], 'gender' => $data['gender'], 'profile_image' => $filename, 'address' => $data['address'], 'phone' => $data['phone'],  'status' => $data['status']]);
            Toastr::success('Student has been updated successfully', 'success');
            return redirect('/admin/student');
        }

        return view('admin.student.edit_student', compact('studentDetails', 'departments', 'batches'));
    }




    public  function deleteStudent($id){
        $delete_student = Student::where('id', $id)->first();

        if (isset($delete_student->profile_image)) {
            $student_image_path = "image/student_image/" . $delete_student->profile_image;
            if (File::exists($student_image_path)) {
                File::delete($student_image_path);
            }
        }

        $delete_student->delete();
        Toastr::success('Student has been deleted', 'success');
        return redirect('/admin/student');
    }







}
