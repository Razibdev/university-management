@extends('layouts.student_layout.student_layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Review</h1>
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
                            <li class="breadcrumb-item active">Review</li>
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
                                <h3 class="card-title">Reviews Table</h3>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="reviews" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <Th>Book Name</Th>
                                        <th>Message</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($reviews as $review)

                                        <tr>
                                            <td>{{$review->id}}</td>
                                            <td>{{$review->student->name}}</td>
                                            <td><img src="{{asset('/image/student_image/'.$review->student->profile_image)}}" style="width: 70px; height: 70px;" alt=""></td>
                                            <td>{{$review->book->book_name}}</td>
                                            <td> {{ \Illuminate\Support\Str::limit($review->message, 100) }}</td>
                                            <td> <a title="Delete Review" href="javascript:void(0)" name="student_review" data-id="{{$review->id}}" class="btn btn-danger confirmDelete"><i class="fas fa-trash"></i></a></td>

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

            $("#reviews").DataTable({
                "responsive": true,
                "autoWidth": true,

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
