<?php
ob_start();
include 'checklogin.php';
include 'connect.php';
if(isset($_REQUEST['cid']))
{
    $cid=$_REQUEST['cid'];
}
$sql="delete from danhmuchoa where idDM=$cid";
mysqli_query($connect,$sql);
header("location:index.php?page=danhmuc");
?>
