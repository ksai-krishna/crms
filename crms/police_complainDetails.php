<!DOCTYPE html>
<html>
<head>
	<title>Complaint Details</title>
  <link rel="icon" href="./icons/pol.jpg">

    <style>
    .a{
	text-align:center;
      }
      .b{

 
      }

      .center {
  text-align:center;
}
.iframe-container{
  position: relative;
  width: 100%;
  padding-bottom: 56.25%; 
  height: 0;
}
.iframe-container iframe{
  position: absolute;
  top:0;
  left: 0;
  width: 100%;
  height: 100%;
}
    </style>
    <?php
    session_start();    
    if(!isset($_SESSION['x']))
        header("location:policelogin.php");
    // require_once("encrypt_decrypt.php");
    include("config.php");  
    
    $cid=$_SESSION['cid'];    
    $p_id=$_SESSION['pol'];
    $query="select * from complaint where c_id='$cid' ";
    $result=mysqli_query($conn,$query);
    
    $n=0;
    function prompt($prompt_msg){
      echo("<script type='text/javascript'> var answer = prompt('".$prompt_msg."'); </script>");

      $answer = "<script type='text/javascript'> document.write(answer); </script>";
      return($answer);
  }
    if(isset($_POST['status'])){
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
          $fnl="Case Closed";
          $fn=0;
          $f=mysqli_query($conn,"SELECT pol_status from complaint where p_id='$p_id' AND pol_status= '$fnl' AND c_id='$cid' ");
          $r=mysqli_fetch_array ($f);
          $fn=$r['pol_status'];
          $n=1;
          $fnl1="Close case";
          $upd=$_POST['update'];          
          if($fn==$fnl)
          {
            $n=0;
            $msg="This case is closed . This case cant be updated.";
            echo "<script type='text/javascript'>alert('$msg');</script>";
            // header("location:police_complainDetailsc.php");
            echo "<script>
        window.setTimeout(function() {
            window.location = 'police_complainDetailsc.php';
          }, 1);
        </script>";
          }
          $m=0;
          
          if($n)
          {
            $upd=$_POST['update'];
            $final_update="Close case";
            if($upd==$final_update)
            {
              $c="Case Closed";
              $i="Prosecuted";
                $co="update complaint set  pol_status='$c' ,inc_status='$i' where c_id='$cid'";
                $q2=mysqli_query($conn,$co);
            header("location:final_update.php");
            $n=1;
          }
          
          else
          {
            $upd=$_POST['update'];
            date_default_timezone_set('Asia/Kolkata');
            $t=date("Y-m-j h:i:sA");
            //2024-01-7 02:12:26PM
            $qu2=mysqli_query($conn,"insert into update_case(c_id,case_update,d_o_u) values('$cid','$upd','$t')");
            
          }
        }
    }
  }
    
    if(isset($_POST['close'])){
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
          $fnl_s=$_POST['final_report'];
          $fnl="Case Closed";
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
            date_default_timezone_set('Asia/Kolkata');
            $t=date("Y-m-j h:i:sA");
            $qu2=mysqli_query($conn,"insert into update_case(c_id,case_update,d_o_u) values('$cid','$up','$t')");
          }
          else if($n){
          $msg="This case is closed . This case cant be updated.";
          echo "<script type='text/javascript'>alert('$msg');</script>"; 
          echo "<script>
        window.setTimeout(function() {
            window.location = 'police_complainDetailsc.php';
          }, 1);
        </script>";

        }
        
         
      }
    }
  
    if(isset($_POST['new'])){
      if($_SERVER["REQUEST_METHOD"]=="POST")
        {
          $fnl="Case Closed";
          $fn=0;
          $f=mysqli_query($conn,"SELECT pol_status from complaint where p_id='$p_id' AND pol_status= '$fnl' AND c_id='$cid' ");
          $r=mysqli_fetch_array ($f);
          $fn=$r['pol_status'];
          $upt1=$_POST['upt1'];
          if($fn==$fnl)
          {
            $n=1;
          }
      $name = $_FILES['file']['name'];
      $target_dir = "upload/";
      $target_file = $target_dir . basename($_FILES["file"]["name"]);
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      $extensions_arr = array("jpg","jpeg","png","gif");
      if( in_array($imageFileType,$extensions_arr) ){
          if(move_uploaded_file($_FILES['file']['tmp_name'],'upload/'.$name)){
              $image_base64 = base64_encode(file_get_contents('upload/'.$name) );
              $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;
              date_default_timezone_set('Asia/Kolkata');
              $t=date("Y-m-j h:i:sA");
              $stat="A new evidence was uploaded";
          $query = "insert into update_case(case_update,c_id,d_o_u,img,file_name,reason_of_upload) values('$stat','$cid','$t','".$image."','".$name."','$upt1')";
        //   $query = "insert into update_case(c_id,file_name,img,d_o_img_u,reason_of_upload) values('$cid','".$name."','".$image."','$t','$upt1')";
              if($n)
              {
                $msg="This case is closed . This case cant be updated.";
                echo "<script type='text/javascript'>alert('$msg');</script>";
                echo "<script>
        window.setTimeout(function() {
            window.location = 'police_complainDetailsc.php';
          }, 1);
        </script>";
              } 
              else
              {
                mysqli_query($conn,$query) or die(mysqli_error($conn));
              }
            }
         }  
        }
      }
      if(isset($_POST['view'])){
        header("location:View_new_evidence.php");
        }
        
    $res2=mysqli_query($conn,"select * from update_case where c_id='$cid' ");
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
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">View Complaints<span class="caret"></span></a>
        <ul class="dropdown-menu">
        <li><a href="Assigned_complain.php">Assigned Complaints</a></li>
          <li><a href="police_pending_complain.php">Pending Complaints</a></li>
          <li><a href="police_complete.php">Completed Complaints</a></li>

        </ul>
        <li class="active" ><a href="police_complainDetails.php">Complaints Details</a></li>
        <li><a href="p_logout.php">Logout &nbsp <i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
      </ul>
    </div>
  </div>
 </nav>
 <br>
