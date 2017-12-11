<?php
ob_start();
include 'connect.php';
$cid=$_REQUEST['cid'];
if($cid==-1)
{
    $sql="select * from hoa order by idhoa desc";
}
else
{
    $sql="select * from hoa where idDM=$cid order by idhoa desc";
}
    $ds=mysql_query($sql);
    $sopt=mysql_num_rows($ds);
    $sotrang=ceil($sopt/3);
    for($i=1;$i<=$sotrang;$i++)
    {
        ?>
<a href="#" onclick="showsp(<?php echo $cid ?>,<?php echo $i ?>)"><?php echo $i ?></a>
<?php
    }

    if(isset($_REQUEST['trang']))
        {
        $trang=$_REQUEST['trang'];
        $batdau=($trang-1)*3;
        }
        else
            {
            $batdau=0;
            }
    $sql1=$sql." limit $batdau,3";
    $ds1=mysql_query($sql1);
       ?>
<br />
<a href="index.php?page=themsanpham">Thêm mới sản phẩm</a>
<table border="1" cellpadding="5" width="650px">
    <tr>
    <th>Tên sản phẩm</th>
    <th>Đơn giá</th>
    <th>Trạng thái</th>
    <th>Chi tiết</th>
    <th>Hình ảnh</th>
    <th></th>
    </tr>
    <?php
    if(mysql_num_rows($ds1)>0){
    while ($pt = mysql_fetch_array($ds1)) {

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
        <td>
            <a href="index.php?page=suasanpham&id=<?php echo $pt['idhoa'] ?>">Sửa</a>
            <a onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?')" href="index.php?page=xoasanpham&id=<?php echo $pt['idhoa'] ?>">Xóa</a>
        </td>
    </tr>
<?php
    }
    }
?>

</table>
<a href="index.php?page=themsanpham">Thêm mới sản phẩm</a>
