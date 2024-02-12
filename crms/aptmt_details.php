<!DOCTYPE html>
<html>
<head>
	<title>Appointment Details</title>
  <link rel="icon" href="./icons/apmt.png">
<script>

  </script>
    <style>




    </style>

    <?php
        
    session_start();
    if(!isset($_SESSION['x']))
        header("location:jlr_login.php");
        include("config.php");
    
        $vid=$_SESSION['vidd'];            
        $query="select * from appointment_details where v_id='$vid' ";
        $result=mysqli_query($conn,$query);
        $row12=mysqli_fetch_array($result);
        $pid=$row12['p_id'];
        $_SESSION['pid']=$pid;  
        $q1="select * from prisoner_details where p_no='$pid' ";
        $r=mysqli_query($conn,$q1);
        $n=0;

    
    


    if(isset($_POST['a'])){
      if($_SERVER["REQUEST_METHOD"]=="POST")
      {
        $fnl="The appointment is approved";
        $from=$_POST['from'];
        $to=$_POST['to'];
        $frm="From: ";
        $too=" To : ";
        $date=$frm.$from.$too.$to;
        echo "<script type='text/javascript'>alert($date);</script>";        
        $reason="";
          $stat="Approved";
          
          $qu1=mysqli_query($conn,"update appointment_details set status='$stat',udov='$date',reason='$reason' where v_id='$vid' ");
          $res="The appointment is Approved";
          echo "<script type='text/javascript'>alert($res);</script>";
        if($qu1)
        {
          $res="The appointment is Approved";
          echo "<script type='text/javascript'>alert('$res');</script>";
          echo "<script>
          window.setTimeout(function() {
              window.location = 'pending.php';
            }, 1)
          </script>";
        }
        else{
          $res="The appointment is not Approved";
          echo "<script type='text/javascript'>alert($res);</script>";
        }
  }
  
}

    if(isset($_POST['d'])){
      if($_SERVER["REQUEST_METHOD"]=="POST")
      {
        $fnl="The appointment is disapproved";
        $reason=$_POST['reason'];
          $stat="Disapproved";
        $date=0;
          $qu1=mysqli_query($conn,"update appointment_details set status='$stat',reason='$reason',udov='$date' where v_id='$vid' ");
          if($qu1)
        {
          $res="The appointment is disapproved";
          echo "<script type='text/javascript'>alert('$res');</script>";
          
  echo "<script>
  window.setTimeout(function() {
      window.location = 'pending.php';
    }, 1)
  </script>";

        }
        else{
          $res="The appointment is not disapproved";
          echo "<script type='text/javascript'>alert($res);</script>";
   
//   echo "<script>
//   window.setTimeout(function() {
//       window.location = 'Approve.php';
//     }, 1)
//   </script>";

        }
      }
  
}








     
  
    ?>

	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
  <!-- <link rel="stylesheet" type="text/css" href="complainer_page1.css"> -->
  <link rel="stylesheet" type="text/css" href="alignment1.css">

<script>
      function f1()
        {
        var sta2=document.getElementById("ciid").value;
        var x2=sta2.indexOf(' ');
        if(sta2=="" && x2>=0){
          document.getElementById("ciid").value="";
          alert("Blank FIeld Not Allowed");
        }
      }
    </script>
</head>
<body>
	<nav  class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-ba r"></span>
      </button>
      <a class="navbar-brand" href="home.php"><b>Crime Portal</b></a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
    <ul class="nav navbar-nav navbar-left">
    
    </ul>
      <ul class="nav navbar-nav navbar-right">
      <li><a href="prisoners.php">View Prisoners</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">View Appointments <span class="caret"></span></a> 
        <ul class="dropdown-menu">
        <li><a href="pending.php">Pending Apoitment</a></li>
          <li><a href="Approve.php">Approved Appointments</a></li>
          <li><a href="disapprove.php">Disaproved Apointments</a></li>

        </ul>  
        <li class="active" ><a href="aptmt_details.php">Appointment Details</a></li>
        <li><a href="p_logout.php">Logout &nbsp <i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
      </ul>
    </div>
  </div>
 </nav>

 
<div style="padding:40px;">
<br>
<h3 class='center'>Prisoner Details</h3>
<table class="table table-bordered">
    <thead class="thead-dark" style="background-color: black; color: white;">
    <tr>
      <th scope="col" class="center">Prisoner Picture</th> 
      <th scope="col" class="center">Prisoner ID</th>
      <th scope="col" class="center">Prisoner Name</th>
    <!--  <th scope="col" class="center">Jail Name</th> -->
      <th scope="col" class="center">Gender</th>
    </tr>
       </thead>
      <?php
            while($rows=mysqli_fetch_array($r)){
             ?> 
<?php 
      include("config.php");               
$pno=$_SESSION['pid'];
$images_sql = "SELECT * FROM prisoner_images where p_no = '$pno' ";
$results = mysqli_query($conn,$images_sql);
while($row21 = mysqli_fetch_array($results))
{
$filename=$row21['file_name'];
?> 
<?php 
}
?>    
    <tbody style="background-color: white; color: black;">
      <tr>
        <td class="a" style=" width:100px; height:100px"> <img src="upload/<?= $filename ?>" width="150px" height="120px" > </td> 
       	 <td class="a"><?php echo $rows['p_no']; ?></td>
        <td class="a"><?php echo $rows['name']; ?></td>
        <td class="a"><?php echo $rows['gender']; ?></td>
      </tr>
       </tbody>
        
<?php
}
$idtype="hi";
?>
           
