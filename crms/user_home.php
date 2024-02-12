<!DOCTYPE html>
<html>
<head>
	<title>User Home</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="official_login1.css">

<style>
.ex2:hover, a.ex2:active {font-size: 150%;}
</style>
</head>
<body>
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
        <li><a href="userlogin.php">User Login</a></li> 
	<li class="active"><a href="user_home.php">User Home</a></li>
     </ul>
          <ul class="nav navbar-nav navbar-right">
		<li><a href="logout.php">Logout &nbsp <i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
    </div>
  </div>
 </nav>

 <div class="container">
  <hr> <br><br> <br><br> <br><br> <br><br> <br><br>
        <div class="row text-center">

            <div class="col-md-4 col-sm-12 hero-feature">

                <div class="thumbnail">
                    <div class="caption">
                        <p class>File a Complaint</p>
                        <p>
                            <a href="Complainer_page.php" class="btn btn-primary" >File</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-12 hero-feature">
                <div class="thumbnail">
                    <div class="caption">
                        <h3>Schedule a visit</h3>
                        <p>
                            <a href="Pappointment.php" class="btn btn-primary">Schedule</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-12 hero-feature">
                <div class="thumbnail">
                    <div class="caption">
                        <h3>View complaint history</h3>
                        <p>
                            <a href="complainer_complain_history.php" class="btn btn-primary">View</a>
                        </p>
                    </div>
                </div>
            </div>

        </div>
</div>
 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
 <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>