<!DOCTYPE html>
<html>
<?php
if(isset($_POST['s'])){
    include("dbconfig.php");
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $admin_id=$_POST['email'];
        $admin_password=$_POST['password'];      
       $registration_query="insert into admin values('$admin_id','$admin_password')";
        $result=mysqli_query($conn,$registration_query);
        if(!$result)
        {
        $message = "User Already Exist";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
            else
    {
        $message = "User Registered Successfully";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
    }
}
?>
  
<script>
     function f1()
        {
            var sta1=document.getElementById("email1").value;
            var sta2=document.getElementById("pass").value;            
	   
  
  var x1=sta1.indexOf(' ');
  var x2=sta2.indexOf(' ');
	if(sta1!="" && x1>=0){
    document.getElementById("email1").value="";
    document.getElementById("email1").focus();
      alert("Space Not Allowed");
        }
        else if(sta2!="" && x2>=0){
    document.getElementById("pass").value="";
    document.getElementById("pass").focus();
      alert("Space Not Allowed");
        }
}
</script>    
    
<head>
<title>Admin Registration</title>

<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
<link href="complainer_page.css" rel="stylesheet" type="text/css" media="all" />

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
        <li class="active"><a href="regadmin.php">Registration</a></li>
       </ul>
    </div>
  </div>
</nav>
	
<div class="video" style="margin-top: 5%"> 
	<div class="center-container">
		 <div class="bg-agile">

		<p style="color:white">Register</p>
			<br><br>
			<div class="login-form">
				<form action="#" method="post">
					
					<p style="color:#dfdfdf">Email-Id</p><input type="text"  name="email"  required="" id="email" onfocusout="f1()"/>
                    <p style="color:#dfdfdf">Password</p><input type="text"  name="password"  placeholder="Enter the password" id="pass" onfocusout="f1()"/>          		
					
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