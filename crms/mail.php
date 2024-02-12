<?php
require_once('mail_class.php');
include('./smtp/PHPMailerAutoload.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
	session_start();
if(!isset($_SESSION['x']))
    header("location:jlr_login.php");
    include("config.php");
    $prid=$_SESSION['pr_id'];
    $jid=$_SESSION['jlr'];
    $q1=mysqli_query($conn,"SELECT p_mail FROM police");
    while($rows1=mysqli_fetch_array($q1))
    {
        $recipient_email = $rows1['p_mail'];
        echo($recipient_email);
    $q=mysqli_query($conn,"SELECT j_name,j_mail FROM jailer where j_id='$jid' ");
    $row=mysqli_fetch_array($q);
    $jname=$row['j_name'];
    $jmail=$row['j_mail'];
    $q=mysqli_query($conn,"SELECT * FROM prisoner_details where p_no='$prid' ");
    $row=mysqli_fetch_array($q);
    $name1=$row['name'];
    $jail_name=$row['jail_name'];
    echo"<script>alert('$jail_name');</script>";
    $age=$row['age'];
    $mobile_number=$row['mobile_number'];
	$q=mysqli_query($conn,"SELECT file_name FROM prisoner_images where p_no='$prid' ");
    $row=mysqli_fetch_array($q);
    $name=$row['file_name'];
	$tmp_name = 'upload/'; // get the temporary file name of the file on the server
	$tmp_name=$tmp_name.$name;

	
	$from_email		 = 'crimeportal.com'; //from mail, sender email address
	//Load POST data from HTML form
	$reply_to_email = $jmail; //sender email, it will be used in "reply-to" header
	$subject	 = "A Prisoner has not escaped from $jail_name jail"; //subject for the email	
	$message	 = "A Prisoner named $name1 has escaped from the jail ";
	$details="\nName:$name1 \nage:$age \n Phone number: $mobile_number \nHere's his/her photograph";
	$end="\n \t\t\t\t Regard's jailer $jname from $jail_name Jail";
    $message=$message.$details.$end;
	$imgname=$name;
	$tmp_name = 'criminals/'; // get the temporary file name of the file on the server
	$tmp_name=$tmp_name.$imgname;
	$size	 = "100000"; // get size of the file for size validation
	$type	 = ' ' ;// get type of the file
	//validate form field for attaching the file

	//read from the uploaded file & base64_encode content
	$handle = fopen($tmp_name, "r"); // set the file handle only for reading the file
	$content = fread($handle, $size); // reading the file
	fclose($handle);				 // close upon completion
	$encoded_content = chunk_split(base64_encode($content));
	$boundary = md5("random"); // define boundary with a md5 hashed value
	//header
	$headers = "MIME-Version: 1.0\r\n"; // Defining the MIME version
	$headers .= "From:".$from_email."\r\n"; // Sender Email
	$headers .= "Reply-To: ".$reply_to_email."\r\n"; // Email address to reach back
	$headers .= "Content-Type: multipart/mixed;"; // Defining Content-Type
	$headers .= "boundary = $boundary\r\n"; //Defining the Boundary
		
	//plain text
	$body = "--$boundary\r\n";
	$body .= "Content-Type: text/plain; charset=ISO-8859-1\r\n";
	$body .= "Content-Transfer-Encoding: base64\r\n\r\n";
	$body .= chunk_split(base64_encode($message));
		
	//attachment
	$body .= "--$boundary\r\n";
	$body .="Content-Type: $type; name=".$name."\r\n";
	$body .="Content-Disposition: attachment; filename=".$name."\r\n";
	$body .="Content-Transfer-Encoding: base64\r\n";
	$body .="X-Attachment-Id: ".rand(1000, 99999)."\r\n\r\n";
	$body .= $encoded_content; // Attaching the encoded file with email
	$mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
	$mail->Host = 'smtp.hostinger.com';
    $mail->Port = 25;
	$mail->SMTPAuth = true;
	$mail->Username = 'user@crimeportal.online';
	$mail->Password = 'Forproject@12';
	$mail->SetFrom('user@crimeportal.online', 'Forproject@12');
	$sentMailResult = mail($recipient_email, $subject, $body, $headers);
    }
	if($sentMailResult ){
	    echo("<script>alert('The alert Email has been sent to all police officers');</script>");
	}
	else{
		echo("<script>alert('Something went wrong');</script>");
	}
?>