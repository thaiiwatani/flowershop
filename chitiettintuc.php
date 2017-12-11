
<?php
ob_start();
include 'connect.php';

    if(isset ($_REQUEST['id']))
        {
        $id=$_REQUEST['id'];
        $sql="select * from tintuc where idtintuc=$id";
        $ds=mysql_query($sql);
        ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title></title>
</head>
<?php
    while ($pt = mysql_fetch_array($ds)) {
        ?>
    <div class="center_title_bar">Tin tức
    </div>
    <div class="prod_box_big">
        <div style="text-align: center;">
            <img src="upload/<?php echo $pt['hinhanh'];  ?>" width="500px" height="500px" alt="" title="" border="0" />
        </div>
        <div class="top_prod_box_big"></div>
    <div class="center_prod_box_big">
        <div class="specifications">
            <h2><span style="color: red; padding-left: 30px;" class="blue"><?php echo $pt['tieude']?><br /></span></h2>
        <?php echo $pt['noidung']; ?>
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
