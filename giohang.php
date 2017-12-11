<?php
ob_start();
$tongtien=0;
?>
<div class="center_title_bar">Sản phẩm trong giỏ</div>
<?php
if (isset($_POST['btnupdate']))
{
    foreach ($_POST['txt'] as $chiso => $giatri)
    {
        if($giatri>0)
        {
            $_SESSION['cart'][$chiso]['soluong']=$giatri;
        }
        else
        {
            unset($_SESSION['cart'][$chiso]);
        }
    }
}
if(isset($_POST['btnorder']))
{
    header('location:index.php?page=hoadon');
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
        <th></th>
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
        <td><input style="width: 50px; text-align: right;" type="text" value="<?php echo $giohang['soluong']?>" name="txt[<?php echo $giohang['ma']?>]"/></td>
        <td style="text-align:right;"><?php echo number_format($giohang['gia']*$giohang['soluong'],0,'','.')?> VNĐ</td>
        <td style="text-align:right;"><a onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này trong giỏ hàng không?')" href="xoagiohang.php?id=<?php echo $giohang['ma']?>">Xóa</a></td>
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
        <td></td>
    </tr>
    <tr>
        <td style="text-align: right;" colspan="6">
            <a href="index.php?page=trangchu">
            Mua thêm hàng
            </a>

        </td>
    </tr>
    <tr>
        <td colspan="6">
            <a onclick="return confirm('Bạn có chắc chắn muốn xóa giỏ hàng không?')" href="xoagiohang.php">Xóa giỏ hàng</a>
        </td>
    </tr>
    <tr>
        <td colspan="5">
            <input type="submit" name="btnupdate" value="Cập nhật"/>
            <input type="submit" name="btnorder" value="Đặt hàng"/>
        </td>
    </tr>
</table>
</form>
<?php
    $_SESSION['tongtien']=$tongtien;
    }
    else
    {
        echo "Không có sản phẩm nào trong giỏ";
        ?>
<br />
<a href="index.php?page=trangchu">Mua hàng</a>
<?php
    }
}
else
{
    echo "Không có sản phẩm nào trong giỏ";
    ?>
<br />
<a href="index.php?page=trangchu">Mua hàng</a>
<?php
}
?>
