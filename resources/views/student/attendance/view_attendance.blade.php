@extends('layouts.student_layout.student_layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Student Attendance</h1>
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
                            <li class="breadcrumb-item active">Student Attendance</li>
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
                            <div class="col-sm-12">
                                <div class="row">

                                </div>
                            </div>
                            <div class="card-header">
                                <h3 class="card-title" style="display: inline-block;">Student Table </h3>
                                <h3 class="text-center" style="display: inline-block; margin-left: 250px;">Present: {{$present}}% | Absent: {{$absent}}%</h3>
                                <h3 class="text-right" style="display: inline-block;  margin-left: 480px;">Class: &nbsp; {{$attendanceCount}}</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="sections" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Department Name</th>
                                        <th>Batch Name</th>
                                        <th>Subject Name</th>
                                        <th>Attendance Date</th>
                                        <th>Attendance</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php  $i = 1; ?>
                                    @foreach($studentAttendaces as $student)
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td>{{$student->department->name}}</td>
                                            <td>{{$student->batch->name}}</td>
                                            <td>{{$student->subject->name}}</td>
                                            <td>{{$student->attendance_date}}</td>
                                            <td>@if($student->attendance == 'Present')<span style="color: green;">Present</span> @else <span style="color: red;">Absent</span> @endif</td>
                                            <?php $i++; ?>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
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
        $(document).ready(function () {

            $("#sections").DataTable({
                "responsive": true,
                "autoWidth": false,

            });
        });

    </script>
@endpush
