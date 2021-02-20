@extends('layouts.front_layout.front_design')
@push('css')

@endpush
@section('content')
    <section id="form" style="margin-top: 20px;"><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form"><!--login form-->
                        <h2>Forgot Password</h2>
                        <form id="forgotPasswordForm" name="forgotPasswordForm" action="{{url('/forgot-password')}}" method="post">{{csrf_field()}}
                            <input name="email" type="email" placeholder="Email Address" required />
                            <button type="submit" class="btn btn-default">Login</button>
                        </form>
                    </div><!--/login form-->
                </div>
            </div>
        </div>
    </section><!--/form-->
@endsection


@push('js')

@endpush
