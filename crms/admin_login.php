<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
	<title>Admin Login</title>
	<link rel="icon" href="./icons/admin.jpg">
	<style>
	body{
    font-family: "Lato";
	font-size: 125%;
	background:url(locker2.jpg) no-repeat;
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

if(isset($_POST['s']))
{
    session_start();
    $_SESSION['x']=1;
    include("config.php");
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $admin_id=$_POST['email'];
        $password=$_POST['password'];
        $result=mysqli_query($conn,"SELECT admin_id,admin_password FROM admin where admin_id='$admin_id' and admin_password='$password' ");
        $_SESSION['admin']=$admin_id;
        
        if(!$result || mysqli_num_rows($result)==0)
        {
             $message = "Id or Password not Matched.";
             echo "<script type='text/javascript'>alert('$message');</script>";
        }
        else 
        {
         	 header("location:admin_page.php");
        }
    }                
}
?> 
    
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
    
    
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand" href="home.php"><b>Crime Portal</b></a>
      </div>
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
	 <li ><a href="official_login.php">Offical Login</a></li>
         <li class="active"><a href="admin_login.php">Admin Login</a></li>
        </ul>
    </div>
  </div>
 </nav>
 <div  align="center" >
	<div class="form" style="margin-top: 15%">
		<form method="post">
  <div class="form-group" style="width: 30%">
    <label for="exampleInputEmail1"  ><h1 style="color:white">Admin Id</h1></label>
    <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" size="5" placeholder="Enter Admin id" required onfocusout="f1()">
     </div>
  <div class="form-group" style="width:30%">
    <label for="exampleInputPassword1"><h1 style="color:white">Password</h1></label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required onfocusout="f1()">
  </div>
  
  
  <button type="submit" class="btn btn-primary" name="s">Login</button>
</form>
	</div>
</div>
<div style="position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   height: 30px;
   background-color: rgba(0,0,0,0.8);
   color: white;
   text-align: center;">
  <h4 style="color: white;">&copy <b>Crime Portal 2022</b></h4>
</div>
</body>
</html>