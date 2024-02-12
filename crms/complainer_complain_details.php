<!DOCTYPE html>
<html>
<head>
<title>Complaint Details</title>
<link rel="icon" href="./icons/user.png">

<style>
@media print {
   .noprint {
      visibility: hidden;
   }
}
.i{
    visibility:hidden;
}
.c {
  text-align:center;
} 
</style>
  <?php
    session_start();
    include("config.php");
    // require_once('encrypt_decrypt.php');
    if(!isset($_SESSION['x']))
        header("location:userlogin.php");
    
    
    $u_id=$_SESSION['u_id'];
    $c_id=$_SESSION['cid'];
        
    $query="select * from complaint where c_id='$c_id'";
    $result=mysqli_query($conn,$query);
    $q1="select d_o_u,case_update from update_case where c_id='$c_id' ";
    
    $res2=mysqli_query($conn,$q1);
  ?>

  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
  <link rel="stylesheet"
      src="print.css"
      type="text/css"
      media="print" />  
      <link rel="stylesheet" src="style.css">
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
                        <li ><a href="complainer_page.php">User Home</a></li>
                    </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li ><a href="complainer_complain_history.php">View Complaints</a></li>
                    <li class="active" ><a href="complainer_complain_details.php">Complaints Details</a></li>
                    <!--<li><a href="javascript:window.print()">Print Report  <i class="fa fa-print" aria-hidden="true"></i></a></li>-->
                    <!--<li><a href="FIR.php">View FIR </a></li>-->
                    <li><a href="logout.php">Logout &nbsp <i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
                </ul>
            </div>
         </div>
        </nav>
        <div id="noprint">
   <br>
        <p style="align:center">FIR Report</p>
</div>
<?php
     date_default_timezone_set('Asia/Kolkata');
      $c = date("d-m-Y");
      ?>
<p style="text-align:right; position:relative; top: -30px;"><?php echo("Date: $c");?></p>
        <div style="padding:50px;margin-top:-60px;">
        <table class="table table-bordered">
            <thead class="thead-dark" style="background-color: black; color: white;">
                <tr>
                    <br>
                    <th class="c" scope="col" >Complain Id</th>
                    <th scope="col" class="c" >Description</th>
                    <th scope="col" class="c" >Current Status</th>
                    <th scope="col" class="c" >Police Status</th>
                    
                </tr>
            </thead>
            <?php
              $row=mysqli_fetch_array($result)

            ?> 
             <tbody style="background-color: white; color: black;">
              <tr>
                <td class="c" ><?php echo  $row['c_id']; ?></td>
                <td class="c" ><?php echo  $row['description']; ?></td>
                <td class="c" ><?php echo  $row['inc_status']; ?></td>
                <td class="c" ><?php echo  $row['pol_status']; ?></td>
              </tr>
             </tbody>
            <?php
             // 
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
                           <?php $dou=$rows['d_o_u'];
                                 $upd=$rows['case_update'];
                                 $stat1="A new evidence was uploaded";
                                  if($dou && $upd!=$stat1)
                                  { 
                                  ?>
                          <td><?php echo $dou; ?></td>
                          <td class="c"><?php echo $upd ?></td>
                            <?php }?>
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
         <h4 style="color: white;">&copy <b>Crime Portal 2022</b></h4>
       </div> 
    
     <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
     <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>