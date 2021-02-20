@extends('layouts.admin_layout.admin_layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Student</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Add Student</li>
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
                                <h3 class="card-title">Add Student</h3>
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
                            <form role="form" method="POST" action="{{url('admin/edit-student/'.$studentDetails->id)}}" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">

                                            <div class="form-group">
                                                <label for="name">Student Name</label>
                                                <input class="form-control" id="name" name="name" placeholder="Enter Student Name" value="{{$studentDetails->name}}" >
                                            </div>

                                            <div class="form-group">
                                                <label>Department name</label>
                                                <select class="select2bs4" required name="department_id" id="department_id"  data-placeholder="Select a Department" style="width: 100%;">
                                                    <option value="0" selected disabled>Select Department</option>
                                                    @foreach($departments as $department)
                                                        <option value="{{$department->id}}" @if($studentDetails->department_id == $department->id) selected @endif> {{$department->name}} </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Batch name</label>
                                                <select class="select2bs4" required name="batch_id" id="batch_id"  data-placeholder="Select a Batch" style="width: 100%;">
                                                    <option value="0" selected disabled>Select Batch</option>
                                                    @foreach($batches as $batch)
                                                        <option value="{{$batch->id}}" @if($studentDetails->batch_id == $batch->id) selected @endif> {{$department->name}} </option>
                                                    @endforeach
                                                </select>
                                            </div>


                                            <div class="form-group">
                                                <label for="username">Student Username</label>
                                                <input class="form-control" id="username" name="username" readonly value="{{$studentDetails->username}}" placeholder="Enter Student Username" >
                                            </div>

                                            <div class="form-group">
                                                <label for="email">Student Email</label>
                                                <input class="form-control" id="email" name="email" value="{{$studentDetails->email}}" placeholder="Enter Student Email" >
                                            </div>


                                            <div class="form-group">
                                                <label for="phone">Student Phone</label>
                                                <input class="form-control" id="phone" name="phone" value="{{$studentDetails->phone}}" placeholder="Enter Student Phone" >
                                            </div>


                                            <div class="form-group">
                                                <label for="address">Student Address</label>
                                                <textarea placeholder="Place some text here"
                                                          style="width: 100%; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" rows="3" name="address" placeholder="Enter Student Address" >{{$studentDetails->address}}</textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="profile_image">Student Image</label><br>
                                                <input type="hidden" name="current_image" value="{{$studentDetails->profile_image}}">
                                                <input type="file"  id="profile_image" name="profile_image" style="margin-bottom: 10px;" >
                                                @if(!empty($studentDetails->profile_image))
                                                    <img src="{{asset('image/student_image/'.$studentDetails->profile_image)}}" width="50" height="50" alt="">
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label for="gender">Student Gender</label><br>
                                                <input type="radio" name="gender" id="gender" value="Male" @if($studentDetails->gender == 'Male') checked @endif> Male
                                                <input type="radio" name="gender" id="gender" value="Female" @if($studentDetails->gender == 'Female') checked @endif> Female

                                            </div>

                                            <div class="form-group">
                                                <label for="status">Student Status</label><br>
                                                <input type="radio" name="status" id="status" value="Single" @if($studentDetails->status == 'Single') checked @endif> Single
                                                <input type="radio" name="status" id="status" value="Married" @if($studentDetails->status == 'Married') checked @endif> Married

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