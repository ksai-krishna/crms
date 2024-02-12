<?php
    session_start();
    if(!isset($_SESSION['x']))
        header("location:policelogin.php");
            include("config.php");
            require_once("encrypt_decrypt.php");
            $cid=$_SESSION['cid'];
            $upd=Encrypt("Case Closed");
            date_default_timezone_set('Asia/Kolkata');
            $t=Encrypt(date("Y-m-j h:i:sA"));
            mysqli_query($conn,"insert into update_case(c_id,case_update,d_o_u) values('$cid','$upd','$t')");
            header("location:police_pending_complain.php");
    ?>