<center>
    <img class="nav-image" src="images/admin-logo.png"/>
</center>

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
            <a class="navbar-brand heding-min" href="#"><img class="nav-image" src="images/lms-logo.png"/></a>
        </div>
        <div style="height: 1px;" aria-expanded="false" id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-left nortifications" style="margin-left:17%; padding-top:4px; position: fixed;">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle nortification-button" data-toggle="dropdown">
                        <i class="fa fa-bell-o" style="border:1px solid #d2d2d2; border-radius:100%; padding:14px;"></i><span class="badge postition-alert">0</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-admin" style="margin-top:2px;">
                        <div class="arrow-up"></div>
                        <li style="text-align: center;">No any alerts yet!</li>
                    </ul>
                </li>

                <li  class="dropdown">
                    <a href="#" class="dropdown-toggle nortification-button" data-toggle="dropdown">
                        <i class="fa fa-envelope-o" style="border:1px solid #d2d2d2; border-radius:100%; padding:14px;"></i><span class="badge postition-message">0</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-admin" style="margin-top:2px;">
                        <div class="arrow-up"></div>
                        <li style="text-align: center;">No any messages yet!</li>
                    </ul>
                </li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="list-side-menu"><a href="index.php">Overall Company</a></li>
                <li class="list-side-menu"><a href="department.php">Edit Departments</a></li>
                <li class="list-side-menu"><a href="employee.php">Edit Employees</a></li>
                <li class="list-side-menu"><a href="setleaves.php">Edit Set Leaves</a></li>
                <li class="list-side-menu"><a href="jobcategory.php">Edit Job Categories</a></li>
                <li class="list-side-menu"><a href="leavetypes.php">Edit Leave Types</a></li>
                <li class="list-side-menu"><a href="roster.php">Edit Roster System</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle font new" data-toggle="dropdown" role="button"
                       aria-haspopup="true" aria-expanded="false"><img src="../<?php if($empImage != 'null'){echo $empImage;}else{ echo '../public/images/default.png';}?>" class="img-circle image-user"  /><?php echo $empName?> <span class="caret"></span></a>
                    <ul class="dropdown-menu dropdown-menu-admin">
                        <li><a href="../site/default_admin.php">Switch Profile</a></li>
                        <li><a href="../../module/reports/userManual.pdf" target="_blank">User Manual</a></li>
                        <li><a href="../../module/logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
