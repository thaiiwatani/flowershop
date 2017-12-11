<?php
ob_start();
include 'connect.php';
include 'checklogin.php';
$id=$_POST['id'];
$tieude=$_POST['txttieude'];
$noidung=$_POST['txtnoidung'];
$tenanh=$_FILES['txtanh']['name'];
$ext = substr(strrchr($tenanh, '.'), 1);
$anh= time().'.'.$ext;
move_uploaded_file($_FILES['txtanh']['tmp_name'], '../upload/'.$anh);
if($tenanh=='')
    {
        $sql="update tintuc set tieude='$tieude',noidung='$noidung' where idtintuc=$id";
    }
else{
$sql="update tintuc set tieude='$tieude',noidung='$noidung',hinhanh='$anh' where idtintuc=$id";
}
mysql_query($sql);
if(mysql_affected_rows ()>0)
{
    header("location:index.php?page=tintuc");
}
 else {
    header("location:index.php?page=suatintuc&id=$id");
 }
?>
