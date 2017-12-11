<?php
if(!isset($_SESSION['user_id']))
{
	echo '<br /><br /><center>';
	echo "VUI LÒNG ĐĂNG NHẬP!!!";
	echo '<br />(Click vào <a class="none" href="index.php?page=dangnhap">đây</a> để quay lại)</center>';
	echo '<meta http-equiv="refresh" content="5; url=index.php?page=dangnhap" />';
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
    <table padding-left="25px" cellpadding="5" cellspacing="0" bgcolor="white" width="550px">
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
            <td><input type="submit" name="btnadd" value="Đặt hàng"/></td>
        </tr>
    </table>
</form>
<?php

    }
    }
?>

