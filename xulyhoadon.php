<?php
ob_start();
session_start();
include 'connect.php';
if(isset ($_POST['huy']))
        {
    header('location:xoagiohang.php');
        }
if(isset($_POST['btnadd']))
{
    $ten=$_POST['txtname'];
    $diachi=$_POST['txtdiachi'];
    $dienthoai=$_POST['txtdienthoai'];
    $email=$_POST['txtemail'];
    $idKH=$_POST['txtid'];
    $tongtien=$_SESSION['tongtien'];
    echo $tongtien;
    $sql="insert into hoadon(idKH,tenKH,diachi,dienthoai,email,tongtien,thoigian) values($idKH,'$ten','$diachi','$dienthoai','$email',$tongtien,NOW())";
    mysql_query($sql);
    $sql1="select * from hoadon order by idHD  desc limit 1";
    $ds1=mysql_query($sql1);
    while ($pt=  mysql_fetch_array($ds1))
    {
        $idHD=$pt['idHD'];
    }
    if(isset ($_SESSION['cart']))
        {
    foreach($_SESSION['cart'] as $sp)
    {
        $idhoa=$sp['ma'];
        $giasp=$sp['gia'];
        $soluong=$sp['soluong'];
        $sql2="insert into hoadonchitiet(idHD,idhoa,dongia,soluong) values($idHD,$idhoa,$giasp,$soluong)";
        mysql_query($sql2);
        if(mysql_affected_rows ()>0)
            {
            unset($_SESSION['cart']);
            unset($_SESSION['tongtien']);
            header('location:index.php?page=trangchu');
            }
    }

}
}

?>