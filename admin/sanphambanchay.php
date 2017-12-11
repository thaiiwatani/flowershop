
<?php
ob_start();
include 'connect.php';
$sql="select hoa.idhoa,tenhoa,sum(soluong) as tong,hinhanh,chitiet
    from hoa join hoadonchitiet on hoa.idhoa=hoadonchitiet.idhoa group by hoa.idhoa order by tong desc limit 10";
$ds=mysql_query($sql);
?>
<table border="1" cellpadding="5">
    <caption>Thống kê các sản phẩm bán chạy</caption>
    <tr>
        <th>Tên sản phẩm hoa</th>
        <th>Hình ảnh</th>
        <th>Thông tin</th>
        <th>Số lượng bán ra</th>
    </tr>
<?php
while($pt=mysql_fetch_array($ds))
    {
    ?>
    <tr>
        <td><?php echo $pt['tenhoa']; ?></td>
        <td><img src="../upload/<?php echo $pt[hinhanh] ?>"width="80px" height="80px"></td>
        <Td><textarea name="txtghichu" value="" rows="6" cols="25"><?php echo $pt['chitiet']; ?> </textarea> </Td>
        <td><?php echo $pt['tong'] ?></td>
    </tr>

    <?php
    }
    ?>
</table>
