 <!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Take Your Leave | Online</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/interface-leftmenu.css" rel="stylesheet">
    <link href="css/adminpanel-interface.css" rel="stylesheet">
    <link href="css/navbar-style.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">

  </head>

  <body>

    <?php include ("navbar.php")?>

    <div class="container-fluid">
      <div class="row">

        <div class="col-sm-2 col-xs-12 left-menu-div side-bar-display">
            <?php include ("leftbar.php")?>
        </div>

        <div class="col-sm-10 col-xs-12 col-sm-push-2">
            <div class="row">
                <div class="col-sm-4 col-xs-12" ">
                        <div style="float:right;background-color:#5bc0de; width:50%; height:150px; margin-top:40px; transform: perspective( 200px ) rotateY( -25deg );">
                            <h2>YesterDay</h2>
                        </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <center>
                        <div style="float:none;background-color:#761c19; width:60%; height:200px;margin-top:20px;">
                            <h1>ToDay</h1>
                        </div>
                    </center>
                </div>
                <div class="col-sm-4 col-xs-12">
                        <div style="float:left; background-color:#5bc0de; width:50%; height:150px;margin-top:40px;transform: perspective( 200px ) rotateY( 25deg );">
                            <h2 style="text-align: center">Tomorrow</h2>
                        </div>
                </div>
            </div>
         </div>
      </div>

    </div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>