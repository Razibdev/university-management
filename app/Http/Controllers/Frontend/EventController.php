<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(){
        $events = Event::where('status', 1)->orderBy('id', 'DESC')->paginate(6);
        return view('frontend.event.event', compact('events'));
    }


    public function eventSingle($id){
        $event = Event::where('id', $id)->first();
        return view('frontend.event.single_event', compact( 'event'));

    }

}
