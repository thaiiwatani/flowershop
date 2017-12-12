<?php
ob_start();
include 'checklogin.php';
include 'connect.php';
if(isset($_REQUEST['type']))
    {
    $sql="select * from hoadon where thanhtoan=0 and trangthai=1 order by idHD desc";
    $ds=mysqli_query($connect,$sql);
    ?>
<table border="1" cellpadding="5" width="650">
    <caption>Hóa đơn chưa thanh toán</caption>
    <tr>
    <th>Tên khách hàng</th>
    <th>Thời gian</th>
    <th>Địa chỉ</th>
    <th>Điện thoại</th>
    <th>Email</th>
    <th>Tổng tiền</th>
    <th></th>
    </tr>
<?php
    while ($pt = mysqli_fetch_array($ds)) {
        ?>
    <tr>
        <td><?php echo $pt['tenKH']?></td>
        <td><?php echo $pt['thoigian']?></td>
        <td><?php echo $pt['diachi']?></td>
        <td><?php echo $pt['dienthoai']?></td>
        <td><?php echo $pt['email']?></td>
        <td><?php echo number_format($pt['tongtien'],0,'','.')?>đ</td>
        <td>
            <a href="index.php?page=hoadonchitiet2&id=<?php echo $pt['idHD'] ?>">Xem chi tiết</a>
        </td>
    </tr>
    <?php

    }
    ?>
</table>
    <?php
    }

?>
