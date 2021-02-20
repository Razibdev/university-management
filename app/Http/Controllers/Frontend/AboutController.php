<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Post;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function aboutUs(){
        $teachers = Teacher::inRandomOrder()->limit(8)->get();
        $student = Student::count();
        $teacher = Teacher::count();
        $post = Post::count();
        $event = Event::count();
        return view('frontend.about_us', compact('teachers', 'student', 'teacher', 'post', 'event'));
    }

}
