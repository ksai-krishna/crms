<!DOCTYPE html>
<html>
<title>Visitor Registration</title>
<link rel="icon" href="./icons/criminal.jpg">
<?php
	session_start();
	include("config.php");
	$vid=$_SESSION['vidd'];
if(isset($_POST['s'])){
	    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
	$pno=$_SESSION['pno'];
	$name=$_POST['name'];
	$mail=$_POST['email'];
	$address=$_POST['adrs'];
	$age=$_POST['age'];
	$gender=$_POST['gender'];
	$num=$_POST['num'];
	$relation=$_POST['relation'];
	$idprf=$_POST['idprf'];
	$comp="UPDATE appointment_details set v_name='$name',age='$age',id_type='$idprf',relation='$relation',mobile_number='$num',gender='$gender' where  v_id='$vid' ";
	$res=mysqli_query($conn,$comp);
	//$_SESSION['toc']=$type_crime;
	$l=0;
      if(!$res)
      {
        $message1 = "Your Appointment is already scheduled";
        echo "<script type='text/javascript'>alert('$message1');</script>";
      }
      else
      {
          $message = "Appointment scheduled Successfully";
		  $l=1;
          echo "<script type='text/javascript'>alert('$message');</script>";
      echo "<script>
  window.setTimeout(function() {
      window.location = 'appointment_status.php';
    }, 1);
  </script>";
		// echo "<script type='text/javascript'>alert('$vid');</script>";
		//   header( "Refresh:300; url='pappointment.php' ");
		}
	  
    }
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
      <ul class="nav navbar-nav">
	        <li><a href="complainer_page.php">User Home  </a></li>
        <li class="active"><a href="pappointment.php">New Appointment </a></li>
       </ul>
    </div>
  </div>
</nav>
	
<div class="video" style="margin-top: 5%"> 
	<div class="center-container">
		 <div class="bg-agile">

		<p class="reg" style="color:white">Visitor Details </p>
			<br><br>
			<div class="login-form">
				<form action="#" method="post" enctype='multipart/form-data'>

		<p style="color:#dfdfdf">Enter Your Full Name</p><input type="text"  name="name"  required="" id="email" onfocusout="f1()"/>
		<p style="color:#dfdfdf"> Email-id </p><input type="text"  name="email"  required="" id="email" onfocusout="f1()"/> 	
		<p style="color:white">Age  </p> <input type="number"  name="age" required=""  min="5" max="150" id="email" onfocusout="f1()"/>
		<p style="color:#dfdfdf">Address</p><textarea  name="adrs" rows="20" cols="50" placeholder="Please enter your address " onfocusout="f1()" id="desc" required></textarea>

			<div class="left-w3-agile">
						<p style="color:#dfdfdf">Gender</p><select class="form-control" name="gender">
							<option>Male</option>
							<option>Female</option>
								<option>Others</option>
						</select>
					</div>
					<div class="right-agileits">
					<p style="color:#dfdfdf">  Mobile Number</p><input type="text"  name="num"  required="" id="email" required pattern="[6789][0-9]{9}" minlength="10" maxlength="10" onfocusout="f1()"/>

					</div>
<div class="left-w3-agile">
<p style="color:#dfdfdf">Relation</p><select class="form-control" name="relation">
							<option>Mother</option>
							<option>Father</option>
							<option>Brother</option>
							<option>Sister</option>
							<option>Aunt</option>
							<option>Uncle</option>
							<option>Brother in law</option>
							<option>Son</option>
							<option>Daughter</option>
							<option>Friend</option>
							<option>Grand Mother</option>
							<option>Grand Father</option>
							<option>Husband/Wife</option>
						</select>
</div>

<div class="right-agileits">
<p style="color:#dfdfdf">Identity Proof Type</p><select class="form-control" name="idprf">
							<option>Aadhar Card</option>
							<option>Driving Licence</option>
							<option>Pan Card</option>
							<option>Passport</option>
							<option>Voter ID</option>
						</select>
</div>

<br><p style="color:#dfdfdf">Upload Visitors image</p><br>
	<input type="file" required="" name="file" />   

 <br><p style="color:#dfdfdf">Upload Identity proof</p><br>
	<input type="file" required="" name="files" />  

<br>




					<input type="submit" value="Submit" name="s">
				</form>	
			</div>	
		</div>
	</div>	
</div>	


    <?php
         if(isset($_POST['s'])){ 
	 
 if($_SERVER["REQUEST_METHOD"]=="POST")
    {
$idprf=$_POST['idprf'];
$q1="Select * from appointment_details where v_id='$vid' " ;
$r1=mysqli_query($conn,$q1);
$row=mysqli_fetch_array($r1);
$type1=$row['id_type'];




$name = $_FILES['file']['name'];
$names = $_FILES['files']['name'];
$target_dir = "upload/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$target_files = $target_dir . basename($_FILES["files"]["name"]);
$imageFileTypes = strtolower(pathinfo($target_files,PATHINFO_EXTENSION));


$extensions_arr = array("jpg","jpeg","png","gif");

if( in_array($imageFileType,$extensions_arr) ){
  if( in_array($imageFileTypes,$extensions_arr) ){
	if(move_uploaded_file($_FILES['file']['tmp_name'],'upload/'.$name)){
	if(move_uploaded_file($_FILES['files']['tmp_name'],'upload/'.$names)){		
		$image_base64 = base64_encode(file_get_contents('upload/'.$name) );
		$image = 'data:image/'.$imageFileType.';base64,'.$image_base64;
		$image_base64 = base64_encode(file_get_contents('upload/'.$names) );
		$images = 'data:image/'.$imageFileTypes.';base64,'.$image_base64;

	$query = "insert into v_img(v_img,file_name,id_proof,filename,id_type,v_id) values('".$image."','".$name."','".$images."','".$names."','$idprf','$vid')";   
		mysqli_query($conn,$query) or die(mysqli_error($conn));
			}
		}
		}
	}
	
}   
}
   ?>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>	
</html>