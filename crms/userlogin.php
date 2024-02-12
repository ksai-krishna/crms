<!DOCTYPE html>
<html>
<head>
    <style>
    body{
	font-family: "Lato";
	font-size: 100%;
	background:url(regi_bg.jpeg) no-repeat;
    background-position:0px 0px;
	text-align: left;
	min-height: 100%;
	background-size:cover;
	/*min-height:20px;*/
	background-position:center;
	background-attachment:fixed;
}
    </style>
<?php
session_start();
include("config.php");
if(isset($_POST['s']))
{  
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
      $uid=$_POST['email'];
      $pass=$_POST['password']; 
      $result=mysqli_query($conn,"SELECT user_id FROM user where user_id ='$uid'");
      $userid=mysqli_fetch_array($result);
      $result=mysqli_query($conn,"SELECT user_password FROM user WHERE user_password='$pass'");
      $password=mysqli_fetch_array($result);
      if($userid['user_id']==$uid)
        {
          if($password['user_password']==$pass)
          {
            header("location:complainer_page.php");
            $_SESSION['user_id']=$uid;
            $_SESSION['x']=1;
          }
          else{
          $message = "The Password is incorrect . ";
          echo "<script type='text/javascript'>alert('$message');</script>";
          }
        }
        else{
          $message = "The User id is incorrect . ";
          echo "<script type='text/javascript'>alert('$message');</script>"; 
        }
    }
  }
?>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    
    <script>
     function f1()
        {
            var sta2=document.getElementById("exampleInputEmail1").value;
            var sta3=document.getElementById("exampleInputPassword1").value;
          var x2=sta2.indexOf(' ');
var x3=sta3.indexOf(' ');
    if(sta2!="" && x2>=0){
    document.getElementById("exampleInputEmail1").value="";
    document.getElementById("exampleInputEmail1").focus();
      alert("Space Not Allowed");
        }
        else if(sta3!="" && x3>=0){
    document.getElementById("exampleInputPassword1").value="";
    document.getElementById("exampleInputPassword1").focus();
      alert("Space Not Allowed");
        }

}
    </script>
    
	<title>Complainant Login</title>
<link rel="icon" href="./icons/user.png">

</head>
<body>
	 <nav class="navbar navbar-default navbar-fixed-top" style="height: 60px;">
  <div class="container">
    <div class="navbar-header">
     
      <a class="navbar-brand" href="home.php" style="margin-top: 5%;"><b>Crime Portal</b></a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="active" style="margin-top: 3.5%; "><a href="userlogin.php">Complainer Login</a></li>
      </ul>
    
      
    </div>
  </div>
 </nav>
 <div  align="center" >
	<div class="form" style="margin-top: 15%">
		<form method="post">
  <div class="form-group" style="width: 30%">
    <label for="exampleInputEmail1"><h1 style="color: #fff;">User Id</h1></label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" size="5" placeholder="Enter Email id" onfocus="this.value='' " required name="email" onfocusout="f1()">
     </div>
  <div class="form-group" style="width:30%">
    <label for="exampleInputPassword1"><h1 style="color: #fff;">Password</h1></label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required name="password" onfocusout="f1()">
  </div>
  
  <button type="submit" class="btn btn-primary" name="s" onclick="f1()">Submit</button>
</form>
	</div>
</div>
<div style="position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: rgba(0,0,0,0.7);
   color: white;
   text-align: center;">
  <h4 style="color: white;">&copy <b>Crime Portal 2024</b></h4>
</div>

</body>
</html>