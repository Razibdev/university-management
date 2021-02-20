@extends('layouts.student_layout.student_layout')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Result</h1>
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
                            <li class="breadcrumb-item active">Result</li>
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
                                <h3 class="card-title">Result</h3>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="marking" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th> ID</th>
                                        <th>Department Name</th>
                                        <th>Batch Name</th>
                                        <th>Exam Type</th>
                                        <th>Exam Name</th>
                                        <th>Total Mark</th>
                                        <th>Mark</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($results as $result)

                                        <tr>
                                            <td>{{$result->id}}</td>
                                            <td>{{$result->student->department->name}}</td>
                                            <td>{{$result->student->batch->name}}</td>
                                            <td>{{$result->exam->examType->type}}</td>
                                            <td>{{$result->exam->exam_title}}</td>
                                            <td>{{$result->total_mark}}</td>
                                            <td>{{$result->mark}}</td>

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

