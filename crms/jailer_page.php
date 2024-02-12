<!DOCTYPE html>
<html>
<title>Prisoner Registration</title>
<link rel="icon" href="./icons/criminal.jpg">

<?php
session_start();
include("config.php");
$jid=$_SESSION['jlr'];
$query=mysqli_query($conn,"SELECT jailer_name FROM jailer where jailer_id='$jid' ");
$row=mysqli_fetch_array($query);
$jname=$row['j_name'];
if(isset($_POST['s'])){
	    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $name=$_POST['name'];
        $address=$_POST['adrs'];
        $desc=$_POST['desc'];
        $age=$_POST['dob'];
        $num=$_POST['num'];
        $d_o_c=$_POST['d_o_c']; 
        $doc=$_POST['d_o_c']; 
        $duration=$_POST['duration'];
        $bel=$_POST['blngs'];
        $dor=$_POST['dor'];
        $gen=$_POST['gender'];
        $fine=$_POST['fine'];
        if($fine && $bel)
        {
          $comp="INSERT into prisoner_details(name,age,mobile_number,address,doc,duration,belongings,crime_description,dor,gender,jail_name,fine)
          values('$name','$age','$num','$address','$d_o_c','$duration','$bel','$desc','$dor','$gen','$jname','$fine')";
        }else if($fine){
      $comp="INSERT into prisoner_details(name,age,mobile_number,address,doc,duration,crime_description,dor,gender,jail_name,fine)
      values('$name','$age','$num','$address','$d_o_c','$duration','$desc','$dor','$gen','$jname','$fine')";
    }else if($bel)
    {
      $comp="INSERT into prisoner_details(name,age,mobile_number,address,doc,duration,belongings,crime_description,dor,gender,jail_name)
      values('$name','$age','$num','$address','$d_o_c','$duration','$bel','$desc','$dor','$gen','$jname')";
    }else if(!$bel && !$fine)
    {
      $comp="INSERT into prisoner_details(name,age,mobile_number,address,doc,duration,crime_description,dor,gender,jail_name) 
      values('$name','$age','$num','$address','$d_o_c','$duration','$desc','$dor','$gen','$jname')";
    }
      $res=mysqli_query($conn,$comp);
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
<link href="jailer_page.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="style1.css">
</head>
<body style="background-size: cover
    background-image: url(bgprsn.png);

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
      <li><a href="official_login.php">Official page</a></li>
      <li class="active"><a href="jailer_page.php">Registration </a></li>
       </ul>
      <ul class="nav navbar-nav navbar-right">	
	<li><a href="prisoners.php">View Prisoners</a></li>
        <li><a href="pending.php">Approve Appointment</a></li>
        <!-- <li><a href="alert.php">Alert</a></li>    -->
        <li><a href="J_logout.php">Logout &nbsp <i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
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
		<p style="color:#dfdfdf">Address</p><textarea  name="adrs" rows="20" cols="50" placeholder="Type the Prisoner's address " onfocusout="f1()" id="desc" required></textarea>
    <div class="left-w3-agile">
    <p style="color:#dfdfdf">Age  </p> <input type="text"  name="dob"  required=""   onfocusout="f1()"/>
</div>
<div class="right-agileits">    
<p style="color:#dfdfdf">Gender  </p> <select class="form-control" name="gender">
							<option>Male</option>
							<option>Female</option>
								<option>Others</option>
						</select>
            <br>
          </div>

<p style="color:#dfdfdf">Phone Number</p><input type="text"  name="num"  required pattern="[6789][0-9]{9}" minlength="10" maxlength="10"   onfocusout="f1()"/>
<p style="color:#dfdfdf">Punishment Duration</p><input type="text"  name="duration"  required=""   onfocusout="f1()"/>

    <p style="color:#dfdfdf">About Crime</p><textarea type="text"  name="desc"  required=""   onfocusout="f1()"></textarea>
    <div class="Top-w3-agile" style="color: #dfdfdf">

     <?php
     date_default_timezone_set('Asia/Kolkata');
      $c = date("Y-m-d");
     ?>
                Date Of Crime   : &nbsp &nbsp  &nbsp &nbsp &nbsp  
						<input style="background-color: #313131;color: gray" type="date" name="d_o_c" requuired max=<?=$c?> >        
            <br><br>
					Date Of Release : &nbsp &nbsp
						<input style="background-color: #313131;color: gray" type="date" name="dor" min=<?=$c?> >
<br><br>

					</div>				
	

		<p style="color:#dfdfdf">Fine</p><input type="text"  name="fine" placeholder="Optional" onfocusout="f1()"/>
		<p style="color:#dfdfdf">Prisoners Belongings</p><input type="text"  name="blngs" placeholder="Optional" onfocusout="f1()"/>
		<p style="color:#dfdfdf">Upload Prisoners image</p><br>
	<input type="file" name="file" />   
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
            $name=$_POST['name'];
            $q1="Select p_no from prisoner_details where name='$name' " ;
            $re1=mysqli_query($conn,$q1);
            $row=mysqli_fetch_array($re1);
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
                    $query = "insert into prisoner_images(img,file_name,p_no) values('".$image."','".$name."',$pid)";
                    mysqli_query($conn,$query) or die(mysqli_error($conn));
            }
        }
    }
}
   ?>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>