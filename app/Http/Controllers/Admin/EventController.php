<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class EventController extends Controller
{
    public function addEvent(Request $request){
        Session::put('page', 'add_event');
        if($request->isMethod('post')){
            $data = $request->all();
            // Category validation
            $rules = [
                'event_title'   => 'required',
                'start_event' => 'required',
                'end_event' => 'required',
                'event_date' => 'required',
                'event_address' => 'required',
                'event_description' => 'required',
                'event_image' => 'required|image',

            ];
            $customMessage = [
                'event_title.required' => 'Event Title is required',
                'start_event.required'    => 'Event starting time is required',
                'end_event.required'    => 'Event ending time is required',
                'event_date.required'    => 'Event Date is required',
                'event_address.required'    => 'Event address is required',
                'event_description.required'    => 'Event Description is required',
                'event_image.required'    => 'Event Image is required',
                'event_image.image'       => 'Event Valid Image is required'


            ];
            $this->validate($request, $rules, $customMessage);

            if($request->hasFile('event_image')){
                $image_tmp = $request->file('event_image');
                if($image_tmp->isValid()){
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111, 99999).'.'.$extension;
                    $image_path = "image/event_image/".$filename;

                    // Resize Image
                    Image::make($image_tmp)->resize(703, 393)->save($image_path);

                }
            }

            $event = new Event();
            $event->event_title = $data['event_title'];
            $event->event_description = $data['event_description'];
            $event->address = $data['event_address'];
            $event->start_event = $data['start_event'];
            $event->end_event = $data['end_event'];
            $event->event_date = $data['event_date'];
            $event->event_image = $filename;
            $event->status = 1;
            $event->save();
            Toastr::success('Event Successfully added', 'Success');
            return redirect('/admin/event');
        }
        return view('admin.event.add_event');
    }

    public function event(){
        Session::put('page', 'event');
        $events = Event::all();
        return view('admin.event.event',compact('events'));
    }


    public function updateEventStatus(Request $request){
        $event = Event::findOrFail($request->event_id);
        $event->status = $request->status;
        $event->save();
        return response()->json([
            'message' => 'Event Status Updated Successfully !'
        ]);
    }


    public function deleteEvent($id){
        $delete_event = Event::where('id', $id)->first();
//       $delete_category = json_decode(json_encode($delete_product));
//       echo '<pre>'; print_r($delete_category); die();

        if (isset($delete_event->event_image)) {
            $image_path = "image/event_image/" . $delete_event->event_image;
            if (File::exists($image_path)) {
                File::delete($image_path);
            }

        }
        $delete_event->delete();
        Toastr::success('Event has been deleted', 'success');
        return redirect('/admin/event');
    }



}
