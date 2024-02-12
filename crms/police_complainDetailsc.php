    <!DOCTYPE html>
<html>
<head>
	<title>Complaint Details</title>
	<link rel="icon" href="./icons/pol.jpg">

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
    require_once("encrypt_decrypt.php");
    if(!isset($_SESSION['x']))
        header("location:policelogin.php");
        
          $cid=$_SESSION['cid'];
          $p_id=$_SESSION['pol'];    
          $query="select * from complaint where c_id='$cid' ";
          $result12=mysqli_query($conn,$query);
          $row=mysqli_fetch_array($result12);
          $stat="Case Reopened";
          $query="select * from complaint where c_id='$cid' ";
          $result=mysqli_query($conn,$query);
          $n=0;
          
          $res2=mysqli_query($conn,"select * from update_case where c_id='$cid'");
     
    ?>

	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
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
        <li ><a href="police_pending_complain.php">Pending Complaints</a></li>
        <li ><a href="reopen.php">Reopen Complaint</a></li>
        <li class="active" ><a href="police_complainDetailsc.php">Completed Complaints</a></li>
        <li><a href="p_logout.php">Logout &nbsp <i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
      </ul>
    </div>
  </div>
 </nav>
<div style="padding:50px; margin-top:30px;">
   <table class="table table-bordered">
    <thead class="thead-dark" style="background-color: black; color: white;">
    <tr>
      <th scope="col" class="center">Evidence Provided</th> 
      <th scope="col" class="center">Complaint Id</th>
      <th scope="col" class="center">Type of Crime</th>
      <th scope="col" class="center">Date of Crime</th>
      <th scope="col" class="center">Description</th>
        <th scope="col" class="center">Complainant Mobile</th>
        <th scope="col" class="center">Complainant Address</th>
    </tr>
       </thead>
      <?php
            while($rows=mysqli_fetch_array($result)){
             ?> 
<?php
$images_sql = "SELECT * FROM evidence where c_id = '$cid' ";
$result = mysqli_query($conn,$images_sql);
while($row = mysqli_fetch_array($result))
{
$filename=$row['file_name'];
?>
<?php 
}
?>
    <tbody style="background-color: white; color: black;">
      <tr>
        <td class="a" style=" width:100px; height:100px"> <img src="upload/<?= $filename ?>" width="150px" height="120px" > </td> 
       	 <td class="a"><?php echo Decrypt($rows['c_id']); ?></td>
        <td class="a"><?php echo Decrypt($rows['type_crime']); ?></td>
        <td class="a"><?php echo Decrypt($rows['d_o_c']); ?></td>
        <td class="a"><?php echo Decrypt($rows['description']); ?></td>
        <td class="a"><?php echo Decrypt($rows['mob']); ?></td>
        <td class="a"><?php echo Decrypt($rows['location']); ?></td>
      </tr>
       </tbody>
      
<?php
}
?>
           
</table>

 </div>
        <div style="padding:50px; margin-top:8px;">
            <table class="table table-bordered">
               <thead class="thead-dark" style="background-color: black; color: white;">
                   <tr>
                        <th scope="col" class="c" >Date Of Update</th>
                        <th scope="col" class="c" >Case Update</th>
                   </tr>
               </thead>
            <?php
                while($rows=mysqli_fetch_array($res2)){
             ?> 
                <tbody style="background-color: white; color: black;">
                <tr>
                    <tr>
                           <?php $dou=Decrypt($rows['d_o_u']);
                                 $upd=Decrypt($rows['case_update']);
                                  if($dou && $upd)
                                  { ?>
                          <td><?php echo $dou; ?></td>
                          <td><?php echo $upd ?></td>
                            <?php }?>
                </tr>
                </tbody>
            <?php
                } 
            ?>
          
            </table>
        </div>

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