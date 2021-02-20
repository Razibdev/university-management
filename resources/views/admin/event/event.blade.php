@extends('layouts.admin_layout.admin_layout')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Event</h1>
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
                            <li class="breadcrumb-item active">Event</li>
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
                                <h3 class="card-title">Event Table</h3>
                                <div class="text-right">
                                    <a href="{{url('admin/add_event')}}" class="btn btn-success pull-right">Add event</a>

                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="sections" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Event Image</th>
                                        <th>Event Title</th>
                                        <th>Event Address</th>
                                        <th>Event Start</th>
                                        <th>Event End</th>
                                        <th>Event date</th>
                                        <th>Event status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($events as $event)
                                        <tr>
                                            <td>{{$event->id}}</td>
                                            <td><img src="{{asset('/image/event_image/'.$event->event_image)}}" alt="" style="width: 100px; height: 100px;"></td>
                                            <td>{{$event->event_title}}</td>
                                            <td>{{$event->address}}</td>
                                            <td>{{$event->start_event}}</td>
                                            <td>{{$event->end_event}}</td>
                                            <td>{{$event->event_date}}</td>
                                            <td> <input type="checkbox" class="js-switch" data-id="{{$event->id}}" name="status" {{$event->status == 1 ? 'checked' : ''}} />
                                            <td> <a title="Delete Setion" href="javascript:void(0)" name="event" data-id="{{$event->id}}" class="btn btn-danger confirmDelete"><i class="fas fa-trash"></i></a></td>
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
    <script src="{{asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/js/admin_script.js')}}"></script>

    <script>
        $(document).ready(function () {

            $("#sections").DataTable({
                "responsive": true,
                "autoWidth": false,

            });
        });
        $(document).ready(function () {
            $(document).on('change','.js-switch', function () {
                let status = $(this).prop('checked') == true ? 1 : 0;
                let event_id = $(this).data('id');

                $.ajax({
                    dataType:'json',
                    type:"GET",
                    url: "{{url('admin/update-event-status')}}",
                    data:{'status': status, 'event_id' : event_id},
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
