<?php
$var = "index";
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
    <link href="css/calender.css" rel="stylesheet">

  </head>

  <body style=" background-color: #eceff4 !important;">

    <?php include ("navbar.php")?>

    <div class="container-fluid ">
      <div class="row ">

        <div class="col-sm-2 col-xs-12 left-menu-div side-bar-display">
            <?php include ("leftbar.php")?>
        </div>

        <div class="col-sm-10 col-xs-12 admin-background col-sm-push-2" style="position: relative;">
            <div class="row padding-row">
                <div class="row">
                    <div class="col-lg-12">
                        <ol class="breadcrumb breadcrumb-style">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Admin Panel</a>
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
                                More Info <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
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
                                More Info <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
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
                                More Info <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
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
                                More Info <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
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

                                <div id="myId" class="jalendar mid img-responsive" style="width: 95% !important;">
                                        <div class="added-event" data-date="19/5/2016" data-time="20:45" data-title="Tarkan İstanbul Concert on Harbiye Açık Hava Tiyatrosu"></div>
                                        <div class="added-event" data-date="17/5/2016" data-time="21:00" data-title="CodeCanyon İstanbul Meeting on Starbucks, Kadıköy"></div>
                                        <div class="added-event" data-date="1/5/2016" data-time="22:00" data-title="Front-End Design and Javascript Conferance on Haliç Kongre Merkezi"></div>
                                        <div class="added-event" data-date="17/5/2016" data-time="22:00" data-title="Lorem ipsum dolor sit amet"></div>
                                        <div class="added-event" data-date="21/5/2016" data-time="22:00" data-title="Lorem ipsum dolor sit amet"></div>
                                        <div class="added-event" data-date="21/6/2016" data-time="22:00" data-title="Lorem ipsum dolor sit amet"></div>
                                        <div class="added-event" data-date="3/6/2016" data-time="22:00" data-title="Lorem ipsum dolor sit amet"></div>

                                </div>

                            </div>
                        </div>
                    </div>

<!--                <div class="col-xs-12 col-sm-5 padding-box">-->
<!--                    <div class="row">-->
<!--                        <div class="col-xs-12 nortification-box-top">-->
<!--                            <h5 class="nortification-box-heading"><i class="fa fa-cogs icon-margin-right" aria-hidden="true"></i>-->
<!--                                Nortifications</h5>-->
<!--                            <div class="list-group">-->
<!--                                <a href="#" class="list-group-item">-->
<!--                                    Cras justo odio-->
<!--                                </a>-->
<!--                                <a href="#" class="list-group-item">Dapibus ac facilisis in</a>-->
<!--                                <a href="#" class="list-group-item">Morbi leo risus</a>-->
<!--                                <a href="#" class="list-group-item">Porta ac consectetur ac</a>-->
<!--                                <a href="#" class="list-group-item">Vestibulum at eros</a>-->
<!--                                <a href="#" class="list-group-item">Vestibulum at eros</a>-->
<!--                                <a href="#" class="list-group-item">Vestibulum at eros</a>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->

            </div>
         </div>
      </div>

    </div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/jalendar.js"></script>
    <script src="js/calendar.js"></script>
</body>
</html>