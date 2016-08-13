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

                            <div class="alert alert-danger alert-dismissible" role="alert" <?php if(!isset($_GET['login'])){ echo "style='display:none;'";}?> >
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <strong><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></strong> Invalid login, please try again
                            </div>

                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>Forget your password ?</h3>
                            		<p>Enter your company email:</p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-lock"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
			                    <form role="form" action="" method="post" class="login-form">
			                    	<div class="form-group">
			                    		<label class="sr-only">Email</label>
			                        	<input type="email" name="companyID" placeholder="Company email" class="form-username form-control" id="form-username" required>
			                        </div>
			                        <button type="submit" class="btn">Confirm</button>
			                    </form>
		                    </div>
                        </div>
                    </div>
                   
                </div>
            </div>
            
        </div>

        <script src="../../public/js/jquery.js"></script>
        <script src="../../public/js/bootstrap.js"></script>
    </body>

</html>