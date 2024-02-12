<!DOCTYPE html>
<html>
<head>
<title>Account Approval</title>
<link rel="icon" href="./icons/apmt.png">
<style>
/* .disprv {
  background-color: #4CAF50; /* Green 
  border: none;
  color: white;
  padding: 5px 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
} */

.button2 {
  padding: 8px 12px;
  font-size: 13px;
  cursor: pointer;
  text-align: center; 
  color: #fff;
  background-color: #337ab7;
  border: none;
  border-radius: 10px;
  box-shadow: 0 5px #999;
}

.button2:hover {background-color: #337ab7}

.button2:active {
  background-color: #337ab7;
  box-shadow: 0 5px #666;
  transform: translateY(3px);
}

.button1 {
  padding: 8px 12px;
  font-size: 12px;
  cursor: pointer;
  text-align: center; 
  color: #fff;
  background-color: #337ab7;
  border: none;
  border-radius: 10px;
  box-shadow: 0 5px #999;
}

.button1:hover {background-color: #337ab7}

.button1:active {
  background-color: #337ab7;
  box-shadow: 0 5px #666;
  transform: translateY(3px);
}
.button21 {
  padding: 5px 10px;
  font-size: 16px;
  background-color: white; 
  color: black; 
  border: 2px solid #4CAF50;
}

.button21:hover {
  background-color: #4CAF50;
  color: white;
}

.center {
  text-align:center;
}

/* td{
text-align:center;
} */
</style>
    <?php
        include("config.php");
    if(isset($_POST['s2']))
    {
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
    $pid=$_POST['pid'];
    $query="select * from pol_appointmen where id='$pid' ";
    $result=mysqli_query($conn,$query);
    // $row=mysqli_fetch_array($result);
    $row=mysqli_fetch_array($result);
    $pid1=$row['id'];
      if($result && $pid1)
      {
          $pid=$row['id'];        
          $mail=$row['p_mail'];          
          $pname=$row['p_name'];          
          $location=$row['location'];
          $pass=$row['p_pass'];
          $query="INSERT INTO police(p_mail, p_name, p_id, location, p_pass) VALUES ('$mail','$pname','$pid','$location','$pass')";
          $res=mysqli_query($conn,$query);
          $del="DELETE FROM pol_appointmen WHERE id='$pid' ";
          mysqli_query($conn,$del);
          $msg="The approval was succesfull ";
        echo "<script type='text/javascript'>alert('$msg');</script>";
      }
      else{
        $msg="Invalid Police id ";
        echo "<script type='text/javascript'>alert('$msg');</script>";
      }
  }
    }
    if(isset($_POST['s1']))
    {
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
    $pid=$_POST['pid'];  
    $query="select * from pol_appointmen where id='$pid' ";    
    $result=mysqli_query($conn,$query);
    $row=mysqli_fetch_array($result);
      if($result)
      {
          $del="DELETE FROM pol_appointmen WHERE id='$pid' ";
          mysqli_query($conn,$del);
          $msg="The disapproval was succesfull ";
        echo "<script type='text/javascript'>alert('$msg');</script>";
      }
      else{
        $msg="Invalid Police id ";
        echo "<script type='text/javascript'>alert('$msg');</script>";
      }
  }
    }
    $query="select * from pol_appointmen  ";
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
    <li><a href="admin_page.php"><span></span> Admin Page</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">            
      <li class="active"><a href="apprv_officials.php">Police Appointments</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">View Appointments <span class="caret"></span></a> 
        <ul class="dropdown-menu">
        <li><a href="police_aptmt.php">Police Apoitments</a></li>
          <li><a href="jailer_aptmt.php">Jailer Appointments</a></li>

        </ul>
        <li><a href="J_logout.php">Logout &nbsp <i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
      </li>
    </ul>
  </div>
</nav>  
    <form style="margin-top: 6%; margin-left: 40%;" method="post">
      <input type="text" name="pid" style="width: 250px; height: 30px; background-color:white;" placeholder="&nbsp Police id" id="crid" required="" onfocusout="f1()">
        <div>
      <input class="button2" type="submit" value="Approve" name="s2" style="margin-top: 10px; margin-left: 4%;">
      <input class="button1" type="submit" value="Disapprove" name="s1" style="margin-top: 10px; margin-left: 4%;">
    </div>
    </div>
    </form>
 <div style="padding:50px;">
 <table class="table table-bordered">
    <thead class="thead-dark" style="background-color: black; color: white;">
      <tr>
        <th scope="col" class="center">Police Name</th>
        <th scope="col" class="center">Police Mail</th>
        <th scope="col" class="center">Location</th>      
        <th scope="col" class="center">Police ID</th>
      </tr>
    </thead>
    <?php
      while($r=mysqli_fetch_array($result))
      {
      ?>
   <tbody style="background-color: white; color: black;">
   <tr>


<td class="center"> <?php echo $r['p_name'] ?></td>
<td class="center"><?php echo $r['p_mail']; ?></td>
<td class="center"><?php echo $r['location'];?></td>
<td class="center"><?php echo $r['id']; ?></td>

    
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
  <h4 style="color: white;">&copy <b>2022 Crime Portal | All Right Reserved</b></h4>
</div>

 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
 <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>