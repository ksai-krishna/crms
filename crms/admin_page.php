
<!DOCTYPE html>
<html>
<head>
	<title>Admin Page</title>
	<link rel="icon" href="./icons/admin.jpg">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

	    <link rel="stylesheet" type="text/css" href="official_page1.css">
        
</head>
<body style="background-image:url(official_login_bg.jpg)">

 <nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="home.php"><b>Crime Portal</b></a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
	<li><a href="official_login.php">Oficial Login </a></li>
        <li><a href="admin_login.php">Admin Login </a></li>
        <li class="active"><a href="admin_page.php">Admin Page </a></li> 
     </ul>
	<ul class="nav navbar-nav navbar-right">
	<li><a href="A_logout.php">Logout &nbsp <i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
    </div>
  </div>
 </nav>

 <div class="container">
  <hr> <br><br> <br><br> <br><br> <br><br> <br><br>
        <div class="row text-center">

            <div class="col-md-4 col-sm-12 hero-feature">
                <div class="thumbnail">
                    <div class="caption">
                        <h3>Police Station register</h3>
                        <p>
                            <a href="police_station_add.php" class="btn btn-primary">Add Police station</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-12 hero-feature">
                <div class="thumbnail">
                    <div class="caption">
                        <h3>Register Jail</h3>
                        <p>
                            <a href="jail_add.php" class="btn btn-primary">Add Jail </a>
                        </p>
                    </div>
                </div>
            </div>

   
      <!-- <div class="col-md-4 col-sm-12 hero-feature">
                <div class="thumbnail">
                    <div class="caption">
                        <h3>Admin Register</h3>
                        <p>
                            <a href="regadmin.php" class="btn btn-primary">Jailer register</a>
                        </p>
                    </div>
                </div>
            </div>

        </div> -->
<div class="col-md-4 col-sm-12 hero-feature">
                <div class="thumbnail">
                    <div class="caption">
                        <h3>Approve Officials Accounts</h3>
                        <p>
                            <a href="police_aptmt.php   " class="btn btn-primary">View Accounts</a>
                        </p>
                    </div>
                </div>
            </div>

        </div>
</div>
</div>
</div>
 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
 <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>