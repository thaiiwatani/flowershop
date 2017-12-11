<?php
ob_start();
session_start();
if(isset($_REQUEST['id']))
{
    $id=$_REQUEST['id'];
    unset($_SESSION['cart'][$id]);
    unset($_SESSION['tongtien']);
    header('location:index.php?page=giohang');
}
else
{
    unset($_SESSION['cart']);
    unset($_SESSION['tongtien']);
    header('location:index.php?page=trangchu');
}


?>
