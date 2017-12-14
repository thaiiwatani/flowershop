<?php
ob_start();
include 'checklogin.php';
$tongtien=0;
include 'connect.php';
if(isset ($_REQUEST['id']))
    {
    $id=$_REQUEST['id'];
    $sql="select tenhoa, soluong, hoadonchitiet.dongia as dongia1, hinhanh,idHD
    from hoadonchitiet join hoa on hoa.idhoa=hoadonchitiet.idhoa
    where idHD=$id";
    $ds=mysql_query($sql);
    ?>
<table border="0" cellpadding="5">
    <tr>
        <th>Tên sản phẩm</th>
        <th>Hình ảnh</th>
        <th>Đơn giá</th>
        <th>Số lượng</th>
        <th>Thành tiền</th>
        <th></th>
    </tr>
<?php
    while ($pt = mysql_fetch_array($ds)) {
        $tongtien+=$pt['dongia1']*$pt['soluong'];
        ?>
    <tr>
        <td><?php echo $pt['tenhoa']?></td>
        <td><img src="../upload/<?php echo $pt['hinhanh']?>" width="50px" height="50px"/></td>
        <td style="text-align:right;"><?php echo number_format($pt['dongia1'],0,'','.')?> VNĐ</td>
        <td style="text-align:right;"><?php echo $pt['soluong'] ?></td>
        <td style="text-align:right;"><?php echo number_format($pt['dongia1']*$pt['soluong'],0,'','.')?> VNĐ</td>
    </tr>
    <?php


    }
    ?>
    <tr>
        <td colspan="5" style="text-align:right;">Tổng tiền:<?php echo number_format($tongtien,0,'','.'); ?> VNĐ</td>
    </tr>
    <tr>
        <td colspan="5">
            <a onclick="return confirm('Bạn đã xử lý xong đơn hàng này chưa?')" href="index.php?page=updatetrangthaihoadon&id=<?php echo $id ?>">Update trạng thái</a>
            |<a onclick="return confirm('Bạn có chắc chắn hủy đơn hàng này không?')" href="index.php?page=xoahoadon&id=<?php echo $id; ?>">Xóa</a>
        </td>
    </tr>
</table>
    <?php

    }
?>