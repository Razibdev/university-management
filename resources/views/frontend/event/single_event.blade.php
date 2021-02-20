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

    <section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8" style="background-image: url(front/images/page-banner-3.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2>{{$event->event_title}}</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Events</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{$event->event_title}}</li>
                            </ol>
                        </nav>
                    </div> <!-- page banner cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== PAGE BANNER PART ENDS ======-->

    <!--====== EVENTS PART START ======-->

    <section id="event-singel" class="pt-120 pb-120 gray-bg">
        <div class="container">
            <div class="events-area">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="events-left">
                            <h3>{{$event->event_title}}</h3>
                            <a href="#"><span><i class="fa fa-calendar"></i> {{$event->event_date}}</span></a>
                            <a href="#"><span><i class="fa fa-clock-o"></i> {{\Carbon\Carbon::createFromFormat('H:i:s',$event->start_event)->format('h:i a')}} - {{\Carbon\Carbon::createFromFormat('H:i:s',$event->end_event)->format('h:i a')}}</span></a>
                            <a href="#"><span><i class="fa fa-map-marker"></i> {{$event->address}}</span></a>
                            <img src="{{asset('/image/event_image/'.$event->event_image)}}" alt="Event">
                            <p>{{$event->event_description}}</p>
                        </div> <!-- events left -->
                    </div>
                    <div class="col-lg-4">
                        <div class="events-right">
                            {{--<div class="events-coundwon bg_cover" data-overlay="8" style="background-image: url(front/images/event/singel-event/coundown.jpg)">--}}
                                {{--<div data-countdown="2020/03/12"></div>--}}
                                {{--<div class="events-coundwon-btn pt-30">--}}
                                    {{--<a href="#" class="main-btn">Book Your Seat</a>--}}
                                {{--</div>--}}
                            {{--</div> <!-- events coundwon -->--}}
                            <div class="events-address mt-30">
                                <ul>
                                    <li>
                                        <div class="singel-address">
                                            <div class="icon">
                                                <i class="fa fa-clock-o"></i>
                                            </div>
                                            <div class="cont">
                                                <h6>Start Time</h6>
                                                <span>{{\Carbon\Carbon::createFromFormat('H:i:s',$event->start_event)->format('h:i a')}}</span>
                                            </div>
                                        </div> <!-- singel address -->
                                    </li>
                                    <li>
                                        <div class="singel-address">
                                            <div class="icon">
                                                <i class="fa fa-bell-slash"></i>
                                            </div>
                                            <div class="cont">
                                                <h6>Finish Time</h6>
                                                <span>{{\Carbon\Carbon::createFromFormat('H:i:s',$event->end_event)->format('h:i a')}}</span>
                                            </div>
                                        </div> <!-- singel address -->
                                    </li>
                                    <li>
                                        <div class="singel-address">
                                            <div class="icon">
                                                <i class="fa fa-map"></i>
                                            </div>
                                            <div class="cont">
                                                <h6>Address</h6>
                                                <span>{{$event->address}}</span>
                                            </div>
                                        </div> <!-- singel address -->
                                    </li>
                                </ul>
                                {{--<div id="contact-map" class="mt-25"></div> <!-- Map -->--}}
                            </div> <!-- events address -->
                        </div> <!-- events right -->
                    </div>
                </div> <!-- row -->
            </div> <!-- events-area -->
        </div> <!-- container -->
    </section>

    <!--====== EVENTS PART ENDS ======-->
@endsection

