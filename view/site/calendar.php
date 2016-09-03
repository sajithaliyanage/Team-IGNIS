<?php
$var = "calendar";
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
    <link href="../../public/css/fullcalendar.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../public/css/datepicker.css">

</head>

<body style=" background-color: #eceff4 !important;">

<?php include("../layouts/navbar.php") ?>

<div class="container-fluid ">
    <div class="row ">

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
                                <i class="fa fa-calendar"></i> Calendar
                            </li>
                        </ol>
                    </div>
                </div>
            </div>

            <div class="row padding-row2">
                <div class="col-sm-8 col-xs-12  padding-box">

                    <section  class="panels">
                        <div  class="row">
                            <div class="col-xs-12 nortification-box-top">
                                <h5 id="Own" class="nortification-box-heading"><i class="fa fa-calendar-check-o icon-margin-right" aria-hidden="true"></i>
                                    Own Calendar</h5>
                                <hr>

                                <div class="row">
                                    <div class="col-xs-12 padding-box">
                                        <div style="margin-bottom:20px;">
                                            <div id="bootstrapModalFullCalendar"></div>
                                        </div>

                                        <div id="fullCalModal" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                        </div>
                    </section>

                    <section class="panels">
                        <div class="row margin-top">
                            <div class="col-xs-12 nortification-box-top">
                                <h5   id="Company" class="nortification-box-heading"><i class="fa fa-calendar-check-o icon-margin-right" aria-hidden="true"></i>
                                    Company Calendar</h5>
                                <hr>
                                <div class="row">
                                    <div class="col-xs-12 padding-box">
                                        <div style="margin-bottom:20px;">
                                            <div id="bootstrapModalFullCalendar2"></div>
                                        </div>

                                        <div id="fullCalModal2" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
                                                        <h4 id="modalTitle2" class="modal-title"></h4>
                                                    </div>
                                                    <div id="modalBody2" class="modal-body"></div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="panels" >
                        <div class="row margin-top">
                            <div class="col-xs-12 nortification-box-top">
                                <h5  id="Dept" class="nortification-box-heading"><i class="fa fa-calendar-check-o icon-margin-right" aria-hidden="true"></i>
                                    Department Calendar</h5>
                                <hr>

                                <div class="row">
                                    <div class="col-xs-12 padding-box">
                                        <div style="margin-bottom:20px;">
                                            <div id="bootstrapModalFullCalendar3"></div>
                                        </div>

                                        <div id="fullCalModal3" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
                                                        <h4 id="modalTitle3" class="modal-title"></h4>
                                                    </div>
                                                    <div id="modalBody3" class="modal-body"></div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="panels" >
                        <div class="row margin-top">
                            <div class="col-xs-12 nortification-box-top">
                                <h5  id="Add" class="nortification-box-heading"><i class="fa fa-plus icon-margin-right" aria-hidden="true"></i>
                                    Add Events</h5>
                                <hr>

                                <div class="row">
                                    <div class="col-xs-12 padding-box">
                                        <form role="form" data-toggle="validator" action="../../module/addEvent.php" method="post">
                                            <div class="department-add">
                                                <div class="col-xs-12">
                                                    <!-- Text input-->
                                                    <div class="form-group">
                                                        <label class="col-xs-4 control-label form-lable">Select Calendar:</label>
                                                        <div class="col-xs-8">
                                                            <select name="calendar" class="form-control">
                                                                <option value="own">Own Calendar</option>
                                                                <option style="<?php if($empRole != 'manager'){echo 'display:none;';}?>" value="department">Department Calendar</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <br>

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
                                                            <input id="example1" name="start_date" type="text"
                                                                   placeholder="yyyy-mm-dd"
                                                                   class="form-control input-md" required>

                                                        </div>
                                                    </div>
                                                    <br>
                                                    <br>

                                                    <div class="form-group">
                                                        <label class="col-xs-4 control-label form-lable">End Date:</label>

                                                        <div class="col-xs-8">
                                                            <input id="example2" name="end_date" type="text"
                                                                   placeholder="yyyy-mm-dd"
                                                                   class="form-control input-md" required>

                                                        </div>
                                                    </div>
                                                    <br>
                                                    <br>

                                                    <div class="form-group">
                                                        <label class="col-xs-4 control-label form-lable">Description:</label>
                                                        <div class="col-xs-8">
                                                            <textarea class="form-control" name="description" rows="2"></textarea>
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
                    </section>

                </div>

                <div class="col-sm-3 col-xs-12 padding-box col-xs-push-9" style="position:fixed; margin-left:-2%;z-index:0 !important;">
                    <div class="row">
                        <div class="col-xs-12 nortification-box-top">
                            <h5 class="nortification-box-heading"><i class="fa fa-tag icon-margin-right" aria-hidden="true"></i>
                                Main Calendars</h5>
                            <hr>

                            <div class="list-group">
                                <a href="#Own" class="list-group-item active">Own Calendar</a>
                                <a href="#Company" class="list-group-item">Company Calendar</a>
                                <a href="#Dept" class="list-group-item">Department Calendar</a>
                                <a href="#Add" class="list-group-item">Add Events</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

