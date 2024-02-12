<html>
<title>Final Update</title>
<?php
session_start();
include("config.php");
require_once("encrypt_decrypt.php");
if(!isset($_SESSION['x']))
header("location:policelogin.php");
if(isset($_POST['s'])){
  
	    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
       
  $fnl=$_POST['name'];
  $fnll=Encrypt($fnl);
//	$crid=$_POST['crid'];
  $_SESSION['fnl']=$fnl;
      $cid=$_SESSION['cid'];
      $comp="update complaint set final_statement='$fnll' where c_id='$cid'";
      $res=mysqli_query($conn,$comp);
      $upd=Encrypt("Close Case");
      $hi="The final report is ";
      $fnl2=$hi.$fnl;
      $fnl2=Encrypt($fnl2);
      $_SESSION['fnl2']=$fnl2;
      date_default_timezone_set('Asia/Kolkata');
      $t=Encrypt(date("Y-m-j h:i:sA"));
      $r3=mysqli_query($conn,"insert into update_case(case_update,c_id,d_o_u) values('$fnl2','$cid','$t')");
      $h=3;
      $_SESSION['h']=$h;
      if($r3)
      {
         $msg="This final report is submitted and the case was closed Succesfully.";
        echo "<script type='text/javascript'>alert('$msg');</script>";
        echo "<script>
        window.setTimeout(function() {
            window.location = 'close.php';
          }, 1);
        </script>";   
        }
    else
    {
     $message = "Some thing went wrong";
      echo "<script type='text/javascript'>alert('$message');</script>";
    }
  }
}

?>
<head>
<script>
function f1()
        {
            var sta1=document.getElementById("name").value;
    if(sta1==" " || sta1=="  " || sta1=="   " || sta1=="   "){
    document.getElementById("name").value="";
    document.getElementById("name").focus();
      alert("Space Not Allowed");
        }
}
    </script>
<style>
.reg
{
color:white;
text-align:center;
font-size:28px;
}
</style>

<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
<link href="complainer_page.css" rel="stylesheet" type="text/css" media="all" />
<link href="style1.css" rel="stylesheet" />
</head>
<body>
<nav  class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-ba r"></span>
      </button>
      <a class="navbar-brand" href="home.php"><b>Crime Portal</b></a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      
      <ul class="nav navbar-nav navbar-right">
              </ul>
    </div>
  </div>
 </nav>
	
<div class="video" style="margin-top: 5%"> 
	<div class="center-container">
		 <div class="bg-agile">

		<p class="reg" style="color:white">Final Report </p>
			<br><br>
			<div class="login-form">
				<form action="#" method="post" enctype='multipart/form-data'>

		<p style="color:#dfdfdf">Please Enter the final report </p><textarea type="text"  name="name"  required="" id="name" onfocusout="f1()"></textarea>
<br>

	
					<input type="submit" value="Submit" name="s">
				</form>	
			</div>	
		</div>
	</div>	
</div>	

    
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js">
</script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js">
</script>
</body>
</html>