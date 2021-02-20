@extends('layouts.admin_layout.admin_layout')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Book</h1>
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
                            <li class="breadcrumb-item active">Book</li>
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
                                <h3 class="card-title">Book Table</h3>
                                <div class="text-right">
                                    <a href="{{url('admin/add-book')}}" class="btn btn-success pull-right">Add Book</a>

                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="posts" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Book Image</th>
                                        <th>Book Name</th>
                                        <th>Writer Name</th>
                                        <th>Quantity</th>
                                        <th> status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($libraries as $library)
                                        <tr>
                                            <td>{{$library->id}}</td>
                                            <td><img src="{{asset('/image/book_image/'.$library->book_image)}}" alt="" style="width: 100px; height: 100px;"></td>
                                            <td>{{$library->book_name}}</td>
                                            <td>{{$library->writer_name}}</td>
                                            <td>{{$library->book_qty}}</td>

                                            <td> <input type="checkbox" class="js-switch" data-id="{{$library->id}}" name="status" {{$library->status == 1 ? 'checked' : ''}} />
                                            <td> <a title="Edit Book" class="btn btn-success" href="{{url('/admin/edit-book/'.$library->id)}}"><i class="fas fa-edit"></i></a>&nbsp;<a title="Delete Book" href="javascript:void(0)" name="book" data-id="{{$library->id}}" class="btn btn-danger confirmDelete"><i class="fas fa-trash"></i></a></td>
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
                let book_id = $(this).data('id');

                $.ajax({
                    dataType:'json',
                    type:"GET",
                    url: "{{url('admin/update-book-status')}}",
                    data:{'status': status, 'book_id' : book_id},
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
                        window.location.href = "/admin/delete-"+name+"/"+id;
                    }
                });
            });
        });




    </script>
@endpush
