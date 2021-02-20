@extends('layouts.teacher_layout.teacher_layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Settings</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Teacher Settings</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>



        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Update Teacher Details</h3>
                            </div>
                            <!-- /.card-header -->
                            @if ($errors->any())
                                <div class="alert alert-danger" style="margin-top: 10px;">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                        @endif
                        <!-- form start -->
                            <form role="form" method="POST" action="{{url('teacher/update-teacher-details')}}" name="updateAdminDetails" id="updateAdminDetails" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="card-body">
                                    {{--<div class="form-group">--}}
                                    {{--<label for="exampleInputEmail1">Admin Email</label>--}}
                                    {{--<input class="form-control" value="{{$teacherDetails->name}}" placeholder="Enter Admin/Sub Admin  Name"--}}
                                    {{--id="admin_name" name="admin_name">--}}
                                    {{--</div>--}}
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Teacher Email</label>
                                        <input class="form-control" readonly value="{{$teacherDetails->email}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Teacher Username</label>
                                        <input class="form-control" readonly value="{{$teacherDetails->username}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Name</label>
                                        <input type="text" class="form-control" value="{{$teacherDetails->name}}" id="teacher_name" name="teacher_name" placeholder="Enter Admin Name ">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Mobile</label>
                                        <input type="text" class="form-control" value="{{$teacherDetails->phone}}" id="teacher_mobile" name="teacher_mobile" placeholder="Enter Admin Mobile ">
                                    </div>


                                    <div class="form-group">
                                        <label for="designation">Teacher Designation</label>
                                        <input type="text" class="form-control"  id="designation" value="{{$teacherDetails->designation}}" name="designation" placeholder="Enter Teacher Designation">
                                    </div>


                                    <div class="form-group">
                                        <label for="address">Teacher Address</label>
                                        <textarea  placeholder="Place some text here"
                                                  style="width: 100%; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" rows="3" name="address" placeholder="Enter Teacher Address" >{{$teacherDetails->address}}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="profile_image">Teacher Image</label><br>
                                        <input type="hidden" name="current_image" value="{{$teacherDetails->profile_image}}">
                                        <input type="file"  id="profile_image" name="profile_image" style="margin-bottom: 10px;" >
                                        @if(!empty($teacherDetails->profile_image))
                                            <img src="{{asset('image/teacher_image/'.$teacherDetails->profile_image)}}" width="50" height="50" alt="">
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="gender">Teacher Gender</label><br>
                                        <input type="radio" name="gender" id="gender" value="Male" @if($teacherDetails->gender == 'Male') checked @endif> Male
                                        <input type="radio" name="gender" id="gender" value="Female" @if($teacherDetails->gender == 'Female') checked @endif> Female

                                    </div>

                                    <div class="form-group">
                                        <label for="status">Teacher Status</label><br>
                                        <input type="radio" name="status" id="status" value="Single" @if($teacherDetails->status == 'Single') checked @endif> Single
                                        <input type="radio" name="status" id="status" value="Married" @if($teacherDetails->status == 'Married') checked @endif> Married

                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->

                    </div>
                    <!--/.col (left) -->

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
@push('js')
    <script src="{{asset('admin/js/admin_script.js')}}"></script>
@endpush
