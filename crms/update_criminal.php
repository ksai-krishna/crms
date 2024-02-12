<html>
<title>Criminal Update</title>
<meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">
<?php
	
	session_start();
	include("config.php");
	require_once("encrypt_decrypt.php");
	if(!isset($_SESSION['x']))
    header("location:policelogin.php");
	
	if(isset($_POST['s'])){
	    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
// 	$q=mysqli_query($conn,"SELECT c_no from complaint where ")
	$cid1=$_POST['cid'];
	$cid2=Encrypt($cid1);
	$desc1=$_POST['desc'];
	$doc1=$_POST['doc'];
	$cid=$_SESSION['c_idd1'];
	$w=1;
	$q=1;
	$l=0;
	  if(!empty($cid1))
	  {
	  $r=mysqli_query($conn,"SELECT c_id from complaint WHERE c_id='$cid2' ");
      $row=mysqli_fetch_array($r);
      $cid=$row['c_id'];
    //   echo "<script>alert('$cid')</script>";
    //   echo "<script>alert('$cid2')</script>";
          if($cid!=$cid2)
          {
              $message1 = "The case ID is invalid";
          $w=0;
          echo "<script type='text/javascript'>alert('$message1');</script>";   
          }
    	  }else
    	  {
	   $cid1="Not mentioned";
    	  }
      
    	if($w)
    {
	$cno=$_SESSION['c_idd1'];
	$q1="Select c_id,description,doc from criminal_details where c_no='$cno' " ;
	$r1=mysqli_query($conn,$q1);
	$row=mysqli_fetch_array($r1);
	$cid=$row['c_id'];
	$desc=$row['description'];
	$doc=$row['doc'];
	
	$c=",";
	$cidu=$cid.$c.$cid1;
	$descu=$desc.$c.$desc1;
	$docu=$doc.$c.$doc1;
	
// $vid=$row['v_id'];
	$comp="UPDATE criminal_details set c_id='$cidu',doc='$docu',description='$descu' where  c_no='$cno' ";
	$res=mysqli_query($conn,$comp);
      if(!$res)
      {
        $message1 = "The update was not succesfull . Please retry";
        echo "<script type='text/javascript'>alert('$message1');</script>";
      }
      else
      {
          $message = "Record Updated Successfully";
		  $l=1;
          echo "<script type='text/javascript'>alert('$message');</script>";
  echo "<script>
  window.setTimeout(function() {
      window.location = 'view_criminals.php';
    }, 1);
  </script>";
		// echo "<script type='text/javascript'>alert('$vid');</script>";
		//   header("location:pappointment.php");
		//   header( "Refresh:300; url='pappointment.php' ");
		}
    }
  }
  
//   echo "<script>
//   window.setTimeout(function() {
//       window.location = 'view_criminals.php';
//     }, 1);
//   </script>";
  
}
?>  
<head>

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
<link rel="stylesheet" href="style1.css">
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
      <ul class="nav navbar-nav"><li ><a href="official_login.php">Official Login</a></li>
        <li ><a href="policelogin.php">Police Login</a></li>
        <li><a href="police_pending_complain.php">Police Home</a></li>
       </ul>
	   <ul class="nav navbar-nav navbar-right">

<li><a href="regcrmnl_p.php">Add a criminal</a></li> 
<li ><a href="criminal_details.php">View Criminals</a></li>
<li class="active" ><a href="update_criminal.php">Update</a></li>
<li><a href="p_logout.php">Logout &nbsp <i class="fa fa-sign-out" aria-hidden="true"></i></a></li>

</ul>
	</div>
	
  </div>
</nav>
	<br>
<div class="video" style="margin-top: 5%"> 
	<div class="center-container">
		 <div class="bg-agile">

		<p class="reg" style="color:white">Update Criminal Record  </p>
			<br><br>
			<div class="login-form">
				<form action="#" method="post" enctype='multipart/form-data'>		
		<p style="color:#dfdfdf">Case ID</p><input type="text"  name="cid" placeholder="To include multitple updates separate with , " onfocusout="f1()"/>
		<p style="color:#dfdfdf"> About Crime</p><input type="text"  name="desc" placeholder="Describe the incident with location"  required=""   onfocusout="f1()"/>
		<div class="Top-w3-agile" style="color: white">
		    <?php 
		    $c = date("Y-m-d");
		    ?>
		Date of Crime :
		<input style="background-color: #313131;color: grey" type="date" name="doc" required=""  min="<?=$c?>" onfocusout="f1()">
	</div>


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


<!--
	If the visitor registerd himself first time then he wont be to insert images 
	Don't get confused its not inserting into database.
-->