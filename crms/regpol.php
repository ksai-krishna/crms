<!DOCTYPE html>
<html>
    <head>
<title>Police Registration</title>
<link rel="icon" href="./icons/pol.jpg">
<meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">
<style>
.reg
{
color:white;
text-align:center;
font-size:28px;
}
</style>
<?php
session_start();
include("config.php");
if(isset($_POST['s'])){
  
    if($_SERVER["REQUEST_METHOD"]=="POST"){
	$p_id=$_POST['p_id'];
  $p_name=$_POST['name'];
  $pass=$_POST['pass'];
  // $p_pass=Encrypt($pass);
  $p_pass=$pass;
  $p_mail=$_POST['email'];
  $location=$_POST['location'];
	
	$n=1;
  $m=1;
  
  
  $query="select * from police where p_id='$p_id' ";
  $result=mysqli_query($conn,$query);
    if(!$result)
    {
      $msg="The police id  is already taken .Please enter valid ID  ";
      echo "<script type='text/javascript'>alert('$msg');</script>";
    $m=0;
    }
	if($m)
	{
	$reg="insert into pol_appointmen (p_mail, p_name, id, location, p_pass) values('$p_mail','$p_name','$p_id','$location','$p_pass')";

        $res=mysqli_query($conn,$reg);
        if(!$res)
        {
        $message1 = "Police officer with the same id Already Exist";
        echo "<script type='text/javascript'>alert('$message1');</script>";
        }
        else
        {
        $message = "Your application registered succesfully . Please contact your Admin for approval";
        echo "<script type='text/javascript'>alert('$message');</script>";
        echo "<script>
        window.setTimeout(function() {
            window.location = policelogin.php';
          }, 1)
        </script>";
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
	   		var sta4=document.getElementById("p_id").value;
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
	   document.getElementById("p_id").value="";
	   document.getElementById("p_id").focus();
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
function search(ele) {
  var i=ele.value;
    if(event.key === 'Enter') {
        var i=ele.value;
        alert(i)
      }
}
</script>
<?php
//$v="hello";
//$var =  "<script type='text/javascript'>echo (document.write(i) );</script>";
//echo "<script type='text/javascript'>alert('$var');</script>";
?>
    


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
           <li><a href="official_login.php">Official Login</a></li>
           <li><a href="policelogin.php">Police Login</a></li>
	    <li class="active"><a href="regpol.php">Police Register</a></li>
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
					
          <p style="color:#dfdfdf">Name</p><input type="text"  name="name" id="name1" required onfocusout="f1()"/>
          <p style="color:#dfdfdf">Email-Id</p><input type="email"  name="email"  required="" id="email1" onfocusout="f1()"/>
          <p style="color:#dfdfdf">Password</p><input type="text"  name="pass"  placeholder="8 Character minimum" pattern=".{7,}." required id="pass1" onfocusout="f1()"/>
          <i class="bi bi-eye-slash" id="togglePassword"></i>
          <p style="color:#dfdfdf">Police station Name</p>
          <select class="form-control" name="location" style="width: 290px;">
						<?php                        
                        $loc=mysqli_query($conn,"select location from police_station");
                        while($row=mysqli_fetch_array($loc))
                        {
                            ?>
                               <option> <?php echo $row[0]; ?> </option>
                            <?php
                        }
                        ?>
					
				    </select>
          <!-- <p style="color:#dfdfdf">Police station Name</p><input type="text"  name="station"  required="" id="station1" onfocusout="f1()"/> -->
	  <!-- <p style="color:#dfdfdf">Police-Id</p><input type="text"  name="p_id"  required="" id="p_id1" onfocusout="f1()"/>
   -->
   <p style="color:#dfdfdf"> Police-Id <input type="text" name="p_id"  required="" id="p_id1" onfocusout="f1()" placeholder="" class="search" onkeydown="search(this)"/></p>
<?php
if(isset($_POST['s'])){  
    if($_SERVER["REQUEST_METHOD"]=="POST"){
	  $p_id=$_POST['p_id'];
    $result=mysqli_query($conn,"select p_id from police where p_id='$p_id' ");
    if(!$result)
    {
        $msg="Please enter your valid police ID in the department";
      echo "<script type='text/javascript'>alert('$msg');</script>";
    }
  }
}
?>


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