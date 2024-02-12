<!DOCTYPE html>
<html>
<title>Criminal Registration</title>
<link rel="icon" href="./icons/criminal.jpg">
<meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">
<?php
session_start();
include("config.php");
// require_once("encrypt_decrypt.php");
$result=mysqli_query($conn,"SELECT c_id FROM complaint ORDER BY no DESC LIMIT 1");


if(isset($_POST['s'])){
	    if($_SERVER["REQUEST_METHOD"]=="POST")
    {             	   
      
  $name=$_POST['name'];  
  $q1="Select * from criminal_details where name='$name' " ;
  $r1=mysqli_query($conn,$q1);
  $row=mysqli_fetch_array($r1);
  $ucid=$row['c_no'];
  //  =1;
  // if($cid)
  // {
  //    =0;
  //   $message1 = "This criminal is already in the database. Please enter the full name ofthe criminal.";
  //   echo "<script type='text/javascript'>alert('$message1');</script>";
  // }
	  $address=$_POST['adrs'];
    $desc=$_POST['desc'];
    $age=$_POST['dob'];
    $num=$_POST['num'];
    $d_o_c=$_POST['d_o_c']; 
    $gen=$_POST['gender'];
    $cid=$_POST['cid'];    
	$n=1;
  $q=1;
  $w=1;  
  $r=mysqli_query($conn,"SELECT c_id from complaint WHERE c_id='$cid' ");
  $row=mysqli_fetch_array($r);
  $ucid=$row['c_id'];
  if(empty($cid))
  {
    $cid = "NULL" ;    
    $q=0;
  }
  if($ucid==$cid)
  {
    $q=0;
  }
  if($q)
  {
    $message1 = "The case ID is invalid";
    $w=0;
    echo "<script type='text/javascript'>alert('$message1');</script>";    
  }
  $i=1;
  $f=0;
  $_SESSION['f']=$f;
  $name3 = $_FILES['file']['name'];
  $names = $_FILES['files']['name'];
  $target_dir = "upload/";
  $target_file = $target_dir . basename($_FILES["file"]["name"]);
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  $target_files = $target_dir . basename($_FILES["files"]["name"]);
  $imageFileTypes = strtolower(pathinfo($target_files,PATHINFO_EXTENSION));
  $extensions_arr = array("jpg","jpeg","png","gif");
  if( in_array($imageFileType,$extensions_arr) ){
  if( in_array($imageFileTypes,$extensions_arr) ){
  if(move_uploaded_file($_FILES['file']['tmp_name'],'upload/'.$name3)){
  if(move_uploaded_file($_FILES['files']['tmp_name'],'upload/'.$names)){		
  $image_base64 = base64_encode(file_get_contents('upload/'.$name3) );
  $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;
  $image_base64 = base64_encode(file_get_contents('upload/'.$names) );
  $images = 'data:image/'.$imageFileTypes.';base64,'.$image_base64;
  $r=mysqli_query($conn,"SELECT c_no FROM criminal_images where finger_print='$images' " );
                $row1=mysqli_fetch_array($r);                
}
}
}
}

$f=0;
     $f=$_SESSION['f'];
     if($w && $i)
    {
    
      $comp="INSERT into criminal_details(name,age,mobile_number,address,doc,gender,c_id,description) values('$name','$age',$num,'$address','$d_o_c','$gen','$cid','$desc')";
      $res=mysqli_query($conn,$comp);
      $result=mysqli_query($conn,"SELECT c_no FROM criminal_details ORDER BY c_no DESC LIMIT 1");
        $q2=mysqli_fetch_array($result);
        $cid=$q2['c_no'];
      $query1 = "insert into criminal_images(img,file_name,finger_print,file_names,c_no) values('".$image."','".$name3."','".$images."','".$names."','$cid')";
      mysqli_query($conn,$query1) or die(mysqli_error($conn));
      if(!$res)
      {
        $message1 = "Criminal is already there in the database";
        echo "<script type='text/javascript'>alert('$message1');</script>";
      }
      else
      {
          $message = "Criminal Registered Successfully";
          echo "<script type='text/javascript'>alert('$message');</script>";
      }
    }
    // else
    // {
    //  $message = "Enter the valid case ID";
    //   echo "<script type='text/javascript'>alert('$message');</script>";
    // }
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
	        <li><a href="police_pending_complain.php">Police Home </a></li>
          <li ><a href="criminal_details.php">View Criminals</a></li>
          <li class="active"><a href="regcrmnl.php">Registration </a></li>
       </ul>      
    </div>
  </div>
</nav>
	<br>
<div class="video" style="margin-top: 5%">
	<div class="center-container">
		 <div class="bg-agile">

		<p class="reg" style="color:white">Add a Criminal </p>
			<br><br>
			<div class="login-form">
				<form action="#" method="post" enctype='multipart/form-data'>			

		<p style="color:#dfdfdf">Enter the Criminal's full Name</p><input type="text"  name="name"  required="" placeholder="Like John B Smith"  onfocusout="f1()"/>
<!--		<p style="color:#dfdfdf">Criminal id</p><input type="text"  name="crid"  required=""   onfocusout="f1()"/> -->

    <div class="left-w3-agile">
    <p style="color:#dfdfdf">Case ID</p><input type="text"  name="cid" onfocusout="f1()"/>
  </div>
<div class="right-agileits">
<p style="color:#dfdfdf">Phone Number</p><input type="text"  name="num"  required pattern="[6789][0-9]{9}" minlength="10" maxlength="10"   onfocusout="f1()"/>


          </div>

		<div class="left-w3-agile">
    <p style="color:#dfdfdf">Gender</p><select class="form-control" name="gender">
							<option>Male</option>
							<option>Female</option>
								<option>Others</option>                
						</select>
</div>
<div class="right-agileits">
<p style="color:#dfdfdf">Age  </p> <input type="text"  name="dob"  required=""   onfocusout="f1()"/>
</div>
<p style="color:#dfdfdf">Address</p><textarea  name="adrs" rows="20" cols="50" placeholder="Type the Criminal's address " onfocusout="f1()"  required></textarea>
<p style="color:#dfdfdf">About Crime</p><input type="text"  name="desc"  required=""   onfocusout="f1()"/>
<div class="Top-w3-agile" style="color: #dfdfdf">
<?php
     date_default_timezone_set('Asia/Kolkata');
      $c = date("Y-m-d");
     ?>
             Date of Crime
						<input style="background-color: #313131;color: gray" type="date" name="d_o_c" max=<?=$c?> >
<br>	<br>
</div>
		<p style="color:#dfdfdf">Upload Criminals images</p><br>
	<input type="file" name="file" />
<br>
<p style="color:#dfdfdf">Upload Criminals Fingerprint</p><br>
	<input type="file" name="files" />
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
$q1="Select * from criminal_details where name='$name' " ;
$r1=mysqli_query($conn,$q1);
$row=mysqli_fetch_array($r1);
$cid=$row['c_no'];
$name2 = $_FILES['file']['name'];
$names = $_FILES['files']['name'];
$i=1;
$target_dir = "upload/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$target_files = $target_dir . basename($_FILES["files"]["name"]);
$imageFileTypes = strtolower(pathinfo($target_files,PATHINFO_EXTENSION));
$extensions_arr = array("jpg","jpeg","png","gif");
if( in_array($imageFileType,$extensions_arr) ){
if( in_array($imageFileTypes,$extensions_arr) ){
if(move_uploaded_file($_FILES['file']['tmp_name'],'upload/'.$name2)){
if(move_uploaded_file($_FILES['files']['tmp_name'],'upload/'.$names)){		
$image_base64 = base64_encode(file_get_contents('upload/'.$name2) );
$image = 'data:image/'.$imageFileType.';base64,'.$image_base64;
$image_base64 = base64_encode(file_get_contents('upload/'.$names) );
$images = 'data:image/'.$imageFileTypes.';base64,'.$image_base64;
$r=mysqli_query($conn,"SELECT c_no FROM criminal_images where finger_print='$images' " );
              $row1=mysqli_fetch_array($r);
              if($row1)
              {
                $i=0;
                $message1 = "This fingerprint is already existing in the database.This is consired as fake finerprint.";
                echo "<script type='text/javascript'>alert('$message1');</script>";                
             }
             if($i)
             {
   $query1 = "insert into criminal_images(img,file_name,finger_print,file_names,c_no) values('".$image."','".$name1."','".$images."','".$names."','$cid')";
   mysqli_query($conn,$query1) or die(mysqli_error($conn));
             }
}
}
}
}

}   
}
   ?><script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>