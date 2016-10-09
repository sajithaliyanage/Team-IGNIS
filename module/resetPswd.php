<?php

$var = "resetpswd";
include('../controller/siteController.php');
include('../config/connect.php');
$pdo = connect();

if(!$isLoggedin){
    header('Location:../index.php');
}

if(isset($_POST['submit']))
{
    //Check whether the new pass word matches with confirm password, if it is matches reset the password
    $newpassword=$_POST['new_pswd'];
    $confirmpasssword=$_POST['con_pswd'];
    if($newpassword==$confirmpasssword)
    {
        $sql = "UPDATE employee SET password=:newpassword where comp_id=:empID ";
        $query = $pdo->prepare($sql);
        $query->execute(array('newpassword' => $newpassword, 'empID' => $empID));

        header( 'Location:../view/site/profile.php?success' ) ;
        //echo "<script> alert('Your password is changed');</script>";
    }
    else
    {
        echo "<script> alert('Your password is not changed');</script>";
    }
}

?>

<!--script for check whether current password matches with existing password-->
<script type="text/javascript">
    function showUser(str)
    {
        if (str=="")
        {
            document.getElementById("txtHint").innerHTML="";
            return;
        }
        if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari

            xmlhttp=new XMLHttpRequest();
        }
        else
        {// code for IE6, IE5

            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","checkPswd.php?q="+str,true);

        xmlhttp.send();
    }
</script>

<!--script for check whether new password matches with confirm password-->
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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Take Your Leave | Online</title>

    <link href="../public/css/bootstrap.min.css" rel="stylesheet">
    <link href="../public/css/interface-leftmenu.css" rel="stylesheet">
    <link href="../public/css/leave-interface.css" rel="stylesheet">
    <link href="../public/css/navbar-style.css" rel="stylesheet">
    <link href="../public/css/font-awesome.min.css" rel="stylesheet">

</head>

<body style=" background-color: #eceff4 !important;">

    <?php include ("../view/layouts/navbar.php")?>

    <div class="container-fluid ">
        <div class="row ">

            <div class="col-sm-2 col-xs-12 left-menu-div side-bar-display">
                <?php include ("../view/layouts/leftbar.php")?>
            </div>

            <div class="col-sm-10 col-xs-12 admin-background col-sm-push-2" style="position: relative;">
                    <div class="row padding-row">
                        <div class="row">
                            <div class="col-lg-12">
                                <ol class="breadcrumb breadcrumb-style">
                                    <li>
                                        <i class="fa fa-dashboard"></i>  <a href="../index.php">Take Your Leave</a>
                                    </li>
                                    <li class="active">
                                        <i class="fa fa-user-md"></i> <a href="../view/site/profile.php">My Profile</a>
                                    </li>
                                    <li class="active">
                                        <i class="fa fa-user-plus"></i> Reset Password
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>

                    <div class="row padding-row">
                        <div class="col-xs-12 padding-box">

                            <div class="col-xs-12 nortification-box-top">
                                <h5 class="nortification-box-heading"><i class="fa fa-lock icon-margin-right" aria-hidden="true"></i>
                                    Reset Password
                                </h5>
                                <div class="alert-user" style="<?php if(!isset($_GET['job'])){echo 'display:none;';}?>">Password changed successfully!</div>
                                <hr>
                                    <div class="form-bottom">
                                    <form role="form"  data-toggle="validator" action="" method="post" onSubmit="return passvali();">

                                            <div class="form-group">
                                                <label class="col-xs-4" for="form-username">Current password <span style="color:#F00;">*</span></label>
                                                <div class="col-xs-5"><input type="password" name="cur_pswd" placeholder="Current password" class="form-username form-control" onChange="showUser(this.value)" id="cur_pswd" required></div>
                                                <label class="col-xs-3" ><span class="st" id="txtHint"></span></label>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-xs-4" for="form-password">New password<span style="color:#F00;">*</span></label>
                                                <div class="col-xs-5"><input type="password" name="new_pswd" placeholder="New password" class="form-password form-control" id="new_pswd" required></div>
                                                <label class="col-xs-3" ></label>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-xs-4" for="form-password">Confirm password<span style="color:#F00;">*</span></label>
                                                <div class="col-xs-5"><input type="password" name="con_pswd" placeholder="Confirm password" class="form-password form-control" onChange="return pass()" id="con_pswd" required></div>
                                                <label class="col-xs-3" ><span id="pass" style="color:#F00;"> </span></label>
                                            </div>
                                            <button class="btn btn-info btn-lg pull-right submit-button" name="submit" type="submit" >Reset password</button>

                                    </form>
                                </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>

        </div>

    <script src="../public/js/jquery.js"></script>
    <script src="../public/js/bootstrap.js"></script>
</body>

</html>