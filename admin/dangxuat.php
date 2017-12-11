<?php
ob_start();
include 'checklogin.php';
session_start();
session_destroy();
header("location:index.php");
?>
