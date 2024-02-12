<!DOCTYPE html>
<html>
<head>
<title>View criminal's</title>
<link rel="icon" href="./icons/pol.jpg">

<style>

.center {
  text-align:center;
} 

td{
text-align:center;
}
</style>
    <?php
    session_start();
    include("config.php");
    require_once('encrypt_decrypt.php');
    if(!isset($_SESSION['x']))
        header("location:policelogin.php");
    if(isset($_POST['s2']))
    {
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $cid=$_POST['cid'];
        $_SESSION['c_idd1']=$cid;
        $crid=0;
        $res=mysqli_query($conn,"select * from criminal_details WHERE c_no='$cid' ");
        $row=mysqli_fetch_array($res);
        $c_id2=$row['c_no'];
        if($c_id2==$cid)
        {
          header('location:view_criminals.php');
        }
        else
        {
          $msg="Please enter valid Criminal ID";
          echo "<script type='text/javascript'>alert('$msg');</script>";
        }
}
    }
    $query="select * from criminal_details ";
    $result=mysqli_query($conn,$query);
        
    
    ?>


	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
	
    <script>
     function f1()
        {
          var sta2=document.getElementById("ciid").value;
          var x2=sta2.indexOf(' ');
     if(sta2!="" && x2>=0)
     {
        document.getElementById("ciid").value="";
        alert("Blank Field not Allowed");
      }
}
</script>

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
        <li ><a href="police_pending_complain.php">Police Home</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Add a criminal<span class="caret"></span></a>
        <ul class="dropdown-menu">
    <li><a href="regcrmnl_p.php">Add a criminal</a></li>
  <li><a href="criminal_details.php">View Criminals</a></li>
  <li><a href="fingerprint.php">View by fingerprnit</a></li>
        </ul>
        <li>
    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">View Complaints<span class="caret"></span></a>
        <ul class="dropdown-menu">
        <li><a href="Assigned_complain.php">Assigned Complaints</a></li>
          <li><a href="police_pending_complain.php">Pending Complaints</a></li>
          <li><a href="police_complete.php">Completed Complaints</a></li>

        </ul>
		        <li><a href="p_logout.php">Logout &nbsp <i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
	
      </ul>
    </div>
  </div>
 </nav>
    <br>
    <form style="margin-top:7%; margin-left: 40%;" method="post">
      <input type="text" name="cid" style="width: 250px; height: 30px; background-color:white;" placeholder="&nbsp Criminal Id" id="ciid" onfocusout="f1()" required>
        <div>
      <input class="btn btn-primary" type="submit" value="Search" name="s2" style="margin-top: 10px; margin-left: 11%;">
        </div>
    </form>
    
    
    
 <div style="padding:50px;">
   <table class="table table-bordered">
    <thead class="thead-dark" style="background-color: black; color: white;">
      <tr>
        <th scope="col" class="center">Criminal Image</th>
        <th scope="col" class="center">Criminal Id</th>
        <th scope="col" class="center">Criminal Name</th>
        <th scope="col" class="center">Phone Number</th>
        <th scope="col" class="center">Age</th>
	<th scope="col" class="center">Date of Crime</th>
  <th scope="col" class="center">Crime Description</th>
      </tr>
    </thead>
<?php 
while($r = mysqli_fetch_array($result)){
$cid =  $r['c_no'];
// echo "<script>alert('$cid');</script>";
    $i="select * from criminal_images where c_no = '$cid' ";
    $img=mysqli_query($conn,$i);

while($row = mysqli_fetch_array($img))
{

$filename=$row['file_name'];
// echo "<script>alert('$filename');</script>";
?>
   <tbody style="background-color: white; color: black; ">
      <tr>
<td style=" width:100px; height:100px"> <img src="upload/<?= $filename ?>" width="150px" height="120px" > </td>
<td> <?php echo $r['c_no'] ?></td>
<td> <?php echo $r['name'] ?></td>
<td><?php echo $r['mobile_number'] ?></td>
<td><?php echo $r['age'] ?></td>
<td><?php echo $r['doc'] ?></td>
<td><?php echo $r['description'] ?></td>
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