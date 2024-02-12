<!DOCTYPE html>
<html>
<head>
<title>Evidence</title>
 <link rel="icon" href="./icons/pol.png">
<style>

.center {
  text-align:center;
} 

td{
text-align:center;
}
</style>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
	  
    
</head>
<body style="background-color: #dfdfdf">
	<nav  class="navbar navbar-default navbar-fixed-top">
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
        <li ><a href="official_login.php">Official Login</a></li>
        <li ><a href="policelogin.php">Police Login</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">

		
		<li class="active" ><a href="View_new_evidence.php">Evidence</a></li> 
    <li ><a href="police_complainDetails.php">Complainant details</a></li>   
		        <li><a href="p_logout.php">Logout &nbsp <i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
	
      </ul>
    </div>
  </div>
 </nav>
      
    
    
 <br>   
 <div style="padding:50px;">
   <table class="table table-bordered">
    <thead class="thead-dark" style="background-color: black; color: white;">
      <tr>
        <th scope="col" class="center">Evidence</th>
        <th scope="col" class="center">Reason of upload</th>
        <th scope="col" class="center">Date of Upload</th>
      </tr>
    </thead>
<?php 
 session_start();
 include("config.php");
//  require_once("encrypt_decrypt.php");
$cid=$_SESSION['cid'];
$result=mysqli_query($conn,"select * from update_case where c_id='$cid'");
while($row = mysqli_fetch_array($result))
{
$filename=$row['file_name'];
$fle="";
$n=1;
if($filename==$fle)
{
  $n=0;
}
if($n)
{
?>
   <tbody style="background-color: white; color: black; ">
      <tr>
<td class="a" style="width:400px; height:300px"> <img src="upload/<?= $filename ?>" width="400px" height="300px" > </td>
<td class="a" > <?php echo  $row['reason_of_upload']; ?></td>
<td class="a" > <?php echo  $row['d_o_u']; ?></td>
      </tr>
    </tbody>
    
    <?php
    } 
}
    ?>
  
</table>
 </div>
    <div style="position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   height: 30px;
   background-color: rgba(0,0,0,0.8);
   color: white;
   text-align: center;">
  <h4 style="color: white;">&copy <b>2022 Crime Portal | All Right Reserved</b></h4>
</div>

 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
 <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>