<?php
ob_start();
session_start();
if(!isset($_SESSION['user_id']))
{
	echo '<br /><br /><center>';
	echo "VUI LÒNG ĐĂNG NHẬP!!!";
	echo '<br />(Click vào <a class="none" href="index.php?page=dangnhap">đây</a> để quay lại)</center>';
	echo '<meta http-equiv="refresh" content="4; url=index.php?page=dangnhap" />';
	exit();
}
else
    {
    $id=$_SESSION['user_id'];
    $sql="select * from khachhang where idKH=$id";
    $ds=mysql_query($sql);
    while ($pt = mysql_fetch_array($ds)) {
        ?>
<form name="form1" action="xulyhoadon.php" method="post">
    <table padding-left="25px" cellpadding="5" cellspacing="0" bgcolor="white" width="554px">
        <tr>
            <td></td>
            <td><input type="hidden" value="<?php echo $id ?>" name="txtid"/></td>
        </tr>
        <tr>
            <td>Họ tên:</td>
            <td><input style="width: 250px;" type="text" value="<?php echo $pt['tenKH'] ?>" name="txtname"/></td>
        </tr>
         <tr>
            <td>Địa chỉ</td>
            <td><textarea name="txtdiachi" cols="29" rows="5"><?php echo $pt['diachi'] ?></textarea></td>
        </tr>
         <tr>
            <td>Điện thoại</td>
            <td><input style="width: 250px;" type="text" value="<?php echo $pt['dienthoai'] ?>" name="txtdienthoai"/></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input style="width: 250px;" type="text" value="<?php echo $pt['email'] ?>" name="txtemail"/></td>
        </tr>
         <tr>
            <td></td>
            <td><input type="submit" name="btnadd" value="Đặt hàng"/> &nbsp;<input type="submit" onclick="return confirm('Bạn có chắc chắn muốn hủy đơn hàng này không?')" value="Hủy đơn hàng" name="huy" /></td>
        </tr>
    </table>
</form>
<?php

    }
        if($giatri>0)
        {
            $_SESSION['cart'][$chiso]['soluong']=$giatri;
        }
        else
        {
            unset($_SESSION['cart'][$chiso]);
        }
    if(isset($_SESSION['cart']))
{
    if(count($_SESSION['cart'])>0)
    {
    ?>
<form name="form1" action="" method="post">
    <table bgcolor="white" class="prod_box_big" border="0" cellpadding="3">
    <tr>
        <th>Tên sản phẩm</th>
        <th>Hình ảnh</th>
        <th>Đơn giá</th>
        <th>Số lượng</th>
        <th>Thành tiền</th>
    </tr>
    <?php
    foreach ($_SESSION['cart'] as $giohang)
    {
        $tongtien+=$giohang['gia']*$giohang['soluong'];
        ?>
    <tr>
        <td><?php echo $giohang['ten']?></td>
        <td><img src="upload/<?php echo $giohang['hinhanh']?>" width="50px" height="50px"/></td>
        <td style="text-align:right;"><?php echo number_format($giohang['gia'],0,'','.')?> VNĐ</td>
        <td style="text-align:center;"><?php echo $giohang['soluong']?></td>
        <td style="text-align:right;"><?php echo number_format($giohang['gia']*$giohang['soluong'],0,'','.')?> VNĐ</td>
        
    </tr>
    <?php
    }
    ?>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td>Tổng tiền:</td>
        <td style="text-align:right;"><?php echo number_format($tongtien,0,'','.'); ?> VNĐ</td>
        
    </tr>
    </table>
</form>
<?php
    }
}
    }
?>

