@extends('layouts.front_layout.front_layout')



@section('content')
    <!--====== SEARCH BOX PART START ======-->

    <div class="search-box">
        <div class="serach-form">
            <div class="closebtn">
                <span></span>
                <span></span>
            </div>
            <form action="{{url('/library-search')}}">
                <input type="text" placeholder="Search by Book Name Or Writer Name" name="library_search">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div> <!-- serach form -->
    </div>

    <!--====== SEARCH BOX PART ENDS ======-->

    <!--====== PAGE BANNER PART START ======-->

    <section id="page-banner" class="pt-105 pb-130 bg_cover" data-overlay="8" style="background-image: url(images/page-banner-5.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2>Shop</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Shop</li>
                            </ol>
                        </nav>
                    </div>  <!-- page banner cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== PAGE BANNER PART ENDS ======-->

    <!--====== SHOP PART START ======-->

    <section id="shop-page" class="pt-120 pb-120 gray-bg">
        <div class="container">

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="shop-grid" role="tabpanel" aria-labelledby="shop-grid-tab">
                    <div class="row justify-content-center">
                        @foreach($libraries as $library)
                        <div class="col-lg-3 col-md-6 col-sm-8">
                            <div class="singel-publication mt-30">
                                <div class="image">
                                    <img src="{{asset('/image/book_image/'.$library->book_image)}}" alt="Publication">

                                </div>
                                <div class="cont">
                                    <div class="name">
                                        <a href="{{url('/library/'.$library->id)}}"><h6>{{$library->book_name}}</h6></a>
                                        <span>by {{$library->writer_name}}</span>
                                    </div>
                                    <div class="button text-right">
                                        <a href="{{url('/library/'.$library->id)}}" class="main-btn">View Details</a>
                                    </div>
                                </div>
                            </div> <!-- singel publication -->
                        </div>
                        @endforeach
                    </div> <!-- row -->
                </div>
                {{--<div class="tab-pane fade" id="shop-list" role="tabpanel" aria-labelledby="shop-list-tab">--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-lg-6">--}}
                            {{--<div class="singel-publication mt-30">--}}
                                {{--<div class="row">--}}
                                    {{--<div class="col-sm-6">--}}
                                        {{--<div class="image">--}}
                                            {{--<img src="images/publication/p-1.jpg" alt="Publication">--}}
                                            {{--<div class="add-cart">--}}
                                                {{--<ul>--}}
                                                    {{--<li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>--}}
                                                    {{--<li><a href="#"><i class="fa fa-heart-o"></i></a></li>--}}
                                                {{--</ul>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-sm-6">--}}
                                        {{--<div class="cont">--}}
                                            {{--<div class="name">--}}
                                                {{--<a href="shop-singel.html"><h6>Set for life </h6></a>--}}
                                                {{--<span>$50.00</span>--}}
                                            {{--</div>--}}
                                            {{--<div class="description pt-10">--}}
                                                {{--<p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley.</p>--}}
                                            {{--</div>--}}
                                            {{--<div class="button">--}}
                                                {{--<a href="#" class="main-btn">Buy Now</a>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div> <!-- row -->--}}
                            {{--</div> <!-- singel publication -->--}}
                        {{--</div>--}}
                        {{--<div class="col-lg-6">--}}
                            {{--<div class="singel-publication mt-30">--}}
                                {{--<div class="row">--}}
                                    {{--<div class="col-sm-6">--}}
                                        {{--<div class="image">--}}
                                            {{--<img src="images/publication/p-2.jpg" alt="Publication">--}}
                                            {{--<div class="add-cart">--}}
                                                {{--<ul>--}}
                                                    {{--<li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>--}}
                                                    {{--<li><a href="#"><i class="fa fa-heart-o"></i></a></li>--}}
                                                {{--</ul>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-sm-6">--}}
                                        {{--<div class="cont">--}}
                                            {{--<div class="name">--}}
                                                {{--<a href="shop-singel.html"><h6>Set for life </h6></a>--}}
                                                {{--<span>$50.00</span>--}}
                                            {{--</div>--}}
                                            {{--<div class="description pt-10">--}}
                                                {{--<p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley.</p>--}}
                                            {{--</div>--}}
                                            {{--<div class="button">--}}
                                                {{--<a href="#" class="main-btn">Buy Now</a>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div> <!-- row -->--}}
                            {{--</div> <!-- singel publication -->--}}
                        {{--</div>--}}
                        {{--<div class="col-lg-6">--}}
                            {{--<div class="singel-publication mt-30">--}}
                                {{--<div class="row">--}}
                                    {{--<div class="col-sm-6">--}}
                                        {{--<div class="image">--}}
                                            {{--<img src="images/publication/p-3.jpg" alt="Publication">--}}
                                            {{--<div class="add-cart">--}}
                                                {{--<ul>--}}
                                                    {{--<li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>--}}
                                                    {{--<li><a href="#"><i class="fa fa-heart-o"></i></a></li>--}}
                                                {{--</ul>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-sm-6">--}}
                                        {{--<div class="cont">--}}
                                            {{--<div class="name">--}}
                                                {{--<a href="shop-singel.html"><h6>Set for life </h6></a>--}}
                                                {{--<span>$50.00</span>--}}
                                            {{--</div>--}}
                                            {{--<div class="description pt-10">--}}
                                                {{--<p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley.</p>--}}
                                            {{--</div>--}}
                                            {{--<div class="button">--}}
                                                {{--<a href="#" class="main-btn">Buy Now</a>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div> <!-- row -->--}}
                            {{--</div> <!-- singel publication -->--}}
                        {{--</div>--}}
                        {{--<div class="col-lg-6">--}}
                            {{--<div class="singel-publication mt-30">--}}
                                {{--<div class="row">--}}
                                    {{--<div class="col-sm-6">--}}
                                        {{--<div class="image">--}}
                                            {{--<img src="images/publication/p-4.jpg" alt="Publication">--}}
                                            {{--<div class="add-cart">--}}
                                                {{--<ul>--}}
                                                    {{--<li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>--}}
                                                    {{--<li><a href="#"><i class="fa fa-heart-o"></i></a></li>--}}
                                                {{--</ul>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-sm-6">--}}
                                        {{--<div class="cont">--}}
                                            {{--<div class="name">--}}
                                                {{--<a href="shop-singel.html"><h6>Set for life </h6></a>--}}
                                                {{--<span>$50.00</span>--}}
                                            {{--</div>--}}
                                            {{--<div class="description pt-10">--}}
                                                {{--<p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley.</p>--}}
                                            {{--</div>--}}
                                            {{--<div class="button">--}}
                                                {{--<a href="#" class="main-btn">Buy Now</a>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div> <!-- row -->--}}
                            {{--</div> <!-- singel publication -->--}}
                        {{--</div>--}}
                    {{--</div> <!-- row -->--}}
                {{--</div>--}}
            </div> <!-- tab content -->
            <div class="row">
                <div class="col-lg-12">
                    <nav class="courses-pagination mt-50">
                        {{ $libraries->links('vendor.pagination.custom') }}
                    </nav>  <!-- courses pagination -->
                </div>
            </div>  <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== COURSES PART ENDS ======-->
@endsection