<div style="padding:50px; margin-top:10px;">
   <table class="table table-bordered">
    <thead class="thead-dark" style="background-color: black; color: white;">
    <tr>
      <th scope="col" class="center">Evidence Provided</th> 
      <th scope="col" class="center">Complaint Id</th>
      <th scope="col" class="center">Type of Crime</th>
      <th scope="col" class="center">Date of Crime</th>
      <th scope="col" class="center">Location of Crime</th>
      <th scope="col" style="text-align:center ">Description</th>
      <th scope="col" class="center">Complainant Mobile</th>
      <th scope="col" class="center">Complainant Address</th>
    </tr>
       </thead>
      <?php
            while($rows=mysqli_fetch_array($result)){
             ?> 
<?php
$filename=0;
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
          <?php 
      if(!$filename)
      {?>
          <td class="a" style=" width:250px; height:200px">No Evidence was provided</td>
      <?php }
      else if(strpos($filename,".jpg") || strpos($filename,".png") || strpos($filename,".jpeg") || strpos($filename,".JPG    ") || strpos($filename,".PNG") || strpos($filename,".JPEG") || strpos($filename,".Jpg    ") || strpos($filename,".Png") || strpos($filename,".Jpeg"))
          {
          ?>
                <td class="a" style=" width:100px; height:100px"> <img src="upload/<?= $filename ?>" width="150px" height="120px" > </td> 
          
          <?php }
          else if(strpos($filename,".mp4") || strpos($filename,".mp3") || strpos($filename,".wav"))
          {
            ?>
<td class="a" style=" width:250px; height:200px"> <iframe class="responsive-iframe" src="upload/<?= $filename ?>" width="250px" height="200px" title="YouTube video player" ></iframe> </td>               
          <?php }
          else{
              ?>
    <td class="a" style=" width:250px; height:200px">No Evidence was provided</td>
          <?php }
          
          ?>
        
       	 <!--<td class="a"><?php echo  $rows['c_id']; ?></td>-->
       	 <td class="a"><?php echo $cid; ?></td>
        <td class="a"><?php echo  $rows['type_crime']; ?></td>
        <td class="a"><?php echo  $rows['d_o_c']; ?></td>
        <td class="a"><?php echo  $rows['l_o_c']; ?></td>
        <td class="a"><?php echo  $rows['description']; ?></td>
        <td class="a"><?php echo  $rows['mob']; ?></td>
        <td class="a"><?php echo  $rows['location']; ?></td>
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
      <th scope="col">Date Of Update</th>
      <th scope="col">Case Update</th>
    </tr>
       </thead>
       <tbody style="background-color: white; color: black;">
     
      <?php
              while($rows1=mysqli_fetch_array($res2)){
                
             ?> 
       <tbody style="background-color: white; color: black;">
    <tr>
        <?php $dou=$rows1['d_o_u'];
              $upd=$rows1['case_update'];
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

  <div style="width: 100%; height: 250px;" > 
    
    <div style="width: 40%;float: left;height: 250px;  background-color: #dcdcdc">
     
     <form method="post">
    
      <h5 style="text-align: center;"><b>Complaint ID</b></h5>
      <input type="text" name="cid" style="margin-left: 50%; width: 30px;text-align:center;" disabled value="<?php echo  $cid; ?>">
      <select class="form-control" style="align-content: center;margin-top: 20px; margin-left: 35%; width: 180px;" name="update">
          <option>Criminal Verified</option>
          <option>Criminal Caught</option>
          <option>Criminal Interrogated</option>
          <option>Criminal Accepted the Crime</option>
          <option>Criminal Charged</option>
          <option>Close case</option>
      </select>

      <input class="btn btn-primary btn-sm" type="submit" value="Update Case Status" name="status" style="margin-top: 10px; margin-left: 40%;">
    </form>
    </div>     
     <div style="width: 30%;float: left;height: 250px; background-color: #dfdfdf;">
     <form method="post">
     <textarea name="final_report" cols="40" rows="5" placeholder="Type the Update" style="margin-top: 20px;margin-left: 20px;" id="ciid" onfocusout="f1()" required></textarea>
     <div>
      <input  class="btn btn-danger" type="submit" value="Make Update" name="close" style="margin-left: 20px; margin-top: 10px; margin-bottom:20px;">
       </div>
    </form>
</div>
<div style="width: 30%;float: left;height: 250px; background-color: #dfdfdf;">
     <form action="#" method="post" enctype='multipart/form-data'>
     <br>
     <br>
     <p> Upload recently aquired evidence </p>
     <br>
     <textarea name="upt1" cols="25" rows="3" placeholder="Please specify the reason of uploading" class="b" style="margin-top: -30px;margin-left: 0px;" required=""></textarea>
     <br><br>
     <input type="file" name="file" style="" required="" style="margin-top: -150px;margin-left: 0px;" >
     <div>
       <br>
      <input  class="btn btn-danger" type="submit" value="Upload File"  name="new" id = "new"style="margin-left: px; margin-top: 8px; margin-bottom:20px;">
      
       </div>
    </form>
    <form action="#" method="post">
    <input  class="btn btn-danger" type="submit" value="View Files" name="view" style="margin-left: 130px; margin-top: -77px; margin-bottom:20px;">
  </form>
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
  <h4 style="color: white;">&copy <b>Crime Portal 2024</b></h4>
</div> 

 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
 <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</body>
</html>