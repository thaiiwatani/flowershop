<?php
ob_start();
include 'connect.php';
$tieude=$_POST['txttieude'];
$noidung=$_POST['txtnoidung'];

$tenanh=$_FILES['txtanh']['name'];

if($tenanh=='')
    {
    
    }
else
    {
    $ext = substr(strrchr($tenanh, '.'), 1);
    $tenanh=time().'.'.$ext;
    move_uploaded_file($_FILES['txtanh']['tmp_name'], '../upload/'.$tenanh);
    $sql="insert into tintuc(tieude,noidung,hinhanh,ngaydang) values('$tieude','$noidung','$tenanh',NOW())";
    mysql_query($sql);
    if(mysql_affected_rows ()>0)
    {
        header('location:index.php?page=tintuc');
    }
    else
    {
        echo "Kiểm tra thông tin sản phẩm";
    }
    }
?>
<form name="form1" action="" method="post" enctype="multipart/form-data">
    <table>
        <caption><h2>Thêm các tin tức mới</h2></caption>

         <tr>
            <td>Tiêu đề tin tức</td>
            <td><input type="text" style="width: 350px;" name="txttieude"/></td>
        </tr>
         <tr>
            <td>Nội dung</td>
            <td><textarea name="txtnoidung" value="" rows="15" cols="65"></textarea></td>
        </tr>


        <tr>
            <td>Hình ảnh</td>
            <td><input type="file" name="txtanh"/></td>
        </tr>
         <tr>
            <td></td>
            <td><input type="submit" name="btnadd" value="Thêm tin tuc mới"/></td>
        </tr>


    </table>
</form>