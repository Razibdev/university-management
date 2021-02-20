<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\Mark;
use App\Models\Question;
use App\Models\Result;
use App\Models\Student;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class MarkingController extends Controller
{
    public function addMarking(){
        Session::put('page', 'add-marking');
        $exams = Exam::where('teacher_id', Auth::guard('teacher')->user()->id)->get();
        return view('teacher.mark.add_marking', compact('exams'));
    }

    public function addMark($id){
        $exam = Exam::where('id', $id)->first();
        $results = Student::where('department_id', $exam->department_id)->where('batch_id', $exam->batch_id)->orderBy('exam_roll', 'ASC')->get();
        return view('teacher.mark.add_mark', compact('results', 'exam'));
    }

    public function addResult($id, $exam){
        $exams = Exam::where('id', $exam)->first();
        $questions = Question::where('exam_id', $exam)->get();
//        echo "<pre>"; print_r($questions); die;
        $viewResult = Result::where('student_id', $id)->where('exam_id', $exam)->get();
        return view('teacher.mark.result', compact('viewResult', 'exams', 'id', 'questions'));
    }


    public function markSubmit(Request $request){
       if ($request->isMethod('post')){
           $data = $request->all();
           $mark = new Mark();
           $mark->student_id = $data['student_id'];
           $mark->exam_id = $data['exam_id'];
           $mark->total_mark = $data['total_mark'];
           $mark->mark = $data['mark'];
           $mark->save();
           Toastr::success('Mark Successfully added', 'Success');
            return redirect('/teacher/add-mark/'.$data['exam_id']);

       }

    }



    public function marking(){
        Session::put('page', 'marking');
        $exams = Exam::where('teacher_id', Auth::guard('teacher')->user()->id)->with('department')->with('batch')->with('semester')->get();
        return view('teacher.mark.marking', compact('exams'));
    }

    public function viewMark($id){
        $exam = Exam::where('id', $id)->with('department')->first();
        $results = Mark::with('student')->where('exam_id', $id)->get();
//        $results = json_decode(json_encode($results));
//        echo '<pre>'; print_r($results); die;
        return view('teacher.mark.view_mark', compact('results', 'exam'));
    }



    public function editResult($id, $exam){
        $exam = Exam::where('id', $exam)->first();
        $result = Mark::with('student')->where('id', $id)->first();
        return view('teacher.mark.edit_mark', compact('result', 'exam'));
    }

    public function markUpdate(Request $request, $id){
        if ($request->isMethod('post')){
            $data = $request->all();
            Mark::where('id', $id)->update(['mark'=> $data['mark'], 'total_mark' => $data['total_mark']]);
            Toastr::success('Mark has been updated', 'Success');
            return redirect('teacher/view-mark/'.$data['exam_id']);
        }
    }





    public function deleteMark($id){
        $delete_exam = Exam::where('id', $id)->first();
        $delete_exam->delete();
        $deleteMark = Mark::where('exam_id', $id)->first();
        $deleteMark->delete();

        $delete_result = Result::where('exam_id', $id)->get();
        foreach ($delete_result as $key => $value){
            $value->delete();
        }

        $delete_question = Question::where('exam_id', $id)->get();
        foreach ($delete_question as $key => $value){
            $value->delete();
        }
        Toastr::success('Delete has been deleted', 'success');
        return redirect('/admin/sections');
    }





}
