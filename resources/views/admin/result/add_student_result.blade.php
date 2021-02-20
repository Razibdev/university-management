@extends('layouts.admin_layout.admin_layout')
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

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <form action="{{url('admin/result-submit')}}" method="POST"> {{csrf_field()}}

                                <div class="card-body">
                                    <input type="hidden" name="department" value="{{$department->id}}">
                                    <input type="hidden" name="batch" value="{{$batches->id}}">
                                    <input type="hidden" name="student" value="{{$students->id}}">

                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-6">

                                                <div class="form-group">
                                                    <label for="department">Semester Name</label>
                                                    <select name="semester_id" id="semester_id" class="form-control select2bs4">
                                                        <option value="0" selected disabled>Select Department</option>

                                                        @foreach($semesters as $semester)
                                                            <option value="{{$semester->id}}">{{$semester->name}}</option>

                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="field_wrapper">
                                                <div>
                                                    <div class="input-group">
                                                        <select name="subject_id[]" id="subject_id" class="form-control" required>                                                    <?php $i = 0; ?>
                                                            <option value="0" selected disabled>Select Subject</option>
                                                            @foreach($subjects as $subject)
                                                                <option value="{{$subject->id}}">{{$subject->name}}</option>
                                                                <?php $i++; ?>
                                                            @endforeach
                                                        </select>
                                                        <input type="text"  name="mark[]" class="form-control" placeholder="Mark" required/>
                                                        <input type="text"  name="grade[]" class="form-control" placeholder="Letter Grade" required/>
                                                        <input type="text"  name="grade_point[]" class="form-control" placeholder="Grade Point" required/>
                                                        <input type="text"  name="credit[]" class="form-control" placeholder="Credit" required/>
                                                        <a href="javascript:void(0);" class="add_button btn btn-success" title="Add field"> &nbsp;<i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group text-right" style="margin-top: 8px;">
                                        <input type="submit" value="Submit" class="btn btn-success" >
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </form>
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

        //Initialize Select2 Elements
        $('.select2').select2();


        $(document).ready(function () {

            $("#sections").DataTable({
                "responsive": true,
                "autoWidth": false,

            });
        });

        $(document).ready(function() {
            var maxField ={{$i}}//Input fields increment limitation
            var addButton = $('.add_button'); //Add button selector
            var wrapper = $('.field_wrapper'); //Input field wrapper
            var fieldHTML = '<div class="input-group" style="margin-top:8px;"><select name="subject_id[]" id="subject_id" class="form-control select2bs4"><option value="0" selected disabled>Select Subject</option> @foreach($subjects as $subject)<option value="{{$subject->id}}">{{$subject->name}}</option> @endforeach </select><input type="text"  name="mark[]" class="form-control" placeholder="Mark" required/><input type="text" name="grade[]" class="form-control" placeholder="Letter Grade" required/><input type="text"  name="grade_point[]" class="form-control" placeholder="Grade Point" required/><input type="text"  name="credit[]" class="form-control" placeholder="Credit" required/>&nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" class="remove_button btn btn-danger"><i class="fas fa-trash" aria-hidden="true"></i></a></div>';
            var x = 1; //Initial field counter is 1

            //Once add button is clicked
            $(addButton).click(function () {
                //Check maximum number of input fields
                if (x < maxField) {
                    x++; //Increment field counter
                    $(wrapper).append(fieldHTML); //Add field html
                }
            });
            //Once remove button is clicked
            $(wrapper).on('click', '.remove_button', function(e){
                e.preventDefault();
                $(this).parent('div').remove(); //Remove field html
                x--; //Decrement field counter
            });
        });

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        });

    </script>
@endpush
