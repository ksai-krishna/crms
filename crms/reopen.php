<html>
<title>Reopen</title>
<?php
    session_start();
    include("config.php");
    require_once("encrypt_decrypt.php");
    date_default_timezone_set('Asia/Kolkata');
    $t=Encrypt(date("Y-m-j h:i:sA"));
    if(!isset($_SESSION['x']))
        header("location:policelogin.php");
        
if(isset($_POST['s'])){
          $reason=$_POST['name'];
          $cid=$_SESSION['cid'];
          $p_id=$_SESSION['pol'];
          $query="select case_update from update_case where c_id='$cid' ";
          $result12=mysqli_query($conn,$query);
          $row=mysqli_fetch_array($result12);
          $stat=Encrypt("Case Reopened");
          $rpn=Encrypt("Case Reopened");
          $rpn1="Reason for Case reopening is ";
          $reopen1=$rpn1.$reason;
          $reopen=Encrypt($reopen1);
          echo "<script type='text/javascript'>alert('$reopen1');</script>";
          $fn=0;
          $m=0;
          $n=1;
          $c=Encrypt("In Process");
          $stat=Encrypt("Reopened");
          if($n)
          {
            $qu1=mysqli_query($conn,"insert into update_case(case_update,c_id,d_o_u) values('$rpn','$cid','$t')");
            $co="update complaint set pol_status='$c' ,inc_status='$stat', p_id='$p_id' where c_id='$cid'";
            $q2=mysqli_query($conn,$co);
            $m=1;
          }
          
          if($m)
          {
            mysqli_query($conn,"insert into update_case(case_update,c_id,d_o_u) values('$reopen','$cid','$t')");
            $mes="The Case is Reopened";
            echo "<script type='text/javascript'>alert('$mes');</script>";
            echo "<script>
            window.setTimeout(function() {
                window.location = 'police_complainDetails.php';
              }, 1);
            </script>";
          }
        }
    ?>
  <head>
<script>
function f1()
        {
        var sta2=document.getElementById("name").value;
        var x2=sta2.indexOf(' ');
        if(sta2=="" && x2>=0){
          document.getElementById("name").value="";
          alert("Blank FIeld Not Allowed");
        }
      }
    </script>
<style>
.reg
{
color:white;
text-align:center;
font-size:28px;
}
</style>

<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
<link href="complainer_page.css" rel="stylesheet" type="text/css" media="all" />
<link href="style1.css" rel="stylesheet" />
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
              </ul>
    </div>
  </div>
 </nav>
	
<div class="video" style="margin-top: 5%"> 
	<div class="center-container">
		 <div class="bg-agile">

		<p class="reg" style="color:white"> Reason for reopening </p>
			<br><br>
			<div class="login-form">
				<form action="#" method="post" enctype='multipart/form-data'>

		<p style="color:#dfdfdf">Please Enter reason for reopening </p><textarea type="text"  name="name"  required="" id="name" onfocusout="f1()"></textarea>
<br>


	
					<input type="submit" value="Submit" name="s">
				</form>	
			</div>	
		</div>
	</div>	
</div>	

    
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js">
</script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js">
</script>
</body>
</html>