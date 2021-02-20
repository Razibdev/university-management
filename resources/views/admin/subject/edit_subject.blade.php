@extends('layouts.admin_layout.admin_layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Subject</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit Subject</li>
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
                                <h3 class="card-title">Edit Subject</h3>
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
                            <form role="form" method="POST" action="{{url('admin/edit-subject/'.$subjectDetails->id)}}">
                                {{csrf_field()}}
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">

                                            <div class="form-group">
                                                <label>Department Level</label>
                                                <select class="select2bs4" name="department_id" id="department_id"  data-placeholder="Select a State" style="width: 100%;">
                                                    <option value="0">Select Department</option>
                                                    @foreach($departments as $department)
                                                        <option value="{{$department->id}}" @if($subjectDetails->department_id == $department->id) selected @endif > {{$department->name}} </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Batch Level</label>
                                                <select class="select2bs4" name="batch_id" id="batch_id"  data-placeholder="Select a State" style="width: 100%;">
                                                    <option value="0">Select Batch</option>
                                                    @foreach($batches as $batch)
                                                        <option value="{{$batch->id}}" @if($subjectDetails->batch_id == $batch->id) selected @endif  > {{$batch->name}} </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Semester Level</label>
                                                <select class="select2bs4" name="semester_id" id="semester_id"  data-placeholder="Select a Semester" style="width: 100%;">
                                                    <option value="0">Select Semester</option>
                                                    @foreach($semesters as $semester)
                                                        <option value="{{$semester->id}}" @if($subjectDetails->semester_id == $semester->id) selected @endif > {{$semester->name}} </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="name">Subject Name</label>
                                                <input class="form-control" id="name" name="name" placeholder="Enter Subject Name"  value="{{$subjectDetails->name}}" >
                                            </div>

                                            <div class="form-group">
                                                <label for="code">Subject Code</label>
                                                <input class="form-control" id="code" name="code" value="{{$subjectDetails->code}}" placeholder="Enter Subject Code" >
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
    </script>
@endpush