</div>

<script src="../../public/js/jquery.js"></script>
<script src="../../public/js/moment.min.js"></script>
<script src="../../public/js/bootstrap.js"></script>
<script src="../../public/js/fullcalendar.min.js"></script>
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

    $(function() {
        $('a[href*="#"]:not([href="#"])').click(function() {
            if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
                if (target.length) {
                    $('html, body').animate({
                        scrollTop: target.offset().top -80
                    }, 1000);
                    return false;
                }
            }
        });
    });

    $(document).ready(function () {
        $(document).on("scroll", onScroll);

        //smoothscroll
        $('a[href^="#"]').on('click', function (e) {
            e.preventDefault();
            $(document).off("scroll");

            $('a').each(function () {
                $(this).removeClass('active');
            })
            $(this).addClass('active');

        });
    });

    function onScroll(event){
        var scrollPos = $(document).scrollTop();
        $('#menu-center a').each(function () {
            var currLink = $(this);
            var refElement = $(currLink.attr("href"));
            if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
                $('#menu-center ul li a').removeClass("active");
                currLink.addClass("active");
            }
            else{
                currLink.removeClass("active");
            }
        });
    }
</script>
<?php
    $smts = "SELECT * FROM employee WHERE comp_id=:log2";
    $querys = $pdo->prepare($smts);
    $querys ->execute(array('log2'=>$empID));
    $results = $querys->fetch();
    $deptID = $results['dept_id'];

    $smt = "SELECT * FROM calendar JOIN employee ON employee.comp_id=calendar.comp_id WHERE calendar.dept_id =:log AND calendar.comp_id=:log2";
    $query = $pdo->prepare($smt);
    $query ->execute(array('log'=>'#','log2'=>$empID));
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
<?php
    $smt2 = "SELECT * FROM calendar JOIN employee ON employee.comp_id=calendar.comp_id WHERE calendar.dept_id =:log2";
    $query2 = $pdo->prepare($smt2);
    $query2 ->execute(array('log2'=>'0'));
    $result2 = $query2->fetchAll();
?>
<script>
    $(document).ready(function() {
        $('#bootstrapModalFullCalendar2').fullCalendar({
            header: {
                left: '',
                center: 'prev title next',
                right: ''
            },
            eventClick:  function(event, jsEvent, view) {
                $('#modalTitle2').html(event.title);
                $('#modalBody2').html(event.description);
                $('#fullCalModal2').modal();
                return false;
            },
            events:
                [
                    <?php
                        foreach($result2 as $rs){
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

<?php
$smt = "SELECT * FROM calendar JOIN employee ON employee.comp_id=calendar.comp_id WHERE calendar.dept_id =:log2";
$query = $pdo->prepare($smt);
$query ->execute(array('log2'=>$deptID));
$result = $query->fetchAll();
?>
<script>
    $(document).ready(function() {
        $('#bootstrapModalFullCalendar3').fullCalendar({
            header: {
                left: '',
                center: 'prev title next',
                right: ''
            },
            eventClick:  function(event, jsEvent, view) {
                $('#modalTitle3').html(event.title);
                $('#modalBody3').html(event.description);
                $('#fullCalModal3').modal();
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