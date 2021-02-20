@extends('layouts.front_layout.front_layout')

@section('content')
<!--====== SEARCH BOX PART START ======-->

<div class="search-box">
    <div class="serach-form">
        <div class="closebtn">
            <span></span>
            <span></span>
        </div>
        <form action="{{url('/teacher-search')}}" method="get">
            <input type="text" name="teacher_search"  placeholder="Search by keyword">
            <button type="submit"><i class="fa fa-search"></i></button>
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
                    <h2>Teachers</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Teachers</li>
                        </ol>
                    </nav>
                </div>  <!-- page banner cont -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>

<!--====== PAGE BANNER PART ENDS ======-->

<!--====== TEACHERS PART START ======-->

<section id="teachers-page" class="pt-90 pb-120 gray-bg">
    <div class="container">
        <div class="row">
            @foreach($teachers as $teacher)
                <div class="col-lg-3 col-sm-6">
                <div class="singel-teachers mt-30 text-center">
                    <div class="image">
                        <img src="{{asset('/image/teacher_image/'.$teacher->profile_image)}}" alt="Teachers">
                    </div>
                    <div class="cont">
                        <a href="{{url('/teacher/'.$teacher->id)}}"><h6>{{$teacher->name}}</h6></a>
                        <span>{{$teacher->designation}}</span>
                    </div>
                </div> <!-- singel teachers -->
            </div>
            @endforeach
        </div> <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <nav class="courses-pagination mt-50">
                    {{ $teachers->links('vendor.pagination.custom') }}
                </nav>  <!-- courses pagination -->
            </div>
        </div>  <!-- row -->
    </div> <!-- container -->
</section>

<!--====== TEACHERS PART ENDS ======-->
   @endsection
