@extends('layouts.admin_layout.admin_layout')
@push('css')
    <link rel="stylesheet" href="{{asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">

@endpush
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>CMS Page</h1>
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
                            <li class="breadcrumb-item active">CMS Page</li>
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
                                <h3 class="card-title">CMS Page</h3>
                                <div class="text-right">
                                    <a href="{{url('admin/add-cms-page')}}" class="btn btn-success pull-right">Add CMS Page</a>

                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="cms_page" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Page ID</th>
                                        <th>Title</th>
                                        <th>URL</th>
                                        <th>Status</th>
                                        <th>Created On</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($cmsPages as $cms)

                                        <tr>
                                            <td>{{$cms->id}}</td>
                                            <td>{{$cms->title}}</td>
                                            <td>{{ $cms->url}}</td>
                                            <td>@if($cms->status == 1) Yes @else No @endif</td>
                                            <td>{{ $cms->created_at}}</td>
                                            <td>
                                                <a title="Cms Page Details" data-toggle="modal" data-target="#CmsView-{{$cms->id}}" href="#" class="btn btn-success btn-mini" ><i class="fa fa-eye" aria-hidden="true"></i></a>&nbsp;

                                                <a title="Edit Product" class="btn btn-success" href="{{url('/admin/edit-cms-page/'.$cms->id)}}"><i class="fas fa-edit"></i></a>
                                                <a title="Delete CMS Pages" href="javascript:void(0)" name="cms" data-id="{{$cms->id}}" class="btn btn-danger confirmDelete"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>

                                        <div class="modal fade" id="CmsView-{{$cms->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">{{ $cms->title}} Full Details</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p><strong>Page ID:</strong> {{$cms->id}}</p>
                                                        <p><strong>Title:</strong> {{$cms->title}}</p>
                                                        <p><strong>URL:</strong> {{$cms->url}}</p>
                                                        <p><strong>Status:</strong> {{$cms->status}}</p>
                                                        <p><strong>Description:</strong> {{$cms->description}}</p>
                                                        <p><strong>Created On:</strong> {{$cms->created_at}}</p>
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
    <script src="{{asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/js/admin_script.js')}}"></script>

    <script>
        $(document).ready(function () {
            $("#cms_page").DataTable();
        });

        $(document).ready(function(){
            $(document).on('change', '.js-switch', function () {

                let status = $(this).prop('checked') == true ? 1 : 0;
                let product_id = $(this).data('id');

                $.ajax({
                    dataType:'json',
                    type:"GET",
                    url: "{{url('admin/update-product-status')}}",
                    data:{'status': status, 'product_id' : product_id},
                    success:function(data){
                        // console.log(data.message);
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
                        window.location.href = "/admin/delete-"+name+"/"+id;
                    }
                });
            });
        });


    </script>
@endpush

