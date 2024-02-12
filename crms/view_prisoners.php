<!DOCTYPE html>
<html>
<head>
	<title>Prisoner Details</title>
  <link rel="icon" href="./icons/pol.jpg">
<script>

  </script>
    <style>
    .a{
	text-align:center;
      }     

      .center {      
  text-align:center;
}


    </style>

    <?php        
    session_start();
    include("config.php");
    if(!isset($_SESSION['x']))
        header("location:Jailerlogin.php");
          $prid=$_SESSION['pr_id'];
          $q1="select * from prisoner_details where p_no='$prid' ";
          $r=mysqli_query($conn,$q1);  
    ?>

	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
  <!--<link rel="stylesheet" type="text/css" href="complainer_page1.css">-->
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
    <ul class="nav navbar-nav">
        <li><a href="official_login.php">Official Login</a></li>
        <li><a href="Jlr_login.php">Jailer Login</a></li>
        <li><a href="jailer_page.php">Jailer Home</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      <li ><a href="prisoners.php">View Prisoners</a></li>
      <li ><a href="escape.php">Report On Escapes</a></li>
      <li><a href="p_logout.php">Logout &nbsp <i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
      </ul>
    </div>
  </div>
 </nav>

<div style="padding:40px;">
<br>
<h3 class='center'>Prisoner Details</h3>
<br>
<table class="table table-bordered">
    <thead class="thead-dark" style="background-color: black; color: white;">
    <tr>
      <th scope="col" class="center">Prisoner Picture</th> 
      <th scope="col" class="center">Prisoner ID</th>
      <th scope="col" class="center">Prisoner Name</th>
    <!--  <th scope="col" class="center">Jail Name</th> -->
      <th scope="col" class="center">Gender</th>
      <th scope="col" class="center">Age</th>
      <th scope="col" class="center">Date of Crime</th>
      <th scope="col" class="center">Address</th>
      <th scope="col" class="center">Phone Number</th>
      <th scope="col" class="center">Description</th>
      <th scope="col" class="center">Belongings</th>
    </tr>
       </thead>
      <?php
            while($rows=mysqli_fetch_array($r)){
             ?> 
<?php
$prid=$_SESSION['pr_id'];
$images_sql = "SELECT * FROM prisoner_images where p_no = '$prid' ";
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
        <td class="a"><?php echo $rows['age']; ?></td>
        <td class="a"><?php echo $rows['doc']; ?></td>
        <td class="a"><?php echo $rows['address']; ?></td>
        <td class="a"><?php echo $rows['mobile_number']; ?></td>
        <td class="a"><?php echo $rows['crime_description']; ?></td>
        <td class="a"><?php echo $rows['belongings']; ?></td>
      </tr>
       </tbody>
        
<?php
}
?>
           
</table>
<br>

  




     
     
     
     <?php
     date_default_timezone_set('Asia/Kolkata');
      $today = date("Y-m-j");
      $t=date("G:i");
      $tu="2023-12-31T21:25:33";
      $b = 'T';
      $c = $today.$b.$t;
      echo "<script type='text/javascript'>alert($c);</script>";
     ?>
  </div>
    <br>
    <br>
    <br>
    <div style="position: absolute;
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