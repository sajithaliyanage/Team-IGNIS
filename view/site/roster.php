<?php
$var = "roster";
include('../../controller/siteController.php');
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

  <body>

    <?php include ("../layouts/navbar.php")?>

    <div class="container-fluid">
      <div class="row">

        <div class="col-sm-2 col-xs-12 left-menu-div side-bar-display">
            <?php include ("../layouts/leftbar.php")?>
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
									<i class="fa fa-briefcase"></i> Roster System
								</li>
							</ol>
						</div>
					</div>
				</div>
				
			<div class="col-sm-6 col-xs-12">


                <div class="w3-content" style="max-width:800px;position:relative">

                    <h1 class="mySlides" align="middle">TEXT 1</h1>
                    <h1 class="mySlides" align="middle">TEXT 2</h1>
                    <h1 class="mySlides" align="middle">TEXT 3</h1>



                    <a class="w3-btn-floating" style="position:absolute;top:45%;left:0" onclick="plusDivs(-1)">❮</a>
                    <a class="w3-btn-floating" style="position:absolute;top:45%;right:0" onclick="plusDivs(1)">❯</a>

                </div>

                <script>
                    var slideIndex = 1;
                    showDivs(slideIndex);

                    function plusDivs(n) {
                        showDivs(slideIndex += n);
                    }

                    function showDivs(n) {
                        var i;
                        var x = document.getElementsByClassName("mySlides");
                        if (n > x.length) {slideIndex = 1}
                        if (n < 1) {slideIndex = x.length}
                        for (i = 0; i < x.length; i++) {
                            x[i].style.display = "none";
                        }
                        x[slideIndex-1].style.display = "block";
                    }
                </script>
				</div>
				<div class="col-sm-6 col-xs-12">		
					<div class="col-xs-12 nortification-box-top">
                            <h5 class="nortification-box-heading"><i class="fa fa-tag icon-margin-right" aria-hidden="true"></i>
                                Shift Application</h5>
                            <hr>
                            <form role="form" data-toggle="validator" action="" method="post">
                                <div class="department-add">
                                    <div class="col-xs-12">
                                        <!-- Text input-->
										  <div class="form-group">
                                            <label class="col-xs-4 control-label form-lable">Shifting Date :</label>
                                            <div class="col-xs-8">
                                                <input id="service_name" name="job_category" type="text" placeholder="dd/mm/yyyy"
                                                       class="form-control input-md" required>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
										  <div class="form-group">
                                            <label class="col-xs-4 control-label form-lable">Shifting Time :</label>
                                            <div class="col-xs-8">
                                                <input id="service_name" name="job_category" type="text" placeholder=""
                                                       class="form-control input-md" required>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
										<div class="form-group">
                                            <label class="col-xs-4 control-label form-lable">Shifting Group :</label>
                                            <div class="col-xs-8">
                                                <select  name="emp_role" class="form-control">
                                                    <option>-Select-</option>
                                                    <option value="YES">Group A</option>
                                                    <option value="NO">Group B</option>
                                                    <option value="NO">Group C</option>
                                                    <option value="NO">Group D</option>
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
										 <div class="form-group">
                                            <label class="col-xs-4 control-label form-lable">Shifting Member ID :</label>
                                            <div class="col-xs-8">
                                                <input id="service_name" name="job_category" type="text" placeholder=""
                                                       class="form-control input-md" required>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
										<div class="form-group">
                                            <label class="col-xs-4 control-label form-lable">Rework Date :</label>
                                            <div class="col-xs-8">
                                                <input id="service_name" name="job_category" type="text" placeholder="dd/mm/yyyy"
                                                       class="form-control input-md" required>
                                            </div>
                                        <br>
                                        <br>
										<br>

										 <div class="form-group">
                                            <label class="col-xs-4 control-label form-lable">Rework Time :</label>
                                            <div class="col-xs-8">
                                                <input id="service_name" name="job_category" type="text" placeholder=""
                                                       class="form-control input-md" required>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        
										<div class="form-group">
                                            <label class="col-xs-4 control-label form-lable">Reason :</label>
                                            <div class="col-xs-8">
                                                <input id="service_name" name="job_category" type="text" placeholder=""
                                                       class="form-control input-md" required>
                                            </div>
                                        </div>
										
                                     
										<br>
                                        <br>
                                        <br>
                                        <br>



                                        <button class="btn btn-info btn-lg pull-right submit-button" type="submit">Apply Shift</button>
                                    </div>
                                </div>
                            </form>
                    </div>   </div>

         </div>
      </div>

    </div>

    <script src="../../public/js/jquery.js"></script>
    <script src="../../public/js/bootstrap.js"></script>
</body>
</html>