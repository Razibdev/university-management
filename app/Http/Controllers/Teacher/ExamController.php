<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Batch;
use App\Models\Department;
use App\Models\Exam;
use App\Models\Question;
use App\Models\Semester;
use App\Models\Student;
use App\Models\Type;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ExamController extends Controller
{
    public function exam(){
        Session::put('page', 'view-exam');
        $exams = Exam::with(['department', 'batch', 'semester', 'examType'])->where('teacher_id',  Auth::guard('teacher')->user()->id)->get();
//        $exams = json_decode(json_encode($exams), true);
//      echo '<pre>'; print_r($exams); die();
        return view('teacher.exam.exam', compact('exams'));
    }


    public function addExam(Request $request){
        Session::put('page', 'exam');
//        $department = Department::where('id', Auth::guard('teacher')->user()->department_id)->select('id', 'name')->get();
//        $department = json_decode(json_encode($department), true);
//        echo '<pre>'; print_r($department['name']); die();
        $departments = Department::all();
        $types  = Type::all();
        $batches = Batch::all();
        $semesters = Semester::all();

        if($request->isMethod('post')){
            $data = $request->all();

            $rules = [
                'exam_title'   => 'required|regex:/(^([a-zA-z -]+)(\d+)?$)/u',
                'department_id'   => 'required',
                'batch_id'   => 'required',
                'semester_id'   => 'required',
                'exam_date'     => 'required',
                'exam_time'     => 'required',
                'exam_duration'     => 'required',
                'per_page'     => 'required',


            ];
            $customMessage = [
                'exam_title.required' => 'Exam Title is required',
                'exam_title.regex'    => 'Valid Exam Title is required',
                'department_id.required'  => 'Department is required',
                'batch_id.required'  => 'Batch is required',
                'semester_id.required'  => 'Semester is required',
                'exam_date.required'  => 'Exam Date is required',
                'exam_time.required'  => 'Exam Date is required',
                'exam_duration.required'  => 'Exam Duration is required',
                'per_page.required'  => 'Per Page value is required',


            ];
            $this->validate($request, $rules, $customMessage);


            $exam = new Exam();
            $exam->teacher_id = Auth::guard('teacher')->user()->id;
            $exam->department_id = $data['department_id'];
            $exam->batch_id = $data['batch_id'];
            $exam->semester_id = $data['semester_id'];
            $exam->exam_type = $data['exam_type'];
            $exam->exam_title = $data['exam_title'];
            $exam->exam_date = $data['exam_date'];
            $exam->exam_time = $data['exam_time'];
            $exam->exam_duration = $data['exam_duration'];
            $exam->per_page = $data['per_page'];
            $exam->status = 1;
            $exam->save();
            Toastr::success('Add Exam Successfully', 'success');
            return redirect('teacher/exam');

        }

        return view('teacher.exam.add_exam', compact('departments', 'batches', 'semesters', 'types'));
    }


    public function editExam(Request $request, $id){

        if($request->isMethod('post')){
            $data = $request->all();
            $rules = [
                'exam_title'   => 'required|regex:/(^([a-zA-z -]+)(\d+)?$)/u',
                'department_id'   => 'required',
                'batch_id'   => 'required',
                'semester_id'   => 'required',
                'exam_date'     => 'required',
                'exam_time'     => 'required',
                'exam_duration'     => 'required',
                'per_page'     => 'required',

            ];
            $customMessage = [
                'exam_title.required' => 'Exam Title is required',
                'exam_title.regex'    => 'Valid Exam Title is required',
                'department_id.required'  => 'Department is required',
                'batch_id.required'  => 'Batch is required',
                'semester_id.required'  => 'Semester is required',
                'exam_time.required'  => 'Exam Date is required',
                'exam_duration.required'  => 'Exam Date is required',
                'per_page.required'  => 'Per Page is required',


            ];
            $this->validate($request, $rules, $customMessage);

            Exam::where(['id'=> $id])->update(['department_id'=> Auth::guard('teacher')->user()->department_id,'batch_id' => $data['batch_id'], 'semester_id' => $data['semester_id'], 'exam_title' => $data['exam_title'], 'exam_date' => $data['exam_date'], 'exam_time' => $data['exam_time'], 'exam_duration' => $data['exam_duration'], 'per_page' => $data['per_page'], 'exam_type' => $data['exam_type']]);
            Toastr::success('Exam Updated Successfully', 'success');
            return redirect('/teacher/exam');
        }
        $departments = Department::all();
        $batches = Batch::all();
        $semesters = Semester::all();
        $examTypes = Type::all();
        $examDetails = Exam::where('id', $id)->first();
        return view('teacher.exam.edit_exam', compact('departments', 'batches', 'semesters', 'examDetails', 'examTypes'));
    }


    public function updateExamStatus(Request $request){
        $category = Exam::findOrFail($request->exam_id);
        $category->status = $request->status;
        $category->save();
        return response()->json([
            'message' => 'Exam Status Updated Successfully !'
        ]);
    }



    public  function deleteExam($id){
        $delete_exam = Exam::where('id', $id)->first();
        $delete_exam->delete();
        Toastr::success('Exam has been deleted', 'success');
        return redirect('/teacher/exam');
    }






}
