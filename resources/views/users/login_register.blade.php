@extends('layouts.front_layout.front_design')
@push('css')

@endpush
@section('content')
    <section id="form" style="margin-top: 20px;"><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form"><!--login form-->
                        <h2>Login to your account</h2>
                        <form id="loginForm" name="loginForm" action="{{url('/user-login')}}" method="post">{{csrf_field()}}
                            <input name="email" type="email" placeholder="Email Address" required />
                            <input name="password" type="password" placeholder="Password" required />
                            {{--<span>--}}
								{{--<input type="checkbox" class="checkbox">--}}
								{{--Keep me signed in--}}
							{{--</span>--}}
                            <button type="submit" class="btn btn-default">Login</button><br>
                            <a href="{{url('forgot-password')}}">Forgot Password?</a>
                        </form>
                    </div><!--/login form-->
                </div>
                <div class="col-sm-1">
                    <h2 class="or">OR</h2>
                </div>
                <div class="col-sm-4">
                    <div class="signup-form"><!--sign up form-->
                        <h2>New User Signup!</h2>

                        <form method="post" action="{{url('user-register')}}" id="registerForm" name="registerForm"> {{csrf_field()}}
                            <input type="text" id="name" name="name" placeholder="Name" required />
                            <input type="email" id="email" name="email" placeholder="Email Address" required />
                            <input type="password" id="myPassword" name="password" placeholder="Password" required />
                            <button type="submit" class="btn btn-default">Signup</button>
                        </form>

                    </div><!--/sign up form-->
                </div>
            </div>
        </div>
    </section><!--/form-->
@endsection


@push('js')

@endpush
