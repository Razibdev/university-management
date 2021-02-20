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
                        <h1>CMS Pages</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Add CMS Page</li>
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
                                <h3 class="card-title">Add CMS Page</h3>
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
                            <form role="form" method="POST" action="{{url('admin/add-cms-page')}}">
                                {{csrf_field()}}
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="cms_title">CMS Title</label>
                                                <input class="form-control" id="cms_title" required name="title" placeholder="Enter Product Name" >
                                            </div>

                                            <div class="form-group">
                                                <label for="cms_url">CMS Page Url</label>
                                                <input class="form-control" id="cms_url" required name="url" placeholder="Enter Cms page url" >
                                            </div>

                                            <div class="form-group">
                                                <label for="cms_description">CMS Description</label>
                                                <textarea id="cms_description" class="form-control" required rows="3" name="description" placeholder="Enter CMS Page Description" ></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="meta_title">Meta Title</label>
                                                <input class="form-control" id="meta_title" name="meta_title" placeholder="Enter Meta Title" >
                                            </div>

                                            <div class="form-group">
                                                <label for="meta_description">Meta Description</label>
                                                <input class="form-control" id="meta_description" name="meta_description" placeholder="Enter Meta Description" >
                                            </div>

                                            <div class="form-group">
                                                <label for="meta_keywords">Meta Keywords</label>
                                                <input class="form-control" id="meta_keywords" name="meta_keywords" placeholder="Enter Meta Keywords" >
                                            </div>

                                            <div class="form-group">
                                                <label for="category_description">Enable</label>
                                                <input type="checkbox" name="status" id="status" value="1">
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
