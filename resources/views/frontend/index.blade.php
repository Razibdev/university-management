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

<!--====== SLIDER PART START ======-->

<section id="slider-part" class="slider-active">
    <div class="single-slider bg_cover pt-150" style="background-image: url(front/images/slider/s-1.jpg)" data-overlay="4">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-9">
                    <div class="slider-cont">
                        <h1 data-animation="bounceInLeft" data-delay="1s">Choose the right theme for education</h1>
                        <p data-animation="fadeInUp" data-delay="1.3s">Donec vitae sapien ut libearo venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt  Sed fringilla mauri amet nibh.</p>
                        <ul>
                            <li><a data-animation="fadeInUp" data-delay="1.6s" class="main-btn" href="#">Read More</a></li>
                            <li><a data-animation="fadeInUp" data-delay="1.9s" class="main-btn main-btn-2" href="#">Get Started</a></li>
                        </ul>
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div> <!-- single slider -->

    <div class="single-slider bg_cover pt-150" style="background-image: url(front/images/slider/s-2.jpg)" data-overlay="4">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-9">
                    <div class="slider-cont">
                        <h1 data-animation="bounceInLeft" data-delay="1s">Choose the right theme for education</h1>
                        <p data-animation="fadeInUp" data-delay="1.3s">Donec vitae sapien ut libearo venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt  Sed fringilla mauri amet nibh.</p>
                        <ul>
                            <li><a data-animation="fadeInUp" data-delay="1.6s" class="main-btn" href="#">Read More</a></li>
                            <li><a data-animation="fadeInUp" data-delay="1.9s" class="main-btn main-btn-2" href="#">Get Started</a></li>
                        </ul>
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div> <!-- single slider -->

    <div class="single-slider bg_cover pt-150" style="background-image: url(front/images/slider/s-3.jpg)" data-overlay="4">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-9">
                    <div class="slider-cont">
                        <h1 data-animation="bounceInLeft" data-delay="1s">Choose the right theme for education</h1>
                        <p data-animation="fadeInUp" data-delay="1.3s">Donec vitae sapien ut libearo venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt  Sed fringilla mauri amet nibh.</p>
                        <ul>
                            <li><a data-animation="fadeInUp" data-delay="1.6s" class="main-btn" href="#">Read More</a></li>
                            <li><a data-animation="fadeInUp" data-delay="1.9s" class="main-btn main-btn-2" href="#">Get Started</a></li>
                        </ul>
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div> <!-- single slider -->
</section>

<!--====== SLIDER PART ENDS ======-->

<!--====== CATEGORY PART START ======-->


<!--====== CATEGORY PART ENDS ======-->

<!--====== ABOUT PART START ======-->

<section id="about-part" class="pt-65">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="section-title mt-50">
                    <h5>About us</h5>
                    <h2>Welcome to Gono University </h2>
                </div> <!-- section title -->
                <div class="about-cont">
                    <p>Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt  mauris. <br> <br> auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt  mauris</p>
                    <a href="{{url('/event')}}" class="main-btn mt-55">Learn More</a>
                </div>
            </div> <!-- about cont -->
            <div class="col-lg-6 offset-lg-1">
                <div class="about-event mt-50">
                    <div class="event-title">
                        <h3>Upcoming events</h3>
                    </div> <!-- event title -->
                    <ul>
                        @foreach($events as $event)
                        <li>
                            <div class="singel-event">
                                <span><i class="fa fa-calendar"></i> {{$event->event_date}}</span>
                                <a href="{{url('/event/'.$event->id)}}"><h4>{{$event->event_title}}</h4></a>
                                <span><i class="fa fa-clock-o"></i> {{\Carbon\Carbon::createFromFormat('H:i:s',$event->start_event)->format('h:i a')}} - {{\Carbon\Carbon::createFromFormat('H:i:s',$event->end_event)->format('h:i a')}}</span>
                                <span><i class="fa fa-map-marker"></i>{{$event->address}}</span>
                            </div>
                        </li>
                       @endforeach
                    </ul>
                </div> <!-- about event -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
    <div class="about-bg">
        <img src="front/images/about/bg-1.png" alt="About">
    </div>
</section>

<!--====== ABOUT PART ENDS ======-->

<!--====== APPLY PART START ======-->



<!--====== APPLY PART ENDS ======-->

<!--====== COURSE PART START ======-->


<!--====== COURSE PART ENDS ======-->

<!--====== VIDEO FEATURE PART START ======-->

