<!DOCTYPE html>
<html>
<head>
	<title> Jail log </title>

	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

	<link href="jailer_page.css" rel="stylesheet" type="text/css" media="all" />
	<?php
    session_start();
    if(!isset($_SESSION['x']))
        header("location:headlogin.php");
if(isset($_POST['s'])){
    include("config.php");
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $name=$_POST['name'];
        $loc=$_POST['location'];
    $reg="insert into jail values('$name','$loc')";
        $res=mysqli_query($conn,$reg);
        if(!$res)
            {
        $message1 = "This Jail is  Already registered";
        echo "<script type='text/javascript'>alert('$message1');</script>";
    }
            
        else
    {
        $message = "Jail Added Successfully";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
    }
  }
?>
<script>
     function f1()
        {
         var sta1=document.getElementById("name").value;        
         var sta3=document.getElementById("location").value;
         var x=sta.trim();
         var x3=sta3.indexOf(' ');
        
          if(sta1!="" && x1==""){
    document.getElementById("name").value="";
    document.getElementById("iname").focus();
      alert("Space Not Allowed");
        }        
        else if(sta3!="" && x3>=0){
    document.getElementById("pas").value="";
    document.getElementById("location").focus();
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
	<li><a href="../ocrms">Oficial Login </a></li>
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
    <br>
<div class="video" style="margin-top: 5%">
	<div class="center-container">
		 <div class="bg-agile">
			<br><br>
			<div class="login-form"><p>
                <h2>Log New Jail</h2><br>
      <form  method="post" style="color: gray">
      Jail Name
          <input type="text"  name="name" placeholder="Jail Name" required="" id="name" onfocusout="f1()"/>
      Jail Location
          <input type="text"  name="location" placeholder="Jail Location" required="" id="location" onfocusout="f1()"/>
          

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