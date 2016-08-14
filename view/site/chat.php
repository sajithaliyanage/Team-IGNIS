<?php
$var = "chat";
include('../../controller/siteController.php');
include('../../config/connect.php');
$pdo = connect();

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

    <script src="../../public/js/bootstrap.js"></script>
    <script src="../../public/js/bootstrap-datepicker.js"></script>
    <script src="../../public/js/myProfile.js"></script>

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
                                <i class="fa fa-dashboard"></i> <a href="../../index.php">Take Your Leave</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-envelope"></i> Chat Box
                            </li>
                        </ol>
                    </div>
                </div>
            </div>

            <div class="row padding-row">
                <div class="col-xs-12 col-sm-8 padding-box">
                    <div class="row">
                        <div class="col-xs-12 nortification-box-top">
                            <h5 class="nortification-box-heading">
                                <i class="fa fa-connectdevelop icon-margin-right" aria-hidden="true"></i>Conversation with - Sajitha Liyanage</h5>
                            <hr>
                            <div class="panel-body" style="height:57.5vh;">
                                <ul class="chat">
                                    <li class="left clearfix"><span class="chat-img pull-left">
                                    <img src="../admin/images/default.png" style="max-height:50px; max-width:60px;" alt="User Avatar"
                                         class="img-circle"/>
                                        </span>

                                        <div class="chat-body clearfix" style="padding-right:30%;">
                                            <div class="header">
                                                <strong class="primary-font">Jack Sparrow</strong>
                                                <small class="pull-right text-muted">
                                                    <span class="glyphicon glyphicon-time"></span>12 mins ago
                                                </small>
                                            </div>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum
                                                ornare
                                                dolor, quis ullamcorper ligula sodales.
                                            </p>
                                        </div>
                                    </li>
                                    <li class="right clearfix">
                                        <span class="chat-img pull-right">
                                            <img src="../admin/images/default.png" style="max-height:50px; max-width:60px;" alt="User Avatar"
                                                 class="img-circle"/>
                                        </span>

                                        <div class="chat-body clearfix" style="padding-left:30%; ">
                                            <div class="header">
                                                <small class=" text-muted"><span class="glyphicon glyphicon-time"></span>13
                                                    mins ago
                                                </small>
                                                <strong class="pull-right primary-font">Sajitha Liyanage</strong>
                                            </div>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum
                                                ornare
                                                dolor, quis ullamcorper ligula sodales.
                                            </p>
                                        </div>
                                    </li>
                                    <li class="left clearfix"><span class="chat-img pull-left">
                                    <img src="../admin/images/default.png" style="max-height:50px; max-width:60px;" alt="User Avatar"
                                         class="img-circle"/>
                                </span>

                                        <div class="chat-body clearfix" style="padding-right:30%;">
                                            <div class="header">
                                                <strong class="primary-font">Jack Sparrow</strong>
                                                <small class="pull-right text-muted">
                                                    <span class="glyphicon glyphicon-time"></span>14 mins ago
                                                </small>
                                            </div>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum
                                                ornare
                                                dolor, quis ullamcorper ligula sodales.
                                            </p>
                                        </div>
                                    </li>
                                    <li class="right clearfix"><span class="chat-img pull-right">
                                    <img src="../admin/images/default.png" style="max-height:50px; max-width:60px;" alt="User Avatar"
                                         class="img-circle"/>
                                </span>

                                        <div class="chat-body clearfix" style="padding-left:30%;">
                                            <div class="header">
                                                <small class=" text-muted"><span class="glyphicon glyphicon-time"></span>15
                                                    mins ago
                                                </small>
                                                <strong class="pull-right primary-font">Sajitha Liyanage</strong>
                                            </div>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum
                                                ornare
                                                dolor, quis ullamcorper ligula sodales.
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="panel-footer" style="">
                                <div class="input-group">
                                    <input id="btn-input" type="text" class="form-control input-sm"
                                           placeholder="Type your message here..."/>
                                <span class="input-group-btn">
                                    <button class="btn btn-warning btn-sm" id="btn-chat" style="background-color:#2c3b42; border:1px solid #2c3b42;width:100px;">
                                        Send
                                    </button>
                                </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-4 padding-box">
                    <div class="row">
                        <div class="col-xs-12 nortification-box-top" style="">
                            <input id="iconified" class="form-control empty" type="text"
                                   placeholder="&#xF002; Search person to chat" onkeyup="filter(this,'theList')"
                                   style="margin-top:12px; width:100%; background-color:#f4f4f4; height:30px; margin-bottom:-7px;"/>

                            <hr>
                            <div class="row" style="height:65vh; overflow: scroll; overflow-x: hidden;">
                                <ul id="theList" class="list-group">
                                    <?php
                                    $sql = "SELECT * FROM employee";
                                    $query = $pdo->prepare($sql);
                                    $query->execute();
                                    $result = $query->fetchAll();

                                    foreach ($result as $rs) {
                                        echo "
                                            <li class=\"list-group-item\"  style=\"border-left: hidden; border-right:hidden;\"><a href=\"#\"><img src=\"../admin/images/default.png\" style=\"width:30px; height:30px; margin-right:10px;\" />" . $rs['name'] . "</a></li>";
                                    }
                                    ?>
                                </ul>
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
<script type="text/javascript">
    $('#iconified').on('keyup', function () {
        var input = $(this);
        if (input.val().length === 0) {
            input.addClass('empty');
        } else {
            input.removeClass('empty');
        }
    });

    function filter(element) {
        var value = $(element).val().toLowerCase();
        ;

        $("#theList > li").each(function () {
            var listVal = $(this).text().toLowerCase();
            if (listVal.indexOf(value) >= 0) {
                $(this).show();
            }
            else {
                $(this).hide();
            }
        });
    }
</script>
</body>
</html>