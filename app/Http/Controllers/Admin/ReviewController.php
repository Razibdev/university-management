<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rating;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function viewReview(){
        $reviews = Rating::with(['teacher', 'student', 'book'])->orderBy('id', 'DESC')->get();
//        $reviews = json_decode(json_encode($reviews));
//        echo"<pre>"; print_r($reviews); die;
        return view('admin.review.review', compact('reviews'));
    }


    public function deleteReview($id){
        $delete_review = Rating::where('id', $id)->first();
        $delete_review->delete();
        Toastr::success('Review has been deleted', 'success');
        return redirect('/teacher/review');
    }



}
