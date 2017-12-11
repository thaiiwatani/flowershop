<?php
ob_start();
include 'connect.php';
if(isset ($_REQUEST['type']))
    {
    $sql="select * from hoa order by idhoa desc limit 10";
    $ds=mysql_query($sql);
    ?>
<table border="1" cellpadding="5">
    <tr>
    <th>Tên sản phẩm</th>
    <th>Đơn giá</th>
    <th>Trạng thái</th>
    <th>Chi tiết</th>
    <th>Hình ảnh</th>
    </tr>
<?php
    while ($pt = mysql_fetch_array($ds)) {
        ?>
    <tr>
        <td><?php echo $pt['tenhoa'] ?></td>
        <td><?php echo $pt['dongia'] ?></td>
        <td><?php
            if($pt['trangthai']==1)
            {
                echo 'Hiển thị';
            }
            else {
                echo "Ẩn";
            }
            ?>
        </td>
        <Td><textarea name="txtghichu" value="" rows="6" cols="25"><?php echo $pt['chitiet']; ?> </textarea> </Td>
        <td><img src="../upload/<?php echo $pt['hinhanh']; ?>" width="80px" height="80px"/></td>
    </tr>

    <?php
    }
    ?>
</table>
    <?php
    }

?>
