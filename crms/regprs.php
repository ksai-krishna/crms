<html>
<title>Prisoner Registration</title>
<link rel="icon" href="./icons/criminal.jpg">

<?php
session_start();
include("config.php");
if(isset($_POST['s'])){   
	    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
             	   
        $name=$_POST['name'];
//	$crid=$_POST['crid'];
	$mail=$_POST['email'];
	$address=$_POST['adrs'];
        $desc=$_POST['desc'];
	$age=$_POST['dob'];
	$num=$_POST['num'];
	//$_SESSION['toc']=$type_crime;
  $d_o_c=$_POST['d_o_c']; 
	$duration=$_POST['duration'];
	$bel=$_POST['blngs'];
	$dor=$_POST['dor'];
	$doe=$_POST['doe'];
     	$cap=$_POST['captcha'];
	$rc=$_SESSION['cap'];
	$n=1;
	if($cap!=$rc)
	{
        $message1 = "The Entered Captcha is wrong";
        echo "<script type='text/javascript'>alert('$message1');</script>";

	$n=0;
	}

	
	   $var=strtotime(date("Ymd"))-strtotime($d_o_c);
    	if($var>0 && $n)
    {
          
      $comp="INSERT into Prisoner_details(name,age,mobile_number,address,email,doc,duration,belongings,crime_description) values('$name','$age','$num','$address','$mail','$d_o_c','$duration','$bel','$desc','$rel')";
      mysqli_select_db($con,"crime_portal"); 
      $res=mysqli_query($con,$comp);    
      if(!$res)
      {
        $message1 = "Prisoner is already there in the database";
        echo "<script type='text/javascript'>alert('$message1');</script>";
      }
      else
      {
          $message = "Prisoner Registered Successfully";
          echo "<script type='text/javascript'>alert('$message');</script>";
      }
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
<link rel="stylesheet" href="style1.css">
</head>
<body style="background-size: cover
    background-image: url(home_bg1.jpeg);
    background-position: center;" >

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
	        <li><a href="jailer_page.php">Jailer Page </a></li>
        <li class="active"><a href="regprs.php">Registration </a></li>
       </ul>
    </div>
  </div>
</nav>
	
<div class="video" style="margin-top: 5%"> 
	<div class="center-container">
		 <div class="bg-agile">

		<p class="reg" style="color:white">Add a Prisoner </p>
			<br><br>
			<div class="login-form">
				<form action="#" method="post" enctype="multipart/form-data">

		<p style="color:#dfdfdf">Prisoner Name</p><input type="text"  name="name"  required=""   onfocusout="f1()"/>
<!--		<p style="color:#dfdfdf">Prisoner id</p><input type="text"  name="crid"  required=""   onfocusout="f1()"/> -->
		<p style="color:#dfdfdf">Email-Id</p><input type="text"  name="email"  required=""   onfocusout="f1()"/>
		<p style="color:#dfdfdf">Address</p><textarea  name="adrs" rows="20" cols="50" placeholder="Type the Prisoner's address " onfocusout="f1()" id="desc" required></textarea>
		<p style="color:#dfdfdf">Phone Number</p><input type="text"  name="num"  required pattern="[6789][0-9]{9}" minlength="10" maxlength="10"   onfocusout="f1()"/>
		<p style="color:#dfdfdf">About Crime</p><input type="text"  name="desc"  required=""   onfocusout="f1()"/>
		<p style="color:#dfdfdf">Age  </p> <input type="text"  name="dob"  required=""   onfocusout="f1()"/>
	<br>
							<div class="Top-w3-agile" style="color: #dfdfdf">

					Date Of Crime   : &nbsp &nbsp  &nbsp &nbsp
						<input style="background-color: #313131;color: gray" type="date" name="d_o_c" required>
<br><br>
					Date Of Release : &nbsp &nbsp  
						<input style="background-color: #313131;color: gray" type="date" name="dor">
<br><br>
					Date Of Execution: 
						<input style="background-color: #313131;color: gray" type="date" name="doe">


					</div>				
	<br>	<p style="color:#dfdfdf">Punishment Duration</p><input type="text"  name="duration"  required=""   onfocusout="f1()"/>

		<p style="color:#dfdfdf">Fine</p><input type="text"  name="fine"  required=""   onfocusout="f1()"/>
		<p style="color:#dfdfdf">Prisoners Belongings</p><input type="text"  name="blngs"  required=""   onfocusout="f1()"/>		
		<p style="color:#dfdfdf">Upload Prisoners image</p><br>
	<input type="file" name="file" />   
<br>

<?php
function random_strings()
{
    $str_result = '012345678901234567890123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    $cap= substr(str_shuffle($str_result),0, 5);
    echo "$cap";
    $_SESSION['cap']=$cap;
  }

?>
<div class="left-w3-agile">
<p style="color:grey">Enter Captcha</p><input type="text"  name="aadhar_number" placeholder="Enter Captcha" required="" disabled value=<?php $n=4; echo random_strings(); ?> >
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
$mail=$_POST['email'];
$q1="Select c_no from prisoner_details where email='$mail' " ;
$r1=mysqli_query($con,$q1);
$row=mysqli_fetch_array($r1);
$cid=$row['c_no'];
$_SESSION['cid']=$cid;


        $name = $_FILES['file']['name'];
        $target_dir = "upload/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $extensions_arr = array("jpg","jpeg","png","gif");
        if( in_array($imageFileType,$extensions_arr) ){
            if(move_uploaded_file($_FILES['file']['tmp_name'],'upload/'.$name)){
                $image_base64 = base64_encode(file_get_contents('upload/'.$name) );
                $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;   
                $query = "insert into prisoner_details(img,file_name) values('".$image."','".$name."',$cid)";
                mysqli_query($con,$query) or die(mysqli_error($con));
            }
        }    
}   
}
   ?>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>