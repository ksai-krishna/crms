<!DOCTYPE html>
<html>
<?php
session_start();
include("config.php");
// require_once('encrypt_decrypt.php');
if(isset($_POST['s'])){
    if($_SERVER["REQUEST_METHOD"]=="POST"){
	$j_id=$_POST['j_id'];
  $j_name=$_POST['name'];
  $pass=$_POST['pass'];
  $j_pass= $pass;
    $j_mail=$_POST['email'];	
    $j_loc=$_POST['location'];
	$n=1;
  $m=1;
  $query="select * from jailer where j_id='$j_id' ";
  $result=mysqli_query($conn,$query);
  $id=mysqli_fetch_array($result);
  $id=$id['j_id'];
    if($id)
    {
      $msg="The Jailer id  is already taken .Please enter a valid jailer id.  ";
      echo "<script type='text/javascript'>alert('$msg');</script>";
    $m=0;
    }
	if($m)
	{

	$reg="insert into jlr_appointment(id, j_pass, location, j_mail, j_name) values('$j_id','$j_pass','$j_loc','$j_mail','$j_name')";

        $res=mysqli_query($conn,$reg);
        if(!$res)
        {
        $message1 = "Jailer with same id Already Exist";
        echo "<script type='text/javascript'>al ert('$message1');</script>";
    }
            else
    {
        $message = "Your application registered succesfully . Please contact your Admin for approval";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
    }
}
}
?>
  
<script>
     function f1()
        {
        var sta1=document.getElementById("email1").value;
        var sta2=document.getElementById("pass").value;
			  var sta3=document.getElementById("station").value;
	   		var sta4=document.getElementById("j_id").value;
        var sta5=document.getElementById("specification").value;
        var sta6=document.getElementById("name").value;
         
  
  var x1=sta1.indexOf(' ');
  var x2=sta2.indexOf(' ');
  var x3=sta3.indexOf(' ');
  var x4=sta4.indexOf(' ');
  var x5=sta5.indexOf(' ');
  var x6=sta6.indexOf(' ');

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
        
	  else if(sta3!="" && x3>=0)
	  {
	   document.getElementById("station").value="";
	   document.getElementById("station").focus();
	   alert("Space not Allowed");
	    }	

	  else if(sta4!="" && x4>=0)
	  {
	   document.getElementById("j_id").value="";
	   document.getElementById("j_id").focus();
	   alert("Space not Allowed");
	    }	
		else if(sta5!="" && x5>=0)
	  {
	   document.getElementById("specification").value="";
	   document.getElementById("specification").focus();
	   alert("Space not Allowed");
	    }
      else if(sta6!="" && x6>=0){
    document.getElementById("name").value="";
    document.getElementById("name").focus();
      alert("Space Not Allowed");
        }
}
</script>    
    
<head>
<title>Jailer Registration</title>
<style>
.reg
{
color:white;
text-align:center;
font-size:28px;	
}
</style>
<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
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
       <li><a href="official_login.php">Official Login</a></li>     
       <li><a href="jlr_login.php">Jailer Login</a></li>     
	 <li class="active"><a href="regjlr.php">Register Jailer</a></li>
       </ul>
    </div>
  </div>
</nav>
	
<div class="video" style="margin-top: 5%"> 
	<div class="center-container">
		 <div class="bg-agile">
		<p class="reg">Register</p>	
		<br><br>
			<div class="login-form">	
				<form action="#" method="post">
					
          <p style="color:#dfdfdf">Name</p><input type="text"  name="name" id="name1" onfocusout="f1()"/>
          <p style="color:#dfdfdf">Email-Id</p><input type="text"  name="email"  required="" id="email1" onfocusout="f1()"/>
          <p style="color:#dfdfdf">Password</p><input type="text"  name="pass"  placeholder="8 Character minimum" pattern=".{0,}." id="pass1" onfocusout="f1()"/>
          <p style="color:#dfdfdf">Jail Name</p>
          <select class="form-control" name="location" style="width: 290px;">
						<?php                        
                        $loc=mysqli_query($conn,"select location from jail");
                        while($row=mysqli_fetch_array($loc))
                        {
                            ?>
                               <option> <?php echo $row[0]; ?> </option>
                            <?php
                        }
                        ?>
					
				    </select>
		  <p style="color:#dfdfdf">Jailer-Id</p><input type="text"  name="j_id"  required="" id="j_id1" onfocusout="f1()"/>
    				


<input type="submit" value="Register" name="s">
				</form>	
			</div>	
		</div>
	</div>	
</div>	
 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
 <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>