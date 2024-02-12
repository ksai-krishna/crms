<html>
<title>Final Update</title>

<link rel="icon" href="./icons/criminal.jpg">
<?php
session_start();
if(!isset($_SESSION['x']))
header("location:policelogin.php");
if(isset($_POST['s'])){
    include("config.php");
	    if($_SERVER["REQUEST_METHOD"]=="POST")
    {     
      $name = $_FILES['file']['name'];
      $target_dir = "upload/";
      $target_file = $target_dir . basename($_FILES['file']['name']);
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      $extensions_arr = array("jpg","jpeg","png","gif");
      if( in_array($imageFileType,$extensions_arr) ){
         
          if(move_uploaded_file($_FILES['file']['tmp_name'],'upload/'.$name)){
             
              $image_base64 = base64_encode(file_get_contents('upload/'.$name) );
              $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;
              $r=mysqli_query($conn,"SELECT * FROM criminal_images where finger_print='$image' " );
              $row1=mysqli_fetch_array($r);
              if($row1)
              {
                $message1 = "This fingerprint is already existing in the database.This is consired as fake finerprint.";
                echo "<script type='text/javascript'>alert('$message1');</script>";                
             }            
             $r=mysqli_query($conn,"SELECT * FROM criminal_images where finger_print='$image' " );
             $row=mysqli_fetch_array($r);
             if($row)
             {
               $message1 = "This criminal is found";
               echo "<script type='text/javascript'>alert('$message1');</script>";
               $id=$row['c_no'];
               $_SESSION['cri_no']=$id;
              //  echo "<script type='text/javascript'>alert('$id');</script>";            
             }else{
                    $message1 = "This criminal is not found";
                    echo "<script type='text/javascript'>alert('$message1');</script>";
            }
              while($rows=mysqli_fetch_array($r)){
                $img = $rows['img'];
                if($img==$image)
                {
                   $message1 = "This fingerprint is already existing in the database";
                   echo "<script type='text/javascript'>alert('$message1');</script>";
                }
                
              $img=$row['img'];        
              
            }            
         }
        }
        } 
      }
?>
<head>
<script>
function ()
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

		<p class="reg" style="color:white">Upload fingerprint </p>
			<br><br>
			<div class="login-form">
				<form action="#" method="post" enctype='multipart/form-data'>
        <input type=file name="file" >	
					<input type="submit" value="Submit" name="s">
				</form>	
			</div>	
		</div>
	</div>	
</div>

<?php
         if(isset($_POST['s'])){
 if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $name = $_FILES['file']['name'];
        $target_dir = "upload/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $extensions_arr = array("jpg","jpeg","png","gif");
        if( in_array($imageFileType,$extensions_arr) ){
            if(move_uploaded_file($_FILES['file']['tmp_name'],'upload/'.$name)){
                $image_base64 = base64_encode(file_get_contents('upload/'.$name) );
                $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;
                echo "<script type='text/javascript'>alert('$image');</script>";     
            		}
       		}
        }    
      }

    ?>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js">
</script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js">
</script>
</body>
</html>