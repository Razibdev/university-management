@extends('layouts.teacher_layout.teacher_layout')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Mark</h1>
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
                            <li class="breadcrumb-item active">Edit mark</li>
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

                        <div class="card mr-4">

                            <div class="card-body">
                                <div class="col-md-12">
                                        <p>Department name: {{$result->student->department->name}}</p>
                                         <p>Batch name: {{$result->student->batch->name}}</p>
                                         <p>Student Name: {{$result->student->name}}</p>
                                        <p>Student Roll: {{$result->student->exam_roll}}</p>
                                        <p>Exam Title: {{$exam->exam_title}}</p>

                                </div>




                                <hr class="mt-3">
                                <form action="{{url('teacher/mark-update/'.$result->id)}}" method="POST"> {{csrf_field()}}
                                    <div class="col-sm-8">
                                        <div class="row">

                                            <input type="hidden" name="mark_id" value="{{$result->id}}">
                                            <input type="hidden" name="exam_id" value="{{$exam->id}}">
                                            <div class="form-group col-sm-8">
                                                <label >Total Mark</label>
                                                <input type="number" readonly name="total_mark" class="form-control" placeholder="Enter total number" value="{{$result->total_mark}}">
                                            </div>

                                            <div class="form-group col-sm-8">
                                                <label > Mark</label>
                                                <input type="number" name="mark" class="form-control" placeholder="Enter total number" value="{{$result->mark}}">
                                            </div>
                                            <div class="form-group col-sm-8">
                                                <input type="submit" value="Update Result" class="btn btn-success">
                                            </div>

                                        </div>
                                    </div>
                                </form>

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

