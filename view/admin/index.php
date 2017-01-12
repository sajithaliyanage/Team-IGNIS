<?php
$var = "index";
include('../../controller/siteController.php');
include('../../config/connect.php');
$pdo = connect();

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
    <link href="css/fullcalendar.min.css" rel="stylesheet">
    <link href="../../public/css/datepicker.css" rel="stylesheet">
    <link href="../../public/css/jquery-ui.css" rel="stylesheet">

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
                                    <?php
                                        $sql="SELECT * FROM department WHERE currentStatus=:log and roster_status=:state";
                                        $query = $pdo->prepare($sql);
                                        $query->execute(array('log'=>"approved",'state'=>"NO"));
                                        $numrow = $query->rowCount();
                                        $numrows = intval($numrow);
                                    ?>
                                    <h2 class="box-count"><?php if($numrows<10){echo "0".$numrow;}else{echo $numrow;}?></h2>

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
                                    <?php
                                        $sql="SELECT * FROM manager";
                                        $query = $pdo->prepare($sql);
                                        $query->execute();
                                        $numrow = $query->rowCount();
                                        $numrows = intval($numrow);
                                    ?>
                                    <h2 class="box-count"><?php if($numrows<10){echo "0".$numrow;}else{echo $numrow;}?></h2>

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
                                <a href="managers.php" style="color:#FFFFFF;">More Info <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-12 padding-box">
                    <div class="row">
                        <div class="col-xs-12 main-box-3-1">
                            <div class="row">
                                <div class="col-xs-8">
                                    <?php
                                        $sql="SELECT * FROM employee";
                                        $query = $pdo->prepare($sql);
                                        $query->execute();
                                        $numrow = $query->rowCount();
                                        $numrows = intval($numrow);
                                    ?>
                                    <h2 class="box-count"><?php if($numrows<10){echo "0".$numrow;}else{echo $numrow;}?></h2>

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
                                    <?php
                                    $sql="SELECT * FROM department WHERE currentStatus=:log and roster_status=:state";
                                    $query = $pdo->prepare($sql);
                                    $query->execute(array('log'=>"approved",'state'=>"YES"));
                                    $numrow = $query->rowCount();
                                    $numrows = intval($numrow);
                                    ?>
                                    <h2 class="box-count"><?php if($numrows<10){echo "0".$numrow;}else{echo $numrow;}?></h2>

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
                                <div class="alert-user" style="<?php if(!isset($_GET['event'])){echo 'display:none;';}?>">Event added successfully!</div>
                                <hr>

                            <div style="margin-bottom:20px;">
                                <div id="bootstrapModalFullCalendar"></div>
                            </div>

                            <div id="fullCalModal" class="modal fade">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
                                            <h4 id="modalTitle" class="modal-title"></h4>
                                        </div>
                                        <div id="modalBody" class="modal-body"></div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
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
                                                <label class="col-xs-4 control-label form-lable">Event Title:</label>
                                                <div class="col-xs-8">
                                                    <input id="service_name" name="title" type="text" placeholder=""
                                                           class="form-control input-md" required>
                                                </div>
                                            </div>
                                            <br>
                                            <br>

                                            <div class="form-group">
                                                <label class="col-xs-4 control-label form-lable">Start Date:</label>

                                                <div class="col-xs-8">
                                                    <input id="startdate" name="start_date" type="text"
                                                           placeholder="yyyy-mm-dd"
                                                           class="form-control input-md" required>

                                                </div>
                                            </div>
                                            <br>
                                            <br>

                                            <div class="form-group">
                                                <label class="col-xs-4 control-label form-lable">End Date:</label>

                                                <div class="col-xs-8">
                                                    <input id="enddate" name="end_date" type="text"
                                                           placeholder="yyyy-mm-dd"
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
                <br>
                <br>
                <br>
                <br>
                <div class="col-xs-12 col-sm-5 padding-box">
                    <div class="row">
                        <div class="col-xs-12 nortification-box-top">
                            <h5 class="nortification-box-heading"><i class="fa fa-pencil icon-margin-right"aria-hidden="true"></i>
                                Sync Attendance</h5>
                            <hr>
                            <div class="list-group">
                                <form role="form"  action="../../module/excelRead.php" >
                                        <p>Update today attendance to the database</p>


                                    <button class="btn btn-info btn-lg center-block submit-button" type="submit" style="margin-top:20px;">Sync</button>
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

<?php
    include('../layouts/onlineStatus.php');
?>

</div>

<script src="js/jquery.js"></script>
<script src="js/moment.min.js"></script>
<script src="js/fullcalendar.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="../../public/js/jquery-ui.js"></script>

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




<script type="text/javascript">
    // When the document is ready
    $(document).ready(function () {


        $('#startdate').datepicker({
            dateFormat: "yy/mm/dd",
            minDate: +0
        });
        $('#enddate').datepicker({
            minDate: +0,
            dateFormat: "yy/mm/dd"
        });


    });
</script>

<?php
    $smt = "SELECT * FROM calendar JOIN employee ON employee.comp_id=calendar.comp_id WHERE calendar.dept_id=:log";
    $query = $pdo->prepare($smt);
    $query->execute(array('log' => '0'));
    $result = $query->fetchAll();
?>

<script>
    $(document).ready(function() {
        $('#bootstrapModalFullCalendar').fullCalendar({
            header: {
                left: '',
                center: 'prev title next',
                right: ''
            },
            eventClick:  function(event, jsEvent, view) {
                $('#modalTitle').html(event.title);
                $('#modalBody').html(event.description);
                $('#fullCalModal').modal();
                return false;
            },
            events:
                [
                    <?php
                        foreach($result as $rs){
                            echo "{
                                    \"title\":\" ".$rs['title']." \",
                                    \"description\":\"<p>".$rs['description']."</p><p>Date -".$rs['start_date']."</p><br/><p>Posted by : <strong>".$rs['name']."</strong></p>\",
                                    \"start\":\" ".$rs['start_date']." \",
                                    \"end\":\" ".$rs['end_date']." \",
                                    \"color\": \" ".$rs['event_color']." \",
                                    \"textColor\": \"#ffffff\",
                                    \"url\" : \"#\"
                                 },";
                         }
                    ?>

                ]
        });
    });
</script>


</body>
</html>