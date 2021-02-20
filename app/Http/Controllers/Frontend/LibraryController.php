<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Library;
use App\Models\Rating;
use App\Models\Student;
use App\Models\Teacher;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LibraryController extends Controller
{
    public function index(){
        $libraries = Library::where('status', 1)->orderBy('id', 'DESC')->paginate(8);
        return view('frontend.library.library', compact('libraries'));
    }

    public function singleLibrary($id){
        $libraryDetails = Library::where(['status'=>1, 'id' => $id])->first();
        $ratingCount = Rating::where('book_id', $id)->count();
        $ratingDetails = Rating::where('book_id', $id)->with(['teacher', 'student'])->get();

//        $ratingsCount = Rating::where('book_id', $id)->where('type', 'student')->count();
//        $ratingSDetails = Rating::where('book_id', $id)->where('type', 'student')->with('student')->get();
//        $ratingSDetails = json_decode(json_encode($ratingSDetails));
//        echo"<pre>";  print_r($ratingSDetails); die;

        $libraries = Library::where('status', 1)->where('id', '!=', $id)->inRandomOrder()->limit(4)->get();
        return view('frontend.library.single_library', compact('libraryDetails', 'libraries', 'ratingCount', 'ratingDetails' ));

    }



    public function rating(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
//        echo"<pre>";  print_r($data); die;
            if(Auth::guard('teacher')->check()){
                $teacher_exits = Rating::where(['designation_id' => Auth::guard('teacher')->user()->id, 'book_id' => $data['book_id']])->count();
                if ($teacher_exits == 1) {
                    Toastr::error('You are already reviewing', 'Error');
                    return redirect()->back();
                }else{

                    $ratting = new Rating();
                    $ratting->designation_id = Auth::guard('teacher')->user()->id;
                    $ratting->type = Auth::guard('teacher')->user()->type;
                    $ratting->book_id = $data['book_id'];
                    $ratting->first_name = $data['fast_name'];
                    $ratting->last_name = $data['last_name'];
                    $ratting->rating = $data['rating'];
                    $ratting->message = $data['message'];
                    $ratting->save();
                    Toastr::success('Reviewing Successfully Added', 'Success');
                    return redirect()->back();

                }

            }
            if(Auth::guard('student')->check()){
                $students_exits = Rating::where(['designation_id' => Auth::guard('student')->user()->id, 'book_id' => $data['book_id']])->count();

                if ($students_exits == 1) {
                    Toastr::error('You are already reviewing', 'Error');
                    return redirect()->back();
                }else {
                    $ratting = new Rating();
                    $ratting->designation_id = Auth::guard('student')->user()->id;
                    $ratting->type = Auth::guard('student')->user()->type;
                    $ratting->book_id = $data['book_id'];
                    $ratting->first_name = $data['fast_name'];
                    $ratting->last_name = $data['last_name'];
                    $ratting->rating = $data['rating'];
                    $ratting->message = $data['message'];
                    $ratting->save();
                    Toastr::success('Reviewing Successfully Added', 'Success');
                    return redirect()->back();
                }
            }

        }
    }



    public function librarySearch(){
        $query = $_GET['library_search'];

        $libraries = Library::where('book_name', 'like', '%'.$query.'%')->orWhere('writer_name', 'like', '%'.$query.'%')->get();
//        $teachers = Teacher::where('name', 'like', '%'.$query.'%')->paginate(8);
        return view('frontend.library.search', compact('libraries'));
    }



}
