<header id="header-part">

    <div class="header-top d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="header-contact text-lg-left text-center">
                        <ul>
                            <li><img src="{{asset('front/images/all-icon/map.png')}}" alt="icon"><span>127/5 Nolam street, Savar, Dhaka</span></li>
                            <li><img src="{{asset('front/images/all-icon/email.png')}}" alt="icon"><span>info@gbbd.com</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="header-opening-time text-lg-right text-center">
                        <p>Opening Hours : Saturday to Thursday - 9 Am to 4 Pm</p>
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div> <!-- header top -->

    <div class="header-logo-support pt-30 pb-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="logo">
                        <a href="{{url('/')}}">
                            <img src="{{asset('front/logo.png')}}" style=" height: 100px;" alt="Logo">
                        </a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8">
                    <div class="support-button float-right d-none d-md-block">
                        <div class="support float-left">
                            <div class="icon">
                                <img src="{{asset('front/images/all-icon/support.png')}}" alt="icon">
                            </div>
                            <div class="cont">
                                <p>Need Help? call us free</p>
                                <span>321 325 5678</span>
                            </div>
                        </div>
                        <div class="button float-left">
                            <a href="#" class="main-btn">Apply Now</a>
                        </div>
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div> <!-- header logo support -->

    <div class="navigation">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-9 col-8">
                    <nav class="navbar navbar-expand-lg">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item">
                                    <a class="{{ (request()->is('/')) ? 'active' : '' }}" href="{{url('/')}}">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="{{ (request()->is('about')) ? 'active' : '' }}" href="{{url('/about')}}">About us</a>
                                </li>

                                <li class="nav-item">
                                    <a class="{{ (request()->is('event*')) ? 'active' : '' }}" href="{{url('/event')}}">Events</a>
                                </li>
                                <li class="nav-item">
                                    <a class="{{ (request()->is('teacher*')) ? 'active' : '' }}" href="{{url('/teacher')}}">Our teachers</a>
                                </li>
                                <li class="nav-item">
                                    <a class="{{ (request()->is('blog*')) ? 'active' : '' }}" href="{{url('/blog')}}">Blog</a>
                                </li>
                                <li class="nav-item">
                                    <a class="{{ (request()->is('library*')) ? 'active' : '' }}" href="{{asset('/library')}}">Library</a>

                                </li>
                                <li class="nav-item">
                                    <a class="{{ (request()->is('contact*')) ? 'active' : '' }}" href="{{url('/contact')}}">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </nav> <!-- nav -->
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-4">
                    <div class="right-icon text-right">
                        <ul>
                            @if(\Illuminate\Support\Facades\Auth::guard('teacher')->check())
                                <li><a href="{{url('/teacher/dashboard')}}" >Dashboard</a></li>
                                <li><a href="{{url('/teacher/logout')}}" >LogOut</a></li>
                            @elseif(Illuminate\Support\Facades\Auth::guard('student')->check())
                                <li><a href="{{url('/student/dashboard')}}" >Dashboard</a></li>
                                <li><a href="{{url('/student/logout')}}" >LogOut</a></li>
                            @else
                            <li><a href="{{url('/teacher/login')}}" >Teacher</a></li>
                            <li><a href="{{url('/student/login')}}" >Student</a></li>
                            @endif
                               @if(request()->is('teacher*')) <li><a href="#" id="teacher_search"><i class="fa fa-search"></i></a></li>  @endif
                                @if(request()->is('library*')) <li><a href="#" id="library_search"><i class="fa fa-search"></i></a></li>  @endif
                                @if(request()->is('blog*')) <li><a href="#" id="post_search"><i class="fa fa-search"></i></a></li>  @endif


                                {{--<li><a href="#"><i class="fa fa-shopping-bag"></i><span>0</span></a></li>--}}
                        </ul>
                    </div> <!-- right icon -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div>

</header>
