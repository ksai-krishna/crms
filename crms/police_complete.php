<!DOCTYPE html>
<html>
<head>
	<title>Police completed complaint</title>
	<link rel="icon" href="./icons/pol.jpg">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="style1.css">
     <?php
    session_start();
    include("config.php");
    require_once("encrypt_decrypt.php");
    if(!isset($_SESSION['x']))
        header("location:policelogin.php");
          
    if(isset($_POST['s2']))
    {
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $cid=Encrypt($_POST['crid']);
        $_SESSION['cid']=$cid;
        $stat=Encrypt("Case Closed");
        $qu=mysqli_query($conn,"select * from complaint where c_id='$cid' AND pol_status='$stat' ");
        $q=mysqli_fetch_array($qu);
        if($q)
        {
          header("location:police_complainDetailsc.php");
        }
	else
        {
          $msg="Invalid case id ";
          echo "<script type='text/javascript'>alert('$msg');</script>";
        }
	     
    }
    }
    
    $stat="Case Closed";
    $query="select * from complaint where pol_status='$stat' ";
    $resu=mysqli_query($conn,$query);
    $r=mysqli_fetch_array($resu);
    $ano=$r['a_no'];
    $p_id=$_SESSION['pol'];
    $stat="Case Closed";
    $query="select * from complaint where pol_status='$stat' ";
    $result2=mysqli_query($conn,$query);    
    while($rows=mysqli_fetch_array($result2)){      
    
  }
    $stat=Encrypt("Case Closed");
      $query="select * from complaint where pol_status='$stat' ";
    $result=mysqli_query($conn,$query); 
    $r=mysqli_query($conn,"SELECT LAST(case_update) AS fnl_rpt FROM update_case");
    
    ?>
<style>
  td{
  text-align:center;
  }
  th{
  text-align:center;
  }
  </style>
</head>








<body style="background-color: #dfdfdf;">
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
        <li><a href="official_login.php"><span></span> Official Login</a></li>
        <li ><a href="policelogin.php">Police Login</a></li>
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
 














<!--<body>
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
        <li><a href="police_pending_complain.php">Police Home</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">View Complaints<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="police_pending_complain.php">Pending Complaints</a></li>
          <li><a href="police_complete.php">Completed Complaints</a></li>
        </ul>
        <li><a href="p_logout.php">Logout &nbsp <i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
      </ul>
    </div>
  </div>   
</nav>     -->
   
<form style="margin-top: 7%; margin-left: 40%;" method="post">
      <input type="text" name="crid" style="width: 250px; height: 30px; background-color:white;" placeholder="&nbsp Complaint id" id="crid" required="" onfocusout="f1()">
        <div>
      <input class="button" type="submit" value="View in Detail" name="s2" style="margin-top: 10px; margin-left: 11%;">      </div>
    </form>
 <div style="padding:40px;">
   <table class="table table-bordered">
    <thead class="thead-dark" style="background-color: black; color: white;">
      <tr>
        <th scope="col">Complaint Id</th>
        <th scope="col">Type of Crime</th>
        <th scope="col">Date of Crime</th>
        <th scope="col">Location of Crime</th>
        <th scope="col">Final Report</th>
        <th scope="col">Complainant Mobile</th>
        <th scope="col">Complainant Address</th>

      </tr>
    </thead>

<?php
      while($rows=mysqli_fetch_array($result)){
            $stat=Encrypt("Case Closed");
            ?>
    <tbody style="background-color: white; color: black;">
      <tr>
          <?php
                $cid=$rows['c_id'];
                
                $query=mysqli_query($conn,"select a_no from complaint where c_id='$cid' ");
                $r=mysqli_fetch_array($query);
                $a_no=$r['a_no'];
                $query=mysqli_query($conn,"select u_addr from user where a_no='$a_no' ");
                $r=mysqli_fetch_array($query);
                $addr=$r['u_addr'];
          ?>
        <td><?php echo Decrypt($cid); ?></td>
        <td><?php echo Decrypt($rows['type_crime']); ?></td>     
        <td><?php echo Decrypt($rows['d_o_c']); ?></td>
        <td><?php echo Decrypt($rows['location']); ?></td>
        <td><?php echo Decrypt($rows['final_statement']); ?></td>
        <td><?php echo Decrypt($rows['mob']); ?></td>
        <td><?php echo Decrypt($addr); ?></td>
                  
      </tr>
    </tbody>
    
    <?php
    }
    ?>
</table>
 </div>

 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
 <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>