<center>
    <img class="nav-image" src="../../public/images/admin-logo.png"/>
</center>

<nav class="navbar navbar-inverse navbar-static-top nav-top nav-bar-custom navbar-fixed-top" style="margin-top:0px; box-shadow: 0 3px 7px -6px black !important;">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
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
            <ul class="nav navbar-nav navbar-left" style="margin-left:17%; padding-top:4px; position: fixed;">
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
                <li class="list-side-menu"><a href="#">Overall Company</a></li>
                <li class="list-side-menu"><a href="#">Edit Departments</a></li>
                <li class="list-side-menu"><a href="#">Edit Employees</a></li>
                <li class="list-side-menu"><a href="#">Edit Job Categories</a></li>
                <li class="list-side-menu"><a href="#">Edit Roster System</a></li>
                <li class="list-side-menu"><a href="#">Edit Company Calendar</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle font new" data-toggle="dropdown" role="button"
                       aria-haspopup="true" aria-expanded="false"><img src="../../public/images/default.png" class="img-circle image-user"  /><?php echo $empName;?><span class="caret"></span></a>
                    <ul class="dropdown-menu dropdown-menu-admin">
                        <li><a href="#">My Profile</a></li>
                        <li><a href="../../module/logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>