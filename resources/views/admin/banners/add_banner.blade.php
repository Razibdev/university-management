@extends('layouts.admin_layout.admin_layout')
@push('css')
    <link rel="stylesheet" href="{{asset('admin/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endpush
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Banners</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Add Banner</li>
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
                                <h3 class="card-title">Add Banner</h3>
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
                            <form role="form" method="POST" action="{{url('admin/add-banner')}}" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">

                                            <div class="form-group">
                                                <label for="category_image">Banner Image</label><br>
                                                <input type="file"  id="image" name="image" style="margin-bottom: 10px;" >
                                                {{--@if(!empty($categoryData->category_image))--}}
                                                {{--<img src="{{asset('image/category_image/'.$categoryData->category_image)}}" width="50" height="50" alt="">--}}
                                                {{--@endif--}}
                                            </div>

                                            <div class="form-group">
                                                <label for="category_image">Pricing Image</label><br>
                                                <input type="file"  id="price_image" name="price_image" style="margin-bottom: 10px;" >
                                                {{--@if(!empty($categoryData->category_image))--}}
                                                {{--<img src="{{asset('image/category_image/'.$categoryData->category_image)}}" width="50" height="50" alt="">--}}
                                                {{--@endif--}}
                                            </div>

                                            <div class="form-group">
                                                <label for="">Title</label>
                                                <input class="form-control" id="title" name="title" placeholder="Enter Banner Title" >
                                            </div>

                                            <div class="form-group">
                                                <label for="">Link</label>
                                                <input class="form-control" id="link" name="link" placeholder="Enter Banner Link" >
                                            </div>

                                            <div class="form-group">
                                                <label for="">Enable</label> &nbsp;
                                                <input type="checkbox" id="status" name="status" value="1" >
                                            </div>

                                        </div>

                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Add Banner</button>
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
    <script src="{{asset('admin/plugins/select2/js/select2.full.min.js')}}"></script>
    <script src="{{asset('admin/js/admin_script.js')}}"></script>

    <script>
        //Initialize Select2 Elements
        $('.select2').select2();

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        });
    </script>
@endpush
