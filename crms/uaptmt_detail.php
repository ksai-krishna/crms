<!DOCTYPE html>
<html>
<head>
	<title>Appointment Details</title>
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
.btn3
{
  padding: 14px 20px;
  background-color:  rgb(94, 128, 238);
  border: none;
  color: white;
  padding: 15px;
  text-align: center;  
  text-decoration: none;
  display: inline-block;
  font-size: 20px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 12px;
}
.btn3:hover
{
  background-color:  rgb(80, 170, 500);
}






.aprv
{
  padding: 14px 20px;
  background-color:  rgb(94, 128, 238);
  border: none;
  color: white;
  padding: 15px;
  text-align: center;  
  text-decoration: none;
  display: inline-block;
  font-size: 20px;
  position:absolute;;
  top: 900px;  
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 12px;

}
.aprv:hover
{
  background-color:  rgb(80, 100, 170);
}
.daprv
{
  padding: 14px 20px;
  background-color:  rgb(94, 128, 238);
  border: none;
  color: white;
  padding: 15px;
  text-align: center;  
  text-decoration: none;
  display: inline-block;
  font-size: 20px;
  position:absolute;;
  top: 900px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 12px;
  margin-left: 870px; 
}
.daprv:hover
{
  background-color:  rgb(80, 100, 170);
}
.h4
{ 
  
  display: inline-block;
  margin-left: 780px;
  position:absolute;
  top: 969px;
}
.sel
{
  display: inline-block;
  margin-left: 120px;
  position:absolute;
  top: 1010px;
}

.date
{
  padding: 4px 4px;
  background-color:  rgb(94, 128, 238);
  border: none;
  color: white;  
  text-align: center;  
  text-decoration: none;
  display: inline-block;
  font-size: 20px;
  position:absolute;
  top: 970px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 12px;
  margin-left: -70px;

}
.date:hover
{
  background-color:  rgb(80, 100, 170);
}
.tab {
            display: inline-block;
            margin-left: 330px;

        }      
        
.stab {
            display: inline-block;
            margin-left: 330px;
                                
        }
        
.dtab {
            display: inline-block;
            margin-left: 330px;
                        
        }      
p
{
  display: inline-block;  
}
.tab1 {
            display: inline-block;
            margin-left: 755px;
            position: absolute;
            top: 300px;        
        }
        .tab2 {
            display: inline-block;
            margin-left: 130px;
        }
      .tbl1
      {
        padding: 30px;
        position: absolute;
        top: 2px;          
      }




    </style>

    <?php
        
    session_start();
    if(!isset($_SESSION['x']))
        header("location:jlr_login.php");
        $conn=mysqli_connect("localhost","root","","crime_portal");
    if(!$conn)
    {
        die("could not connect".mysqli_error());
    }
    
    $vid=$_SESSION['vid'];
    $query="select * from appointment_details where v_id='$vid' ";
    $result=mysqli_query($conn,$query);
    $row12=mysqli_fetch_array($result);
    $pid=$row12['p_id'];
    $_SESSION['pid']=$pid;  
    $q1="select * from prisoner_details where p_no='$pid' ";
    $r=mysqli_query($conn,$q1);
    $n=0;

    
    


  

    /*
    if(isset($_POST['close'])){
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
          $fnl="Chargesheet filled";
          $fn=0;
          $f=mysqli_query($conn,"SELECT pol_status from complaint where p_id='$p_id' AND pol_status= '$fnl' AND c_id='$cid' ");
          $r=mysqli_fetch_array ($f);     
          $fn=$r['pol_status'];
          
          if($fn==$fnl)
          {
            $n=1;
           
          }
          $_SESSION['fnll']=$n;
          $n=$_SESSION['fnll'];
          if($n==0)
          {
            $up=$_POST['final_report'];
            $qu2=mysqli_query($conn,"insert into update_case(c_id,case_update) values('$cid','$up')");
          }
          else if($n){
          $msg="This case is closed . This case cant be updated.";
          echo "<script type='text/javascript'>alert('$msg');</script>"; 
        }
      } 
    } */
     
  
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
      
      <ul class="nav navbar-nav navbar-right">
        <li ><a href="police_pending_complain.php">View Complaints</a></li>
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
 $con=mysqli_connect('localhost','root','','crime_portal');
    if(!$con)
	    {
        die('could not connect: '.mysqli_error());
        }
                
$pno=$_SESSION['pid'];
$images_sql = "SELECT * FROM prisoner_images where p_no = '$pno' ";
$results = mysqli_query($con,$images_sql);
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
    $con=mysqli_connect('localhost','root','','crime_portal');
       if(!$con)
         {
           die('could not connect: '.mysqli_error());
           }
           
   $vid=$_SESSION['vid'];
   $images_sql = "SELECT * FROM v_img where v_id = '$vid' ";
   $results = mysqli_query($con,$images_sql);
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
           <td   style=" width:100px; height:100px"> <img src="upload/<?= $filename65 ?>" width="150px" height="120px" > </td> 
             <td  ><?php echo $rows['v_name']; ?></td>
           <td  ><?php echo $rows['age']; ?></td>
           <td  ><?php echo $rows['mobile_number']; ?></td>
           <td  ><?php echo $rows['relation']; ?></td>
           <td  ><?php echo $rows['dov']; ?></td>
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
    $con=mysqli_connect('localhost','root','','crime_portal');
       if(!$con)
         {
           die('could not connect: '.mysqli_error());
           }
           
   $vid=$_SESSION['vid'];
   $images_sql = "SELECT * FROM v_img where v_id = '$vid' ";
   $results = mysqli_query($con,$images_sql);
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

          </tbody>
      
              
   </table>
   <br>





     
     
     
  
     <!-- <textarea name="final_report" cols="40" rows="5" placeholder="Please Specify the reason" style="margin-top: 20px;margin-left: 20px;" id="ciid" onfocusout="f1()" required></textarea>    -->
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
  <h4 style="color: white;">&copy <b>Crime Portal 2018</b></h4>
</div>

 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
 <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>