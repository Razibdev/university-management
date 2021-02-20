@extends('layouts.teacher_layout.teacher_layout')

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
            <a style="margin-left: 20px; margin-bottom: 10px;" href="{{url('/teacher/export-products')}}" class="btn btn-primary btn-mini">Export</a>
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
                                    <a href="{{url('teacher/add_exam')}}" class="btn btn-success pull-right">Add Exam</a>

                                </div>
                            </div>
                            <!-- /.card-header -->

                                <table id="product" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Exam ID</th>
                                        <th>Department Name</th>
                                        <th>Batch Image</th>
                                        <th>Semester Name</th>
                                        <th>Exam Type</th>
                                        <th>Exam Title</th>
                                        <th>Exam Date</th>
                                        <th>Exam Time</th>
                                        <th>Status</th>
                                        <th> Question</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($exams as $exam)

                                        <tr>
                                            <td>{{$exam->id}}</td>
                                            <td>{{$exam->department->name}}</td>
                                            <td>{{ $exam->batch->name}}</td>
                                            <td>{{ $exam->semester->name}}</td>
                                            <td>{{ $exam->examType->type}}</td>
                                            <td>{{ $exam->exam_title}}</td>
                                            <td> {{ $exam->exam_date}}</td>
                                            <td> {{\Carbon\Carbon::createFromFormat('H:i:s',$exam->exam_time)->format('h:i a')}}</td>
                                            <td> <input type="checkbox" class="js-switch" data-id="{{$exam->id}}" name="status" {{$exam->status == 1 ? 'checked' : ''}} /></td>
                                            <td>
                                                <div class="btn-group">
                                                <a title="Add Question" class="btn btn-success" href="{{url('/teacher/add-question/'.$exam->id)}}"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>&nbsp;&nbsp;<a title="View Question" class="btn btn-success" href="{{url('/teacher/view-question/'.$exam->id)}}"><i class="fa fa-eye" aria-hidden="true"></i></a></div></td>
                                            <td>
                                                <div class="btn-group">

                                                    <a title="Edit Exam" class="btn btn-success" href="{{url('/teacher/edit-exam/'.$exam->id)}}"><i class="fas fa-edit"></i></a>&nbsp;
                                                    <a title="Delete Exam" href="javascript:void(0)" name="exam" data-id="{{$exam->id}}" class="btn btn-danger confirmDelete"><i class="fas fa-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>

                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Exam ID</th>
                                        <th>Department Name</th>
                                        <th>Batch Image</th>
                                        <th>Semester Name</th>
                                        <th>Exam Type</th>
                                        <th>Exam Title</th>
                                        <th>Exam Date</th>
                                        <th>Exam Time</th>
                                        <th>Status</th>
                                        <th>Question</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
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

