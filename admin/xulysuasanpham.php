<?php
ob_start();
include 'connect.php';
$id=$_POST['id'];
$cid=$_POST['chondm'];
$name=$_POST['txtname'];
$dongia=$_POST['txtdongia'];
$chitiet=$_POST['txtchitiet'];
$tenanh=$_FILES['txtanh']['name'];
$ext = substr(strrchr($tenanh, '.'), 1);
$tenanh=time().'.'.$ext;
move_uploaded_file($_FILES['txtanh']['tmp_name'], 'pic/'.$tenanh);
if(isset($_POST['cbtt']))
{
    $trangthai=1;
}
else
{
    $trangthai=0;
}

$sql="update hoa set tenhoa='$name', idDM=$cid, dongia=$dongia, trangthai=$trangthai,chitiet='$chitiet',hinhanh='$tenanh' where idhoa=$id";
mysql_query($sql);
if(mysql_affected_rows ()>0)
{
    header("location:index.php?page=sanpham&cid=-1");
}
 else {
    header("location:index.php?page=suasanpham&id=$id");
}
?>



?>
