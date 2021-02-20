@extends('layouts.front_layout.front_design')
@push('css')

@endpush
@section('content')
    <section id="form" style="margin-top: 20px;"><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form"><!--login form-->
                        <h2>Update Account</h2>
                        <form method="post" action="{{url('/account')}}" id="accountForm" name="accountForm"> {{csrf_field()}}
                            <input value="{{$userDetails->name}}" type="text" id="name" name="name" placeholder="Name" />
                            <input type="text" value="{{$userDetails->address}}" id="address" name="address" placeholder="Enter Address" />
                            <input type="text" id="city" name="city" placeholder="Enter City" value="{{$userDetails->city}}" />
                            <input type="text" id="state" name="state" placeholder="Enter State" value="{{$userDetails->state}}" />
                            <select name="country" id="country">
                                <option value="">Select Country</option>
                                @foreach($countries as $country)
                                    <option value="{{$country->country_name}}" @if($country->country_name == $userDetails->country) selected @endif >{{$country->country_name}}</option>
                                @endforeach
                            </select>
                            <input style="margin-top: 10px;" type="text" id="pincode" name="pincode" placeholder="Pincode" value="{{$userDetails->pincode}}" />
                            <input type="text" id="mobile" name="mobile" placeholder="Mobile" value="{{$userDetails->mobile}}" />
                            <button type="submit" class="btn btn-default">Update</button>
                        </form>
                    </div><!--/login form-->
                </div>
                <div class="col-sm-1">
                    <h2 class="or">OR</h2>
                </div>
                <div class="col-sm-4">
                    <div class="signup-form"><!--sign up form-->
                        <h2>Update Password</h2>
                        <form action="{{url('/update-user-pwd')}}" id="passwordForm" name="passwordForm" method="post">{{csrf_field()}}
                            <input type="password" name="current_pwd" id="current_pwd" placeholder="Current Password">
                            <span id="chePwd"></span>
                            <input type="password" name="new_pwd" id="new_pwd" placeholder="New Password">
                            <input type="password" name="confirm_pwd" id="confirm_pwd" placeholder="Confirm Password">
                            <button type="submit">Update</button>
                        </form>
                    </div><!--/sign up form-->
                </div>
            </div>
        </div>
    </section><!--/form-->
@endsection


@push('js')

@endpush
