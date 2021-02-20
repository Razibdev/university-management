@extends('layouts.teacher_layout.teacher_layout')
@push('css')
    <style>
        .category-tab {
            overflow: hidden;
        }

        .category-tab ul {
            background: #40403E;
            border-bottom: 1px solid #FE980F;
            list-style: none outside none;
            margin: 0 0 30px;
            padding: 0;
            width: 100%;
        }

        .category-tab ul li{
            padding: 10px;
        }

        .category-tab ul li a {
            border: 0 none;
            border-radius: 0;
            color: #B3AFA8;
            display: block;
            font-family: 'Roboto', sans-serif;
            font-size: 14px;
            text-transform: uppercase;
            padding: 8px;
        }

        .category-tab ul  li  a:hover{
            background:#FE980F;
            color:#fff;
        }

        .nav-tabs  li.active  a, .nav-tabs  li.active  a:hover, .nav-tabs  li.active  a:focus {
            -moz-border-bottom-colors: none;
            -moz-border-left-colors: none;
            -moz-border-right-colors: none;
            -moz-border-top-colors: none;
            background-color: #FE980F;
            border:0px;
            color: #FFFFFF;
            cursor: default;
            margin-right:0;
            margin-left:0;
        }

        .nav-tabs  li  a {
            border: 1px solid rgba(0, 0, 0, 0);
            border-radius: 4px 4px 0 0;
            line-height: 1.42857;
            margin-right:0;
        }

        .shop-details-tab {
            border: 1px solid #F7F7F0;
            margin-bottom: 75px;
            margin-left: 15px;
            margin-right: 15px;
            padding-bottom: 10px;
        }
        .shop-details-tab .col-sm-12 {
            padding-left: 0;
            padding-right: 0;
        }




        body {
            padding : 10px ;

        }

        #exTab1 .tab-content {
            color : white;
            background-color: #428bca;
            padding : 5px 15px;
        }

        #exTab2 h3 {
            color : white;
            background-color: #428bca;
            padding : 5px 15px;
        }

        /* remove border radius for the tab */

        #exTab1 .nav-pills > li > a {
            border-radius: 0;
        }

        /* change border radius for the tab , apply corners on top*/

        #exTab3 .nav-pills > li > a {
            border-radius: 4px 4px 0 0 ;
        }

        #exTab3 .tab-content {
            color : white;
            background-color: #428bca;
            padding : 5px 15px;
        }



    </style>
    @endpush
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Question</h1>
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
                            <li class="breadcrumb-item active">Question</li>
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

                        <div class="category-tab shop-details-tab"><!--category-tab-->
                            <div class="col-sm-12">
                                <ul class="nav nav-tabs">
                                    <li ><a href="#mcq" data-toggle="tab">MCQ</a></li>
                                    <li><a href="#boolean" data-toggle="tab">Boolean</a></li>
                                    <li><a href="#textarea" data-toggle="tab">Brod Question</a></li>

                                </ul>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane fade active in" id="mcq" >
                                    <div class="col-md-12">
                                        <div class="row">
                                    <div class="col-md-10">
                                        <form action="{{url('teacher/questionmcq')}}" method="POST"> {{csrf_field()}}
                                            <input type="hidden" name="type" value="mcq">
                                            <input type="hidden" name="exam_id" value="{{$exam_details->id}}">
                                        <div class="form-group">
                                            <div class="field_wrapper">
                                                    <div class="form-group">
                                                        <input type="text" name="question_title" id="question_title" class="form-control" placeholder="Enter Question Title">
                                                    </div>
                                                        <div class="col-sm-12">
                                                            <div class="row">
                                                                <div class="form-group col-sm-6">
                                                                    <div class="input-group">
                                                                        <input type="text"  name="option1" id="option1" class="form-control" placeholder="Option1" required/>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-sm-6">
                                                                    <div class="input-group">
                                                                        <input type="text"  name="option2" class="form-control" placeholder="Option2" required/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="row">
                                                                <div class="form-group col-sm-6">
                                                                    <div class="input-group">
                                                                        <input type="text"  name="option3" class="form-control" placeholder="Option3" required/>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-sm-6">
                                                                    <div class="input-group">
                                                                        <input type="text"  name="option4" class="form-control" placeholder="Option4" required/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                </div>

                                                <div class="form-group">
                                                    <input type="text" name="ans" id="ans" class="form-control" placeholder="Right answer">
                                                </div>

                                                <div class="form-group">
                                                    <input type="submit" value="Submit" class="btn btn-success" name="Submit">
                                                </div>

                                            </div>
                                        </div>
                                        </form>
                                    </div>

                                </div>


                            </div>
                        </div>
                                <div class="tab-pane fade" id="boolean" >
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-md-10">
                                                <form action="{{url('teacher/boolean')}}" method="POST">{{csrf_field()}}
                                                    <input type="hidden" name="type" value="boolean">
                                                    <input type="hidden" name="exam_id" value="{{$exam_details->id}}">
                                                <div class="form-group">
                                                    <div class="field_wrapper">
                                                            <div class="form-group">
                                                                <input type="text" name="question_title" id="question_title" class="form-control" placeholder="Enter Question Title">
                                                            </div>

                                                             <div class="col-sm-12">
                                                                <div class="row">
                                                                    <div class="form-group col-sm-6">
                                                                        <div class="input-group">
                                                                            <input type="radio" name="ans" id="one" value="True">&nbsp;True
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group col-sm-6">
                                                                        <div class="input-group">
                                                                            <input type="radio" name="ans" id="two" value="False">&nbsp;False
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                    <div class="form-group">
                                                        <input type="submit" value="Submit" class="btn btn-success" name="Submit">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>




                                    </div>
                                </div>

                                <div class="tab-pane fade" id="textarea" >
                                    <div class="col-sm-12">
                                        <form action="{{url('/teacher/broadquestion')}}" method="POST">{{csrf_field()}}
                                            <input type="hidden" name="type" value="broadquestion">
                                            <input type="hidden" name="exam_id" value="{{$exam_details->id}}">

                                            <div class="form-group">
                                                <div class="field_wrapper">
                                                    <div class="form-group">
                                                        <input type="text" name="question_title" id="question_title" class="form-control" placeholder="Enter Question Title">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" value="Submit" class="btn btn-success" name="Submit">
                                            </div>
                                        </form>
                                    </div>
                                </div>


                            </div>
                        </div><!--/category-tab-->
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

        // $(document).ready(function() {
        //     var maxField = 30; //Input fields increment limitation
        //     var addButton = $('.add_button'); //Add button selector
        //     var wrapper = $('.field_wrapper'); //Input field wrapper
        //     var fieldHTML = '<div class="row" style="margin:10px 0;"><div class="col-md-12"><div class="form-group"><div class="field_wrapper"><div><div class="form-group"><input type="text" name="question_title[]" id="question_title" class="form-control" placeholder="Enter Question Title"></div><div><div class="col-sm-12"><div class="row"><div class="form-group col-sm-6"><div class="input-group"><input type="checkbox" name="ans[]" id="one" value="1">&nbsp;<input type="text"  name="option1[]" class="form-control" placeholder="Option1" required/></div></div><div class="form-group col-sm-6"><div class="input-group"><input type="checkbox" name="ans[]" id="two" value="3">&nbsp;<input type="text"  name="option2[]" class="form-control" placeholder="Option2" required/></div></div></div></div><div class="col-sm-12"><div class="row"><div class="form-group col-sm-6"><div class="input-group"><input type="checkbox" name="ans[]" id="three" value="3">&nbsp;<input type="text"  name="option3[]" class="form-control" placeholder="Option3" required/></div></div><div class="form-group col-sm-6"><div class="input-group"><input type="checkbox" name="ans[]" id="four"value="4">&nbsp;<input type="text"  name="option4[]" class="form-control" placeholder="Option4" required/></div></div></div></div></div></div></div></div></div><div class="col-md-4"></div><div style="width: 96%;"></div><a style="text-align: right;" href="javascript:void(0);" class="remove_button btn btn-danger"><i  class="fas fa-trash" aria-hidden="true"></i></a></div>'; //New input field html
        //     var x = 1; //Initial field counter is 1
        //
        //     //Once add button is clicked
        //     $(addButton).click(function () {
        //         //Check maximum number of input fields
        //         if (x < maxField) {
        //             x++; //Increment field counter
        //             $(wrapper).append(x+fieldHTML); //Add field html
        //         }
        //     });
        //     //Once remove button is clicked
        //     $(wrapper).on('click', '.remove_button', function(e){
        //         e.preventDefault();
        //         $(this).parent('div').remove(); //Remove field html
        //         x--; //Decrement field counter
        //     });
        // });
        //
        //
        //
        //
        // $(document).ready(function() {
        //     var maxField = 30; //Input fields increment limitation
        //     var addButton = $('.add_button_boolean'); //Add button selector
        //     var wrapper = $('.field_wrapper'); //Input field wrapper
        //     var fieldHTML = '<div class="row"><div class="col-md-10"><div class="form-group"><div class="field_wrapper"><div class="form-group"><input type="text" name="question_title[]" id="question_title" class="form-control" placeholder="Enter Question Title"></div><div class="col-sm-12"><div class="row"><div class="form-group col-sm-6"><div class="input-group"><input type="checkbox" name="ans[]" id="one" value="1">&nbsp;True</div></div><div class="form-group col-sm-6"><div class="input-group"><input type="checkbox" name="ans[]" id="two" value="0">&nbsp;False</div></div></div></div></div></div></div><div class="col-md-2"></div><div style="width: 96%;"></div><a style="text-align: right;" href="javascript:void(0);" class="remove_button_boolean btn btn-danger"><i  class="fas fa-trash" aria-hidden="true"></i></a></div>'; //New input field html
        //     var y = 1; //Initial field counter is 1
        //
        //     //Once add button is clicked
        //     $(addButton).click(function () {
        //         //Check maximum number of input fields
        //         if (y < maxField) {
        //             y++; //Increment field counter
        //             $(wrapper).append(y+fieldHTML); //Add field html
        //         }
        //     });
        //     //Once remove button is clicked
        //     $(wrapper).on('click', '.remove_button_boolean', function(e){
        //         e.preventDefault();
        //         $(this).parent('div').remove(); //Remove field html
        //         x--; //Decrement field counter
        //     });
        // });
        //
        //


        // $(document).ready(function () {
        //     $('#option1').on('keydown',function(){
        //         $('#mcq1').val($(this).value);
        //         if ($('$mcq1:checked')) {
        //             var value = $('#mec1').val($('#option1').val());
        //             alert(value);
        //         }
        //
        //     });

            // if ($('$mcq1').checked) {
            //     $('#mcq1').on('change', function () {
            //         var go = $('mcq1').val($('#option1').val());
            //         alert(go);
            //     });
            // }
        // });




    </script>
@endpush



