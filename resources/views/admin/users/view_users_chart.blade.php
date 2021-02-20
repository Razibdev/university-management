<?php
$current_month = date('M');
$last_month = date('M', strtotime('-1 month'));
$last_to_last_month = date('M', strtotime('-2 month'));


$dataPoints = array(
        array("y" => $last_to_last_month_users, "label" => $last_to_last_month),
        array("y" => $last_month_users, "label" => $last_month),
        array("y" => $current_month_users, "label" => $current_month)
);

?>
@extends('layouts.admin_layout.admin_layout')

@section('content')

    <script>
        window.onload = function () {

            var chart = new CanvasJS.Chart("chartContainer", {
                title: {
                    text: "Users Reporting"
                },
                axisY: {
                    title: "Number of Users"
                },
                data: [{
                    type: "line",
                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();

        }
    </script>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Users Chart</h1>
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
                            <li class="breadcrumb-item active">Users Charts</li>
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
                                <h3 class="card-title">View Users Charts</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div id="chartContainer" style="height: 370px; width: 100%;"></div>
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

    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

@endsection


