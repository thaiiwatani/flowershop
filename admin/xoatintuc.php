<?php
ob_start();
include 'checklogin.php';
include 'connect.php';
if(isset($_REQUEST['id']))
{
    $id=$_REQUEST['id'];
}
$sql="delete from tintuc where idtintuc=$id";
mysql_query($sql);
header("location:index.php?page=tintuc");
?>
