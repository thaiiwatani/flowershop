<?php
ob_start();
include 'checklogin.php';
?>
<ul>
    <li><a href="index.php?page=thongke&type=sanphambanchay">Sản phẩm bán chạy</a></li>
    <li><a href="index.php?page=thongke&type=sanphammoi">Sản phẩm mới</a></li>
    <li><a href="index.php?page=thongke&type=khachhangmoi">Khách hàng mới</a></li>
    <li><a href="index.php?page=thongke&type=doanhthutrongngay">Doanh thu trong ngày</a></li>
</ul>
<?php
include 'connect.php';
$type=$_REQUEST['type'];
switch ($type)
{
    case 'sanphambanchay':
        include 'sanphambanchay.php';
        break;
    case 'sanphammoi':
        include 'sanphammoi.php';
        break;
    case 'khachhangmoi':
        include 'khachhangmoi.php';
        break;
    case 'doanhthutrongngay':
        include 'doanhthutrongngay.php';
        break;
    case 'doanhthutrongthang':
        include 'doanhthutrongthang.php';
        break;
    default:
        break;
}


/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
