
<?php
ob_start();
include 'connect.php';

    if(isset ($_REQUEST['page']))
        {
        $sql="select * from khuyenmai";
        $ds=mysqli_query($connect,$sql);
        ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title></title>
</head>
<div class="center_title_bar">Thông tin khuyến mại đang được áp dụng</div>
<?php
    while ($pt = mysqli_fetch_array($ds)) {
        ?>
    <div class="prod_box_big">
        <div>
            <img src="upload/<?php echo $pt['hinhanh'];  ?>" width="130px" height="130px" alt="" title="" border="0" />
        </div>
    <div class="top_prod_box_big"></div>
    <div class="center_prod_box_big">
        <div class="specifications">
        <h2><span class="blue">Chương trình khuyến mại giảm <?php echo $pt['chietkhau']?>% tất cả các sản phẩm.<br /></span></h2>
        <?php echo $pt['thongtin']; ?>
    </div>

    </div>
    <div class="bottom_prod_box_big"></div>
    </div>

<?php

    }
?>
</html>
<?php

 }

?>
