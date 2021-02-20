<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AttendanceController extends Controller
{
    public function viewAttendance(){
        Session::put('page', 'attendance');
//        $attendances = Attendance::where('student_id', Auth::guard('student')->user()->id)->with('student')->with('department')->with('batch')->groupBy('subject_id')->get();
        $student = Student::where('id', Auth::guard('student')->user()->id)->first();
        $subjects = Subject::where('department_id', $student->department_id)->where('batch_id', $student->batch_id)->with('department')->with('batch')->with('semester')->get();
//        $subject = json_decode(json_encode($subject));
//        echo "<pre>"; print_r($subject); die;
        return view('student.attendance.attendance', compact('subjects', 'student'));
    }

    public function attendance($id, $student){
        $studentAttendaces = Attendance::where('student_id', $student)->where('subject_id', $id)->with('student')->with('department')->with('batch')->get();

        $attendanceCount = Attendance::where('student_id', $student)->where('subject_id', $id)->count();
        $attendanceCountp = Attendance::where('student_id', $student)->where('subject_id', $id)->where('attendance', 'Present')->count();
        $attendanceCounta = Attendance::where('student_id', $student)->where('subject_id', $id)->where('attendance', 'Absent')->count();
        $present = 0;
        $absent = 0;
        if($attendanceCountp> 0){
            $present = ($attendanceCountp * 100)/$attendanceCount;
        }

        if($attendanceCounta> 0){
            $absent = ($attendanceCounta * 100)/$attendanceCount;
        }
//        echo "<pre>"; print_r($attendanceCountp); die();
        return view('student.attendance.view_attendance', compact('studentAttendaces', 'attendanceCount', 'present', 'absent'));
    }




}
