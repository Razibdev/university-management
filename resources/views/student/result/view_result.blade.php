@extends('layouts.student_layout.student_layout')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Result</h1>
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
                            <li class="breadcrumb-item active">Result</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <div>
            <a style="margin-left: 20px; margin-bottom: 10px;" href="{{url('/admin/export-products')}}" class="btn btn-primary btn-mini">Export</a>
        </div>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Department : {{$students->department->name}} | Batch : {{$students->batch->name}} | Name: {{$students->name}} | Exam Roll: {{$students->exam_roll}}</h3>

                            </div>
                            <!-- /.card-header -->
                            @if($resultsfirstcount> 0)
                                <div class="card-body">
                                    <h3>Semester: {{$semsester1->name}}</h3>
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-10">
                                                <table id="" class="table table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Subject Name </th>
                                                        <th>Mark</th>
                                                        <th>Grade</th>
                                                        <th>Grade Point</th>
                                                        <th>Credit</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($resultsfirst as $result)

                                                        <tr>
                                                            <td>{{$result->id}}</td>
                                                            <td>{{ $result->subject->name}}</td>
                                                            <td>{{ $result->mark}}</td>
                                                            <td>{{ $result->grade}}</td>
                                                            <td>{{ $result->grade_point}}</td>
                                                            <td>{{ $result->credit}}</td>

                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-sm-2 text-center" style="margin: 0 auto;">
                                                <h3 style="display: inline-block">CGPA: {{$final_cgpa1}} </h3>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            @endif
                            @if($resultssecondcount>0)
                                <div class="card-body">
                                    <h3>Semester: {{$semsester2->name}}</h3>
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-10">
                                                <table id="" class="table table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Subject Name </th>
                                                        <th>Mark</th>
                                                        <th>Grade</th>
                                                        <th>Grade Point</th>
                                                        <th>Credit</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($resultssecond as $result)

                                                        <tr>
                                                            <td>{{$result->id}}</td>
                                                            <td>{{ $result->subject->name}}</td>
                                                            <td>{{ $result->mark}}</td>
                                                            <td>{{ $result->grade}}</td>
                                                            <td>{{ $result->grade_point}}</td>
                                                            <td>{{ $result->credit}}</td>

                                                            <td><a title="Result" class="btn btn-success" href="{{url('/admin/edit-result/'.$result->id)}}"><i class="fas fa-edit"></i></a></td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-sm-2 text-center" style="margin: 0 auto;">
                                                <h3 style="display: inline-block">CGPA: {{$final_cgpa2}} </h3>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            @endif
                            @if($resultsthirdcount > 0)

                                <div class="card-body">
                                    <h3>Semester: {{$semsester3->name}}</h3>
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-10">
                                                <table id="" class="table table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Subject Name </th>
                                                        <th>Mark</th>
                                                        <th>Grade</th>
                                                        <th>Grade Point</th>
                                                        <th>Credit</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($resultsthird as $result)

                                                        <tr>
                                                            <td>{{$result->id}}</td>
                                                            <td>{{ $result->subject->name}}</td>
                                                            <td>{{ $result->mark}}</td>
                                                            <td>{{ $result->grade}}</td>
                                                            <td>{{ $result->grade_point}}</td>
                                                            <td>{{ $result->credit}}</td>

                                                            <td><a title="Result" class="btn btn-success" href="{{url('/admin/edit-result/'.$result->id)}}"><i class="fas fa-edit"></i></a></td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-sm-2 text-center" style="margin: 0 auto;">
                                                <h3 style="display: inline-block">CGPA: {{$final_cgpa3}} </h3>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            @endif

                            @if($resultsfourthcount > 0)
                                <div class="card-body">
                                    <h3>Semester: {{$semsester4->name}}</h3>
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-10">
                                                <table id="" class="table table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Subject Name </th>
                                                        <th>Mark</th>
                                                        <th>Grade</th>
                                                        <th>Grade Point</th>
                                                        <th>Credit</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($resultsfouth as $result)

                                                        <tr>
                                                            <td>{{$result->id}}</td>
                                                            <td>{{ $result->subject->name}}</td>
                                                            <td>{{ $result->mark}}</td>
                                                            <td>{{ $result->grade}}</td>
                                                            <td>{{ $result->grade_point}}</td>
                                                            <td>{{ $result->credit}}</td>

                                                            <td><a title="Result" class="btn btn-success" href="{{url('/admin/edit-result/'.$result->id)}}"><i class="fas fa-edit"></i></a></td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-sm-2 text-center" style="margin: 0 auto;">
                                                <h3 style="display: inline-block">CGPA: {{$final_cgpa4}} </h3>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            @endif

                            @if($resultsfivecount > 0)
                                <div class="card-body">
                                    <h3>Semester: {{$semsester5->name}}</h3>
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-10">
                                                <table id="" class="table table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Subject Name </th>
                                                        <th>Mark</th>
                                                        <th>Grade</th>
                                                        <th>Grade Point</th>
                                                        <th>Credit</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($resultsfive as $result)

                                                        <tr>
                                                            <td>{{$result->id}}</td>
                                                            <td>{{ $result->subject->name}}</td>
                                                            <td>{{ $result->mark}}</td>
                                                            <td>{{ $result->grade}}</td>
                                                            <td>{{ $result->grade_point}}</td>
                                                            <td>{{ $result->credit}}</td>

                                                            <td><a title="Result" class="btn btn-success" href="{{url('/admin/edit-result/'.$result->id)}}"><i class="fas fa-edit"></i></a></td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-sm-2 text-center" style="margin: 0 auto;">
                                                <h3 style="display: inline-block">CGPA: {{$final_cgpa5}} </h3>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            @endif
                            @if($resultssixcount > 0)
                                <div class="card-body">
                                    <h3>Semester: {{$semsester6->name}}</h3>
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-10">
                                                <table id="" class="table table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Subject Name </th>
                                                        <th>Mark</th>
                                                        <th>Grade</th>
                                                        <th>Grade Point</th>
                                                        <th>Credit</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($resultssix as $result)

                                                        <tr>
                                                            <td>{{$result->id}}</td>
                                                            <td>{{ $result->subject->name}}</td>
                                                            <td>{{ $result->mark}}</td>
                                                            <td>{{ $result->grade}}</td>
                                                            <td>{{ $result->grade_point}}</td>
                                                            <td>{{ $result->credit}}</td>

                                                            <td><a title="Result" class="btn btn-success" href="{{url('/admin/edit-result/'.$result->id)}}"><i class="fas fa-edit"></i></a></td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-sm-2 text-center" style="margin: 0 auto;">
                                                <h3 style="display: inline-block">CGPA: {{$final_cgpa6}} </h3>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            @endif
                            @if($resultssevencount > 0)
                                <div class="card-body">
                                    <h3>Semester: {{$semsester7->name}}</h3>
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-10">
                                                <table id="" class="table table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Subject Name </th>
                                                        <th>Mark</th>
                                                        <th>Grade</th>
                                                        <th>Grade Point</th>
                                                        <th>Credit</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($resultsseven as $result)

                                                        <tr>
                                                            <td>{{$result->id}}</td>
                                                            <td>{{ $result->subject->name}}</td>
                                                            <td>{{ $result->mark}}</td>
                                                            <td>{{ $result->grade}}</td>
                                                            <td>{{ $result->grade_point}}</td>
                                                            <td>{{ $result->credit}}</td>

                                                            <td><a title="Result" class="btn btn-success" href="{{url('/admin/edit-result/'.$result->id)}}"><i class="fas fa-edit"></i></a></td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-sm-2 text-center" style="margin: 0 auto;">
                                                <h3 style="display: inline-block">CGPA: {{$final_cgpa7}} </h3>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            @endif
                            @if($resultss > 0)
                                <div class="card-body">
                                    <h3>Semester: {{$semsester8->name}}</h3>
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-10">
                                                <table id="" class="table table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Subject Name </th>
                                                        <th>Mark</th>
                                                        <th>Grade</th>
                                                        <th>Grade Point</th>
                                                        <th>Credit</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($results as $result)

                                                        <tr>
                                                            <td>{{$result->id}}</td>
                                                            <td>{{ $result->subject->name}}</td>
                                                            <td>{{ $result->mark}}</td>
                                                            <td>{{ $result->grade}}</td>
                                                            <td>{{ $result->grade_point}}</td>
                                                            <td>{{ $result->credit}}</td>

                                                            <td><a title="Result" class="btn btn-success" href="{{url('/admin/edit-result/'.$result->id)}}"><i class="fas fa-edit"></i></a></td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-sm-2 text-center" style="margin: 0 auto;">
                                                <h3 style="display: inline-block">CGPA: {{$final_cgpa}} </h3>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                        @endif
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
            $("#product").DataTable();
        });

        $(document).ready(function () {
            $("#aside").DataTable();
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
                        )
                        window.location.href = "/admin/delete-"+name+"/"+id;
                    }
                });
            });
        });


    </script>
@endpush

