<?php
ob_start();
include 'connect.php';
include 'checklogin.php';
$cid=$_REQUEST['cid'];
if($cid==-1)
{
    $sql="select * from hoa order by idhoa desc";
}
else
{
    $sql="select * from hoa where idDM=$cid order by idhoa desc";
}
    $ds=mysqli_query($connect,$sql);
    $sopt=mysqli_num_rows($ds);
    $sotrang=ceil($sopt/3);
    if($sotrang>1)
    {
    for($i=1;$i<=$sotrang;$i++)
    {
        ?>
<a href="#" onclick="showsp(<?php echo $cid ?>,<?php echo $i ?>)"><?php echo $i ?></a>
<?php
    }
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
    $ds1=mysqli_query($connect,$sql1);
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
    if(mysqli_num_rows($ds1)>0){
    while ($pt = mysqli_fetch_array($ds1)) {

    ?>
    <tr>
        <td><?php echo $pt['tenhoa'] ?></td>
        <td style="text-align: right;"><?php echo number_format($pt['dongia'],0,'','.') ?>VNĐ</td>
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
        <td><?php echo $pt['chitiet']; ?></td>
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
