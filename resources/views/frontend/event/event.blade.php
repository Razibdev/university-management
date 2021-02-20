@extends('layouts.front_layout.front_layout')


@section('content')
    <!--====== SEARCH BOX PART START ======-->

    <div class="search-box">
        <div class="serach-form">
            <div class="closebtn">
                <span></span>
                <span></span>
            </div>
            <form action="#">
                <input type="text" placeholder="Search by keyword">
                <button><i class="fa fa-search"></i></button>
            </form>
        </div> <!-- serach form -->
    </div>

    <!--====== SEARCH BOX PART ENDS ======-->

    <!--====== PAGE BANNER PART START ======-->

    <section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8" style="background-image: url(images/page-banner-3.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2>Events</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Events</li>
                            </ol>
                        </nav>
                    </div>  <!-- page banner cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== PAGE BANNER PART ENDS ======-->

    <!--====== EVENTS PART START ======-->

    <section id="event-page" class="pt-90 pb-120 gray-bg">
        <div class="container">
            <div class="row">
            @foreach($events as $event)
                <div class="col-lg-6">
                    <div class="singel-event-list mt-30">
                        <div class="event-thum">
                            <img src="{{asset('/image/event_image/'.$event->event_image)}}" alt="Event">
                        </div>
                        <div class="event-cont">
                            <span><i class="fa fa-calendar"></i> {{$event->event_date}}</span>
                            <a href="{{url('/event/'.$event->id)}}"><h4>{{$event->event_title}}</h4></a>
                            <span><i class="fa fa-clock-o"></i> {{\Carbon\Carbon::createFromFormat('H:i:s',$event->start_event)->format('h:i a')}} - {{\Carbon\Carbon::createFromFormat('H:i:s',$event->end_event)->format('h:i a')}}</span>
                            <span><i class="fa fa-map-marker"></i> {{$event->address}}</span>
                            <p>{{ Illuminate\Support\Str::limit($event->event_description, 80) }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
            </div> <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <nav class="courses-pagination mt-50">
                        {{ $events->links('vendor.pagination.custom') }}
                    </nav>  <!-- courses pagination -->
                </div>
            </div>  <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== EVENTS PART ENDS ======-->
@endsection

