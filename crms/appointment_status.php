<!DOCTYPE html>
<html>
<head>
	<title>Appointment History</title>
	<link rel="icon" href="./icons/user.png">
    <?php
    session_start();
    if(!isset($_SESSION['x']))
        header("location:userlogin.php");
    include("config.php");
    if(isset($_POST['s2']))
    {
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {    
    $vid=$_POST['vid'];    
    $_SESSION['vidd']=$vid;
    $v=$_SESSION['vidd'];
    $w="select status from appointment_details where v_id='$vid'";
    $re=mysqli_query($conn,$w);
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
      header("location:aptmt_details_a.php");
    }
    elseif($n==2)
    {
      header("location:aptmt_details_d.php");
    }
    elseif($n==1){
      $s="The Appointment is In progress.";
      echo "<script type='text/javascript'> alert('$s');</script> "; 
      //header("location:aptmt_details.php");  
    }
    
    
      $vid=0;
        
        $_SESSION['vid']=$vid;        
        $qu=mysqli_query($conn,"select inc_status,location from complaint where c_id='$vid'");
        
        $q=mysqli_fetch_array($qu);
        $inc_st=$q['inc_status'];
        $loc=$q['location'];   
//        header("location:aptmt_details.php");                

      }
    }
    $u_id=$_SESSION['u_id'];
    $query="select * from appointment_details where uid='$u_id'";
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
                  alert("Space Not Allowed");
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
                        <li ><a href="userlogin.php">User Login</a></li>
                        <li ><a href="complainer_page.php">User Home</a></li>
                    </ul>
   
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="appointment_status.php">Appointment History</a></li>
                        <li><a href="logout.php">Logout &nbsp <i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
                    </ul>
                  </div>
              </div>
        </nav>


    <div>
        <form style="float: right; margin-right: 100px; margin-top: 65px;" method="post">
<br>
 To check the appointment Status Please enter the visitor ID here :
    <input type="text" name="vid" style="width: 250px; height: 30px; color: black;" placeholder="&nbsp Visistor ID" id="ciid" onfocusout="f1()" required> 
            <input class="btn btn-primary btn-sm" type="submit" value="Search" style="margin-top:2px; margin-left:20px;" name="s2">
 
     </form>
    </div>
    <div style="padding:50px;">
	<table class="table table-bordered">    
	 <thead class="thead-dark" style="background-color: black; color: white;">
         <tr>
          <th scope="col">Visitor Id</th>
          <th scope="col">Visitor Name</th>
          <th scope="col">Prisoner Name</th>
          <th scope="col">Prisoner ID</th>
          <th scope="col">Date of Visit</th>
          <th scope="col">Status</th>
        </tr>
      </thead>

<?php
      while($rows=mysqli_fetch_array($result)){
    ?> 

    <tbody style="background-color: white; color: black;">
      <tr>
        <td><?php echo $rows['v_id']; ?></td>
        <td><?php echo $rows['v_name']; ?></td>     
        <td><?php echo $rows['name']; ?></td>
        <td><?php echo $rows['p_id']; ?></td>
        <td><?php echo $rows['dov']; ?></td>          
        <td><?php echo $rows['status']; ?></td>
        
      </tr>
    </tbody>
    
    <?php
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
  <h4 style="color: white;">&copy <b>Crime Portal 2018</b></h4>
</div> 

 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
 <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>