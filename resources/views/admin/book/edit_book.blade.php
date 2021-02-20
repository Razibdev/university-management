@extends('layouts.admin_layout.admin_layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Book</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit Book</li>
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
                                <h3 class="card-title">Edit Book</h3>
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
                            <form role="form" method="POST" action="{{url('admin/edit-book/'.$libraryDetails->id)}}" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="book_name">Book Name</label>
                                                <input type="text" class="form-control" id="book_name" name="book_name" placeholder="Enter Book Name" value="{{$libraryDetails->book_name}}" >
                                            </div>

                                            <div class="form-group">
                                                <label for="writer_name">Write Name</label>
                                                <input type="text" class="form-control" id="writer_name" name="writer_name" placeholder="Enter Writer Name" value="{{$libraryDetails->writer_name}}" >
                                            </div>

                                            <div class="form-group">
                                                <label for="book_qty">Book Qty</label>
                                                <input type="number" class="form-control" id="book_qty" name="book_qty" placeholder="Enter Quantity Name" value="{{$libraryDetails->book_qty}}">
                                            </div>



                                            <div class="form-group">
                                                <label for="book_description">Book Description</label>
                                                <textarea class="form-control" placeholder="Place some text here"
                                                          name="book_description">{{$libraryDetails->book_description}}</textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="book_image">Book Image</label><br>
                                                <input type="hidden" name="current_image" value="{{$libraryDetails->book_image}}">
                                                <input type="file"  id="book_image" name="book_image" style="margin-bottom: 10px;" >
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
