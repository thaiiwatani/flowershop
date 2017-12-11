<?php
ob_start();
include 'connect.php';
$cid=$_REQUEST['cid'];
if($cid==-1)
{
    $sql="select * from hoa";
}
else
{
    $sql="select * from hoa where idDM=$cid";
}
$ds=mysqli_query($connect,$sql);
?>
<form name ="form1" action="" method="post">
    <select name="chondm">
        <option value="-1">Tất cả</option>
        <?php
            $sql1="select * from danhmuchoa";
            $ds1=  mysqli_query($connect,$sql1);
            while ($pt= mysqli_fetch_array($ds1))
            {
                if($pt['idDM']==$cid)
                {

            ?>
        <option value="<?Php echo $pt['idDM']?>" selected ><?php echo $pt['tenDM']?></option>
            <?php
            }
            else
            {
                 ?>
        <option value="<?Php echo $pt['idDM']?>"><?php echo $pt['tenDM']?></option>
            <?php
            }
            }
        ?>
    </select>
    <input type="submit" value="Hiển thị" name="btnhienthi">

</form>
<a href="index.php?page=themsanpham">Thêm mới sản phẩm</a>
<table border="1" cellpadding="5">
    <tr>
    <th>Tên sản phẩm</th>
    <th>Đơn giá</th>
    <th>Trạng thái</th>
    <th>Chi tiết</th>
    <th>Hình ảnh</th>
    <th></th>
    </tr>
    <?php
    while ($pt = mysqli_fetch_array($ds)) {
            
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
        <td><img src="pic/<?php echo $pt['hinhanh']; ?>" width="80px" height="80px"/></td>
        <td>
            <a href="index.php?page=suasanpham&id=<?php echo $pt['idhoa'] ?>">Sửa</a>
            <a href="index.php?page=xoasanpham&id=<?php echo $pt['idhoa'] ?>">Xóa</a>
        </td>
    </tr>
<?php
    }
?>
</table>
<a href="index.php?page=themsanpham">Thêm mới sản phẩm</a>

<?php
if(isset($_POST['btnhienthi']))
{
    header("location:index.php?page=sanpham&cid=".$_POST['chondm']);
}
?>
