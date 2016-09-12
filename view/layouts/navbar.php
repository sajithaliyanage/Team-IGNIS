<?php
    $newsql = "SELECT name,image,group_id from employee where comp_id=:empID";
    $newquery = $pdo->prepare($newsql);
    $newquery->execute(array('empID'=>$empID));
    $newresult = $newquery->fetch();
    $employeeName = $newresult['name'];
    $employeeImage = $newresult['image'];
    $groupID = $newresult['group_id'];
?>

<center>
    <img class="nav-image" src="../../public/images/admin-logo.png"/>
</center>

<!-- navigation bar-->
<nav class="navbar navbar-inverse navbar-static-top nav-top nav-bar-custom navbar-fixed-top" style="margin-top:0px; box-shadow: 0 3px 7px -6px black !important;">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" style="background-color:#3498db; border:1px solid #3ea2e5;"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand heding font nav-head-admin" href="#"><span class="head-nav"></span> Admin Panel</a>
            <a class="navbar-brand heding-min" href="#"><img class="nav-image" src="../../public/images/lms-logo.png"/></a>
        </div>
        <div style="height: 1px;" aria-expanded="false" id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-left nortifications" style="margin-left:17%; padding-top:4px; position: fixed;">
                <li >
                    <i class="fa fa-bell-o" style="border:1px solid #d2d2d2; border-radius:100%; padding:14px; margin-left:10px;"></i><span class="badge postition-alert">4</span>
                </li>

                <li >
                    <i class="fa fa-envelope-o" style="border:1px solid #d2d2d2; border-radius:100%; padding:14px; margin-left:10px;"></i><span class="badge postition-message">3</span>
                </li>

                <li >
                    <i class="fa fa-binoculars" style="border:1px solid #d2d2d2; border-radius:100%; padding:14px; margin-left:10px;"></i><span class="badge postition-remind">5</span>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="list-side-menu"><a href="../site/director.php" style="<?php if($empRole!="director"){echo "display:none;";}?>" ><i class="fa fa-edit icon-bar" aria-hidden="true"></i>Give Permission<span class="<?php if($var=="permission"){echo"selected";}?>"></span></a></li>
                <li class="list-side-menu"><a href="../site/apply.php"  style="<?php if($empRole=="director"){echo "display:none;";}?>" ><i class="fa fa-edit icon-bar" aria-hidden="true"></i>Apply Leave<span class="<?php if($var=="apply"){echo"selected";}?>"></span></a></li>
                <li class="list-side-menu"><a href="../site/confirm_leave.php"  style="<?php if($empRole=="director" ||$empRole=="employee" ){echo "display:none;";}?>"><i class="fa fa-building icon-bar" aria-hidden="true"></i><?php if($empRole=="executive"){echo "Recommend Leave";}else{ echo "Confirm Leave";}?><span class="<?php if($var=="approve"){echo"selected";}?>"></span></a></li>
                <li class="list-side-menu"><a href="../site/leave_status.php" style="<?php if($empRole=="director"){echo "display:none;";}?>" ><i class="fa fa-paperclip icon-bar" aria-hidden="true"></i>Leave Status<span class="<?php if($var=="status"){echo"selected";}?>"></span></a></li>
                <li class="list-side-menu"><a href="../site/attendance.php"><i class="fa fa-check-circle icon-bar" aria-hidden="true"></i><?php if($empRole=="director"){echo "Company Attendance";}else{ echo "My Attendance";}?><span class="<?php if($var=="attendance"){echo"selected";}?>"></span></a></li>
                <li class="list-side-menu"><a href="../site/medicalUpload.php"  style="<?php if($empRole=="director"){echo "display:none;";}?>" ><i class="fa fa-plus icon-bar" aria-hidden="true"></i>Medical Upload Center<span class="<?php if($var=="medical"){echo"selected";}?>"></span></a></li>
                <li class="list-side-menu"><a href="../site/generateReport.php"><i class="fa fa-briefcase icon-bar" aria-hidden="true"></i>Generate Reports<span class="<?php if($var=="reports"){echo"selected";}?>"></span></a></li>
                <li class="list-side-menu"><a href="../site/calendar.php" ><i class="fa fa-calendar icon-bar" aria-hidden="true"></i><?php if($empRole=="director"){echo "Company Calendar";}else{ echo "My Calendar";}?><span class="<?php if($var=="calendar"){echo"selected";}?>"></span></a></li>
                <li class="list-side-menu"><a href="../site/roster.php" style="<?php if($groupID==0){echo'display:none;';}?>" ><i class="fa fa-shirtsinbulk icon-bar" aria-hidden="true"></i><?php if($empRole=="director"){echo "Company Roster";}else{ echo "Roster System";}?><span class="<?php if($var=="roster"){echo"selected";}?>"></span></a></li>
                <li class="list-side-menu"><a href="../site/chat.php" ><i class="fa fa-envelope icon-bar" aria-hidden="true"></i>Chat Box<span class="<?php if($var=="chat"){echo"selected";}?>"></span></a></li>
                <li class="list-side-menu"><a href="../site/profile.php"><i class="fa fa-user icon-bar" aria-hidden="true"></i>My Profile<span class="<?php if($var=="profile"){echo"selected";}?>"></span></a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle font new" data-toggle="dropdown" role="button"
                       aria-haspopup="true" aria-expanded="false"><img src="../<?php if($employeeImage != 'null'){echo $employeeImage;}else{ echo '../public/images/default.png';}?>" class="img-circle image-user"  /><?php echo $employeeName;?><span class="caret"></span></a>
                    <ul class="dropdown-menu dropdown-menu-admin">
                        <li style="<?php if($empRole!='admin'){echo 'display:none;';}?>"><a href="../site/default_admin.php">Switch Profile</a></li>
                        <li><a href="../site/profile.php">My Profile</a></li>
                        <li><a href="../../module/logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
