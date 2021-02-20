@extends('layouts.admin_layout.admin_layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Teacher</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Add Teacher</li>
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
                                <h3 class="card-title">Add Teacher</h3>
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
                            <form role="form" method="POST" action="{{url('admin/edit-teacher/'.$teacherDetails->id)}}" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">

                                            <div class="form-group">
                                                <label for="name">Teacher Name</label>
                                                <input class="form-control" id="name" name="name" placeholder="Enter Teacher Name" value="{{$teacherDetails->name}}" >
                                            </div>

                                            <div class="form-group">
                                                <label>Department name</label>
                                                <select class="select2bs4" required name="department_id" id="department_id"  data-placeholder="Select a Department" style="width: 100%;">
                                                    <option value="0" selected disabled>Select Department</option>
                                                    @foreach($departments as $department)
                                                        <option value="{{$department->id}}" @if($teacherDetails->department_id == $department->id) selected @endif> {{$department->name}} </option>
                                                    @endforeach
                                                </select>
                                            </div>


                                            <div class="form-group">
                                                <label for="username">Teacher Username</label>
                                                <input class="form-control" id="username" name="username" readonly value="{{$teacherDetails->username}}" placeholder="Enter Teacher Username" >
                                            </div>

                                            <div class="form-group">
                                                <label for="email">Teacher Email</label>
                                                <input class="form-control" id="email" name="email" value="{{$teacherDetails->email}}" placeholder="Enter Teacher Email" >
                                            </div>


                                            <div class="form-group">
                                                <label for="phone">Teacher Phone</label>
                                                <input class="form-control" id="phone" name="phone" value="{{$teacherDetails->phone}}" placeholder="Enter Teacher Phone" >
                                            </div>

                                            <div class="form-group">
                                                <label for="designation">Teacher Designation</label>
                                                <input type="text" class="form-control"  id="designation" value="{{$teacherDetails->designation}}" name="designation" placeholder="Enter Teacher Designation">
                                            </div>


                                            <div class="form-group">
                                                <label for="address">Teacher Address</label>
                                                <textarea placeholder="Place some text here"
                                                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" rows="3" name="address" placeholder="Enter Teacher Address" >{{$teacherDetails->address}}</textarea>
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

    <script>
        //Initialize Select2 Elements
        $('.select2').select2();

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        });

        $(function () {
            // Summernote
            $('.textarea').summernote()
        });

    </script>
@endpush
