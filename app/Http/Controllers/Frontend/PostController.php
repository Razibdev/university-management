<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(){
        $bloges =  Post::where('status', 1)->where('type', 'admin')->orWhere('type', 'teacher')->orWhere('type', 'student')->with(['admin', 'teacher', 'student'])->orderBy('id', 'DESC')->skip(1)->take(3)->paginate(2);

        $blogcount =  Post::where('status', 1)->where('type', 'admin')->orWhere('type', 'teacher')->orWhere('type', 'student')->with(['admin', 'teacher', 'student'])->orderBy('id', 'DESC')->skip(1)->take(3)->count();
        $blogs = array();
        if($blogcount > 2){
            foreach ( $bloges as $blog){
                $blog_id = $blog->id;
                $blogs = Post::where('status', 1)->where('id', '!=',$blog_id)->inRandomOrder()->limit(3)->get();
            }
        }

//        $bloges = json_decode(json_encode($bloges));
//        echo "<pre>"; print_r($bloges); die;
        return view('frontend.blog.blog', compact('bloges', 'blogs', 'blogcount'));
    }




    public function blogSingle($id){
        $post = Post::where('id', $id)->with(['admin', 'teacher', 'student'])->first();
        $similarPosts = Post::where('id', '!=', $id)->inRandomOrder()->limit(3)->get();
        $commentCount = Comment::where('post_id', $id)->count();
        $commentDetails = Comment::where('post_id', $id)->with(['teacher', 'student'])->get();
        return view('frontend.blog.single_blog', compact('post', 'similarPosts', 'commentCount', 'commentDetails'));
    }


    public function comment(Request $request){
        if ($request->isMethod('post')) {
            $data = $request->all();
//        echo"<pre>";  print_r($data); die;
            if(Auth::guard('teacher')->check()){
                $teacher_exits = Comment::where(['designation_id' => Auth::guard('teacher')->user()->id, 'post_id' => $data['post_id']])->count();
                if ($teacher_exits == 1) {
                    Toastr::error('You are already Commenting', 'Error');
                    return redirect()->back();
                }else{

                    $comment = new Comment();
                    $comment->designation_id = Auth::guard('teacher')->user()->id;
                    $comment->type = Auth::guard('teacher')->user()->type;
                    $comment->post_id = $data['post_id'];

                    $comment->message = $data['comment'];
                    $comment->save();
                    Toastr::success('Comment Successfully Added', 'Success');
                    return redirect()->back();

                }

            }
            if(Auth::guard('student')->check()){
                $students_exits = Comment::where(['designation_id' => Auth::guard('student')->user()->id, 'post_id' => $data['post_id']])->count();

                if ($students_exits == 1) {
                    Toastr::error('You are already commenting', 'Error');
                    return redirect()->back();
                }else {
                    $comment = new Comment();
                    $comment->designation_id = Auth::guard('student')->user()->id;
                    $comment->type = Auth::guard('student')->user()->type;
                    $comment->post_id = $data['post_id'];
                    $comment->message = $data['comment'];
                    $comment->save();
                    Toastr::success('Comment Successfully Added', 'Success');
                    return redirect()->back();
                }
            }

        }
    }



    public function blogSearch(){
        $query = $_GET['blog_search'];
        $bloges =  Post::where('status', 1)->where('type', 'admin')->orWhere('type', 'teacher')->orWhere('type', 'student')->where('post_title', 'like', '%'.$query.'%')->orWhere('post_description', 'like', '%'.$query.'%')->with(['admin', 'teacher', 'student'])->get();
//        $libraries = Post::where('post_title', 'like', '%'.$query.'%')->orWhere('post_description', 'like', '%'.$query.'%')->get();
//        $teachers = Teacher::where('name', 'like', '%'.$query.'%')->paginate(8);
        return view('frontend.blog.search', compact('bloges'));
    }




}
