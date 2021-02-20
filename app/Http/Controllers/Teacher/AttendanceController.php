<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Batch;
use App\Models\Department;
use App\Models\Student;
use App\Models\Subject;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AttendanceController extends Controller
{
    public function addAttendance(){
        Session::put('page', 'add-attendance');
        $departments = Department::all();
        return view('teacher.student.add_attendance', compact('departments'));
    }

//    public function depStudent(Request $request){
//        $student = Student::where('department_id', $request->department_id)->with('department')->with('batch')->orderBy('exam_roll', 'ASC')->get();
//        return response()->json($student);
//    }

    public function batch(Request $request){
        $batch = Batch::where('department_id', $request->department_id)->get();
        return response()->json($batch);
    }

    public function batchStudent(Request $request){
        $student = Student::where('batch_id', $request->batch_id)->with('department')->with('batch')->orderBy('exam_roll', 'ASC')->get();
        return response()->json($student);
    }

    public function subject(Request $request){
        $subject = Subject::where('batch_id', $request->batch_id)->get();
        return response()->json($subject);
    }


    public function attendanceSubmit(Request $request){

        if ($request->isMethod('post')){

            $data = $request->all();

            $rules = [
                'department'   => 'required',
                'batch'   => 'required',
                'subject'   => 'required'
            ];
            $customMessage = [
                'department.required' => 'Department is required',
                'batch.required'  => 'Batch is required',
                'subject.required'  => 'Subject is required'
            ];
            $this->validate($request, $rules, $customMessage);
            $now = Attendance::where(['attendance_date'=> Carbon::now(), 'subject_id' => $data['subject']])->count();
            if($now > 0){
                Toastr::error('Attendance Already Added', 'Error');
                return redirect()->back();
            }

            for ($i = 0; $i<= $data['index']; $i++){
                if(empty($data['status'.$i])){
                    $data['status'.$i] = 'Absent';
                }else{
                    $data['status'.$i] = 'Present';
                }
                $present =  new Attendance();
                $present->department_id = $data['department'];
                $present->batch_id = $data['batch'];
                $present->subject_id = $data['subject'];
                $present->student_id =  $data['student_id'.$i];
                $present->exam_roll = $data['exam_roll'.$i];
                $present->attendance = $data['status'.$i];
                $present->attendance_date = Carbon::now();
                $present->save();
            }
            Toastr::success('Attendance Successfully added', 'Success');
            return redirect()->back();
        }

    }



public function viewAttendance(){
    Session::put('page', 'view-attendance');
    $departments = Department::all();
    return view('teacher.student.view_attendance', compact('departments'));
}


public function subjectStudent(Request $request){
    $student = Attendance::where('subject_id', $request->subject_id)->with('department')->with('batch')->with('subject')->with('student')->orderBy('exam_roll', 'ASC')->groupBy('exam_roll')->get();
    return response()->json($student);
}


public function attendanceView($id, $subject){
        $studentAttendaces = Attendance::where('student_id', $id)->where('subject_id', $subject)->with('department')->with('batch')->with('subject')->with('student')->get();

        $attendanceCount = Attendance::where('student_id', $id)->where('subject_id', $subject)->count();
        $attendanceCountp = Attendance::where('student_id', $id)->where('subject_id', $subject)->where('attendance', 'Present')->count();
        $attendanceCounta = Attendance::where('student_id', $id)->where('subject_id', $subject)->where('attendance', 'Absent')->count();
        $present = 0;
        $absent = 0;
        if($attendanceCountp> 0){
            $present = ($attendanceCountp * 100)/$attendanceCount;
        }

    if($attendanceCounta> 0){
        $absent = ($attendanceCounta * 100)/$attendanceCount;
    }
//        echo "<pre>"; print_r($attendanceCountp); die();
        return view('teacher.student.attendance.view_attendance', compact('studentAttendaces', 'attendanceCount', 'present', 'absent'));
}


















}
