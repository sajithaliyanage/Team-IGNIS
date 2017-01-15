<?php
include('../../config/connect.php');
$pdo = connect();

$encode = $_GET['id'];
$email = $_GET['email'];

$sql = "SELECT comp_id,password FROM employee WHERE email=:log";
$query = $pdo->prepare($sql);
$query->execute(array('log'=>$email));
$result = $query->fetch();
$decode = md5($result['password']);

if ($encode != $decode) {
    header("Location:../../index.php");
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
        <link rel="stylesheet" href="../../public/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../public/css/font-awesome.min.css">
        <link rel="stylesheet" href="../../public/css/login-file.css">
    </head>

    <body>

        <div class="top-content" style="margin-bottom:-50px !important;">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text" style="margin-top:-60px;">
                            <center>
                                <a href="../../index.php"><img src="../../public/images/new-logo.png" style="height:50px; width:50px;" class="img-responsive" /></a>
                            </center>

                            <h1>Take Your Leave | Online LMS</h1>
                            <div class="description">
                            	<p>
                                    Take Your Leave is online leave management system for all kind of companies and include lots of facilities and services
                            	</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">

                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>Reset Your Password</h3>
                            		<p>Enter your new password:</p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-lock"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
			                    <form role="form" action="resetPassword.php?email=<?php echo $email;?>" method="post" class="login-form">
			                    	<div class="form-group">
                                        <label class="sr-only">Password</label>
                                        <input id="new_pswd" type="password" name="new_pswd" placeholder="New Password" class="form-username form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only">Password</label>
                                        <input id="con_pswd" type="password" name="con_pswd" placeholder="Confirm New Password" onChange="return pass()" class="form-username form-control"required>
                                    </div>
                                    <p id="pass" style="color:#F00; text-align: center;"> </p>
			                        <button type="submit" name="submit" class="btn">Reset</button>
			                    </form>
		                    </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

        <script src="../../public/js/jquery.js"></script>
        <script src="../../public/js/bootstrap.js"></script>
        <script type="text/javascript">
            function pass()
            {
                var pwd=document.getElementById("new_pswd").value;
                var cpwd=document.getElementById("con_pswd").value;
                if(pwd==cpwd)
                {
                    var t1=document.getElementById('pass');
                    t1.innerHTML="Password matches!";
                    t1.style.color="green";


                    /*t1.style.display='block';*/
                }
                else
                {
                    var t1=document.getElementById('pass');
                    t1.innerHTML="Does not match with New password!";
                    t1.style.color="red";
                    /* t1.style.display='block';*/
                    document.form.password.focus();
                }
            }
        </script>

    </body>

</html>