<?php 
 $con=mysqli_connect('localhost','root','','crime_portal');
    if(!$con)
    {
        die('could not connect: '.mysqli_error());
    }
$images_sql = "SELECT * FROM criminal_images ";
$result = mysqli_query($con,$images_sql);
$q="SELECT * FROM criminal_details ";
$qr=mysqli_query($con,$q);
while($r = mysqli_fetch_array($qr)){
$age=$r['age'];
$cno=$r['c_no'];
while($row = mysqli_fetch_array($result))
{

$filename=$row['file_name'];
?>
<html>
	<body>
<table>
<tr>
<td> <img src="upload/<?= $filename ?>" width="300px" height="300px" > </td>	
<td><?php echo $filename ?></td>
<td><?php echo $r['age'] ?></td>
<td><?php echo $r['c_no'] ?></td>
<td><?php echo $r['address'] ?></td>
</tr>
</table>
<?php
}
}
?>
</body>
</html>