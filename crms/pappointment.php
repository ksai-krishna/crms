<html>
<head>
<title>Appointment</title>
<link rel="icon" href="./icons/criminal.jpg">
<meta name="viewport" content="width=device-width, initialvisi-scale=1.0">
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

<?php
session_start();
include("config.php");
$result=mysqli_query($conn,"SELECT v_id FROM appointment_details ORDER BY v_id DESC LIMIT 1");
$q2=mysqli_fetch_array($result);
$v_id=$q2['v_id'];
$v_id=$v_id+1;
$_SESSION['vidd']=$v_id;
        $_SESSION['y']=1;
if(isset($_POST['s1'])){
  
  
  
	    if($_SERVER["REQUEST_METHOD"]=="POST")
    {

      
    $name=$_POST['name'];
	$jail_name=$_POST['jln'];	
    $age=$_POST['age'];
	$gender=$_POST['gender'];
	$num=$_POST['num'];
    $dov=$_POST['dov'];
    $_SESSION['dov']=$dov;
    $s=1;
    $uid=$_SESSION['u_id'];
    $w=1;
    $q=mysqli_query($conn,"SELECT name,p_no from prisoner_details where name='$name' ");
	$r=mysqli_fetch_array($q);
	$pname=$r['name']; 
	$pid=$r['p_no'];
    $_SESSION['pno']=$pid;
	if($pname!=$name)
	{
    $w=0;
		$m="The Prisoner is not in the database. Please check the name youve is correct or not.";
		echo "<script type='text/javascript'>alert('$m');</script>";
  }
  if($w)
  {
    
    $_SESSION['prname']=$pname;
    $comp="INSERT into appointment_details(uid,name,p_id,dov,jail_name) values('$uid','$name','$pid','$dov','$jail_name')";
    $res=mysqli_query($conn,$comp);
      if(!$res)
      {
        $message5= "The Prisoner is not there in the database";
        echo "<script type='text/javascript'>alert('$message5');</script>";              
      }
      else if($res)
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

$_SESSION['names']=$pname;
}

?>  


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
	        <li><a href="complainer_page.php">User Home </a></li>
        <li class="active"><a href="Pappointment.php"> Appointment </a></li>
       </ul>
    </div>
  </div>
</nav> 
	
<br>
<div class="video" style="margin-top: 5%"> 
<div class="center-container">
		 <div class="bg-agile">
		<p class="reg" style="color:white">Prisoner Details </p>
			<br><br>
			<div class="login-form">
			<form action="#" method="post" enctype='multipart/form-data'>
		   <p style="color:#dfdfdf">Enter Full Name of the Prisoner</p><input type="text"  name="name"  required="" id="email" onfocusout="f1()"/>
    <p style="color:#dfdfdf">Enter Jail Name</p>
          <select class="form-control" name="jln" style="width: 290px;">
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
		<p style="color:white">Age  </p> <input type="number"  name="age" required=""  min="5" max="150" id="email" onfocusout="f1()"/>
		<div class="left-w3-agile">
						<p style="color:#dfdfdf">Gender</p><select class="form-control" name="gender">
							<option>Male</option>
							<option>Female</option>
								<option>Others</option>
						</select>	
						</div>
						<div class="right-agileits">
			<p style="color:#dfdfdf">Mobile Number</p><input type="text"  name="num"  required="" id="email" required pattern="[6789][0-9]{9}" minlength="10" maxlength="10" onfocusout="f1()"/>
</div>

    <?php
    //  date_default_timezone_set('Asia/Kolkata');
    date_default_timezone_set("Asia/Kolkata");
// $date = date("Y-m-d");      
// echo "<script>alert('$date');</script>";
$c = date("Y-m-d");
?>
<div class="Top-w3-agile" style="color: white">
						Visit Date : 
						<input style="background-color: #313131;color: grey" type="date" name="dov" required=""  min="<?=$c?>"  onfocusout="f1()">
					</div>
<br>
<p style="color:#dfdfdf">Upload Prisoners image</p><br>
	<input type="file" name="file" required="" />

<br>

	
					<input type="submit" value="Submit" name="s1">
				</form>	
			</div>	
		</div>
	</div>	
</div>	


    <?php
         if(isset($_POST['s1'])){
 if($_SERVER["REQUEST_METHOD"]=="POST")
    {
//$cid=$_POST['crid'];
        $name=$_POST['name'];
        $q1="Select p_no from prisoner_details where name='$name' " ;
        $r1=mysqli_query($conn,$q1);
        $row=mysqli_fetch_array($r1);
        $pid=$row['p_no'];
        $_SESSION['pid']=$pid;
        $vid=$_SESSION['vidd'];
        $name = $_FILES['file']['name'];
        $target_dir = "upload/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $extensions_arr = array("jpg","jpeg","png","gif");
        if( in_array($imageFileType,$extensions_arr) ){
            if(move_uploaded_file($_FILES['file']['tmp_name'],'upload/'.$name)){
                $image_base64 = base64_encode(file_get_contents('upload/'.$name) );
                $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;   
                $query = "insert into visitor_img(img,file_name,p_id,v_id) values('".$image."','".$name."',$pid,$vid)";
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