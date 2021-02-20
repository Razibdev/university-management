<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    public function addPost(Request $request){

        Session::put('page', 'add_post');
        if($request->isMethod('post')){
            $data = $request->all();
            // Category validation
            $rules = [
                'post_title'   => 'required',
                'post_description' => 'required',
                'post_image' => 'required|image',

            ];
            $customMessage = [
                'post_title.required' => 'Post Title is required',
                'post_description.required'    => 'Post Description is required',
                'post_image.required'    => 'Post Image is required',
                'post_image.image'       => 'Post Valid Image is required'


            ];
            $this->validate($request, $rules, $customMessage);

            if($request->hasFile('post_image')){
                $image_tmp = $request->file('post_image');
                if($image_tmp->isValid()){
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111, 99999).'.'.$extension;
                    $image_path = "image/post_image/".$filename;

                    // Resize Image
                    Image::make($image_tmp)->resize(770, 317)->save($image_path);

                }
            }

            $post = new Post();
            $post->type = $data['type'];
            $post->designation_id = Auth::guard('admin')->user()->id;
            $post->post_title = $data['post_title'];
            $post->post_description = $data['post_description'];
            $post->post_image = $filename;
            $post->status = 1;
            $post->save();
            Toastr::success('Post Successfully added', 'Success');
            return redirect('/admin/posts');
        }
        return view('admin.post.add_post');
    }


    public function viewPost(){
        Session::put('page', 'posts');
        $posts = Post::all();
        return view('admin.post.view_post', compact('posts'));
    }


    public function updatePostStatus(Request $request){
        $post = Post::findOrFail($request->post_id);
        $post->status = $request->status;
        $post->save();
        return response()->json([
            'message' => 'Post Status Updated Successfully !'
        ]);
    }


    public function deletePost($id){
        $delete_post = Post::where('id', $id)->first();
//       $delete_category = json_decode(json_encode($delete_product));
//       echo '<pre>'; print_r($delete_category); die();

        if (isset($delete_post->post_image)) {
            $image_path = "image/post_image/" . $delete_post->post_image;
            if (File::exists($image_path)) {
                File::delete($image_path);
            }

        }
        $delete_post->delete();
        Toastr::success('Event has been deleted', 'success');
        return redirect('/admin/posts');
    }


public function editPost(Request $request, $id){
    $postDetails = Post::where(['id' => $id])->first();

    if($request->isMethod('post')){
        $data = $request->all();
        // Category validation
        $rules = [
            'post_title'   => 'required',
            'post_description' => 'required',
        ];
        $customMessage = [
            'post_title.required' => 'Post Title is required',
            'post_description.required'    => 'Post Description is required',
        ];
        $this->validate($request, $rules, $customMessage);

        //Upload Image
        if($request->hasFile('post_image')){
            $image_tmp = $request->file('post_image');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = rand(111, 99999).'.'.$extension;

            }
            if (isset($postDetails->post_image)){
                $image_path = "image/post_image/".$postDetails->post_image;
                if(File::exists($image_path)) {
                    File::delete($image_path);
                }
            }

            $image_path = "image/post_image/".$filename;
            Image::make($image_tmp)->resize(770, 317)->save($image_path);


        }else{
            $filename = $data['current_image'];
        }

        Post::where(['id' => $id])->update(['post_title' => $data['post_title'], 'post_description' => $data['post_description'], 'post_image' => $filename]);
        Toastr::success('Post has been updated successfully', 'success');
        return redirect('/admin/posts');
    }
    return view('admin.post.edit_post', compact('postDetails'));
}















}
