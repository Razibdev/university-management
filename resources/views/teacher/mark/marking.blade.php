@extends('layouts.teacher_layout.teacher_layout')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Marking</h1>
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
                            <li class="breadcrumb-item active">Marking</li>
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
                            <div class="card-header">
                                <h3 class="card-title">Marking</h3>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="marking" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>EXam ID</th>
                                        <th>Department Name</th>
                                        <th>Batch Name</th>
                                        <th>Semester Name</th>
                                        <th>Exam Name</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($exams as $exam)

                                        <tr>
                                            <td>{{$exam->id}}</td>
                                            <td>{{$exam->department->name}}</td>
                                            <td>{{$exam->batch->name}}</td>
                                            <td>{{$exam->semester->name}}</td>

                                            <td>{{$exam->exam_title}}</td>

                                            <td>
                                                <div class="btn-group">
                                                    <a title="view Marking" class="btn btn-success" href="{{url('/teacher/view-mark/'.$exam->id)}}"><i class="fas fa-eye"></i></a><a title="Delete Exam" href="javascript:void(0)" name="mark" data-id="{{$exam->id}}" class="btn btn-danger confirmDelete"><i class="fas fa-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>

                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>EXam ID</th>
                                        <th>Department Name</th>
                                        <th>Batch Name</th>
                                        <th>Semester Name</th>
                                        <th>Exam Name</th>
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
            $("#marking").DataTable();
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
                        )
                        window.location.href = "/teacher/delete-"+name+"/"+id;
                    }
                });
            });
        });


    </script>
@endpush

