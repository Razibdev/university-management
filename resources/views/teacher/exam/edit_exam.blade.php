@extends('layouts.teacher_layout.teacher_layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Exam</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit Exam</li>
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
                                <h3 class="card-title">Add Edit</h3>
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
                            <form role="form" method="POST" action="{{url('teacher/edit-exam/'.$examDetails->id)}}">
                                {{csrf_field()}}
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Department Name</label>
                                                <select required class="select2bs4" name="department_id" id="department_id"  data-placeholder="Select a Batch" style="width: 100%;">
                                                    <option value="0">Select Department</option>
                                                    @foreach($departments as $department)
                                                        <option value="{{$department->id}}" @if($examDetails->department_id == $department->id) selected @endif> {{$department->name}} </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Batch Level</label>
                                                <select required class="select2bs4" name="batch_id" id="batch_id"  data-placeholder="Select a Batch" style="width: 100%;">
                                                    <option value="0">Select Batch</option>
                                                    @foreach($batches as $batch)
                                                        <option value="{{$batch->id}}" @if($examDetails->batch_id == $batch->id) selected @endif> {{$batch->name}} </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Semester Level</label>
                                                <select required class="select2bs4" name="semester_id" id="semester_id"  data-placeholder="Select a Semester" style="width: 100%;">
                                                    <option value="0">Select Semester</option>
                                                    @foreach($semesters as $semester)
                                                        <option value="{{$semester->id}}" @if($examDetails->semester_id == $semester->id) selected @endif> {{$semester->name}} </option>
                                                    @endforeach
                                                </select>
                                            </div>


                                            <div class="form-group">
                                                <label>Exam Type</label>
                                                <select required class="select2bs4" name="exam_type" id="exam_type"  data-placeholder="Select a Semester" style="width: 100%;">
                                                    <option value="0">Select Type</option>
                                                    @foreach($examTypes as $type)
                                                        <option value="{{$type->id}}" @if($examDetails->exam_type == $type->id) selected @endif> {{$type->type}} </option>
                                                    @endforeach
                                                </select>
                                            </div>


                                            <div class="form-group">
                                                <label for="exam_title">Exam Title</label>
                                                <input class="form-control" id="exam_title" name="exam_title" placeholder="Enter Exam Title" value="{{$examDetails->exam_title}}" >
                                            </div>

                                            <div class="form-group">
                                                <label for="exam_date">Exam Date</label>
                                                <input type="date" class="form-control"  id="exam_date" name="exam_date" placeholder="Enter Exam Date " value="{{$examDetails->exam_date}}">
                                            </div>

                                            <div class="form-group">
                                                <label for="exam_date">Exam Time</label>
                                                <input type="time" class="form-control"  id="exam_time" name="exam_time" placeholder="Enter Exam Time " value="{{$examDetails->exam_time}}">
                                            </div>

                                            <div class="form-group">
                                                <label for="exam_date">Exam Duration(Minute)</label>
                                                <input type="number" class="form-control"  id="exam_duration" name="exam_duration" placeholder="Enter Exam Duration" value="{{$examDetails->exam_duration}}">
                                            </div>

                                            <div class="form-group">
                                                <label for="exam_date">Question Show Per Page</label>
                                                <input type="number" class="form-control"  id="per_page" name="per_page" placeholder="Enter Per page value" value="{{$examDetails->per_page}}">
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
        })
    </script>
@endpush
