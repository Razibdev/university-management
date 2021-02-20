<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Library;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class LibraryController extends Controller
{
    public function addBook(Request $request){
        Session::put('page', 'add_book');

        if($request->isMethod('post')){
            $data = $request->all();
            // Category validation
            $rules = [
                'book_name'   => 'required',
                'writer_name' => 'required',
                'book_qty' => 'required',
                'book_description' => 'required',
                'book_image' => 'required|image',


            ];
            $customMessage = [
                'book_name.required' => 'Book Name is required',
                'writer_name.required'    => 'Writer Name is required',
                'book_qty.required'    => 'Book Qty is required',
                'book_description.required'    => 'Book Description is required',
                'book_image.required'    => 'Book Image is required',
                'book_image.image'       => 'Book Valid Image is required'


            ];
            $this->validate($request, $rules, $customMessage);

            if($request->hasFile('book_image')){
                $image_tmp = $request->file('book_image');
                if($image_tmp->isValid()){
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111, 99999).'.'.$extension;
                    $image_path = "image/book_image/".$filename;
                    $image_path_single = "image/book_image/single_book_image/".$filename;


                    // Resize Image
                    Image::make($image_tmp)->resize(230, 304)->save($image_path);
                    Image::make($image_tmp)->resize(470, 385)->save($image_path_single);

                }
            }

            $library = new Library();
            $library->book_name = $data['book_name'];
            $library->writer_name = $data['writer_name'];
            $library->book_qty = $data['book_qty'];
            $library->book_description = $data['book_description'];
            $library->book_image = $filename;
            $library->status = 1;
            $library->save();
            Toastr::success('Book Successfully added', 'Success');
            return redirect('/admin/book');
        }

        return view('admin.book.add_book');
    }



    public function viewBook(){
        Session::put('page', 'book');
        $libraries = Library::all();
        return view('admin.book.book', compact('libraries'));

    }



    public function updateBookStatus(Request $request){
        $library = Library::findOrFail($request->book_id);
        $library->status = $request->status;
        $library->save();
        return response()->json([
            'message' => 'Book Status Updated Successfully !'
        ]);
    }




    public function deleteBook($id){
        $delete_library = Library::where('id', $id)->first();
//       $delete_category = json_decode(json_encode($delete_product));
//       echo '<pre>'; print_r($delete_category); die();

        if (isset($delete_library->book_image)) {
            $image_path = "image/book_image/" . $delete_library->book_image;
            $image_path_single = "image/book_image/single_book_image/" . $delete_library->book_image;
            if (File::exists($image_path)) {
                File::delete($image_path);
            }

            if (File::exists($image_path_single)) {
                File::delete($image_path_single);
            }

        }
        $delete_library->delete();
        Toastr::success('Book has been deleted', 'success');
        return redirect('/admin/book');
    }



    public function editBook(Request $request, $id){
        $libraryDetails = Library::where(['id' => $id])->first();

        if($request->isMethod('post')){
            $data = $request->all();

            $rules = [
                'book_name'   => 'required',
                'writer_name' => 'required',
                'book_qty' => 'required',
                'book_description' => 'required'

            ];
            $customMessage = [
                'book_name.required' => 'Book Name is required',
                'writer_name.required'    => 'Writer Name is required',
                'book_qty.required'    => 'Book Qty is required',
                'book_description.required'    => 'Book Description is required'
            ];
            $this->validate($request, $rules, $customMessage);

            //Upload Image
            if($request->hasFile('book_image')){
                $image_tmp = $request->file('book_image');
                if($image_tmp->isValid()){
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111, 99999).'.'.$extension;

                }
                if (isset($libraryDetails->book_image)){
                    $image_path = "image/book_image/".$libraryDetails->book_image;
                    if(File::exists($image_path)) {
                        File::delete($image_path);
                    }

                    $image_path_single = "image/book_image/single_book_image/".$libraryDetails->book_image;
                    if(File::exists($image_path_single)) {
                        File::delete($image_path_single);
                    }
                }

                $image_path = "image/book_image/".$filename;
                $image_path_single = "image/book_image/single_book_image/".$filename;


                // Resize Image
                Image::make($image_tmp)->resize(230, 304)->save($image_path);
                Image::make($image_tmp)->resize(470, 385)->save($image_path_single);


            }else{
                $filename = $data['current_image'];
            }

            Library::where(['id' => $id])->update(['book_name' => $data['book_name'], 'writer_name' => $data['writer_name'], 'book_qty' => $data['book_qty'], 'book_description' => $data['book_description'], 'book_image' => $filename]);
            Toastr::success('Book has been updated successfully', 'success');
            return redirect('/admin/book');
        }
        return view('admin.book.edit_book', compact('libraryDetails'));
    }




}
