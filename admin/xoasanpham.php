<?php
ob_start();
include 'checklogin.php';
include 'connect.php';
if(isset($_REQUEST['id']))
{
    $id=$_REQUEST['id'];
}
$sql="delete from hoa where idhoa=$id";
mysql_query($sql);
header("location:index.php?page=sanpham&cid=-1");
?>
