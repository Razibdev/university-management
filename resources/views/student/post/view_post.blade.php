@extends('layouts.student_layout.student_layout')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Post</h1>
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
                            <li class="breadcrumb-item active">Post</li>
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
                                <h3 class="card-title">Post Table</h3>
                                <div class="text-right">
                                    <a href="{{url('student/add-post')}}" class="btn btn-success pull-right">Add Post</a>

                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="posts" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Post Image</th>
                                        <th>Post Title</th>
                                        <th>Post status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($posts as $post)
                                        <tr>
                                            <td>{{$post->id}}</td>
                                            <td><img src="{{asset('/image/post_image/'.$post->post_image)}}" alt="" style="width: 100px; height: 100px;"></td>
                                            <td>{{$post->post_title}}</td>
                                            <td> <input type="checkbox" class="js-switch" data-id="{{$post->id}}" name="status" {{$post->status == 1 ? 'checked' : ''}} />
                                            <td> <a title="Edit Post" class="btn btn-success" href="{{url('/student/edit-post/'.$post->id)}}"><i class="fas fa-edit"></i></a>&nbsp;<a title="Delete Post" href="javascript:void(0)" name="post" data-id="{{$post->id}}" class="btn btn-danger confirmDelete"><i class="fas fa-trash"></i></a></td>
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

            $("#posts").DataTable({
                "responsive": true,
                "autoWidth": false,

            });
        });
        $(document).ready(function () {
            $(document).on('change','.js-switch', function () {
                let status = $(this).prop('checked') == true ? 1 : 0;
                let post_id = $(this).data('id');

                $.ajax({
                    dataType:'json',
                    type:"GET",
                    url: "{{url('student/update-post-status')}}",
                    data:{'status': status, 'post_id' : post_id},
                    success:function(data){
                        console.log(data.message);
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
                        window.location.href = "/student/delete-"+name+"/"+id;
                    }
                });
            });
        });




    </script>
@endpush
