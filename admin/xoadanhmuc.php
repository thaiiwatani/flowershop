<?php
ob_start();
include 'checklogin.php';
include 'connect.php';
if(isset($_REQUEST['cid']))
{
    $cid=$_REQUEST['cid'];
}
$sql="delete from danhmuchoa where idDM=$cid";
mysql_query($sql);
header("location:index.php?page=danhmuc");
?>
