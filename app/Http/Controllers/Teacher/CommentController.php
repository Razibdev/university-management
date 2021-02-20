<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{
    public function viewComment(){
        Session::put('page', 'comment');
        $comments = Comment::where(['designation_id' => Auth::guard('teacher')->user()->id, 'type' => 'teacher'])->with(['teacher', 'post'])->orderBy('id', 'DESC')->get();
//        $reviews = json_decode(json_encode($reviews));
//        echo"<pre>"; print_r($reviews); die;
        return view('teacher.comment.comment', compact('comments'));
    }


    public function deleteComment($id){
        $delete_comment = Comment::where('id', $id)->first();
        $delete_comment->delete();
        Toastr::success('Comment has been deleted', 'success');
        return redirect('/teacher/comment');
    }
}
