
<?php
ob_start();
include 'connect.php';
include 'checklogin.php';
$sql="select hoa.idhoa,tenhoa,sum(soluong) as tong,hinhanh,chitiet
    from hoa join hoadonchitiet on hoa.idhoa=hoadonchitiet.idhoa group by hoa.idhoa order by tong desc";
$ds=mysql_query($sql);
$tongso=  mysql_num_rows($ds);
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
            $ds1=  mysql_query($sql1);
?>
<table border="1" cellpadding="5" width="650">
    <caption>Thống kê các sản phẩm bán chạy</caption>
    <tr>
        <th>Tên sản phẩm hoa</th>
        <th>Hình ảnh</th>
        <th>Thông tin</th>
        <th>Số lượng bán ra</th>
    </tr>
<?php
while($pt=mysql_fetch_array($ds1))
    {
    ?>
    <tr>
        <td><?php echo $pt['tenhoa']; ?></td>
        <td><img src="../upload/<?php echo $pt[hinhanh] ?>"width="80px" height="80px"></td>
        <Td width="300"><?php echo $pt['chitiet']; ?> </Td>
        <td><?php echo $pt['tong'] ?></td>
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
             <a href="index.php?page=thongke&type=sanphambanchay&trang=<?php  echo $i ?>">Trang<?php  echo $i ?></a>
             <?php
        }
    }
?>
