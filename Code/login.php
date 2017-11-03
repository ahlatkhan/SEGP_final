<?php

  session_start();

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta charset="utf-8"/>
<!-- BOOTSTRAPP -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap-grid.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap-reboot.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap-reboot.min.css" rel="stylesheet" type="text/css" />
<!-- END   -->
<!-- CSS FILES -->
 <link rel = "stylesheet" type = "text/css" href = "style.css" />
<!-- END -->

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


<title>Login Page</title>
</head>

<body>
	<div class="container">
    	<div class="col-sm-10" style = "width: 550px; margin-left:250px; margin-top:100px;">
        	<div class="jumbotron">
            		<div class="form-group">
                         		<center><h1 style="font-size:35px;"> LOGIN PAGE </h1></center>
                    </div>

                    <form class="form-horizontal" method="POST" action="include/login-inc.php">
                    	<div class="form-group input-group">
                        	<span class="input-group-addon">
                            	<span class="glyphicon glyphicon-user"></span>
                            </span>
                        	<input class="form-control" name="username" placeholder="Username" />
                        </div>

                        <div class="form-group input-group">
                        	<span class="input-group-addon">
                            	<span class="glyphicon glyphicon-lock"></span>
                            </span>
                        	<input  class="form-control" name="password" placeholder="Password" />
                        </div>


                        <div class="form-group">

                        	<input class="btn btn-primary" type="submit" name="submit" value="Login">
                        </div>

                        <!--<div class="form-group">
                        	<a href="#" id="forget">Forgot Password?</a>
                        </div>-->
                    </form>
            </div>
        </div>
    </div>
</body>
</html>
