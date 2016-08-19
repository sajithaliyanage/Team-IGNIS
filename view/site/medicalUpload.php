<?php
$var = "medical";
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
                                <i class="fa fa-briefcase"></i> Upload Medical Reports
                            </li>
                        </ol>
                    </div>
                </div>
            </div>

            <div class="row padding-row">
                <div class="col-sm-8 col-xs-12 padding-box">
                    <div class="row">
                        <div class="col-xs-12 nortification-box-top">
                            <h5 class="nortification-box-heading"><i class="fa fa-upload icon-margin-right" aria-hidden="true"></i>
                                Upload Medical Center</h5>
                            <hr>
                            <div class="row">
                                <div class="col-xs-10 col-xs-offset-1">
                                    <form action="../../module/medicalUpload.php" method="POST"  enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label class="col-xs-4 control-label form-lable">Select Absent Date:</label>

                                            <div class="col-xs-8">
                                                <select name="apply_leave_id" class="form-control">
                                                    <?php
                                                        $sql = "SELECT * FROM apply_leave WHERE comp_id=:empId AND status=:log AND medical_status=:state";
                                                        $query = $pdo->prepare($sql);
                                                        $query->execute(array('empId'=>$empID,'log'=>"approved",'state'=>"no"));
                                                        $result = $query->fetchAll();
                                                        $rowCount = $query->rowCount();

                                                        if($rowCount==0){
                                                            echo " <option value=''>Results empty</option>";
                                                        }

                                                        foreach($result as $rs){
                                                            echo " <option value='".$rs['apply_leave_id']."'>".$rs['number_of_days']." Day - ".$rs['start_date']." to ".$rs['end_date']."</option>";
                                                        }

                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="upload-box">
                                            <center>
                                                <i class="fa fa-upload fa-5x uplaod-icon-box" aria-hidden="true"></i>
                                                <h3>Drop Your Medical Here</h3>
                                                <h5>or</h5>
                                                <label for="fileToUpload" class="btn btn-info btn-lg submit-button" >
                                                    Browse From Computer
                                                </label>
                                                <input type="file" name="fileToUpload" id="fileToUpload" onchange="readURL(this)" />

                                                <p>(PDF or image files only allowed - Max Size 3MB)</p>
                                            </center>

                                            <div id="myProgress" style="margin-top:20px;">
                                                <div id="myBar">
                                                    <div id="label">0%</div>
                                                </div>
                                            </div>

                                        </div>
                                        <button class="btn btn-info btn-lg pull-right submit-button" type="submit">Submit Medical</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 col-xs-12 padding-box">
                    <div class="row">
                        <div class="col-xs-12 nortification-box-top">
                            <h5 class="nortification-box-heading"><i class="fa fa-cogs icon-margin-right" aria-hidden="true"></i>
                                Previous Uploads</h5>
                            <hr>
                            <div class="list-group">
                                <a href="#" class="list-group-item">Medical - 10/05/2016 <span style="float:right;"> Pending <i class="fa fa-question" aria-hidden="true"></i></span></a>
                                <a href="#" class="list-group-item">Medical - 10/03/2016<span style="float:right;"> Pending  <i class="fa fa-question" aria-hidden="true"></i></span></a>
                                <a href="#" class="list-group-item">Medical - 11/07/2016<span style="float:right;"> Approved <i class="fa fa-check" aria-hidden="true"></i></span></a>
                                <a href="#" class="list-group-item">Medical - 10/02/2016<span style="float:right;"> Rejected <i class="fa fa-close" aria-hidden="true"></i></span></a>
                            </div>
                        </div>
                    </div>

                    <div class="row margin-top">
                        <div class="col-xs-12 nortification-box-top">
                            <h5 class="nortification-box-heading"><i class="fa fa-calendar icon-margin-right" aria-hidden="true"></i>
                                Dates of Absent</h5>
                            <hr>
                            <div class="list-group">
                                <a href="#" class="list-group-item">10/05/2016 <span style="float:right;">Monday </span></a>
                                <a href="#" class="list-group-item">15/05/2016<span style="float:right;"> Friday</span></a>
                                <a href="#" class="list-group-item">19/05/2016<span style="float:right;"> Tuesday</span></a>
                                <a href="#" class="list-group-item">30/05/2016<span style="float:right;"> Monday</span></a>
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
<script>
    $('#fileToUpload').click(function() {
        $('#myProgress').css({
            'display': 'block'
        });
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(600)
                    .height(500);
            };

            reader.readAsDataURL(input.files[0]);
            move()
        }
    }
    function move() {
        var elem = document.getElementById("myBar");
        var width = 10;
        var id = setInterval(frame, 10);

        function frame() {
            if (width >= 100) {
                clearInterval(id);
            } else {
                width++;
                elem.style.width = width + '%';
                document.getElementById("label").innerHTML = width * 1 + '%';
            }
        }
    }

</script>
</body>
</html>