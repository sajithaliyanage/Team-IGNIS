<?php
$var="approve";
include('../../controller/siteController.php');

if(!$isLoggedin || $empRole=='director' || $empRole=='employee'){
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
    <link href="../../public/css/calender.css" rel="stylesheet">

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
                                <i class="fa fa-building" ></i> Leave Status
                            </li>
                        </ol>
                    </div>
                </div>
            </div>

            <div class="row padding-row">
                <div class="col-sm-7 col-xs-12 padding-box">
                    <div class="row">
                        <div class="col-xs-12 nortification-box-top">
                            <h5 class="nortification-box-heading"><i class="fa fa-calendar-check-o icon-margin-right" aria-hidden="true"></i>
                                leaves pending for approval or rejection</h5>

                            <hr>

                            
                            <div class="right">
                                <ul class="pager ">
                                    <li class="previous btn-sm"><a href="#"">Previous</a></li>
                                    <li class="next btn-sm"><a href="#">Next</a></li>
                                </ul>
                            </div>

                            <div class="list-group">
                                <li class="list-group-item" style="background-color:#ccd7f8 "><h5 >Leave applied by :Dileep Jayasundara</h5></li>
                            </div>

                            <div class="list-group">

                                <li class="list-group-item">Duration : 2016/08/12 to 2016/08/13</li>
                                <li class="list-group-item">Reason :personal issue</li>
                                <li class="list-group-item">special note :<input type="text" name="" >
                                    <button class="btn btn-success btn-sm"><?php if($empRole=='manager'){echo "Approve";}else{ echo "Recommend";}?></button> <button class="btn btn-danger btn-sm">Reject</button><button type="button" class="btn btn-link btn-xs">cancel Leave</button></li>



                            </div>
                            
                        </div>
                    </div>
                    <div class="row margin-top">
                        <div class="col-xs-12 nortification-box-top">
                            <h5 class="nortification-box-heading"><i class="fa fa-list icon-margin-right"
                                                                     aria-hidden="true"></i>
                                Past Leave Notifications</h5>
                            <hr>
                            <div class="list-group">
                                <a href="#" class="list-group-item">20/05/2016<span style="float:right;"> Approved <i
                                            class="fa fa-check" aria-hidden="true"></i></span></a>
                                <a href="#" class="list-group-item">18/05/2016<span style="float:right;"> Approved <i
                                            class="fa fa-check" aria-hidden="true"></i></span></a>
                                <a href="#" class="list-group-item">16/03/2016<span style="float:right;"> Approved <i
                                            class="fa fa-check" aria-hidden="true"></i></span></a>
                                <a href="#" class="list-group-item">02/01/2016<span style="float:right;"> Approved <i
                                            class="fa fa-check" aria-hidden="true"></i></span></a>
                                <a href="#" class="list-group-item">07/11/2015<span style="float:right;"> Rejected <i
                                            class="fa fa-close" aria-hidden="true"></i></span></a>
                                <a href="#" class="list-group-item">27/05/2015<span style="float:right;"> Approved <i
                                            class="fa fa-check" aria-hidden="true"></i></span></a>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-sm-5 col-xs-12 padding-box">
                    <div class="row">
                        <div class="col-xs-12 nortification-box-top">
                            <h5 class="nortification-box-heading"><i class="fa fa-angle-double-right " aria-hidden="true"></i>
                                 Leave requests on same time</h5>
                            <hr>
                            <div class="list-group-item-heading">
                                <a href="#" class="list-group-item"><i class="fa fa-user" aria-hidden="true"></i> Employee Name  <span style="float:right;"> Date <i class="fa fa-clock-o fa-lg" aria-hidden="true"></i></span></a>
                            </div>

                            <div class="list-group">
                                <a href="#" class="list-group-item">Sajitha Liyanage<span style="float:right;"> 2016/08/01 </span></a>
                                <a href="#" class="list-group-item">Priyanwada Kulasuriya<span style="float:right;"> 2016/08/01 </span></a>
                                <a href="#" class="list-group-item">Gothami Gunarathne<span style="float:right;"> 2016/08/01 </span></a>
                                <a href="#" class="list-group-item">Madusha Ushan<span style="float:right;"> 2016/08/01 </span></a>


                            </div>
                            
                        </div>
                    </div>

                    <div class="row margin-top">
                        <div class="col-xs-12 nortification-box-top">
                            <h5 class="nortification-box-heading"><i class="fa fa-calendar icon-margin-right" aria-hidden="true"></i>
                                Profile Calendar</h5>
                            <div id="myId" class="jalendar mid img-responsive" style="width: 95% !important;">
                                <div class="added-event" data-date="19/5/2016" data-time="20:45"
                                     data-title="Tarkan İstanbul Concert on Harbiye Açık Hava Tiyatrosu"></div>
                                <div class="added-event" data-date="17/5/2016" data-time="21:00"
                                     data-title="CodeCanyon İstanbul Meeting on Starbucks, Kadıköy"></div>
                                <div class="added-event" data-date="1/5/2016" data-time="22:00"
                                     data-title="Front-End Design and Javascript Conferance on Haliç Kongre Merkezi"></div>
                                <div class="added-event" data-date="17/5/2016" data-time="22:00"
                                     data-title="Lorem ipsum dolor sit amet"></div>
                                <div class="added-event" data-date="21/5/2016" data-time="22:00"
                                     data-title="Lorem ipsum dolor sit amet"></div>
                                <div class="added-event" data-date="21/6/2016" data-time="22:00"
                                     data-title="Lorem ipsum dolor sit amet"></div>
                                <div class="added-event" data-date="3/6/2016" data-time="22:00"
                                     data-title="Lorem ipsum dolor sit amet"></div>

                            </div>


                        </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>




<script src="../../public/js/jquery.js"></script>
<script src="../../public/js/bootstrap.js"></script>
<script src="../../public/js/jalendar.js"></script>
<script src="../../public/js/calendar.js"></script>
</body>
</html>