<section id="video-feature" class="bg_cover pt-60 pb-110" style="background-image: url(front/images/bg-1.jpg)">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 order-last order-lg-first">
                <div class="video text-lg-left text-center pt-50">
                    <a class="Video-popup" href="https://www.youtube.com/watch?v=bRRtdzJH1oE"><i class="fa fa-play"></i></a>
                </div> <!-- row -->
            </div>
            <div class="col-lg-5 offset-lg-1 order-first order-lg-last">
                <div class="feature pt-50">
                    <div class="feature-title">
                        <h3>Our Facilities</h3>
                    </div>
                    <ul>
                        <li>
                            <div class="singel-feature">
                                <div class="icon">
                                    <img src="front/images/all-icon/f-1.png" alt="icon">
                                </div>
                                <div class="cont">
                                    <h4>Global Certificate</h4>
                                    <p>Gravida nibh vel velit auctor aliquetn auci elit cons solliazcitudirem sem quibibendum sem nibhutis.</p>
                                </div>
                            </div> <!-- singel feature -->
                        </li>
                        <li>
                            <div class="singel-feature">
                                <div class="icon">
                                    <img src="front/images/all-icon/f-2.png" alt="icon">
                                </div>
                                <div class="cont">
                                    <h4>Alumni Support</h4>
                                    <p>Gravida nibh vel velit auctor aliquetn auci elit cons solliazcitudirem sem quibibendum sem nibhutis.</p>
                                </div>
                            </div> <!-- singel feature -->
                        </li>
                        <li>
                            <div class="singel-feature">
                                <div class="icon">
                                    <img src="front/images/all-icon/f-3.png" alt="icon">
                                </div>
                                <div class="cont">
                                    <h4>Books & Library</h4>
                                    <p>Gravida nibh vel velit auctor aliquetn auci elit cons solliazcitudirem sem quibibendum sem nibhutis.</p>
                                </div>
                            </div> <!-- singel feature -->
                        </li>
                    </ul>
                </div> <!-- feature -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
    <div class="feature-bg"></div> <!-- feature bg -->
</section>

<!--====== VIDEO FEATURE PART ENDS ======-->

<!--====== TEACHERS PART START ======-->

<section id="teachers-part" class="pt-70 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="section-title mt-50">
                    <h5>Featured Teachers</h5>
                    <h2>Meet Our teachers</h2>
                </div> <!-- section title -->
                <div class="teachers-cont">
                    <p>Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt  mauris. <br> <br> auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt  mauris</p>
                    <a href="{{url('/teacher')}}" class="main-btn mt-55">Career with us</a>
                </div> <!-- teachers cont -->
            </div>
            <div class="col-lg-6 offset-lg-1">
                <div class="teachers mt-20">
                    <div class="row">
                        @foreach($teachers as $teacher)
                        <div class="col-sm-6">
                            <div class="singel-teachers mt-30 text-center">
                                <div class="image">
                                    <img src="{{asset('/image/teacher_image/'.$teacher->profile_image)}}" alt="Teachers">
                                </div>
                                <div class="cont">
                                    <a href="{{url('teacher/'.$teacher->id)}}"><h6>{{$teacher->name}}</h6></a>
                                    <span>{{$teacher->designation}}</span>
                                </div>
                            </div> <!-- singel teachers -->
                        </div>
                        @endforeach

                    </div> <!-- row -->
                </div> <!-- teachers -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>

<!--====== TEACHERS PART ENDS ======-->

<!--====== PUBLICATION PART START ======-->

