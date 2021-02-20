<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\FinalResult;
use App\Models\Semester;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class FinalResultController extends Controller
{
    public function viewResult(){
        Session::put('page', 'final_result');
        $students = Student::where('id', Auth::guard('student')->user()->id)->with(['department', 'batch'])->first();

        $semsester8 = Semester::where('id', 8)->first();
        $results = FinalResult::where(['student_id'=> $students->id, 'semester_id'=> 8])->with('subject')->get();
        $resultss = FinalResult::where(['student_id'=> $students->id, 'semester_id'=> 8])->with('subject')->count();
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
        $resultsfirst = FinalResult::where(['student_id'=> $students->id, 'semester_id'=> 1])->with('subject')->get();
        $resultsfirstcount = FinalResult::where(['student_id'=> $students->id, 'semester_id'=> 1])->with('subject')->count();
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
        $resultssecond = FinalResult::where(['student_id'=> $students->id, 'semester_id'=> 2])->with('subject')->get();
        $resultssecondcount = FinalResult::where(['student_id'=> $students->id, 'semester_id'=> 2])->with('subject')->count();
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
        $resultsthird = FinalResult::where(['student_id'=> $students->id, 'semester_id'=> 3])->with('subject')->get();
        $resultsthirdcount = FinalResult::where(['student_id'=> $students->id, 'semester_id'=> 3])->with('subject')->count();
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
        $resultsfouth = FinalResult::where(['student_id'=> $students->id, 'semester_id'=> 4])->with('subject')->get();
        $resultsfourthcount = FinalResult::where(['student_id'=> $students->id, 'semester_id'=> 4])->with('subject')->count();
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
        $resultsfive = FinalResult::where(['student_id'=> $students->id, 'semester_id'=> 5])->with('subject')->get();
        $resultsfivecount = FinalResult::where(['student_id'=> $students->id, 'semester_id'=> 5])->with('subject')->count();
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
        $resultssix = FinalResult::where(['student_id'=> $students->id, 'semester_id'=> 6])->with('subject')->get();
        $resultssixcount = FinalResult::where(['student_id'=> $students->id, 'semester_id'=> 6])->with('subject')->count();
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
        $resultsseven = FinalResult::where(['student_id'=> $students->id, 'semester_id'=> 7])->with('subject')->get();
        $resultssevencount = FinalResult::where(['student_id'=> $students->id, 'semester_id'=> 7])->with('subject')->count();
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



        return view('student.result.view_result', compact('results', 'students', 'final_cgpa', 'resultsfirst', 'semsester8', 'semsester1', 'final_cgpa1', 'semsester2', 'resultssecond', 'final_cgpa2', 'semsester3', 'final_cgpa3', 'resultsthird', 'semsester4', 'final_cgpa4', 'resultsfouth', 'semsester5', 'resultsfive', 'final_cgpa5', 'semsester6', 'resultssix', 'final_cgpa6', 'semsester7', 'resultsseven', 'final_cgpa7', 'resultss', 'resultsfirstcount', 'resultssecondcount', 'resultsthirdcount', 'resultsfourthcount', 'resultsfivecount', 'resultssixcount', 'resultssevencount'));
    }









}
