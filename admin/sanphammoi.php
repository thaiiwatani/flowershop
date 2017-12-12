<?php
ob_start();
include 'connect.php';
include 'checklogin.php';
if(isset ($_REQUEST['type']))
    {
    $sql="select * from hoa order by idhoa desc";
    $ds=mysqli_query($connect,$sql);
    $tongso=  mysqli_num_rows($ds);
    $spt=4;
    $sotrang=  ceil($tongso/$spt);

            if(isset($_REQUEST['trang']))
            {
            $trang=$_REQUEST['trang'];
            $batdau=($trang-1)*$spt;
            }
            else
            {
             $batdau=0;
            }
            $sql1=$sql." limit $batdau,$spt";
            $ds1=  mysqli_query($connect,$sql1);
    ?>
<table border="1" cellpadding="5">
    <caption>
        Sản phẩm mới
    </caption>
    <tr>
    <th>Tên sản phẩm</th>
    <th>Đơn giá</th>
    <th>Trạng thái</th>
    <th>Chi tiết</th>
    <th>Hình ảnh</th>
    </tr>
<?php
    while ($pt = mysqli_fetch_array($ds1)) {
        ?>
    <tr>
        <td><?php echo $pt['tenhoa'] ?></td>
        <td style="text-align: right"><?php echo number_format($pt['dongia'],0,'','.') ?> VNĐ</td>
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
        <Td  width="200"><?php echo $pt['chitiet']; ?> </Td>
        <td><img src="../upload/<?php echo $pt['hinhanh']; ?>" width="80px" height="80px"/></td>
    </tr>
    <?php
    }
    ?>
</table>
    <?php
    if($sotrang>1)
    {
    for($i=1;$i<=$sotrang;$i++)
        {
            ?>
             <a href="index.php?page=thongke&type=sanphammoi&trang=<?php  echo $i ?>">Trang<?php  echo $i ?></a>
             <?php
        }
    }
    }

?>
