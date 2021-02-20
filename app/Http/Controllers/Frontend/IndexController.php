<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Library;
use App\Models\Post;
use App\Models\Teacher;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $events = Event::where('event_date' ,'>=', date('Y-m-d'))->where(['status'=> 1])->orderBy('id', 'DESC')->limit(3)->get();
        $teachers = Teacher::inRandomOrder()->limit(4)->get();
        $postsingle = Post::where('status', 1)->where('type', 'admin')->orWhere('type', 'teacher')->orWhere('type', 'student')->with(['admin', 'teacher', 'student'])->orderBy('id', 'DESC')->skip(0)->take(1)->get();
        $posts = Post::where('status', 1)->where('type', 'admin')->orWhere('type', 'teacher')->orWhere('type', 'student')->with(['admin', 'teacher', 'student'])->orderBy('id', 'DESC')->skip(1)->take(3)->get();
        $libraries = Library::where('status', 1)->inRandomOrder()->limit(4)->get();
//        $postsingle = json_decode(json_encode($postsingle));
//        echo "<pre>"; print_r($postsingle); die;
        return view('frontend.index', compact('events', 'teachers', 'postsingle', 'posts', 'libraries'));
    }

}
