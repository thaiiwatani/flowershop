<?php
ob_start();
include 'connect.php';
include 'checklogin.php';
$id=$_POST['id'];
$cid=$_POST['chondm'];
$name=$_POST['txtname'];
$dongia=$_POST['txtdongia'];
$chitiet=$_POST['txtchitiet'];
$tenanh=$_FILES['txtanh']['name'];
$ext = substr(strrchr($tenanh, '.'), 1);
$anh= time().'.'.$ext;
move_uploaded_file($_FILES['txtanh']['tmp_name'], '../upload/'.$anh);
if(isset($_POST['cbtt']))
{
    $trangthai=1;
}
else
{
    $trangthai=0;
}
if($tenanh=="")
    {
        $sql="update hoa set tenhoa='$name', idDM=$cid, dongia=$dongia, trangthai=$trangthai,chitiet='$chitiet' where idhoa=$id";
    }
else{
$sql="update hoa set tenhoa='$name', idDM=$cid, dongia=$dongia, trangthai=$trangthai,chitiet='$chitiet',hinhanh='$anh' where idhoa=$id";
}
mysql_query($sql);
if(mysql_affected_rows ()>0)
{
    header("location:index.php?page=sanpham&cid=$cid");
}
 else {
    header("location:index.php?page=suasanpham&id=$id");
 }
?>
