<?php
$var = "attendance";
include('../../controller/siteController.php');
include('../../config/connect.php');
$pdo = connect();

if(!$isLoggedin){
    header('Location:../../index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Take Your Leave | Online</title>

    <link href="../../public/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../public/css/interface-leftmenu.css" rel="stylesheet">
    <link href="../../public/css/leave-interface.css" rel="stylesheet">
    <link href="../../public/css/navbar-style.css" rel="stylesheet">
    <link href="../../public/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../public/css/datepicker.css">
    <link rel="stylesheet" href="../../public/css/attendance.css">
    <link href="../admin/css/datatable.css" rel="stylesheet">

</head>

<body style=" background-color: #eceff4 !important;">

<?php include("../layouts/navbar.php"); ?>

<div class="container-fluid">
    <div class="row">

        <div class="col-sm-2 col-xs-12 left-menu-div side-bar-display">
            <?php include("../layouts/leftbar.php") ?>
        </div>

        <div class="col-sm-10 col-xs-12 admin-background col-sm-push-2" style="position: relative;">
            <div class="row padding-row">
                <div class="row">
                    <div class="col-lg-12">
                        <ol class="breadcrumb breadcrumb-style">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="../../index.php">Take Your Leave</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-briefcase"></i> My Attendance
                            </li>
                        </ol>
                    </div>
                </div>
            </div>

            <div class="row padding-row">
                <div class="col-xs-12 padding-box">
                    <div class="row">
                        <div class="col-xs-12 nortification-box-top">
                            <h5 class="nortification-box-heading"><i class="fa fa-paperclip icon-margin-right" aria-hidden="true"></i>
                                Attendance Option</h5>
                            <hr>

                                <div class="department-add">
                                    <div class="col-xs-12">
                                        <div class="row">

                                            <div class="col-xs-12 col-sm-2" >

                                                <label style="padding-top: 5px;">Filter Attendance: </label>
                                            </div>
                                            <div class="col-xs-12 col-sm-3" >

                                                <input id="example1" name="min" type="text"
                                                       placeholder="Start Date"
                                                       class="form-control input-md" required>
                                            </div>
                                            <div class="col-xs-12 col-sm-3">
                                            <input id="example2" name="max" type="text"
                                                   placeholder="End date"
                                                   class="form-control input-md" required>
                                            </div>
                                            <div class="col-xs-12 col-sm-1" ></div>
                                            <div class="col-xs-12 col-sm-1" ></div>
                                            <div class="col-xs-12 col-sm-2">
                                                <button class="btn btn-info  pull-right submit-button" onclick="callme()" style="padding:10px 20px; margin-top:-5px;width: 160px">Download as PDF
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row padding-row">
                <div class="col-sm-12 col-xs-12 padding-box">
                    <div class="row">
                        <div class="col-xs-12 nortification-box-top">
                            <h5 class="nortification-box-heading"><i class="fa fa-eye icon-margin-right" aria-hidden="true"></i>
                                My Attendance</h5>
                            <hr>
                            <div class="row">
                                <div class="col-xs-12">
                                    <table id="myTable" class="display">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>In Time</th>
                                                <th>Out Time</th>
                                                <th>Work Time</th>
                                                <th>Over Time</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php include "../../module/FilterByEmp_Name.php"?>
                                        </tbody>

                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <?php
    include('../layouts/onlineStatus.php');
    ?>
</div>

<script>
    function tableToJson(table) {
        var data = [];

// first row needs to be headers
        var headers = [];
        for (var i=0; i<table.rows[0].cells.length; i++) {
            headers[i] = table.rows[0].cells[i].innerHTML.toUpperCase().replace(/ /gi,'');
        }
        data.push(headers);
// go through cells
        for (var i=1; i<table.rows.length; i++) {

            var tableRow = table.rows[i];
            var rowData = {};

            for (var j=0; j<tableRow.cells.length; j++) {

                rowData[ headers[j] ] = tableRow.cells[j].innerHTML;

            }

            data.push(rowData);
        }

        return data;
    }
</script>
<script>
    function callme(){
        var table = tableToJson($('#myTable').get(0));
        var doc = new jsPDF('l','pt','letter',true);


        $.each(table, function(i, row){
            $.each(row, function(j,cell){
                if(j=="DATE" | i==0){
                    doc.cell(20,50,150,30,cell,i);
                }
                else{
                    doc.cell(20,50,150,30,cell,i);
                }

            });
        });

        doc.save('Report.pdf');
    }
</script>
<script src="../../public/js/jquery.js"></script>
<script src="../../public/js/jspdf.js"></script>
<script src="../../public/js/bootstrap.js"></script>
<script src="../../public/js/bootstrap-datepicker.js"></script>
<script type="text/javascript">
    // When the document is ready
    $(document).ready(function () {

        $('#example1').datepicker({
            format: "yyyy-mm-dd"
        });
        $('#example2').datepicker({
            format: "yyyy-mm-dd"
        });

    });
</script>
<script src="../admin/js/datatable.js"></script>
<script type="application/javascript">
    $.fn.dataTable.ext.search.push(
        function( settings, data, dataIndex ) {

            var min = new Date($('#example1').val());
            var max = new Date($('#example2').val());
            var age = new Date(data[0] || 0);


            //alert(min);
            if ( ( isNaN( min ) && isNaN( max ) ) ||
                ( isNaN( min ) && age <= max ) ||
                ( min <= age   && isNaN( max ) ) ||
                ( min <= age   && age <= max ) )
            {
                return true;
            }
            return false;
        }
    );

    $(document).ready(function(){
        var table = $('#myTable').DataTable();

        // Event listener to the two range filtering inputs to redraw on input

        $('#example1, #example2').focusout( function() {
            table.draw();
        } );
    });
</script>
<script>
    $(document).ready(function()
    {
        $(document).bind("contextmenu",function(e){
            return false;
        });
    })
</script>

</body>
</html>
