<html>
<head>
<title>Settings Menu</title>
<link rel="icon" href="./icons/setting.jpg">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
<link href="complainer_page.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="style1.css">

<script>
function tut
{
window.location.href="https://localhost/crms/tutorial";
}
</script>
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top">
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

       </ul>
    </div>
  </div>
</nav>
	
<div class="video" style="margin-top: 5%"> 
	<div class="center-container">
		 <div class="bg-agile">

		<p style="color:white">Settings Menu </p>
			<br><br>
			<div class="login-form">
				<form action="#" method="post" enctype='multipart/form-data'>			
	
		<p style="color:#dfdfdf">Change Language</p>
		<div class="top-w3-agile" style="color: gray">Please Select a Language
			<select class="form-control" name="Lang" onchange="location=this.value;">
			<option value="http://crimeportal.online/">English</option>
			<option value="Kannada">ಕನ್ನಡ</option>
			<option value="हिन्दी">हिन्दी</option>
			<option value="Telugu">తెలుగు</option>
                 
				</select>
				</div>
		<br>
		<p style="color:#dfdfdf">If You Want know more about the website Please check out the tutorial </p>
		
	<br>
		<input type="button" class="button" value="Tutorial" onclick="document.location='tutorial.html' ">
	
				</form>	
			</div>	
		</div>
	</div>	
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>