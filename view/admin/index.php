<?php
$var = "index";
include('../../controller/siteController.php');

if(!$isLoggedin && $empRole!="admin"){
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

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/interface-leftmenu.css" rel="stylesheet">
    <link href="css/adminpanel-interface.css" rel="stylesheet">
    <link href="css/navbar-style.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../public/css/datepicker.css">


</head>

<body style=" background-color: #eceff4 !important;">

<?php include("navbar.php") ?>

<div class="container-fluid ">
    <div class="row ">

        <div class="col-sm-2 col-xs-12 left-menu-div side-bar-display">
            <?php include("leftbar.php") ?>
        </div>

        <div class="col-sm-10 col-xs-12 admin-background col-sm-push-2" style="position: relative;">
            <div class="row padding-row">
                <div class="row">
                    <div class="col-lg-12">
                        <ol class="breadcrumb breadcrumb-style">
                            <li>
                                <i class="fa fa-dashboard"></i> <a href="index.php">Admin Panel</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Overall Company
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="row padding-row">
                <div class="col-sm-3 col-xs-12 padding-box">
                    <div class="row">
                        <div class="col-xs-12 main-box-1-1">
                            <div class="row">
                                <div class="col-xs-8">
                                    <h2 class="box-count">04</h2>

                                    <h3 class="box-head">Departments</h3>
                                </div>
                                <div class="col-xs-4">
                                    <i class="fa fa-building fa-5x box-icon" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12  main-box-1-2">
                            <div class="more-info">
                               <a href="index_departments.php" style="color:#FFFFFF;"> More Info <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-12 padding-box">
                    <div class="row">
                        <div class="col-xs-12 main-box-2-1">
                            <div class="row">
                                <div class="col-xs-8">
                                    <h2 class="box-count">08</h2>

                                    <h3 class="box-head">Managers</h3>
                                </div>
                                <div class="col-xs-4">
                                    <i class="fa fa-user-secret fa-5x box-icon" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12  main-box-2-2">
                            <div class="more-info">
                                <a href="index_departments.php" style="color:#FFFFFF;">More Info <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-12 padding-box">
                    <div class="row">
                        <div class="col-xs-12 main-box-3-1">
                            <div class="row">
                                <div class="col-xs-8">
                                    <h2 class="box-count">54</h2>

                                    <h3 class="box-head">Employees</h3>
                                </div>
                                <div class="col-xs-4">
                                    <i class="fa fa-user fa-5x box-icon" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12  main-box-3-2">
                            <div class="more-info">
                                <a href="index_departments.php" style="color:#FFFFFF;"> More Info <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-12 padding-box">
                    <div class="row">
                        <div class="col-xs-12 main-box-4-1">
                            <div class="row">
                                <div class="col-xs-8">
                                    <h2 class="box-count">1</h2>

                                    <h3 class="box-head">Rosters</h3>
                                </div>
                                <div class="col-xs-4">
                                    <i class="fa fa-shirtsinbulk fa-5x box-icon" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12  main-box-4-2">
                            <div class="more-info">
                                <a href="index_departments_roster.php" style="color:#FFFFFF;"> More Info <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr style="border-bottom:1px solid #e3e3e3;">

            <div class="row padding-row">

                <div class="col-xs-12 col-sm-7 padding-box">
                    <div class="row">
                        <div class="col-xs-12 nortification-box-top">
                            <h5 class="nortification-box-heading"><i class="fa fa-calendar icon-margin-right" aria-hidden="true"></i>
                                Company Calendar</h5>
                                <hr>

                                <div>
                                    <iframe src="https://calendar.google.com/calendar/embed?showTitle=0&amp;showDate=0&amp;showPrint=0&amp;showTabs=0&amp;showCalendars=0&amp;showTz=0&amp;height=600&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;ctz=Asia%2FColombo" style="border-width:0" width="100%" height="400" frameborder="0" scrolling="no"></iframe>
                                </div>

                                <div style="background-color:#FFFFFF; z-index:2000; position:relative; margin-top:-31px; width:100%; height:40px;">

                                </div>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-5 padding-box">
                    <div class="row">
                        <div class="col-xs-12 nortification-box-top">
                            <h5 class="nortification-box-heading"><i class="fa fa-pencil icon-margin-right"aria-hidden="true"></i>
                                Add Event</h5>
                            <hr>
                            <div class="list-group">
                                <form role="form" data-toggle="validator" action="module/addEvent.php" method="post">
                                    <div class="department-add">
                                        <div class="col-xs-12">
                                            <!-- Text input-->
                                            <div class="form-group">
                                                <label class="col-xs-4 control-label form-lable">Event Name:</label>
                                                <div class="col-xs-8">
                                                    <input id="service_name" name="event_name" type="text" placeholder=""
                                                           class="form-control input-md" required>
                                                </div>
                                            </div>
                                            <br>
                                            <br>

                                            <div class="form-group">
                                                <label class="col-xs-4 control-label form-lable">Event Date:</label>

                                                <div class="col-xs-8">
                                                    <input id="example1" name="event_date" type="text"
                                                           placeholder="dd/mm/yyyy"
                                                           class="form-control input-md" required>

                                                </div>
                                            </div>
                                            <br>
                                            <br>

                                            <div class="form-group">
                                                <label class="col-xs-4 control-label form-lable">Description:</label>
                                                <div class="col-xs-8">
                                                    <textarea class="form-control" name="description" rows="2" required></textarea>
                                                </div>
                                            </div>
                                            <br>
                                            <br>

                                            <button class="btn btn-info btn-lg pull-right submit-button" type="submit" style="margin-top:20px;">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="btn-group dropup online-status">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding:5px 40px;">
            Online Status (23)
            <span class="caret"></span>
            <span class="sr-only">Toggle Dropdown</span>
        </button>
        <ul id="theList" class="dropdown-menu" style="max-height:70vh; overflow-x: hidden;height: auto; width:260px;">
            <input id="iconified" class="form-control empty" type="text" placeholder="&#xF002; Search" onkeyup="filter(this,'theList')" style="width:260px; background-color:#f4f4f4; height:30px;" />
            <li><a href="#"> <i class="fa fa-circle" aria-hidden="true" style="color: #398439; margin-top:12px; font-size:10px; margin-right:10px;"></i><img src="images/default.png" style="width:30px; height:30px; margin-right:10px;" />Sajitha Liyanage</a></li>
            <li><a href="#"> <i class="fa fa-circle" aria-hidden="true" style="color: #398439; margin-top:12px; font-size:10px; margin-right:10px;"></i><img src="images/default.png" style="width:30px; height:30px; margin-right:10px;" />Gothami Karunarathne</a></li>
            <li><a href="#"> <i class="fa fa-circle" aria-hidden="true" style="color: #398439; margin-top:12px; font-size:10px; margin-right:10px;"></i><img src="images/default.png" style="width:30px; height:30px; margin-right:10px;" />Nilaksha Deemantha</a></li>
            <li><a href="#"> <i class="fa fa-circle" aria-hidden="true" style="color: #398439; margin-top:12px; font-size:10px; margin-right:10px;"></i><img src="images/default.png" style="width:30px; height:30px; margin-right:10px;" />Madusha Ushan</a></li>
            <li><a href="#"> <i class="fa fa-circle" aria-hidden="true" style="color: #398439; margin-top:12px; font-size:10px; margin-right:10px;"></i><img src="images/default.png" style="width:30px; height:30px; margin-right:10px;" />Dileep Jayasundara</a></li>
            <li><a href="#"> <i class="fa fa-circle" aria-hidden="true" style="color: #398439; margin-top:12px; font-size:10px; margin-right:10px;"></i><img src="images/default.png" style="width:30px; height:30px; margin-right:10px;" />Priyanwada Kulasooriya</a></li>
            <li><a href="#"> <i class="fa fa-circle" aria-hidden="true" style="color: #398439; margin-top:12px; font-size:10px; margin-right:10px;"></i><img src="images/default.png" style="width:30px; height:30px; margin-right:10px;" />Sajitha Liyanage</a></li>
            <li><a href="#"> <i class="fa fa-circle" aria-hidden="true" style="color: #398439; margin-top:12px; font-size:10px; margin-right:10px;"></i><img src="images/default.png" style="width:30px; height:30px; margin-right:10px;" />Sajitha Liyanage</a></li>
            <li><a href="#"> <i class="fa fa-circle" aria-hidden="true" style="color: #398439; margin-top:12px; font-size:10px; margin-right:10px;"></i><img src="images/default.png" style="width:30px; height:30px; margin-right:10px;" />Sajitha Liyanage</a></li>
            <li><a href="#"> <i class="fa fa-circle" aria-hidden="true" style="color: #398439; margin-top:12px; font-size:10px; margin-right:10px;"></i><img src="images/default.png" style="width:30px; height:30px; margin-right:10px;" />Sajitha Liyanage</a></li>
            <li><a href="#"> <i class="fa fa-circle" aria-hidden="true" style="color: #398439; margin-top:12px; font-size:10px; margin-right:10px;"></i><img src="images/default.png" style="width:30px; height:30px; margin-right:10px;" />Sajitha Liyanage</a></li>
            <li><a href="#"> <i class="fa fa-circle" aria-hidden="true" style="color: #398439; margin-top:12px; font-size:10px; margin-right:10px;"></i><img src="images/default.png" style="width:30px; height:30px; margin-right:10px;" />Sajitha Liyanage</a></li>
            <li><a href="#"> <i class="fa fa-circle" aria-hidden="true" style="color: #398439; margin-top:12px; font-size:10px; margin-right:10px;"></i><img src="images/default.png" style="width:30px; height:30px; margin-right:10px;" />Sajitha Liyanage</a></li>
            <li><a href="#"> <i class="fa fa-circle" aria-hidden="true" style="color: #398439; margin-top:12px; font-size:10px; margin-right:10px;"></i><img src="images/default.png" style="width:30px; height:30px; margin-right:10px;" />Sajitha Liyanage</a></li>
            <li><a href="#"> <i class="fa fa-circle" aria-hidden="true" style="color: #398439; margin-top:12px; font-size:10px; margin-right:10px;"></i><img src="images/default.png" style="width:30px; height:30px; margin-right:10px;" />Sajitha Liyanage</a></li>
            <li><a href="#"> <i class="fa fa-circle" aria-hidden="true" style="color: #398439; margin-top:12px; font-size:10px; margin-right:10px;"></i><img src="images/default.png" style="width:30px; height:30px; margin-right:10px;" />Sajitha Liyanage</a></li>
            <li><a href="#"> <i class="fa fa-circle" aria-hidden="true" style="color: #398439; margin-top:12px; font-size:10px; margin-right:10px;"></i><img src="images/default.png" style="width:30px; height:30px; margin-right:10px;" />Sajitha Liyanage</a></li>
            <li><a href="#"> <i class="fa fa-circle" aria-hidden="true" style="color: #398439; margin-top:12px; font-size:10px; margin-right:10px;"></i><img src="images/default.png" style="width:30px; height:30px; margin-right:10px;" />Sajitha Liyanage</a></li>
        </ul>
    </div>

</div>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script language="javascript" type="text/javascript">
    $('#iconified').on('keyup', function() {
        var input = $(this);
        if(input.val().length === 0) {
            input.addClass('empty');
        } else {
            input.removeClass('empty');
        }
    });

    function filter(element) {
        var value = $(element).val().toLowerCase();;

        $("#theList > li").each(function() {
            var listVal = $(this).text().toLowerCase();
            if (listVal.indexOf(value)>= 0) {
                $(this).show();
            }
            else {
                $(this).hide();
            }
        });
    }
</script>
<script src="../../public/js/bootstrap-datepicker.js"></script>
<script type="text/javascript">
    // When the document is ready
    $(document).ready(function () {

        $('#example1').datepicker({
            format: "dd/mm/yyyy"
        });

    });
</script>
</body>
</html>