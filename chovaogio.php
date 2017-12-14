<?php
ob_start();
include 'connect.php';
session_start();
if(isset($_REQUEST['id']))
{
    $id=$_REQUEST['id'];
}
//Dua san pham vao gio hang
if(isset($_SESSION['cart'][$id]))
{
    $_SESSION['cart'][$id]['soluong']+= 1;
}
else
{
    $sql = "SELECT hoa.hinhanh as hinhanh1,dongia,chietkhau,tenhoa,chitiet,idhoa
    FROM hoa join khuyenmai on hoa.idkhuyenmai=khuyenmai.idkhuyenmai where idhoa = $id and trangthai = 1";
    $ds=mysql_query($sql);
    while ($pt=  mysql_fetch_array($ds))
    {
        $tenhoa=$pt['tenhoa'];
        $hinhanh=$pt['hinhanh1'];
        $giakm=$pt['dongia']*(100-$pt['chietkhau'])/100;

    }
    $_SESSION['cart'][$id]=array("ma" => $id, "ten" => $tenhoa, "hinhanh" => $hinhanh, "gia" => $giakm, "soluong"=>1);
}
header('location:index.php?page=giohang');
//Dua san pham vao gio hang
?>
