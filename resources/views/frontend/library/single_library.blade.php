@extends('layouts.front_layout.front_layout')

@section('content')
    <!--====== PAGE BANNER PART START ======-->

    <div class="search-box">
        <div class="serach-form">
            <div class="closebtn">
                <span></span>
                <span></span>
            </div>
            <form action="{{url('/library-search')}}">
                <input type="text" placeholder="Search by Book Name or Writer Name" name="library_search">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div> <!-- serach form -->
    </div>

    <section id="page-banner" class="pt-105 pb-130 bg_cover" data-overlay="8" style="background-image: url(images/page-banner-5.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2>Shop</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item " aria-current="page">Shop</li>
                                <li class="breadcrumb-item active" aria-current="page">{{$libraryDetails->book_name}}</li>

                            </ol>
                        </nav>
                    </div>  <!-- page banner cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== PAGE BANNER PART ENDS ======-->

    <!--====== SHOP PART START ======-->

    <section id="shop-singel" class="pt-120 pb-120 gray-bg">
        <div class="container">
            <div class="shop-destails">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="shop-left pt-30">
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-image-1" role="tabpanel" aria-labelledby="pills-image-1-tab">
                                    <div class="shop-image">
                                        <a href="#" class="shop-items"><img src="{{asset('/image/book_image/single_book_image/'.$libraryDetails->book_image)}}" alt="Shop"></a>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- shop left -->
                    </div>
                    <div class="col-lg-6">
                        <div class="shop-right pt-30">
                            <h6>{{$libraryDetails->book_name}} </h6>
                            <span>by {{$libraryDetails->writer_name}}</span>
                            <p> Book Quantity:  {{$libraryDetails->book_qty}}</p>
                            <p>{{$libraryDetails->book_description}}</p>
                        </div>
                    </div>
                </div>  <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="shop-reviews mt-60">
                            <ul class="nav" id="myTab" role="tablist">
                                {{--<li class="nav-item">--}}
                                    {{--<a id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="false">Description</a>--}}
                                {{--</li>--}}
                                <li  class="nav-item">
                                    <a class="active"  id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="true">Reviews</a>
                                </li>
                            </ul> <!-- nav -->
                            <div class="tab-content" id="myTabContent">
                                {{--<div class="tab-pane fade " id="description" role="tabpanel" aria-labelledby="description-tab">--}}
                                    {{--<div class="description-cont pt-40">--}}
                                        {{--<p>{{$libraryDetails->book_description}}</p>--}}
                                    {{--</div>--}}
                                {{--</div> <!-- row -->--}}
                                <div class="tab-pane fade show active" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                                    <div class="reviews-cont">
                                        <ul>
                                            @if($ratingCount> 0)
                                                @foreach($ratingDetails as $rating)
                                                    @if($rating->type == 'teacher')
                                                        <li>
                                                            <div class="singel-reviews">
                                                                <div class="reviews-author">
                                                                    <div class="author-thum">
                                                                        <img style="width: 70px; height: 70px;" src="{{asset('image/teacher_image/'.$rating->teacher->profile_image)}}" alt="Reviews">
                                                                    </div>
                                                                    <div class="author-name">
                                                                        <h6>{{$rating->first_name}} {{$rating->last_name}}</h6>
                                                                        <span>{{date('d-M-Y', strtotime($rating->created_at))}}</span>
                                                                    </div>
                                                                </div>
                                                                <div class="reviews-description pt-20">
                                                                    <p>{{$rating->message}}</p>
                                                                    <div class="rating">
                                                                        <ul>
                                                                            @if($rating->rating == 2)
                                                                                <li><i class="fa fa-star"></i></li>
                                                                                <li><i class="fa fa-star"></i></li>
                                                                            @elseif($rating->rating == 3)
                                                                                <li><i class="fa fa-star"></i></li>
                                                                                <li><i class="fa fa-star"></i></li>
                                                                                <li><i class="fa fa-star"></i></li>
                                                                            @elseif($rating->rating == 4)
                                                                                <li><i class="fa fa-star"></i></li>
                                                                                <li><i class="fa fa-star"></i></li>
                                                                                <li><i class="fa fa-star"></i></li>
                                                                                <li><i class="fa fa-star"></i></li>
                                                                            @elseif($rating->rating == 5)
                                                                                <li><i class="fa fa-star"></i></li>
                                                                                <li><i class="fa fa-star"></i></li>
                                                                                <li><i class="fa fa-star"></i></li>
                                                                                <li><i class="fa fa-star"></i></li>
                                                                                <li><i class="fa fa-star"></i></li>
                                                                            @else
                                                                                <li><i class="fa fa-star"></i></li>
                                                                            @endif

                                                                        </ul>
                                                                        <span>/ {{$rating->rating}} Star</span>
                                                                    </div>
                                                                </div>
                                                            </div> <!-- singel reviews -->
                                                        </li>
                                                    @endif

                                                    @if($rating->type =='student')
                                                            <li>
                                                                <div class="singel-reviews">
                                                                    <div class="reviews-author">
                                                                        <div class="author-thum">
                                                                            <img style="width: 70px; height: 70px;" src="{{asset('image/student_image/'.$rating->student->profile_image)}}" alt="Reviews">
                                                                        </div>
                                                                        <div class="author-name">
                                                                            <h6>{{$rating->first_name}} {{$rating->last_name}}</h6>
                                                                            <span>{{date('d-M-Y', strtotime($rating->created_at))}}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="reviews-description pt-20">
                                                                        <p>{{$rating->message}}</p>
                                                                        <div class="rating">
                                                                            <ul>
                                                                                @if($rating->rating == 2)
                                                                                    <li><i class="fa fa-star"></i></li>
                                                                                    <li><i class="fa fa-star"></i></li>
                                                                                @elseif($rating->rating == 3)
                                                                                    <li><i class="fa fa-star"></i></li>
                                                                                    <li><i class="fa fa-star"></i></li>
                                                                                    <li><i class="fa fa-star"></i></li>
                                                                                @elseif($rating->rating == 4)
                                                                                    <li><i class="fa fa-star"></i></li>
                                                                                    <li><i class="fa fa-star"></i></li>
                                                                                    <li><i class="fa fa-star"></i></li>
                                                                                    <li><i class="fa fa-star"></i></li>
                                                                                @elseif($rating->rating == 5)
                                                                                    <li><i class="fa fa-star"></i></li>
                                                                                    <li><i class="fa fa-star"></i></li>
                                                                                    <li><i class="fa fa-star"></i></li>
                                                                                    <li><i class="fa fa-star"></i></li>
                                                                                    <li><i class="fa fa-star"></i></li>
                                                                                @else
                                                                                    <li><i class="fa fa-star"></i></li>
                                                                                @endif

                                                                            </ul>
                                                                            <span>/ {{$rating->rating}} Star</span>
                                                                        </div>
                                                                    </div>
                                                                </div> <!-- singel reviews -->
                                                            </li>
                                                     @endif

                                                @endforeach
                                            @endif


                                        </ul>
                                        @if(\Illuminate\Support\Facades\Auth::guard('teacher')->check() || \Illuminate\Support\Facades\Auth::guard('student')->check())
                                        <div class="reviews-form">
                                            <form action="{{url('/submit-rating')}}" method="POST"> {{csrf_field()}}
                                                <input type="hidden" name="book_id" value="{{$libraryDetails->id}}">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-singel">
                                                            <input type="text" placeholder="Fast name" name="fast_name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-singel">
                                                            <input type="text" placeholder="Last Name" name="last_name">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-singel">
                                                            <div class="rate-wrapper">
                                                                <div class="rate-label">Your Rating:</div>
                                                                {{--<div class="rate">--}}
                                                                    {{--<div class="rate-item"><i class="fa fa-star" aria-hidden="true" aria-valuenow="1"></i></div>--}}
                                                                    {{--<div class="rate-item"><i class="fa fa-star" aria-hidden="true"></i></div>--}}
                                                                    {{--<div class="rate-item"><i class="fa fa-star" aria-hidden="true"></i></div>--}}
                                                                    {{--<div class="rate-item"><i class="fa fa-star" aria-hidden="true"></i></div>--}}
                                                                    {{--<div class="rate-item"><i class="fa fa-star" aria-hidden="true"></i></div>--}}
                                                                {{--</div>--}}

                                                                <div class="rating">
                                                                    <ul>
                                                                        <li style="float: left; padding: 5px;"><i class="fa fa-star razib" id="s1"><input type="radio" name="rating"
                                                                                                         id="" value="1" style="top: -30px; position: relative; opacity: 0"></i></li>
                                                                        <li style="float: left; padding: 5px;"><i class="fa fa-star razib" id="s2"><input type="radio" name="rating"
                                                                                                         id="" value="2" style="top: -30px; position: relative; opacity: 0"></i></li>
                                                                        <li style="float: left; padding: 5px;"><i class="fa fa-star razib" id="s3"><input type="radio" name="rating"
                                                                                                         id="" value="3" style="top: -30px; position: relative; opacity: 0"></i></li>
                                                                        <li style="float: left; padding: 5px;"><i class="fa fa-star razib" id="s4"><input type="radio" name="rating"
                                                                                                         id="" value="4" style="top: -30px; position: relative; opacity: 0"></i></li>
                                                                        <li style="float: left; padding: 5px;"><i class="fa fa-star razib" id="s5"><input type="radio" name="rating"
                                                                                                         id="" value="5" style="top: -30px; position: relative; opacity: 0"></i></li>
                                                                    </ul>
                                                                    <span>/ 5 Star</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-singel">
                                                            <textarea placeholder="Comment" name="message"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-singel">
                                                            <button type="submit" class="main-btn">Post Comment</button>
                                                        </div>
                                                    </div>
                                                </div> <!-- row -->
                                            </form>
                                        </div> <!-- reviews form -->

                                            @else
                                            <div class="reviews-form">
                                                <p style="margin-top: 10px; text-align: center;">If you are reviewing. You are logIn first</p>
                                            </div>

                                        @endif
                                    </div>
                                </div> <!-- row -->
                            </div> <!-- tab-content -->
                        </div> <!-- shop reviews -->
                    </div>
                </div> <!-- row -->
            </div> <!-- shop-destails -->
            <div class="releted-item pt-110">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="title pb-10">
                            <h3>Releted products</h3>
                        </div>
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
                </div>  <!-- row -->
            </div> <!-- releted item -->
        </div> <!-- container -->
    </section>


@endsection

@push('js')
    <script>
        $(document).ready(function () {
            $("#s1").click(function () {
                $(".razib").css("color", "black");
                $("#s1").css("color", "yellow");
            });

            $('#s2').click(function () {
                $('.razib').css('color', 'black');
                $('#s1, #s2').css('color', 'yellow');
            });

            $('#s3').click(function () {
                $('.razib').css('color', 'black');
                $('#s1, #s2, #s3').css('color', 'yellow');
            });

            $('#s4').click(function () {
                $('.razib').css('color', 'black');
                $('#s1, #s2, #s3, #s4').css('color', 'yellow');
            });

            $('#s5').click(function () {
                $('.razib').css('color', 'black');
                $('.razib').css('color', 'yellow');
            });


        });
    </script>
    @endpush
