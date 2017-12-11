<?php
ob_start();
include 'connect.php';
include 'checklogin.php';
if(isset ($_REQUEST['page']))
    {
    if(isset ($_REQUEST['id']))
        {
            $id=$_REQUEST['id'];
            $sql="update hoadon set trangthai=1 where idHD=$id";
            mysql_query($sql);
            header("location:index.php?page=hoadon&type=hoadonchoxuly");
        }

    }

?>
