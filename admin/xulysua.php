<?php
ob_start();
include 'connect.php';
include 'checklogin.php';
$cid=$_POST['cid'];
$name=$_POST['txtname'];
$stt=$_POST['txtstt'];
$ghichu=$_POST['txtghichu'];
if(isset($_POST['cbtt']))
{
    $trangthai=1;
}
else
{
    $trangthai=0;
}
echo $cid.$name.$stt.$ghichu.$trangthai;
$sql="update danhmuchoa set tenDM='$name', stt=$stt, trangthai=$trangthai,ghichu='$ghichu' where idDM=$cid";
mysql_query($sql);
if(mysql_affected_rows ()>0)
{
    header("location:index.php?page=danhmuc");
}
 else {
    header("location:index.php?page=suadanhmuc&cid=$cid");
}
?>
