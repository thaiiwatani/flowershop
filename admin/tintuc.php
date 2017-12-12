<?php
ob_start();
include 'connect.php';
include 'checklogin.php';
$sql="select * from tintuc order by idtintuc desc";
    $ds=mysqli_query($connect,$sql);
    $tongso=  mysqli_num_rows($ds);
$spt=3;
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tin tuc admin </title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/style1.css" />
</head>
    <div class="giua">
        <?php
        if(mysqli_num_rows($ds1)>0){
        while ($pt = mysqli_fetch_array($ds1)) {
        ?>
<div class="center_prod_box_big">
    <div class="product_img_big">
        <img src="../upload/<?php echo $pt['hinhanh'];  ?>" width="130px" height="130px" alt="" title="" border="0" />                                                             <br />

    </div>
    <div class="details_big_box">
        <div class="product_title_big"><?php echo $pt['tieude']?></div>
        <br />
        <?php echo substr(strip_tags($pt["noidung"],'<br>'),0,250)."..."; ?>
        <br />

        <a href="index.php?page=chitiettintuc&id=<?php echo $pt['idtintuc']?>">Chi tiết</a>

    </div>

</div>
<div class="suaxoa">
    <a href="index.php?page=suatintuc&id=<?php echo $pt['idtintuc'] ?>">Sửa</a>|
    <a onclick=" return confirm('Bạn có chắc chắn muốn xóa tin tức này không?')" href="index.php?page=xoatintuc&id=<?php echo $pt['idtintuc'] ?>">Xóa</a>|
    <a href="index.php?page=themtintuc">Thêm tin</a>
</div>
        
    <?php
    }
    ?>
    <div>
         <?PHP
         if($sotrang>1)
        {
        for($i=1;$i<=$sotrang;$i++)
        {
            ?>
             <a href="index.php?page=tintuc&trang=<?php  echo $i ?>">Trang<?php  echo $i ?></a>
             <?php
        }
        }
         ?>
        </div>
        <?php
}
?>
    </div>
</html>