
<?php
ob_start();
include 'checklogin.php';
?>
<ul>
    <li><a href="index.php?page=hoadon&type=hoadonchoxuly">Hóa đơn chờ xử lý</a></li>
    <li><a href="index.php?page=hoadon&type=hoadonchuathanhtoan">Hóa đơn chưa thanh toán</a></li>

</ul>
<?php
include 'connect.php';
if(isset ($_REQUEST['type']))
    {
$type=$_REQUEST['type'];
switch ($type)
{
    case 'hoadonchoxuly':
        include 'hoadonchoxuly.php';
        break;
    case 'hoadonchuathanhtoan':
        include 'hoadonchuathanhtoan.php';
        break;
    case 'xoahoadon':
        include 'xoahoadon.php';
        break;
    case 'updatetrangthaihoadon':
        include 'updatetrangthaihoadon.php';
        break;
    case 'dathanhtoan':
        include 'dathanhtoan.php';
        break;
    default:
        include 'hoadonchoxuly.php';
        break;
}
}
else {
    include 'hoadonchoxuly.php';
}

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
