@extends('layouts.admin_layout.admin_layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Student</h1>
                        <div class="panel">
                            <div class="panel-body">
                                <div class="wait" id="wait">

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Student</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <form action="{{url('teacher/attendance-submit')}}" method="POST"> {{csrf_field()}}
                                <div class="card-header">

                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">

                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-6">

                                                <div class="form-group">
                                                    <label for="department">Department Name</label>
                                                    <select name="department" id="department" class="form-control select2bs4">
                                                        <option value="0" selected disabled>Select Department</option>
                                                        @foreach($departments as $department)
                                                            <option value="{{$department->id}}">{{$department->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="batch">Batch Name</label>
                                                    <select name="batch" id="batch" class="form-control select2bs4">

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <table id="sections" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>Exam Roll</th>
                                            <th>Department Name</th>
                                            <th>Batch Name</th>
                                            <th>Student name</th>
                                            <th>Attendance</th>

                                        </tr>
                                        </thead>
                                        <tbody id="student">


                                        </tbody>
                                    </table>
                                    <div class="form-group text-right" style="margin-top: 8px;">
                                        <input type="submit" value="Submit" class="btn btn-success" >
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@push('js')

    <script>
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        });
        $(document).ready(function () {

            $("#sections").DataTable({
                "responsive": true,
                "autoWidth": false,

            });
        });


        // $('#department').on('change', function (e) {
        //     var department_id = e.target.value;
        //     console.log(department_id);
        //     $.get('/json-student?department_id='+department_id, function (data) {
        //         $('#student').empty();
        //         $('#student').append('<tr><td></td><td></td><td></td><td></td><td></td><td></td></tr>');
        //         $.each(data, function (index, student) {
        //             console.log(student.exam_roll);
        //            $('#student').append('<tr><td><input type="hidden" value="'+index+'" name="index"><input type="hidden" value="'+student.exam_roll+'" name="exam_roll'+index+'">'+student.exam_roll+'</td><td>'+ student.department.name+'</td><td>'+ student.batch.name+'</td><td>'+ student.name+'</td><td> <div class="form-check form-switch"><input  class="form-control" value="1" type="checkbox" name="status'+index+'" /></div></td></tr>');
        //         });
        //     });
        // });


        $('#department').on('change', function (e) {
            var department_id = e.target.value;
            console.log(department_id);
            $.get('/json-batch?department_id='+department_id, function (data) {
                $('#batch').empty();
                $('#batch').append('<option value="0" selected disabled>Select Batch</option>');
                $.each(data, function (index, batch) {
                    $('#batch').append('<option value="'+batch.id+'">'+batch.name+'</option>');
                });
            });
        });


        //subject depandance
        $('#batch').on('change', function (e) {
            var batch_id = e.target.value;
            console.log(batch_id);
            $.get('/batch-student?batch_id='+batch_id, function (data) {
                $('#student').empty();
                $('#student').append('<tr><td></td><td></td><td></td><td></td><td></td><td></td></tr>');
                $.each(data, function (index, student) {
                    console.log(index);
                    $('#student').append('<tr><td><input type="hidden" value="'+index+'" name="index"><input type="hidden" value="'+student.id+'" name="student_id'+index+'"><input type="hidden" value="'+student.exam_roll+'" name="exam_roll'+index+'">'+student.exam_roll+'</td><td>'+ student.department.name+'</td><td>'+ student.batch.name+'</td><td>'+ student.name+'</td><td> <a title="Edit Product" class="btn btn-success" href="/admin/result/department_id/'+student.department_id+'/batch_id/'+student.batch_id+'/student_id/'+student.id+'"><i class="fas fa-edit"></i></a> </td></tr>');
                });
            });
        });


        $('#batch').on('change', function (e) {
            var batch_id = e.target.value;
            console.log(batch_id);
            $.get('/json-subject?batch_id='+batch_id, function (data) {
                $('#subject').empty();
                $('#subject').append('<option value="0" selected disabled>Select Batch</option>');
                $.each(data, function (index, subject) {
                    $('#subject').append('<option value="'+subject.id+'">'+subject.name+'</option>');
                });
            });
        });

    </script>
@endpush
