<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Rating;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ReviewController extends Controller
{
    public function viewReview(){
        Session::put('page', 'review');
        $reviews = Rating::where(['designation_id'=> Auth::guard('teacher')->user()->id, 'type' => 'teacher'])->with(['teacher', 'student', 'book'])->orderBy('id', 'DESC')->get();
//        $reviews = json_decode(json_encode($reviews));
//        echo"<pre>"; print_r($reviews); die;
        return view('teacher.review.review', compact('reviews'));
    }


    public function deleteReview($id){
        $delete_review = Rating::where('id', $id)->first();
        $delete_review->delete();
        Toastr::success('Review has been deleted', 'success');
        return redirect('/teacher/review');
    }
}
