
<?php
ob_start();
include 'connect.php';
include 'checklogin.php';

{
    $sql="select * from danhmuchoa order by stt asc";
    $ds=mysqli_query($connect,$sql);
    ?>
<table border="1" cellpadding="5">
     <tr>
        <th>Tên danh mục hoa</th>
        <th>Thứ tự</th>
        <th>Trạng thái</th>
        <th>Ghi chú</th>
        <th></th>
    </tr>
    <?php
    while ($pt= mysqli_fetch_array($ds))
    {
        ?>
    <tr>
        <td><?php echo $pt['tenDM'] ?></td>
        <td><?php echo $pt['stt']?></td>
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
        <td><?php                    echo $pt['ghichu']?></td>
        <td>
            <a href="index.php?page=suadanhmuc&cid=<?php echo $pt['idDM'] ?>">Sửa</a>
            <a onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này không?')" href="index.php?page=xoadanhmuc&cid=<?php echo $pt['idDM'] ?>">Xóa</a>
        </td>
    </tr>
    <?php }?>
</table>

<a href="index.php?page=themdanhmuc">Thêm danh mục mới</a>
<?php
} 



?>




