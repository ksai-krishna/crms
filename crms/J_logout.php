<?php
session_start(); 

session_destroy(); 
//destroy session
header("location:jlr_login.php"); 
?>

