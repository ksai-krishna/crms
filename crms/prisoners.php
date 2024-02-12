<!DOCTYPE html>
<html>
<head>
<title>View Prisoners</title>
<link rel="icon" href="./icons/criminal.jpg">
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
    if(!isset($_SESSION['x']))
    header("location:jlr_login.php");
        include("config.php");       
    if(isset($_POST['s2']))
    {
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
	$crid=0;
  $prid=$_POST['prid'];
  $_SESSION['pr_id']=$prid;
  $res=mysqli_query($conn,"select * from prisoner_details WHERE p_no='$prid' ");
  $row=mysqli_fetch_array($res);
  $prid2=$row['p_no'];
  if($prid2==$prid)
  {
    header('location:view_prisoners.php');
  }
  else
  {
    $msg="Please enter valid Prisoner ID";
    echo "<script type='text/javascript'>alert('$msg');</script>";
  }
	/* if(strcmp("$loc")!=0)
        {
            $msg="Invalid case id ";
            echo "<script type='text/javascript'>alert('$msg');</script>";
        }
        else if(strcmp("$inc_st","Unassigned")==0)
        {   
          header("location:criminal_cases.php");
            
        }
        else{
            header("location:incharge_complain_details1.php");
        } */
}
    }
    
    $query="select * from prisoner_details ";
    $result=mysqli_query($conn,$query);
        
    
    ?>


	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="style1.css">
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
        <li ><a href="jlr_login.php">Jailer Login</a></li>
          <li ><a href="jailer_page.php">Jailer Page</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">


		<li class="active" ><a href="prisoners.php">View Prisoners</a></li> 
    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">View Appointments <span class="caret"></span></a> 
        <ul class="dropdown-menu">
          <li><a href="pending.php">Pending Apoitment</a></li>
          <li><a href="Approve.php">Approved Appointments</a></li>
          <li><a href="disapprove.php">Disaproved Apointments</a></li>

        </ul>
		        <li><a href="p_logout.php">Logout &nbsp <i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
	
      </ul>
    </div>
  </div>
 </nav>
    
    
 <form style="margin-top: 7%; margin-left: 40%;" method="post">
      <input type="text" name="prid" style="width: 250px; height: 30px; background-color:white;" placeholder="&nbsp Prisoners id" id="crid" required="" onfocusout="f1()">
        <div>
      <input class="button" type="submit" value="View in details" name="s2" style="margin-top: 10px; margin-left: 11%;">      </div>
    </form>
 <div style="padding:50px;">
   <table class="table table-bordered">
    <thead class="thead-dark" style="background-color: black; color: white;">
      <tr>
        <th scope="col" class="center">prisoner Image</th>
        <th scope="col" class="center">prisoner Id</th>
        <th scope="col" class="center">Prisoner Name</th>
        <th scope="col" class="center">Addreess</th>
        <th scope="col" class="center">Phone Number</th>
        <th scope="col" class="center">Age</th>
        <th scope="col" class="center">Date of Crime</th>
      </tr>
    </thead>
<?php
while($r = mysqli_fetch_array($result)){
$cid =  $r['p_no'];
    $i="select * from prisoner_images where p_no = '$cid' ";
    $img=mysqli_query($conn,$i);

while($row = mysqli_fetch_array($img))
{

$filename=$row['file_name'];

?>
   <tbody style="background-color: white; color: black; ">
      <tr>
<td style=" width:100px; height:100px"> <img src="upload/<?= $filename ?>" width="150px" height="120px" > </td>
<?php 
?>
<td> <?php echo $r['p_no'] ?></td>
<td><?php echo $r['name'] ?></td>
<td><?php echo $r['address'] ?></td>
<td><?php echo $r['mobile_number'] ?></td>
<td><?php echo $r['age'] ?></td>
<td><?php echo $r['doc'] ?></td>
      <!--  <td><?php echo $rows['type_crime'];?></td>     
        <td><?php echo $rows['d_o_c'];?></td>
        <td><?php echo $rows['location'];?></td>
        <td><?php echo $rows['p_id']; ?></td>
	<td></td>  
	<td></td> -->
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
  <h4 style="color: white;">&copy <b>2018 Crime Portal | All Right Reserved</b></h4>
</div>

 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
 <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>