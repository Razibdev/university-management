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
                        <h1>Edit Admin/Sub-Admin</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit Admin/Sub-Admin</li>
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
                                <h3 class="card-title">Edit Admin/Sub-Admin</h3>
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
                            <form role="form" method="POST" action="{{url('admin/edit-admin/'.$adminDetails->id)}}">
                                {{csrf_field()}}
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="admin_name">Admin Name</label>
                                                <input class="form-control" id="admin_name" required name="admin_name" value="{{$adminDetails->name}}" placeholder="Enter Admin Name" >
                                            </div>

                                            <div class="form-group">
                                                <label for="admin_name">Type</label>
                                                {{--<select name="type" id="type" class="form-control select2bs4">--}}
                                                    {{--<option value="" selected disabled="">Select Type</option>--}}
                                                    {{--<option value="Admin"  @if($adminDetails->type == "Admin") selected @endif >Admin</option>--}}
                                                    {{--<option value="Sub Admin" @if($adminDetails->type == "Sub Admin") selected @endif >Sub Admin</option>--}}
                                                {{--</select>--}}
                                                <input type="text" class="form-control" value="{{$adminDetails->type}}" readonly  id="type" name="type" >

                                            </div>

                                            <div class="form-group">
                                                <label for="admin_email">Admin Email</label>
                                                <input type="text" class="form-control" value="{{$adminDetails->email}}" required  id="admin_email" name="admin_email" readonly>
                                            </div>

                                            <div class="form-group">
                                                <label for="admin_password">Admin Password</label>
                                                <input type="password" class="form-control" required  id="admin_password" name="admin_password" placeholder="Enter Admin Password">
                                            </div>

                                            <div class="form-group">
                                                <label for="admin_mobile">Admin Mobile</label>
                                                <input type="number" class="form-control" required  value="{{$adminDetails->mobile}}" id="admin_mobile" name="admin_mobile" placeholder="Enter Admin Mobile">
                                            </div>

                                            {{--<div class="form-group">--}}
                                            {{--<label for="Admin_image">Admin Image</label>--}}
                                            {{--<input id="Admin_image" name="Admin_image" type="file">--}}
                                            {{--</div>--}}
                                            @if($adminDetails->type == 'Sub Admin')
                                            <div class="form-group" id="access">
                                                <label for="categories_access">Access</label>&nbsp;
                                                <input id="categories_view_access" name="categories_view_access"  @if($adminDetails->categories_view_access == 1) checked @endif type="checkbox" value="1"> &nbsp; Categories View Only &nbsp;
                                                <input id="categories_edit_access" name="categories_edit_access"  @if($adminDetails->categories_edit_access == 1) checked @endif type="checkbox" value="1"> &nbsp; Categories View & Edit &nbsp;
                                                <input id="categories_full_access" name="categories_full_access"  @if($adminDetails->categories_full_access == 1) checked @endif type="checkbox" value="1"> &nbsp; Categories View, Edit and Delete &nbsp;

                                                <input id="products_access" name="products_access" @if($adminDetails->products_access == 1) checked @endif  type="checkbox" value="1"> &nbsp; Products &nbsp;
                                                <input id="orders_access" name="orders_access" @if($adminDetails->orders_access == 1) checked @endif  type="checkbox" value="1"> &nbsp; Orders &nbsp;
                                                <input id="users_access" name="users_access" @if($adminDetails->users_access == 1) checked @endif  type="checkbox" value="1"> &nbsp; Users
                                            </div>
                                                @endif
                                            <div class="form-group">
                                                <label for="status">Enable</label>
                                                <input id="status" name="status" type="checkbox" @if($adminDetails->status == 1) checked @endif value="1">
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

        $(document).ready(function () {
            $("#type").change(function () {
                $('#access').hide();
                var type = $('#type').val();
                if(type === "Admin"){
                    $('#access').hide();
                }else{
                    $('#access').show();
                }
            });
        });
    </script>
@endpush
