<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
    public function index(){
        $teachers = Teacher::paginate(8);
        return view('frontend.teacher.teacher', compact('teachers'));
    }
    public function teacherSingle($id){
        $teacher = Teacher::where('id', $id)->first();
//        $teacher = json_decode(json_encode($teacher),true);

        return view('frontend.teacher.teacher_single', compact('teacher'));
    }


    public function search(){
        $query = $_GET['teacher_search'];

        $teachers = Department::join('teachers', 'teachers.department_id', 'departments.id')->where('teachers.name', 'like', '%'.$query.'%')->orWhere('departments.name', 'like', '%'.$query.'%')->get();
//        $teachers = Teacher::where('name', 'like', '%'.$query.'%')->paginate(8);
        return view('frontend.teacher.search', compact('teachers'));
    }
}
