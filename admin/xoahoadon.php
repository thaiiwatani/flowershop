<?php
ob_start();
include 'checklogin.php';
include 'connect.php';
if(isset($_REQUEST['id']))
{
    $id=$_REQUEST['id'];
}
$sql="delete from hoadon where idHD=$id";
mysqli_query($connect,$sql);
$sql1="delete from hoadonchitiet where idHD=$id";
mysqli_query($connect,$sql1);
header("location:index.php?page=hoadon");
?>
