@extends('layouts.student_layout.student_layout')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Exam</h1>
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
                            <li class="breadcrumb-item active">Exam</li>
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
                        <div class="row">
                            <div class="col-sm-4">
                                <h3 class="text-center">Exam : {{$exam->exam_duration}} Minutes</h3>
                            </div>
                            <div class="col-sm-4">

                            </div>
                            <div class="col-sm-4">
                                <h3 class="text-center"><span class="js-timeout">{{$exam->exam_duration}}:00</span></h3>
                            </div>
                        </div>
                        <div class="card mr-4">

                            <div class="card-body">
                                <form action="{{url('student/exam-submit')}}" method="post" id="result_exam">{{csrf_field()}}
                                <div class="row">
                                    @foreach($questions as $key => $question)
                                        <input type="hidden" name="exam_id" value="{{$question->exam_id}}">
                                            <div class="col-sm-12">
                                                <p><b> {{$key+1}} {{$question->question_title}}</b></p>
                                                @if($question->type == 'mcq')
                                                    <ul style="list-style: none;">
                                                        <input type="hidden" name="question{{$key+1}}" value="{{$question->question_title}}">
                                                        <li><input type="radio" name="ans{{$key+1}}" value="{{$question->option1}}" id=""> {{$question->option1}}</li>
                                                        <li><input type="radio" name="ans{{$key+1}}"  value="{{$question->option2}}" id=""> {{$question->option2}}</li>
                                                        <li><input type="radio" name="ans{{$key+1}}"  value="{{$question->option3}}" id=""> {{$question->option3}}</li>
                                                        <li><input type="radio" name="ans{{$key+1}}"  value="{{$question->option4}}" id=""> {{$question->option4}}</li>
                                                        <li style="display: none"><input type="radio" value="0" checked name="ans{{$key+1}}" id=""> </li>

                                                    </ul>
                                                @endif
                                                @if($question->type == 'boolean')
                                                    <ul style="list-style: none;">
                                                        <input type="hidden" name="question{{$key+1}}" value="{{$question->question_title}}">
                                                        <li><input type="radio" name="ans{{$key+1}}" id="" value="True"> True</li>
                                                        <li><input type="radio" name="ans{{$key+1}}" id="" value="False"> False</li>
                                                        <li style="display: none"><input type="radio" value="0" checked name="ans{{$key+1}}" id=""> </li>
                                                    </ul>
                                                    @endif

                                                @if($question->type == 'broadquestion')
                                                    <ul style="list-style: none;">
                                                        <input type="hidden" name="question{{$key+1}}" value="{{$question->question_title}}">
                                                        <li><textarea name="ans{{$key+1}}" class="form-control"></textarea></li>
                                                    </ul>
                                                @endif
                                            </div>

                                    @endforeach
                                </div>
                                    <input type="hidden" name="index" value="{{$key+1}}">
                                    <div class="form-group">
                                        <input type="submit" value="Submit" class="btn btn-success">
                                    </div>


                                </form>

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
            $("#product").DataTable();
        });

        $(document).ready(function(){
            $(document).on('change', '.js-switch', function () {

                let status = $(this).prop('checked') == true ? 1 : 0;
                let exam_id = $(this).data('id');

                $.ajax({
                    dataType:'json',
                    type:"GET",
                    url: "{{url('teacher/update-exam-status')}}",
                    data:{'status': status, 'exam_id' : exam_id},
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
                        window.location.href = "/teacher/delete-"+name+"/"+id;
                    }
                });
            });
        });


    </script>

    <script>
        var interval;
        function countdown() {
            clearInterval(interval);
            interval = setInterval(function () {
                var timer = $('.js-timeout').html();
                timer = timer.split(':');
                var minutes = timer[0];
                var seconds = timer[1];
                seconds -= 1;
                if(minutes < 0) return;
                else if(seconds < 0 && minutes != 0){
                    minutes -= 1;
                    seconds = 59;
                }
                else if(seconds < 10 && length.seconds !=2) seconds = '0'+seconds;
                $('.js-timeout').html(minutes + ':'+seconds);
                if(minutes == 0 && seconds ==0){clearInterval(interval); $("#result_exam").submit()}
            }, 1000);
        }
        $('.js-timeout').text("{{$exam->exam_duration}}:00");
        countdown();
    </script>
@endpush

