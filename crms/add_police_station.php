<!DOCTYPE html>
<html>
<head>
	<title>police station log </title>

	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

	<link href="complainer_page.css" rel="stylesheet" type="text/css" media="all" />
	<?php
    session_start();
    include("config.php");
    if(!isset($_SESSION['x'])){
        header("location:admin_login.php");
    }
if(isset($_POST['s'])){
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $police_staion_name=$_POST['name'];
        $police_station_location=$_POST['location'];
    $registration_query="insert into police_station values('$police_staion_name','$police_station_location')";
        $result=mysqli_query($conn,$registration_query);
        if(!$result)
            {
        $message = "User Already Exist";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
        else
    {
        $message = "Police Station Added Successfully";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
    }
  }
?>
<script>
     function f1()
        {
         var sta=document.getElementById("station").value;
         var sta1=document.getElementById("iname").value;
         var sta2=document.getElementById("iid").value;
         var sta3=document.getElementById("pas").value;
         var x=sta.trim();
         var x2=sta2.indexOf(' ');
         var x1=sta1.trim();
         var x3=sta3.indexOf(' ');
 if(sta!="" && x==""){
    document.getElementById("station").value="";
    document.getElementById("station").focus();
      alert("Space Not Allowed");
        }
        
         else if(sta1!="" && x1==""){
    document.getElementById("iname").value="";
    document.getElementById("iname").focus();
      alert("Space Not Allowed");
        }
        else if(sta2!="" && x2>=0){
    document.getElementById("iid").value="";
    document.getElementById("iid").focus();
      alert("Space Not Allowed");
        }
        else if(sta3!="" && x3>=0){
    document.getElementById("pas").value="";
    document.getElementById("pas").focus();
      alert("Space Not Allowed");
        }
      }
</script>
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
        <li ><a href="admin_page.php">Admin Page </a></li> 
     </ul>
	<ul class="nav navbar-nav navbar-right">
	<li><a href="A_logout.php">Logout &nbsp <i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
    </div>
  </div>
 </nav>
</head>

<body style="background-size: cover;
    background-image: url(home_bg1.jpeg);
    background-position: center;">
	<!-- <nav  class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="home.php"><b>Home</b></a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li ><a href="official_login.php">HQ Login</a></li>
        <li><a href="headHome.php">HQ Home</a></li>
      </ul>
     
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="police_station_add.php">Log Police Station</a></li>
      <li> <a href="h_logout.php">Logout &nbsp <i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
      </ul>
    </div>
  </div>
 </nav> -->
<div class="video" style="margin-top: 5%">
	<div class="center-container">
		 <div class="bg-agile">
			<br><br>
			<div class="login-form"><p>
                <h2>Log Police Station</h2><br>
      <form  method="post" style="color: gray">
      Police Station Name      
          <input type="text"  name="name" placeholder="Station Name" required="" id="name" onfocusout="f1()"/>
      Police Station Location
          <input type="text"  name="location" placeholder="Station Location" required="" id="station" onfocusout="f1()"/>
          <br>
					<input type="submit" value="Submit" name="s">
				</form>	
			</div>	
		</div>
	</div>	
</div>	
 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
 <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>