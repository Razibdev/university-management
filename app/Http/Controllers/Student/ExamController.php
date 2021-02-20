<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\Question;
use App\Models\Result;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Session;

class ExamController extends Controller
{
    public function exam(){
        Session::put('page', 'exam');
        $exams = Exam::where('department_id', Auth::guard('student')->user()->department_id)->where('batch_id', Auth::guard('student')->user()->batch_id)->where('status', 1)->with('department')->with('batch')->with('teacher')->with('examType')->get();

        return view('student.exam.exam', compact('exams'));
    }




public function joinExam( $id){
        $exam = Exam::where('id', $id)->first();
//        echo "<pre>"; print_r($exam); die;
        $questions = Question::where('exam_id', $id)->get();

    if($exam->exam_date == Carbon::now()->format('Y-m-d') && $exam->exam_time <=  Carbon::now()->format('H:i:s') && Carbon::now()->format('H:i:s') <= Carbon::parse($exam->exam_time)->addMinutes($exam->exam_duration)->format('H:i:s')){
        return view('student.exam.join_exam', compact( 'questions', 'exam'));
    }else{
        return redirect('student/exam');
    }

}


public function submitExam(Request $request){
    if($request->isMethod('post')){
        $data = $request->all();
//        echo "<pre>"; print_r($data); die;
        for($i = 1; $i<=$data['index']; $i++){
            $result = New Result();
            $result->student_id = Auth::guard('student')->user()->id;
            $result->exam_id = $data['exam_id'];
            $result->question_id = $i;
            $result->question_title = $data['question'.$i];
            $result->ans = $data['ans'.$i];
            $result->save();
        }

        Toastr::success('Your Exam successfully Added', 'Success');
        return redirect('student/exam');

    }
}





}
