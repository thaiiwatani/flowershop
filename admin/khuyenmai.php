
<?php
ob_start();
include 'connect.php';
include 'checklogin.php';

{
    $sql="select * from khuyenmai order by idkhuyenmai desc";
    $ds=mysql_query($sql);
    while ($pt=  mysql_fetch_array($ds))
    {
        ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Khuyen mai_admin </title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<div class="tieude">
    Chương trình khuyến mãi giảm <?php echo $pt['chietkhau'] ?>% giá tất cả sản phẩm.
</div>
<div class="noidung">
    <div class="anh">
        <img src="../upload/<?php echo $pt['hinhanh']; ?>" width="80px" height="80px"/>
    </div>
    <div class="chitiet">
        <?php echo $pt['thongtin'] ?>
        <br />

    </div>
</div>
<div class="suaxoa">
    <a onclick="return confirm('Bạn có chắc chắn muốn sửa chương trình khuyến mãi này không?')" href="index.php?page=suakhuyenmai&id=<?php echo $pt['idkhuyenmai'] ?>">Sửa</a>
</div>
    <?php
    }
}
?>

</html>