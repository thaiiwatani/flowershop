<?php
ob_start();
include 'connect.php';
include 'checklogin.php';
if(isset ($_REQUEST['page']))
    {
    if(isset ($_REQUEST['id']))
        {
            $id=$_REQUEST['id'];
            $sql="update khachhang set trangthai=1 where idKH=$id";
            mysqli_query($connect,$sql);
            header("location:index.php?page=thongke&type=khachhangmoi");
        }

    }

?>
