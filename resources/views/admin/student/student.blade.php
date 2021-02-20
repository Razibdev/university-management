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
                            <div class="card-header">
                                <h3 class="card-title">Student Table</h3>
                                <div class="text-right">
                                    <a href="{{url('admin/add-student')}}" class="btn btn-success pull-right">Add Student</a>

                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="sections" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Department Name</th>
                                        <th>Batch Name</th>
                                        <th>Student name</th>
                                        <th>Student Username</th>
                                        <th>Student email</th>
                                        <th>Student Phone</th>
                                        <th>Profile Image</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($students as $student)
                                        <tr>
                                            <td>{{$student->id}}</td>
                                            <td>{{$student->department->name}}</td>
                                            <td>{{$student->batch->name}}</td>
                                            <td>{{$student->name}}</td>
                                            <td>{{$student->username }}</td>
                                            <td>{{$student->email }}</td>
                                            <td>{{$student->phone }}</td>
                                            <td><img src="{{asset('image/student_image/'.$student->profile_image)}}" alt="" style="width: 100px; height: 100px;"></td>
                                            <td>
                                                <div class="btn-group">
                                                <a title="Student Details" data-toggle="modal" data-target="#StudentView-{{$student->id}}" href="#" class="btn btn-success btn-mini" ><i class="fa fa-eye" aria-hidden="true"></i></a> &nbsp;
                                                <a title="Edit Student" class="btn btn-success" href="{{url('/admin/edit-student/'.$student->id)}}"><i class="fas fa-edit"></i></a>&nbsp;
                                                <a title="Delete Student" href="javascript:void(0)" name="student" data-id="{{$student->id}}" class="btn btn-danger confirmDelete"><i class="fas fa-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>

                                        <!-- Modal -->
                                        <div class="modal fade" id="StudentView-{{$student->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">{{ $student->name}} Full Details</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p><img src="{{asset('image/student_image/'.$student->profile_image)}}" style="width: 470px; height: 500px;" alt=""></p>
                                                        <p>Student ID: {{$student->id}}</p>
                                                        <p>Department Name: {{$student->department->name}}</p>
                                                        <p>Batch Name: {{$student->batch->name}}</p>
                                                        <p>Student Name: {{$student->name}}</p>
                                                        <p>Student Username: {{$student->username}}</p>
                                                        <p>Student Email: {{$student->email}}</p>
                                                        <p style="display: block; width: 100%; overflow: hidden;">Student Address: {!! $student->address !!}</p>
                                                        <p>Student Designation: {{$student->designation}}</p>
                                                        <p>Gender : @if($student->gender == 'Male') Male @else Female @endif </p>
                                                        <p>Status: @if($student->status == 'Single') Single @else Married @endif </p>


                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

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
                        window.location.href = "/admin/delete-"+name+"/"+id;
                    }
                });
            });
        });




    </script>
@endpush
