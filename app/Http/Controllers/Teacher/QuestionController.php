<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\Question;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class QuestionController extends Controller
{

    public function addQuestion($id){
        $exam_details = Exam::where('id', $id)->first();
        return view('teacher.question.add_question', compact('exam_details'));
    }





    public function viewQuestion ($id){
        $questions = Question::where('exam_id', $id)->with('exam')->get();
        return view('teacher.question.view_question', compact('questions'));
    }

    public function questionMcq(Request $request){

        if($request->isMethod('post')){
            $data = $request->all();
//        $data = json_decode(json_encode($data));
//        echo "<pre>"; print_r($data); die;


            $rules = [
                'question_title'   => 'required|regex:/(^([a-zA-z -]+)(\d+)?$)/u',
                'option1'   => 'required',
                'option2'   => 'required',
                'option3'   => 'required',
                'option4'     => 'required',
                'ans'     => 'required',


            ];
            $customMessage = [
                'question_title.required' => 'Question Title is required',
                'question_title.regex'    => 'Question Exam Title is required',
                'option1.required'  => 'Department is required',
                'option2.required'  => 'Batch is required',
                'option3.required'  => 'Semester is required',
                'option4.required'  => 'Exam Date is required',
                'ans.required'  => 'Exam Date is required'


            ];
            $this->validate($request, $rules, $customMessage);


            $question = new Question();
            $question->exam_id = $data['exam_id'];
            $question->question_title = $data['question_title'];
            $question->option1 = $data['option1'];
            $question->option2 = $data['option2'];
            $question->option3 = $data['option3'];
            $question->option4 = $data['option4'];
            $question->ans = $data['ans'];

            $question->type = $data['type'];
            $question->save();
            Toastr::success('Add Question Successfully', 'success');
            return redirect('teacher/add-question/'. $data['exam_id']);
        }
    }



    public function questionBoolean(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
//        $data = json_decode(json_encode($data));
//        echo "<pre>"; print_r($data); die;


            $rules = [
                'question_title'   => 'required|regex:/(^([a-zA-z -]+)(\d+)?$)/u',
                'ans'     => 'required',


            ];
            $customMessage = [
                'question_title.required' => 'Question Title is required',
                'question_title.regex'    => 'Question Exam Title is required',
                'ans.required'  => 'Exam Date is required'


            ];

            $this->validate($request, $rules, $customMessage);


            $question = new Question();
            $question->exam_id = $data['exam_id'];
            $question->question_title = $data['question_title'];
            $question->option1 = '';
            $question->option2 = '';
            $question->option3 ='';
            $question->option4 = '';
            $question->ans = $data['ans'];
            $question->type = $data['type'];
            $question->save();
            Toastr::success('Add Question Successfully', 'success');
            return redirect('teacher/add-question/'. $data['exam_id']);
        }
    }




    public function questionBroadquestion(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
//        $data = json_decode(json_encode($data));
//        echo "<pre>"; print_r($data); die;


            $rules = [
                'question_title'   => 'required|regex:/(^([a-zA-z -]+)(\d+)?$)/u',
            ];
            $customMessage = [
                'question_title.required' => 'Question Title is required',
                'question_title.regex'    => 'Question Exam Title is required',
            ];

            $this->validate($request, $rules, $customMessage);


            $question = new Question();
            $question->exam_id = $data['exam_id'];
            $question->question_title = $data['question_title'];
            $question->option1 = '';
            $question->option2 = '';
            $question->option3 ='';
            $question->option4 = '';
            $question->ans = '';
            $question->type = $data['type'];
            $question->save();
            Toastr::success('Add Question Successfully', 'success');
            return redirect('teacher/add-question/'. $data['exam_id']);
        }
    }


    public function deleteQuestion($id){
            $delete_exam = Question::where('id', $id)->first();
//            echo "<pre>"; print_r($delete_exam); die;
            $delete_exam->delete();
            Toastr::success('Question has been deleted', 'success');
            return redirect()->back();
        }







}
