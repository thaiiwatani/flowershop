<?php
ob_start();
include 'connect.php';
include 'checklogin.php';
if(isset($_REQUEST['type']))
    {
    $sql="select * from khachhang where trangthai=0";
    $ds=mysqli_query($connect,$sql);
    ?>
<table border="1" cellpadding="5" width="650">
    <caption>Khách hàng</caption>
    <tr>
    <th>User</th>
    <th>Tên khách hàng</th>
    <th>Ngày sinh</th>
    <th>Địa chỉ</th>
    <th>Điện thoại</th>
    <th>Trạng thái</th>
    <th>Email</th>
    <th></th>
    </tr>
<?php
    while ($pt = mysqli_fetch_array($ds)) {
        ?>
    <tr>
        <td><?php echo $pt['user']?></td>
        <td><?php echo $pt['tenKH']?></td>
        <td><?php echo $pt['ngaysinh']?></td>
        <td><?php echo $pt['diachi']?></td>
        <td><?php echo $pt['dienthoai']?></td>
        <td><?php echo $pt['trangthai']?></td>
        <td><?php echo $pt['email']?></td>
        <td>
            <a onclick="return confirm('Bạn có chắc chắn muốn update khách hàng này không?')" href="index.php?page=updatetrangthaikh&id=<?php echo $pt['idKH'] ?>">Update</a>
            <a onclick="return confirm('Bạn có chắc chắn muốn xóa khách hàng này không?')" href="index.php?page=xoakhachhang&id=<?php echo $pt['idKH'] ?>">Xóa</a>
        </td>
    </tr>
    <?php

    }
    ?>
</table>
    <?php
    }

?>
