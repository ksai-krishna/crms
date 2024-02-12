<html>
<title>Criminal Registration</title>

<link rel="icon" href="./icons/criminal.jpg">
<!-- <?php
session_start();
if(isset($_POST['s'])){
    $con=mysqli_connect('localhost','root','','crime_portal');
    if(!$con)
    {
        die('could not connect: '.mysqli_error());
    }
	    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
       
        $name=$_POST['name'];
//	$crid=$_POST['crid'];
	$jail_name=$_POST['jln'];
	$age=$_POST['age'];
	$gender=$_POST['gender'];
	$num=$_POST['num'];
	$address=$_POST['adrs'];
        $dov=$_POST['dov'];
     	$cap=$_POST['captcha'];
	$rc=$_SESSION['cap'];
	$n=1;
	if($cap!=$rc)
	{
        $message1 = "The Entered Captcha is wrong";
        echo "<script type='text/javascript'>alert('$message1');</script>";
	$n=0;
	}
	$q=mysqli_query($con,"SELECT name from prisoner_details where name='$name' ");
	$r=mysqli_fetch_array($q);
	$pname=$r['name'];
	$w=1;
	if($pname!=$name)
	{

		$n=0;
		$m="The Prisoner is not in the database <br> Please check the name youve is correct or not.";
		echo "<script type='text/javascript'>alert('$message1');</script>";
	}
	   $var=strtotime(date("Ymd"))-strtotime($d_o_c);
    	if($var>0 && $n && $w)
	$_SESSION['name']=$name;
    {
          
      $comp="INSERT into appointment_details(name,dov) values('$name','$dov')";
      mysqli_select_db($con,"crime_portal"); 
      $res=mysqli_query($con,$comp);
      if(!$res)
      {
        $message1 = "The Prisoner is not there in the database";
        echo "<script type='text/javascript'>alert('$pname');</script>";
      }
      else if(res)
      {
       header("location:visitor.php");	
        }  
    else
    {
     $message = "Enter Valid Date";
      echo "<script type='text/javascript'>alert('$message');</script>";
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
<link href="style1.css" rel="stylesheet" />
</head>
<body>
-->
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
	        <li><a href="user_home.php">User Home </a></li>
        <li class="active"><a href="Pappointment.php"> Appointment </a></li>
       </ul>
    </div>
  </div>
</nav>
	
--><div class="video" style="margin-top: 5%"> 
	<div class="center-container">
		 <div class="bg-agile">

		<p class="reg" style="color:white">Prisoner Details </p>
			<br><br>
			<div class="login-form">
				<form action="#" method="post" enctype='multipart/form-data'>			

		<p style="color:#dfdfdf">Enter Full Name of the Prisoner</p><input type="text"  name="name"  required="" id="email" onfocusout="f1()"/>
		<p style="color:#dfdfdf">Enter Jail Name</p><input type="text"  name="jln"  required="" id="email" onfocusout="f1()"/>
		<p style="color:white">Age  </p> <input type="text"  name="age"  required="" id="email" onfocusout="f1()"/>
		<div class="left-w3-agile">
						<p style="color:#dfdfdf">Gender</p><select class="form-control" name="gender">
							<option>Male</option>
							<option>Female</option>
								<option>Others</option>
						</select>	
						</div>
						<div class="right-agileits">
			<p style="color:#dfdfdf">Mobile Number</p><input type="text"  name="num"  required="" id="email" onfocusout="f1()"/>
</div>
		<p style="color:#dfdfdf">Address</p><textarea  name="adrs" rows="20" cols="50" placeholder="Type the Prisoner's address " onfocusout="f1()" id="desc" required></textarea>
	
						
<div class="Top-w3-agile" style="color: white">
						Visit Date : &nbsp &nbsp &nbsp  
						<input style="background-color: #313131;color: grey" type="date" name="dov" required="" onfocusout="f1()">
					</div>
<br>
<p style="color:#dfdfdf">Upload Prisoners image</p><br>
	<input type="file" name="file" />   

<br>
<?php

$r=md5(random_bytes(64));
$c=substr($r, 0, 6);
$_SESSION['cap']=$c;

?>

<div class="left-w3-agile">
<p style="color:grey">Enter Captcha</p><input type="text"  name="aadhar_number" placeholder="Aadhar Number" required="" disabled value=<?php echo "$c"; ?>>
</div>
<div class="right-agileits">
<p style="color:grey">Here</p><input type="text" name="captcha" required="">
</div>


	
					<input type="submit" value="Submit" name="s">
				</form>	
			</div>	
		</div>
	</div>	
</div>	

    <?php
         if(isset($_POST['s'])){ 
	 $con=mysqli_connect('localhost','root','','crime_portal');
    if(!$con)
    {
        die('could not connect: '.mysqli_error());
    } 

 if($_SERVER["REQUEST_METHOD"]=="POST")
    {
//$cid=$_POST['crid'];
$name=$_POST['name'];
$q1="Select p_no from prisoner_details where name='$name' " ;
$r1=mysqli_query($con,$q1);
$row=mysqli_fetch_array($r1);
$pid=$row['p_no'];


        $name = $_FILES['file']['name'];
        $target_dir = "upload/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $extensions_arr = array("jpg","jpeg","png","gif");
        if( in_array($imageFileType,$extensions_arr) ){
            if(move_uploaded_file($_FILES['file']['tmp_name'],'upload/'.$name)){
                $image_base64 = base64_encode(file_get_contents('upload/'.$name) );
                $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;   
                $query = "insert into visitor_img(img,file_name,p_id) values('".$image."','".$name."',$pid)";
                mysqli_query($con,$query) or die(mysqli_error($con));
            }
       }
        }    
}   
}

   ?>



<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js">
</script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js">
</script>
</body>
</html>