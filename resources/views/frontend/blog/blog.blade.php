@extends('layouts.front_layout.front_layout')

@section('content')
    <!--====== SEARCH BOX PART START ======-->

<!--====== SEARCH BOX PART START ======-->

<div class="search-box">
    <div class="serach-form">
        <div class="closebtn">
            <span></span>
            <span></span>
        </div>
        <form action="{{url('/blog-search')}}" method="get">
            <input type="text" placeholder="Search by keyword" name="blog_search">
            <button><i class="fa fa-search"></i></button>
        </form>
    </div> <!-- serach form -->
</div>

<!--====== SEARCH BOX PART ENDS ======-->

<!--====== PAGE BANNER PART START ======-->

<section id="page-banner" class="pt-105 pb-130 bg_cover" data-overlay="8" style="background-image: url(front/images/page-banner-4.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-banner-cont">
                    <h2>Blog</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Blog</li>
                        </ol>
                    </nav>
                </div>  <!-- page banner cont -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>

<!--====== PAGE BANNER PART ENDS ======-->

<!--====== BLOG PART START ======-->

<section id="blog-page" class="pt-90 pb-120 gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                @foreach($bloges as $blog)
                <div class="singel-blog mt-30">
                    <div class="blog-thum">
                        <img src="{{asset('image/post_image/'.$blog->post_image)}}" alt="Blog">
                    </div>
                    <div class="blog-cont">
                        <a href="{{url('/blog/'.$blog->id)}}"><h3>{{$blog->post_title}}</h3></a>
                        <ul>
                            <li><a href="#"><i class="fa fa-calendar"></i>{{$blog->created_at}}</a></li>
                            <li><a href="#"><i class="fa fa-user"></i>@if($blog->type =='admin') {{$blog->admin->name}} @elseif($blog->type == 'teacher') {{$blog->teacher->name}} @else {{$blog->student->name}} @endif</a></li>
                            <li><a href="#"><i class="fa fa-tags"></i>@if($blog->type =='admin') Admin @elseif($blog->type == 'teacher') Teacher @else Student @endif</a></li>
                        </ul>
                        <p>{{ Illuminate\Support\Str::limit($blog->post_description, 300) }}</p>

                    </div>
                </div> <!-- singel blog -->
                @endforeach

                <nav class="courses-pagination mt-50">
                    {{ $bloges->links('vendor.pagination.custom') }}
                </nav>  <!-- courses pagination -->
            </div>
            <div class="clearfix"></div>
            <div class="col-lg-4">
                <div class="saidbar">
                    <div class="row">
                        <div class="col-lg-12 col-md-6">

                        </div> <!-- categories -->
                        <div class="col-lg-12 col-md-6">
                            <div class="saidbar-post mt-30">
                                <h4>Similar Posts</h4>
                                <ul>
                                    @if($blogcount > 2)
                                    @foreach($blogs as $blog)
                                    <li>
                                        <a href="{{url('/blog/'.$blog->id)}}">
                                            <div class="singel-post">
                                                <div class="thum">
                                                    <img src="{{asset('/image/post_image/'.$blog->post_image)}}" alt="Blog">
                                                </div>
                                                <div class="cont">
                                                    <h6>{{$blog->post_title}}</h6>
                                                    <span>{{$blog->created_at}}</span>
                                                </div>
                                            </div> <!-- singel post -->
                                        </a>
                                    </li>
                                        @endforeach
                                        @endif
                                </ul>
                            </div> <!-- saidbar post -->
                        </div>
                    </div> <!-- row -->
                </div> <!-- saidbar -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>

<!--====== BLOG PART ENDS ======-->
@endsection
