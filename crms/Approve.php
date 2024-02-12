<!DOCTYPE html>
<html>
<head>
<title>Approved Appointments</title>
<link rel="icon" href="./icons/apmt.png">
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
    header("jlr_login.php");
    include("config.php");
    if(isset($_POST['s2']))
    {
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
    $vid=$_POST['vid'];    
    $_SESSION['vidd']=$vid;
    $v=$_SESSION['vidd'];
    $aprv="Approved";
    $w="select v_id from appointment_details where status='$aprv' AND v_id='$vid' ";
    $re=mysqli_query($conn,$w);
    $ro=mysqli_fetch_array($re);
    $vid1=$ro['v_id'];
    if($vid==$vid1)
    { 
      header("location:aptmt_details_ja.php  ");     
      
    }
    else{
      $msg="Invalid Visitor id";
      echo "<script type='text/javascript'> alert('$msg');</script> ";
    }
    /* 
    $h=mysqli_fetch_array($re);
    $r=$h['status'];
    $aprv="Approved";
    $daprv="Disapproved";
    $stat="In Progress";
    $n=0;
    if(!$r)
    {
        $o="Please enter valid Visitor ID";
        echo "<script type='text/javascript'> alert('$o');</script> ";
    }
    if($r==$aprv)
    {
      $n=3;      
    }
    elseif($r==$daprv)
    {
      $n=2;            
    }
    else if($r==$stat){
      $n=1;
    
    }else{

    }
    if($n==3)
    {
      $o="This Appointment is aleready Approved";
      echo "<script type='text/javascript'> alert('$o');</script> ";            
    }
    elseif($n==2)
    {
      $o="This Appointment is Disaproved";
      echo "<script type='text/javascript'> alert('$o');</script> ";            
    }
    elseif($n==1){
      header("location:aptmt_details.php");  
    }
    */
    
      $vid=0;
        
        $_SESSION['vid']=$vid;        
        $qu=mysqli_query($conn,"select inc_status,location from complaint where c_id='$vid'");
        
        $q=mysqli_fetch_array($qu);
        $inc_st=$q['inc_status'];
        $loc=$q['location'];   
//        header("location:aptmt_details.php");  


        
  
        
       
	/* if(strcmp("$loc")!=0)
        {
            $msg="Invalid case id ";
            xript type='text/javascript'>alert('$msg');</script>";
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
    $status="Approved";
    $query="select * from appointment_details WHERE status='$status' ";
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
function take()
{
window.location.href="http://localhost/crms/aptmt_details.php" ;
}

</script>
    
</head>
<body style="background-color: #dfdfdf">
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="home.php"><b>Crime Portal</b></a>
    </div>
    
    <ul class="nav navbar-nav navbar-left">
    <li><a href="official_login.php"><span></span> Official Login</a></li>
      <li><a href="jlr_login.php"><span></span> Jailer Login</a></li>
      <li><a href="jailer_page.php"><span></span> Jailer Page</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">            
      <li><a href="prisoners.php">View Prisoners</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">View Appointments <span class="caret"></span></a> 
        <ul class="dropdown-menu">
          <li><a href="pending.php">Pending Apoitment</a></li>
          <li><a href="Approve.php">Approved Appointments</a></li>
          <li><a href="disapprove.php">Disaproved Apointments</a></li>

        </ul>
        <li><a href="J_logout.php">Logout &nbsp <i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
      </li>
    </ul>
  </div>
</nav>
  
    
 <form style="margin-top: 7%; margin-left: 40%;" method="post">
      <input type="text" name="vid" style="width: 250px; height: 30px; background-color:white;" placeholder="&nbsp Enter Visitor id" id="crid" required="" onfocusout="f1()">
        <div>
      <input class="button" type="submit" value="View in detail" name="s2" style="margin-top: 10px; margin-left: 11%; ">
      </div>
    </form>            

 <div style="padding:50px;">
   <table class="table table-bordered">
    <thead class="thead-dark" style="background-color: black; color: white;">
      <tr>
        <th scope="col" class="center">Visitor Image</th>
        <th scope="col" class="center">Visitor Id</th>
        <th scope="col" class="center">Visitor Name</th>
        <th scope="col" class="center">To Meet</th>
        <!-- <th scope="col" class="center">Email Id</th>
        <th scope="col" class="center">Addreess</th>-->
        <th scope="col" class="center">Age</th>
	      <th scope="col" class="center">Date of Visit</th>
        <th scope="col" class="center">ID type </th>
        <th scope="col" class="center">ID Proof</th>
        <th scope="col" class="center">Status</th>
      </tr>
    </thead>
<?php
while($r = mysqli_fetch_array($result)){
$vid =  $r['v_id'];
$i="select * from v_img where v_id = '$vid' ";
    $img=mysqli_query($conn,$i);
    
while($row = mysqli_fetch_array($img))
{
$filename=$row['file_name'];
$filenames=$row['filename']
?>
   <tbody style="background-color: white; color: black; ">
      <tr>
<td style=" width:100px; height:100px"> <img src="upload/<?= $filename ?>" width="150px" height="120px" > </td>
<??>
<td> <?php echo $r['v_id'] ?></td>
<td> <?php echo $r['v_name'] ?></td>
<td><?php echo $r['name'] ?></td> 
<!-- <td><?php echo $r['email'] ?></td> 
<td><?php echo $r['address'] ?></td> 
<td><?php echo $r['mobile_number'] ?></td> -->
<td><?php echo $r['age'] ?></td>
<td><?php echo $r['dov'] ?></td>
<!--  <td><?php echo $rows['type_crime'];?></td>     
<td><?php echo $rows['d_o_c'];?></td>-->
<td><?php echo $r['id_type'] ?></td>
<td style=" width:100px; height:100px"> <img src="upload/<?= $filenames ?>" width="150px" height="120px" > </td>
<td><?php echo $r['status'] ?></td>
<!--
<td><?php echo $rows['location'];?></td> 
<td><?php echo $rows['p_id']; ?></td> -->
	<!--<td></td>  
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
  <h4 style="color: white;">&copy <b>2022 Crime Portal | All Right Reserved</b></h4>
</div>

 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
 <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>