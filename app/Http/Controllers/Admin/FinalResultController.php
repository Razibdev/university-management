<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Batch;
use App\Models\Department;
use App\Models\FinalResult;
use App\Models\Semester;
use App\Models\Student;
use App\Models\Subject;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FinalResultController extends Controller
{
    public function addResult(){
        Session::put('page', 'add-final_result');
        $departments = Department::all();
        return view('admin.result.add_result', compact('departments'));
    }

    public function addStudentResult($id, $batch, $student){
        $department = Department::where('id', $id)->first();
        $batches = Batch::where('id', $batch)->first();
        $students = Student::where('id', $student)->select('id', 'name', 'exam_roll')->first();
        $semesters = Semester::all();

        $subjects = Subject::where(['department_id' => $id, 'batch_id' => $batch])->get();
        return view('admin.result.add_student_result', compact('subjects', 'department', 'batches', 'students', 'semesters'));
    }




    public function resultSubmit(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
//            echo "<pre>"; print_r($data); die;

            foreach ($data['subject_id'] as $key => $val){
                if(!empty($val)){
                    // Prevent Duplicate Size
                    $attrCountSize = FinalResult::where(['subject_id'=> $val, 'student_id' => $data['student']])->count();
                    if($attrCountSize > 0){
                        Toastr::error('For Duplicated  Subject ! Please Try agian', 'Error');
                        return redirect('admin/result/department_id/'.$data['department'].'/batch_id/'.$data['batch'].'/student_id/'.$data['student']);
                    }


                    $result = new FinalResult();
                    $result->department_id = $data['department'];
                    $result->batch_id = $data['batch'];
                    $result->student_id = $data['student'];
                    $result->semester_id = $data['semester_id'];
                    $result->subject_id = $data['subject_id'][$key];
                    $result->mark = $data['mark'][$key];
                    $result->grade = $data['grade'][$key];
                    $result->grade_point = $data['grade_point'][$key];
                    $result->credit = $data['credit'][$key];

                    $result->save();
                }
            }


            Toastr::success('Result successfully Added', 'Success');
            return redirect('admin/add-final_result');

        }

    }


    public function result(){
        Session::put('page', 'final_result');
        $departments = Department::all();
        return view('admin.result.result', compact('departments'));
    }

    public function viewStudentResult($id, $batch, $student){
        $students = Student::where('id', $student)->first();
        $department = Department::where('id', $id)->first();
        $batches = Batch::where('id', $batch)->first();
        $semsester8 = Semester::where('id', 8)->first();
        $results = FinalResult::where(['department_id'=> $id, 'batch_id'=> $batch, 'student_id'=> $student, 'semester_id'=> 8])->with('subject')->get();
        $resultss = FinalResult::where(['department_id'=> $id, 'batch_id'=> $batch, 'student_id'=> $student, 'semester_id'=> 8])->with('subject')->count();
        $cgpa = 0;
        $final_cgpa = 'NAI';
        $credit = 0;
        if($resultss > 0){
            foreach ($results as $key => $value){
                $cgpa += ($value->credit*$value->grade_point);
                $credit += ($value->credit);
            }
            $final_cgpa = $cgpa / $credit;
            $final_cgpa = round($final_cgpa, 2);
        }


        $semsester1 = Semester::where('id', 1)->first();
        $resultsfirst = FinalResult::where(['department_id'=> $id, 'batch_id'=> $batch, 'student_id'=> $student, 'semester_id'=> 1])->with('subject')->get();
        $resultsfirstcount = FinalResult::where(['department_id'=> $id, 'batch_id'=> $batch, 'student_id'=> $student, 'semester_id'=> 1])->with('subject')->count();
        $cgpa1 = 0;
        $credit1 = 0;
        $final_cgpa1 = 'NAI';
        if($resultsfirstcount > 0){
            foreach ($resultsfirst as $key => $value){
                $cgpa1 += ($value->credit*$value->grade_point);
                $credit1 += ($value->credit);
            }
            $final_cgpa1 = $cgpa / $credit;
            $final_cgpa1 = round($final_cgpa1, 2);
        }



        $semsester2 = Semester::where('id', 2)->first();
        $resultssecond = FinalResult::where(['department_id'=> $id, 'batch_id'=> $batch, 'student_id'=> $student, 'semester_id'=> 2])->with('subject')->get();
        $resultssecondcount = FinalResult::where(['department_id'=> $id, 'batch_id'=> $batch, 'student_id'=> $student, 'semester_id'=> 2])->with('subject')->count();
        $cgpa2 = 0;
        $credit2 = 0;
        $final_cgpa2 = 'NAI';
        if($resultssecondcount > 0){
            foreach ($resultssecond as $key => $value){
                $cgpa2 += ($value->credit*$value->grade_point);
                $credit2 += ($value->credit);
            }
            $final_cgpa2 = $cgpa / $credit;
            $final_cgpa2 = round($final_cgpa2, 2);
        }


        $semsester3 = Semester::where('id', 3)->first();
        $resultsthird = FinalResult::where(['department_id'=> $id, 'batch_id'=> $batch, 'student_id'=> $student, 'semester_id'=> 3])->with('subject')->get();
        $resultsthirdcount = FinalResult::where(['department_id'=> $id, 'batch_id'=> $batch, 'student_id'=> $student, 'semester_id'=> 3])->with('subject')->count();
        $cgpa3 = 0;
        $credit3 = 0;
        $final_cgpa3 = 'NAI';
        if($resultsthirdcount > 0){
            foreach ($resultsthird as $key => $value){
                $cgpa3 += ($value->credit*$value->grade_point);
                $credit3 += ($value->credit);
            }
            $final_cgpa3 = $cgpa / $credit;
            $final_cgpa3 = round($final_cgpa3, 2);
        }


        $semsester4 = Semester::where('id', 4)->first();
        $resultsfouth = FinalResult::where(['department_id'=> $id, 'batch_id'=> $batch, 'student_id'=> $student, 'semester_id'=> 4])->with('subject')->get();
        $resultsfourthcount = FinalResult::where(['department_id'=> $id, 'batch_id'=> $batch, 'student_id'=> $student, 'semester_id'=> 4])->with('subject')->count();
        $cgpa4 = 0;
        $credit4 = 0;
        $final_cgpa4 = 'NAI';
        if($resultsfourthcount > 0){
            foreach ($resultsfouth as $key => $value){
                $cgpa4 += ($value->credit*$value->grade_point);
                $credit4 += ($value->credit);
            }
            $final_cgpa4 = $cgpa / $credit;
            $final_cgpa4 = round($final_cgpa4, 2);
        }

        $semsester5 = Semester::where('id', 5)->first();
        $resultsfive = FinalResult::where(['department_id'=> $id, 'batch_id'=> $batch, 'student_id'=> $student, 'semester_id'=> 5])->with('subject')->get();
        $resultsfivecount = FinalResult::where(['department_id'=> $id, 'batch_id'=> $batch, 'student_id'=> $student, 'semester_id'=> 5])->with('subject')->count();
        $cgpa5 = 0;
        $credit5 = 0;
        $final_cgpa5 = 'NAI';
        if($resultsfivecount > 0){
            foreach ($resultsfive as $key => $value){
                $cgpa5 += ($value->credit*$value->grade_point);
                $credit5 += ($value->credit);
            }
            $final_cgpa5 = $cgpa / $credit;
            $final_cgpa5 = round($final_cgpa5, 2);
        }

        $semsester6 = Semester::where('id', 6)->first();
        $resultssix = FinalResult::where(['department_id'=> $id, 'batch_id'=> $batch, 'student_id'=> $student, 'semester_id'=> 6])->with('subject')->get();
        $resultssixcount = FinalResult::where(['department_id'=> $id, 'batch_id'=> $batch, 'student_id'=> $student, 'semester_id'=> 6])->with('subject')->count();
        $cgpa6 = 0;
        $credit6 = 0;
        $final_cgpa6 = 'NAI';
        if($resultssixcount > 0){
            foreach ($resultssix as $key => $value){
                $cgpa6 += ($value->credit*$value->grade_point);
                $credit6 += ($value->credit);
            }
            $final_cgpa6 = $cgpa / $credit;
            $final_cgpa6 = round($final_cgpa6, 2);
        }


        $semsester7 = Semester::where('id', 7)->first();
        $resultsseven = FinalResult::where(['department_id'=> $id, 'batch_id'=> $batch, 'student_id'=> $student, 'semester_id'=> 7])->with('subject')->get();
        $resultssevencount = FinalResult::where(['department_id'=> $id, 'batch_id'=> $batch, 'student_id'=> $student, 'semester_id'=> 7])->with('subject')->count();
        $cgpa7 = 0;
        $credit7 = 0;
        $final_cgpa7 = 'NAI';
        if($resultssevencount > 0){
            foreach ($resultsseven as $key => $value){
                $cgpa7 += ($value->credit*$value->grade_point);
                $credit7 += ($value->credit);
            }
            $final_cgpa7 = $cgpa / $credit;
            $final_cgpa7 = round($final_cgpa7, 2);
        }



        return view('admin.result.view_result', compact('results', 'students', 'department', 'batches', 'final_cgpa', 'resultsfirst', 'semsester8', 'semsester1', 'final_cgpa1', 'semsester2', 'resultssecond', 'final_cgpa2', 'semsester3', 'final_cgpa3', 'resultsthird', 'semsester4', 'final_cgpa4', 'resultsfouth', 'semsester5', 'resultsfive', 'final_cgpa5', 'semsester6', 'resultssix', 'final_cgpa6', 'semsester7', 'resultsseven', 'final_cgpa7', 'resultss', 'resultsfirstcount', 'resultssecondcount', 'resultsthirdcount', 'resultsfourthcount', 'resultsfivecount', 'resultssixcount', 'resultssevencount'));
    }



    public function editResult(Request $request, $id){
        if($request->isMethod('post')){
            $data = $request->all();
            FinalResult::where('id', $id)->update(['mark' => $data['mark'], 'grade' => $data['letter_grade'], 'grade_point' => $data['grade_point'], 'credit' => $data['credit']]);
            Toastr::success('Result has been updated successfully', 'Success');
            return redirect('admin/result');
        }
        $result = FinalResult::where('id', $id)->first();
        return view('admin.result.edit_result',compact('result'));
    }






}
