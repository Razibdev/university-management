<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Mark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class MarkController extends Controller
{
    public function result(){
        Session::put('page', 'result');
        $results = Mark::where('student_id', Auth::guard('student')->user()->id)->with('student')->with('exam')->get();
        return view('student.result.result', compact('results'));
    }

}
