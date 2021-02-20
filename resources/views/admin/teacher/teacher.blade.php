@extends('layouts.admin_layout.admin_layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Teacher</h1>
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
                            <li class="breadcrumb-item active">Teacher</li>
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
                                <h3 class="card-title">Teacher Table</h3>
                                <div class="text-right">
                                    <a href="{{url('admin/add-teacher')}}" class="btn btn-success pull-right">Add Teacher</a>

                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="sections" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Department Name</th>
                                        <th>Teacher name</th>
                                        <th>Teacher Username</th>
                                        <th>Teacher email</th>
                                        <th>Teacher Phone</th>
                                        <th>Profile Image</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($teachers as $teacher)
                                        <tr>
                                            <td>{{$teacher->id}}</td>
                                            <td>{{$teacher->department->name}}</td>
                                            <td>{{$teacher->name}}</td>
                                            <td>{{$teacher->username }}</td>
                                            <td>{{$teacher->email }}</td>
                                            <td>{{$teacher->phone }}</td>
                                            <td><img src="{{asset('image/teacher_image/'.$teacher->profile_image)}}" alt="" style="width: 100px; height: 100px;"></td>
                                            <td>
                                                <a title="Teacher Details" data-toggle="modal" data-target="#TeacherView-{{$teacher->id}}" href="#" class="btn btn-success btn-mini" ><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                <a title="Edit Teacher" class="btn btn-success" href="{{url('/admin/edit-teacher/'.$teacher->id)}}"><i class="fas fa-edit"></i></a>
                                                <a title="Delete Teacher" href="javascript:void(0)" name="teacher" data-id="{{$teacher->id}}" class="btn btn-danger confirmDelete"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>

                                        <!-- Modal -->
                                        <div class="modal fade" id="TeacherView-{{$teacher->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">{{ $teacher->name}} Full Details</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p><img src="{{asset('image/teacher_image/'.$teacher->profile_image)}}" alt=""></p>
                                                        <p>Teacher ID: {{$teacher->id}}</p>
                                                        <p>Department Name: {{$teacher->department->name}}</p>
                                                        <p>Teacher Name: {{$teacher->name}}</p>
                                                        <p>Teacher Username: {{$teacher->username}}</p>
                                                        <p>Teacher Email: {{$teacher->email}}</p>
                                                        <p>Teacher Address: {!! $teacher->address  !!} </p>
                                                        <p>Teacher Designation: {{$teacher->designation}}</p>
                                                        <p>Gender : @if($teacher->gender == 'Male') Male @else Female @endif </p>
                                                        <p>Status: @if($teacher->status == 'Single') Single @else Married @endif </p>


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
