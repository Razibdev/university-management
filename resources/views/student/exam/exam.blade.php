@extends('layouts.student_layout.student_layout')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Exam</h1>
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
                            <li class="breadcrumb-item active">Exam</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <div>
            <a style="margin-left: 20px; margin-bottom: 10px;" href="#" class="btn btn-primary btn-mini">Export</a>
        </div>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Exam</h3>
                                <div class="text-right">

                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="product" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Exam ID</th>
                                        <th>Teacher Name</th>
                                        <th>Department Name</th>
                                        <th>Batch Name</th>
                                        <th>Semester Name</th>
                                        <th>Exam Type</th>
                                        <th>Exam Title</th>
                                        <th>Exam Date</th>
                                        <th>Exam Time</th>
                                        <th>Exam Duration</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($exams as $exam)

                                        <tr>
                                            <td>{{$exam->id}}</td>
                                            <td>{{$exam->teacher->name}}</td>
                                            <td>{{$exam->department->name}}</td>
                                            <td>{{ $exam->batch->name}}</td>
                                            <td>{{ $exam->semester->name}}</td>
                                            <td>{{ $exam->examType->type}}</td>
                                            <td>{{ $exam->exam_title}}</td>
                                            <td> {{ $exam->exam_date}}</td>
                                            <td> {{\Carbon\Carbon::createFromFormat('H:i:s',$exam->exam_time)->format('h:i a')}}</td>
                                            <td> {{ $exam->exam_duration}} Minute</td>
                                            <td>
                                                <div class="btn-group">



                                                    @if($exam->exam_date == Carbon\Carbon::now()->format('Y-m-d') && $exam->exam_time <=  Carbon\Carbon::now()->format('H:i:s') && Carbon\Carbon::now()->format('H:i:s') <= Carbon\Carbon::parse($exam->exam_time)->addMinutes($exam->exam_duration)->format('H:i:s'))

                                                    <a title="Join Exam" class="btn btn-success" href="{{url('/student/join-exam/'.$exam->id)}}">Join</a>
                                                    @else
                                                    <a title="Exam Finish" class="btn btn-success" href="#">Exam Finish</a>
                                                        @endif
                                                </div>
                                            </td>
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
            $("#product").DataTable();
        });

        $(document).ready(function(){
            $(document).on('change', '.js-switch', function () {

                let status = $(this).prop('checked') == true ? 1 : 0;
                let exam_id = $(this).data('id');

                $.ajax({
                    dataType:'json',
                    type:"GET",
                    url: "{{url('teacher/update-exam-status')}}",
                    data:{'status': status, 'exam_id' : exam_id},
                    success:function(data){
                        // console.log(data.message);
                        toastr.options.closeButton = true;
                        toastr.options.progressBar = true;
                        toastr.options.showMethod = 'fadeIn';
                        toastr.options.hideMethod = 'fadeOut';

                        toastr.options.closeMethod = 'fadeOut';
                        toastr.options.closeDuration = 100;
                        toastr.success(data.message);

                    }
                })
            });
        });

        $(document).ready(function () {
            $(document).on('click', '.confirmDelete', function () {

                let name = $(this).attr('name');
                let id = $(this).data('id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        );
                        window.location.href = "/teacher/delete-"+name+"/"+id;
                    }
                });
            });
        });


    </script>
@endpush

