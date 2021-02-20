@extends('layouts.student_layout.student_layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Post</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit Post</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>



        <!-- Main content -->
        <section class="content">

            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Edit Post</h3>
                            </div>
                            <!-- /.card-header -->
                            @if ($errors->any())
                                <div class="alert alert-danger" style="margin-top: 10px;">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                        @endif
                        <!-- form start -->
                            <form role="form" method="POST" action="{{url('student/edit-post/'.$postDetails->id)}}" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="hidden" name="type" value="student">
                                            <div class="form-group">
                                                <label for="post_title">Post Title</label>
                                                <input type="text" class="form-control" id="post_title" name="post_title" placeholder="Enter Post Title" value="{{$postDetails->post_title}}" >
                                            </div>

                                            <div class="form-group">
                                                <label for="post_description">Event Description</label>
                                                <textarea class="form-control" placeholder="Place some text here"
                                                           name="post_description">{{$postDetails->post_description}}</textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="post_image">Event Image</label><br>
                                                <input type="hidden" name="current_image" value="{{$postDetails->post_image}}">
                                                <input type="file"  id="post_image" name="post_image" style="margin-bottom: 10px;" >
                                            </div>


                                        </div>

                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->

                    </div>
                    <!--/.col (left) -->

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
@push('js')
    <script>
        $(function () {
            // Summernote
            $('.textarea').summernote()
        });


    </script>
@endpush
