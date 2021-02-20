@extends('layouts.front_layout.front_layout')

@section('content')

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
                        <h2>Few tips for get better</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Blog</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Few tips for get better</li>
                            </ol>
                        </nav>
                    </div>  <!-- page banner cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== PAGE BANNER PART ENDS ======-->

    <!--====== BLOG PART START ======-->

    <section id="blog-singel" class="pt-90 pb-120 gray-bg">
        <div class="container">
            <div class="row">

                <div class="col-lg-8">

                    <div class="blog-details mt-30">
                        <div class="thum">
                            <img src="{{asset('/image/post_image/'.$post->post_image)}}" alt="Blog Details">
                        </div>
                        <div class="cont">
                            <h3>{{$post->post_title}}</h3>
                            <ul>
                                <li><a href="#"><i class="fa fa-calendar"></i>{{date('d-m-Y', strtotime($post->created_at))}}</a></li>
                                <li><a href="#"><i class="fa fa-user"></i>@if($post->type == 'admin'){{$post->admin->name}} @elseif($post->type == 'teacher') {{$post->teacher->name}} @else {{$post->student->name}} @endif </a></li>
                                <li><a href="#"><i class="fa fa-tags"></i>@if($post->type == 'admin') Admin @elseif($post->type == 'teacher') Teacher @else Student @endif </a></li>
                            </ul>
                            <p>{{$post->post_description}}
                            </p>
                            <ul class="share">
                                <div class="addthis_inline_share_toolbox"></div>
                            </ul>
                            <div class="blog-comment pt-45">
                                <div class="title pb-15">
                                    <h3>Comment (3)</h3>
                                </div>  <!-- title -->
                                <ul>

                                    @if($commentCount > 0)
                                        @foreach($commentDetails as $comment)

                                            @if($comment->type == 'teacher')
                                                <li>
                                                    <div class="comment">
                                                        <div class="comment-author">
                                                            <div class="author-thum">
                                                                <img style="width: 70px; height: 70px;" src="{{asset('image/teacher_image/'.$comment->teacher->profile_image)}}" alt="Reviews">
                                                            </div>
                                                            <div class="comment-name">
                                                                <h6>{{$comment->teacher->name}}</h6>
                                                                <span>{{date('d-M-Y', strtotime($comment->created_at))}}</span>
                                                            </div>
                                                        </div>
                                                        <div class="comment-description pt-20">
                                                            <p>{{$comment->message}}</p>
                                                        </div>

                                                    </div> <!-- comment -->
                                                </li>
                                            @endif

                                                @if($comment->type == 'student')
                                                    <li>
                                                        <div class="comment">
                                                            <div class="comment-author">
                                                                <div class="author-thum">
                                                                    <img style="width: 70px; height: 70px;" src="{{asset('image/student_image/'.$comment->student->profile_image)}}" alt="Reviews">
                                                                </div>
                                                                <div class="comment-name">
                                                                    <h6>{{$comment->student->name}}</h6>
                                                                    <span>{{date('d-M-Y', strtotime($comment->created_at))}}</span>
                                                                </div>
                                                            </div>
                                                            <div class="comment-description pt-20">
                                                                <p>{{$comment->message}}</p>
                                                            </div>

                                                        </div> <!-- comment -->
                                                    </li>
                                                @endif


                                    @endforeach
                                    @endif

                                </ul>
                                <div class="title pt-45 pb-25">
                                    <h3>Leave a comment</h3>
                                </div> <!-- title -->
                                <div class="comment-form">
                                    @if(\Illuminate\Support\Facades\Auth::guard('teacher')->check() || \Illuminate\Support\Facades\Auth::guard('student')->check())

                                    <form action="{{url('/comment-submit')}}" method="post">{{csrf_field()}}
                                        <input type="hidden" name="post_id" value="{{$post->id}}">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-singel">
                                                    <textarea placeholder="Comment" name="comment"></textarea>
                                                </div> <!-- form singel -->
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-singel">
                                                    <button class="main-btn" type="submit">Submit</button>
                                                </div> <!-- form singel -->
                                            </div>
                                        </div> <!-- row -->
                                    </form>
                                   @else
                                        <p>If you are commenting. You need logIn fast.</p>
                                    @endif
                                </div>  <!-- comment-form -->
                            </div> <!-- blog comment -->
                        </div> <!-- cont -->
                    </div> <!-- blog details -->



                </div>




                <div class="col-lg-4">
                    <div class="saidbar">
                        <div class="row">

                            <div class="col-lg-12 col-md-6">
                                <div class="saidbar-post mt-30">
                                    <h4>Similar Posts</h4>
                                    <ul>

                                    @foreach($similarPosts as $post)
                                        <li>
                                            <a href="{{url('/blog/'.$post->id)}}">
                                                <div class="singel-post">
                                                    <div class="thum">
                                                        <img src="{{asset('/image/post_image/'.$post->post_image)}}" alt="Blog">
                                                    </div>
                                                    <div class="cont">
                                                        <h6>{{$post->post_title}}</h6>
                                                        <span>{{date('d-m-Y', strtotime($post->created_at))}}</span>
                                                    </div>
                                                </div> <!-- singel post -->
                                            </a>
                                        </li>

                                    @endforeach
                                    </ul>
                                </div> <!-- saidbar post -->
                            </div>
                        </div> <!-- row -->
                    </div> <!-- saidbar -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5ffaf0142c77f9f7"></script>

    <!--====== BLOG PART ENDS ======-->
@endsection