<section id="publication-part" class="pt-115 pb-120 gray-bg">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-6 col-md-8 col-sm-7">
                <div class="section-title pb-60">
                    <h5>Publications</h5>
                    <h2>From Store </h2>
                </div> <!-- section title -->
            </div>
            <div class="col-lg-6 col-md-4 col-sm-5">
                <div class="products-btn text-right pb-60">
                    <a href="{{url('/library')}}" class="main-btn">All Books</a>
                </div> <!-- products btn -->
            </div>
        </div> <!-- row -->
        <div class="row justify-content-center">
            @foreach($libraries as $library)
            <div class="col-lg-3 col-md-6 col-sm-8">
                <div class="singel-publication mt-30">
                    <div class="image">
                        <img src="{{asset('image/book_image/'.$library->book_image)}}" alt="Publication">
                        {{--<div class="add-cart">--}}
                            {{--<ul>--}}
                                {{--<li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>--}}
                                {{--<li><a href="#"><i class="fa fa-heart-o"></i></a></li>--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                    </div>
                    <div class="cont">
                        <div class="name">
                            <a href="{{url('/library/'.$library->id)}}"><h6>{{$library->book_name}} </h6></a>
                            <span>By {{$library->writer_name}}</span>
                        </div>
                        <div class="button text-right">
                            <a href="{{url('/library/'.$library->id)}}" class="main-btn">view details</a>
                        </div>
                    </div>
                </div> <!-- singel publication -->
            </div>
           @endforeach
        </div> <!-- row -->
    </div> <!-- container -->
</section>

<!--====== PUBLICATION PART ENDS ======-->

<!--====== TEASTIMONIAL PART START ======-->

<section id="testimonial" class="bg_cover pt-115 pb-115" data-overlay="8" style="background-image: url(front/images/bg-2.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-title pb-40">
                    <h5>Testimonial</h5>
                    <h2>What they say</h2>
                </div> <!-- section title -->
            </div>
        </div> <!-- row -->
        <div class="row testimonial-slied mt-40">
            <div class="col-lg-6">
                <div class="singel-testimonial">
                    <div class="testimonial-thum">
                        <img src="front/images/testimonial/t-1.jpg" alt="Testimonial">
                        <div class="quote">
                            <i class="fa fa-quote-right"></i>
                        </div>
                    </div>
                    <div class="testimonial-cont">
                        <p>Aliquetn sollicitudirem quibibendum auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet sem nibh id elit sollicitudirem </p>
                        <h6>Rubina Helen</h6>
                        <span>Bsc, Engineering</span>
                    </div>
                </div> <!-- singel testimonial -->
            </div>
            <div class="col-lg-6">
                <div class="singel-testimonial">
                    <div class="testimonial-thum">
                        <img src="front/images/testimonial/t-2.jpg" alt="Testimonial">
                        <div class="quote">
                            <i class="fa fa-quote-right"></i>
                        </div>
                    </div>
                    <div class="testimonial-cont">
                        <p>Aliquetn sollicitudirem quibibendum auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet sem nibh id elit sollicitudirem </p>
                        <h6>Rubina Helen</h6>
                        <span>Bsc, Engineering</span>
                    </div>
                </div> <!-- singel testimonial -->
            </div>
            <div class="col-lg-6">
                <div class="singel-testimonial">
                    <div class="testimonial-thum">
                        <img src="front/images/testimonial/t-3.jpg" alt="Testimonial">
                        <div class="quote">
                            <i class="fa fa-quote-right"></i>
                        </div>
                    </div>
                    <div class="testimonial-cont">
                        <p>Aliquetn sollicitudirem quibibendum auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet sem nibh id elit sollicitudirem </p>
                        <h6>Rubina Helen</h6>
                        <span>Bsc, Engineering</span>
                    </div>
                </div> <!-- singel testimonial -->
            </div>
        </div> <!-- testimonial slied -->
    </div> <!-- container -->
</section>

<!--====== TEASTIMONIAL PART ENDS ======-->







<!--====== NEWS PART START ======-->

<section id="news-part" class="pt-115 pb-110">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-title pb-50">
                    <h5>Latest News</h5>
                    <h2>From the news</h2>
                </div> <!-- section title -->
            </div>
        </div> <!-- row -->
        <div class="row">

            <div class="col-lg-6">
                @foreach($postsingle as $post)
                <div class="singel-news mt-30">
                    <div class="news-thum pb-25">
                        <img src="{{asset('/image/post_image/'.$post->post_image)}}" alt="News">
                    </div>
                    <div class="news-cont">
                        <ul>
                            <li><a href="#"><i class="fa fa-calendar"></i>2 December 2018 </a></li>
                            <li> <span>By</span> @if($post->type =="admin") Admin @elseif($post->type == 'teacher') Teacher @else Student @endif</li>
                        </ul>
                        <a href="{{url('/blog/'.$post->id)}}"><h3>Tips to grade high cgpa in university life</h3></a>
                        <?php $description =  Str::limit($post->post_description, '400') ; ?>
                        <p>{!! $description !!}</p>
                    </div>
                </div> <!-- singel news -->
                    @endforeach
            </div>



            <div class="col-lg-6">
                @foreach($posts as $post)
                <div class="singel-news news-list">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="news-thum mt-30">
                                <img src="{{asset('/image/post_image/'.$post->post_image)}}" alt="News">
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="news-cont mt-30">
                                <ul>
                                    <li><a href="#"><i class="fa fa-calendar"></i>{{$post->created_at}} </a></li>
                                    <li><a href="#"> <span>By</span>  @if($post->type =="admin") Admin @elseif($post->type == 'teacher') Teacher @else Student @endif</a></li>
                                </ul>
                                <a href="{{url('/post/'.$post->id)}}"><h3>{{$post->post_title}}</h3></a>

                            </div>
                        </div>
                    </div> <!-- row -->
                </div> <!-- singel news -->
                @endforeach


            </div>



        </div> <!-- row -->
    </div> <!-- container -->
</section>

<!--====== NEWS PART ENDS ======-->

<!--====== PATNAR LOGO PART START ======-->

<div id="patnar-logo" class="pt-40 pb-80 gray-bg">
    <div class="container">
        <div class="row patnar-slied">
            <div class="col-lg-12">
                <div class="singel-patnar text-center mt-40">
                    <img src="front/images/patnar-logo/p-1.png" alt="Logo">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="singel-patnar text-center mt-40">
                    <img src="front/images/patnar-logo/p-2.png" alt="Logo">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="singel-patnar text-center mt-40">
                    <img src="front/images/patnar-logo/p-3.png" alt="Logo">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="singel-patnar text-center mt-40">
                    <img src="front/images/patnar-logo/p-4.png" alt="Logo">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="singel-patnar text-center mt-40">
                    <img src="front/images/patnar-logo/p-2.png" alt="Logo">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="singel-patnar text-center mt-40">
                    <img src="front/images/patnar-logo/p-3.png" alt="Logo">
                </div>
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</div>
@endsection
