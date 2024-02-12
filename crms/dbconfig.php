<?php
$conn = mysqli_connect('localhost','root','','crime_portal');
if(!$conn)
{
    die("could not connect".mysqli_error());
}
return $conn;
?>