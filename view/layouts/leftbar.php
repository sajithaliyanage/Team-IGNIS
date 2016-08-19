
<div class="list-group" style="margin-top:-10px;">
    <center>
        <div class="admin-panel-heading">
            <p  class=" font new"  role="button"
                aria-haspopup="true" aria-expanded="false" style="margin-top:25px;"><img src="../../public/images/new-logo.png" class="img-circle image-user"  />Take Your Leave</p>
        </div>
    </center>

    <br/>
    <center>
        <div style="padding:10px 0;">
            <p  class=" font new" style="margin-top:-10px; text-transform: capitalize;"><img src="../../public/images/default.png" class="img-circle image-user-nav"  />Welcome <?php echo $empRole;?></p>
        </div>
    </center>

    <a href="../site/director.php" style="<?php if($empRole!="director"){echo "display:none;";}?>" class="list-group-item left-menu left-menu<?php if($var=="permission"){echo"-active";}?>"><i class="fa fa-edit icon-bar" aria-hidden="true"></i>Give Permission<span class="<?php if($var=="permission"){echo"selected";}?>"></span></a>

    <a href="../site/apply.php"  style="<?php if($empRole=="director"){echo "display:none;";}?>" class="list-group-item left-menu left-menu<?php if($var=="apply"){echo"-active";}?>"><i class="fa fa-edit icon-bar" aria-hidden="true"></i>Apply Leave<span class="<?php if($var=="apply"){echo"selected";}?>"></span></a>

    <a href="../site/confirm_leave.php"  style="<?php if($empRole=="director" ||$empRole=="employee" ){echo "display:none;";}?>" class="list-group-item left-menu left-menu<?php if($var=="approve"){echo"-active";}?>"><i class="fa fa-building icon-bar" aria-hidden="true"></i><?php if($empRole=="executive"){echo "Recommend Leave";}else{ echo "Confirm Leave";}?><span class="<?php if($var=="approve"){echo"selected";}?>"></span></a>

    <a href="../site/leave_status.php" style="<?php if($empRole=="director"){echo "display:none;";}?>" class="list-group-item left-menu left-menu<?php if($var=="status"){echo"-active";}?>"><i class="fa fa-paperclip icon-bar" aria-hidden="true"></i>Leave Status<span class="<?php if($var=="status"){echo"selected";}?>"></span></a>

    <a href="../site/attendance.php" class="list-group-item left-menu left-menu<?php if($var=="attendance"){echo"-active";}?>"><i class="fa fa-check-circle icon-bar" aria-hidden="true"></i><?php if($empRole=="director"){echo "Company Attendance";}else{ echo "My Attendance";}?><span class="<?php if($var=="attendance"){echo"selected";}?>"></span></a>

    <a href="../site/medicalUpload.php"  style="<?php if($empRole=="director"){echo "display:none;";}?>" class="list-group-item left-menu left-menu<?php if($var=="medical"){echo"-active";}?>"><i class="fa fa-plus icon-bar" aria-hidden="true"></i>Medical Upload Center<span class="<?php if($var=="medical"){echo"selected";}?>"></span></a>

    <a href="../site/generateReport.php" class="list-group-item left-menu left-menu<?php if($var=="reports"){echo"-active";}?>"><i class="fa fa-briefcase icon-bar" aria-hidden="true"></i>Generate Reports<span class="<?php if($var=="reports"){echo"selected";}?>"></span></a>

    <a href="" class="list-group-item left-menu left-menu<?php if($var=="calendar"){echo"-active";}?>"><i class="fa fa-calendar icon-bar" aria-hidden="true"></i><?php if($empRole=="director"){echo "Company Calendar";}else{ echo "My Calendar";}?><span class="<?php if($var=="calendar"){echo"selected";}?>"></span></a>

    <a href="../site/roster.php" class="list-group-item left-menu left-menu<?php if($var=="roster"){echo"-active";}?>"><i class="fa fa-shirtsinbulk icon-bar" aria-hidden="true"></i><?php if($empRole=="director"){echo "Company Roster";}else{ echo "Roster System";}?><span class="<?php if($var=="roster"){echo"selected";}?>"></span></a>

    <a href="../site/chat.php" class="list-group-item left-menu left-menu<?php if($var=="chat"){echo"-active";}?>"><i class="fa fa-envelope icon-bar" aria-hidden="true"></i>Chat Box<span class="<?php if($var=="chat"){echo"selected";}?>"></span></a>

    <a href="../site/profile.php" class="list-group-item left-menu left-menu<?php if($var=="profile"){echo"-active";}?>"><i class="fa fa-user icon-bar" aria-hidden="true"></i>My Profile<span class="<?php if($var=="profile"){echo"selected";}?>"></span></a>


</div>
