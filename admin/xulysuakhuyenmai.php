<?php
ob_start();
include 'connect.php';
include 'checklogin.php';
$id=$_POST['id'];
$thongtin=$_POST['txtthongtin'];
$chietkhau=$_POST['txtchietkhau'];
$tenanh=$_FILES['txtanh']['name'];
$ext = substr(strrchr($tenanh, '.'), 1);
$anh1= time().'.'.$ext;
move_uploaded_file($_FILES['txtanh']['tmp_name'], '../upload/'.$anh1);

if($tenanh=='')
    {
        $sql="update khuyenmai set thongtin='$thongtin',chietkhau='$chietkhau' where idkhuyenmai=$id";

    }
else{
$sql="update khuyenmai set thongtin='$thongtin',chietkhau='$chietkhau', hinhanh='$anh1' where idkhuyenmai=$id";
}
mysqli_query($connect,$sql);
if(mysqli_affected_rows($connect)>0)
{
    header("location:index.php?page=khuyenmai");
}
 else {
    header("location:index.php?page=suakhuyenmai&id=$id");
 }
?>
