<?php


session_start();
//print_r($_SESSION);

session_destroy();
echo "<script>alert('Logout Successfully');
self.location='../login/login.php';</script>";
?>