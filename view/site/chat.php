<?php
$var = "chat";
include('../../controller/siteController.php');
include('../../config/connect.php');
$pdo = connect();

$employerID='';
if(isset($_GET['id'])){
    $employerID = $_GET['id'];
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
                                <?php
                                    $eName='';
                                    if($employerID!=null){
                                        $sql = "SELECT name FROM employee WHERE comp_id=:empID";
                                        $query = $pdo->prepare($sql);
                                        $query->execute(array('empID'=>$employerID));
                                        $result = $query->fetch();
                                        $eName = $result['name'];
                                    }

                                ?>
                                <i class="fa fa-connectdevelop icon-margin-right" aria-hidden="true"></i>Conversation with - <?php if($eName!=null){echo $eName;}else{ echo "Select Employee";}?></h5>
                            <hr>
                            <div id="chat-scroll" class="panel-body" style="height:57.5vh;">
                                <?php
                                if(!isset($_GET['id'])){
                                    echo "<h2 style='text-align: center; margin-top:18%; color:#d4d4d4;'>Select an employee for start a<br/>conversation</h2>";
                                }
                                ?>
                                <ul class="chat" id="chat_id">

                                </ul>
                            </div>
                            <div class="panel-footer" style="">
                                <div class="input-group">
                                    <input id="btn-input" type="text" class="form-control input-sm" placeholder="Type your message here..."/>
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
                                            <li onchange='showUser(this.value)' class=\"list-group-item\"  style=\"border-left: hidden; border-right:hidden;\"><a href='?id=".$rs['comp_id']."'><img src='../"; if($rs['image'] != 'null'){echo $rs['image'];}else{ echo '../public/images/default.png';} echo"' style=\"width:30px; height:30px; margin-right:10px;\" />" . $rs['name'] . "</a></li>";
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
    <?php
        include('../layouts/onlineStatus.php');
    ?>

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

<script  type="text/javascript">
//    window.setInterval(function() {
//        var elem = document.getElementById('chat-scroll');
//        elem.scrollTop = elem.scrollHeight;
//    }, 100);


    function getParameterByName(name, url) {
        if (!url) url = window.location.href;
        name = name.replace(/[\[\]]/g, "\\$&");
        var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
            results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, " "));
    }

    var recId = getParameterByName('id');

    $(document).ready(function(){
        $('#btn-chat').click(function(){
            $.post("../../module/insertChatDatabase.php",
                {
                    receiverID:recId,
                    message:document.getElementById('btn-input').value
                },
                function(data,status){
                    console.log(status);
                    console.log(data);
                });
            document.getElementById('btn-input').value = "";
        });
    });


    function auto_load(){
        $.post("../../module/refresh.php",
            {
                receiverID:recId
            },
            function(data,status){
                var obj = JSON.parse(data);
                document.getElementById("chat_id").innerHTML = "";
                var x=0;
                for(x=0;x<obj.length;x++){
                    if(recId==obj[x].sender_id){
                        document.getElementById("chat_id").innerHTML +="<li class='left clearfix'>";
                        document.getElementById("chat_id").innerHTML +="<span class='chat-img pull-left'>";
                        document.getElementById("chat_id").innerHTML +="<img src='../admin/images/default.png' style='max-height:50px; max-width:60px; float:left; margin-bottom:-120px;' class='img-circle'/>";
                        document.getElementById("chat_id").innerHTML += "</span>";
                        document.getElementById("chat_id").innerHTML +="<div class='chat-body clearfix' style=''>";
                        document.getElementById("chat_id").innerHTML +="<div class='header'>";
                        document.getElementById("chat_id").innerHTML +="<strong class='primary-font' style=' margin-left:150px;'>"+'<?php if($eName!=null){echo $eName;}?>'+"</strong>";
                        document.getElementById("chat_id").innerHTML +="<small class='text-muted' style='margin-top:-30px !important;'><span style='margin-left: 30%;'>"+obj[x].send_date+"</span></small>";
                        document.getElementById("chat_id").innerHTML +="</div>";
                        document.getElementById("chat_id").innerHTML +="<p style='margin-right: 30%; margin-left:60px; margin-top:20px;'>"+obj[x].message+"</p>";
                        document.getElementById("chat_id").innerHTML +="</div>";
                        document.getElementById("chat_id").innerHTML +="</li>";
                    }else{
                        document.getElementById("chat_id").innerHTML +="<li class='right clearfix'>";
                        document.getElementById("chat_id").innerHTML +="<span class='chat-img pull-right'>";
                        document.getElementById("chat_id").innerHTML +="<img src='../admin/images/default.png' style='max-height:50px; max-width:60px; float:right; margin-bottom:-120px;' class='img-circle'/>";
                        document.getElementById("chat_id").innerHTML += "</span>";
                        document.getElementById("chat_id").innerHTML +="<div class='chat-body clearfix' style=''>";
                        document.getElementById("chat_id").innerHTML +="<div class='header'>";
                        document.getElementById("chat_id").innerHTML +="<small class='text-muted' style='margin-top:-30px !important;'><span style='margin-left: 30%;'>"+obj[x].send_date+"</span></small>";
                        document.getElementById("chat_id").innerHTML +="<strong class='pull-right primary-font' style=' margin-right:150px;'>"+'<?php echo $empName; ?>'+"</strong>";
                        document.getElementById("chat_id").innerHTML +="</div>";
                        document.getElementById("chat_id").innerHTML +="<p style='margin-left: 30%; margin-right:60px; margin-top:20px;'>"+obj[x].message+"</p>";
                        document.getElementById("chat_id").innerHTML +="</div>";
                        document.getElementById("chat_id").innerHTML +="</li>";
                    }

                }

                console.log(status);
                console.log(data);
            })
    }

    $(document).ready(function(){

        setInterval(auto_load,1000);

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