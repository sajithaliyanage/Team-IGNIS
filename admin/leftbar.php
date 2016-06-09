
<div class="list-group" style="margin-top:-10px;">
    <center>
        <div class="admin-panel-heading">
            <p  class=" font new"  role="button"
                aria-haspopup="true" aria-expanded="false" style="margin-top:25px;"><img src="../images/new-logo.png" class="img-circle image-user"  />Admin Panel</p>
        </div>
    </center>

    <br/>
    <center>
        <div style="padding:10px 0;">
            <p  class=" font new" style="margin-top:-10px;"><img src="../images/emp.png" class="img-circle image-user-nav"  />Welcome Sajitha</p>
        </div>
    </center>
    <a href="index.php" class="list-group-item left-menu left-menu<?php if($var=="index"){echo"-active";}?>"><i class="fa fa-edit icon-bar" aria-hidden="true"></i>Overall Company<span class="selected"></span></a>
    <a href="department.php" class="list-group-item left-menu left-menu<?php if($var=="department"){echo"-active";}?>"><i class="fa fa-building icon-bar" aria-hidden="true"></i>Edit Department</a>
    <a href="employee.php" class="list-group-item left-menu left-menu<?php if($var=="employee"){echo"-active";}?>"><i class="fa fa-user-plus icon-bar" aria-hidden="true"></i>Edit Employees</a>
    <a href="setleaves.php" class="list-group-item left-menu left-menu<?php if($var=="set"){echo"-active";}?>"><i class="fa fa-plus icon-bar" aria-hidden="true"></i>Set Leaves</a>
    <a href="jobcategory.php" class="list-group-item left-menu left-menu<?php if($var=="job"){echo"-active";}?>"><i class="fa fa-briefcase icon-bar" aria-hidden="true"></i>Edit Job Categories</a>
    <a href="leavetypes.php" class="list-group-item left-menu left-menu<?php if($var=="leaves"){echo"-active";}?>"><i class="fa fa-envelope-o icon-bar" aria-hidden="true"></i>Edit Leave types</a>
    <a href="roster.php" class="list-group-item left-menu left-menu<?php if($var=="roster"){echo"-active";}?>"><i class="fa fa-shirtsinbulk icon-bar" aria-hidden="true"></i>Edit Roster System</a>
    <a href="#" class="list-group-item left-menu left-menu<?php if($var=="calendar"){echo"-active";}?>"><i class="fa fa-calendar icon-bar" aria-hidden="true"></i>Edit Company Calendar</a>
</div>