</table>
<br>
<h3 class='center'>Visitor Details</h3> 
<table class="table table-bordered">

       <thead class="thead-dark" style="background-color: black; color: white;">
            <tr>
            
         <th scope="col" class="center" style="">Visitor Image</th> 
         <th scope="col" class="center">Visitor Name</th>
         
         <th scope="col" class="center">Age</th>
         <!--<th scope="col" class="center">Address</th>-->
         <th scope="col" class="center">Mobile Number</th>
         <th scope="col" class="center">Relation</th>
         <th scope="col" class="center">Date of visit</th>
       <!--  <th scope="col" class="center">Jail Name</th> -->
         <th scope="col" class="center">Gender</th>
       </tr>
          </thead>
         <?php
    
    $query="select * from appointment_details where v_id='$vid' ";
    $result=mysqli_query($conn,$query);       
    while($rows=mysqli_fetch_array($result)){
                ?> 
   <?php           
   $vid=$_SESSION['vidd'];
   $images_sql = "SELECT * FROM v_img where v_id = '$vid' ";
   $results = mysqli_query($conn,$images_sql);
   while($row21 = mysqli_fetch_array($results))
   {
   $filename65=$row21['file_name'];
   ?> 
   <?php 
   }
   ?>    
       <tbody style="background-color: white; color: black;">
         <tr>
           <!--class="a"-->
           <td style=" width:100px; height:100px"> <img src="upload/<?= $filename65 ?>" width="150px" height="120px" > </td> 
             <td class="center"style=" height:100px; width:200px; text-ali"><?php echo $rows['v_name']; ?></td>                          
             <td class="a" ><?php echo $rows['age']; ?></td>
           <td class="a" ><?php echo $rows['mobile_number']; ?></td>
           <td class="a" ><?php echo $rows['relation']; ?></td>
           <td class="a" ><?php echo $rows['dov']; ?></td>
           <td class="a"><?php echo $rows['gender']; ?></td>
           
         </tr>
          </tbody>
           
   <?php
   }
   ?>
              
   </table>




  


   <h3 class='center'>ID Proof</h3>
   <table border="1" style="margin-left: auto; margin-right: auto;">
       <thead class="thead-dark" style="background-color: black; color: white; height: 33px;">
       <tr>
         
         <th scope="col" class="center">ID Type</th>
         <th  class="center">ID Proof</th>
       </tr>
          </thead>

    <?php           
   $vid=$_SESSION['vidd'];
   $images_sql = "SELECT * FROM v_img where v_id = '$vid' ";
   $results = mysqli_query($conn,$images_sql);
   while($row21 = mysqli_fetch_array($results))
   {
   $filename65=$row21['filename'];
   $idtype=$row21['id_type'];
   ?>
   <?php 
   }
   ?>
       <tbody style="background-color: white; color: black;">
         <tr>
         <td class="center" style="height:200px;width:200px"><?php echo $idtype ?></td> 
          <td class="a" style=" width: 280px; height: 222px;"> <img src="upload/<?= $filename65 ?>" width="250px" height="200px" > </td> 
         </tr>
<!-- <tr>
<td class="center" style="height:80px;width:100px ;">hi</td>
</tr> -->
          </tbody>
      
              
   </table>
   <br>




<!-- <?php 
// date_default_timezone_set('Asia/Kolkata');
// $today = date("Y-m-j");
// $t=date("G:i");
// $tu="2023-12-31T21:25:33";
// $b = 'T';
// $c = $today.$b.$t;
// // echo "<script type='text/javascript'>alert($c);</script>";
// $_SESSION['c']=$c;
?> -->
     
     
     
    <form method="post" action="#">

    <h4 class='right' style="display :inline;">Please select the appointment date </h4>
     <input class="aprv" type="submit" value="Approve" name="a" >     
     <input class="from_time" type="time" name="from" required="">
     <input class="to_time" type="time" name="to" required="">
  </form>

  </div>
  <div style="width: 50%;float: left;height: 200px; background-color: #dfdfdf;">
  <h4 class="from" style="display :inline;">From</h4>
  <h4 class="to" style="display :inline;">To</h4>
</div>
  
  <div style="width: 50%;float: left;height: 200px; background-color: #dfdfdf;">
  <form method="post" action="#">

  <textarea name="reason" cols="30" rows="3" placeholder="Please Specify the reason" class="left"  id="ciid" onfocusout="f1()" required=""></textarea>
  <h3 class='h4' style="display :inline;">Please enter the reason for the disaproval </h3>   
<input class="daprv" type="submit" value="Disaprove" name="d" >
  </form>
  
  </div>
    <br>
    <br>
    <br>
    <div style="position: relative;
   float: left;
   margin-bottom: 0px;
   left: 0;
   bottom: 0;
   width: 100%;
   height: 30px;
   background-color: rgba(0,0,0,0.8);
   color: white;
   text-align: center;">
  <h4 style="color: white;">&copy <b>Crime Portal 2022</b></h4>
</div>
 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
 <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>