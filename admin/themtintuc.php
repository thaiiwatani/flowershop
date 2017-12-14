<?php
ob_start();
include 'connect.php';
include 'checklogin.php';
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
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Thêm tin tức</title>
<script type="text/javascript" src="js/ckeditor.js"></script>
</head>
<form name="form1" action="" method="post" enctype="multipart/form-data">
    <table width="700">
        <caption><h2>Thêm các tin tức mới</h2></caption>

         <tr>
            <td>Tiêu đề</td>
            <td><input type="text" style="width: 350px;" name="txttieude"/></td>
        </tr>
         <tr>
            <td>Nội dung</td>
            <td><textarea cols="70" id="editor1" name="txtnoidung" rows="10" class="ckeditor"></textarea>
            <script type="text/javascript">
				CKEDITOR.replace( 'editor1' );
            </script>
            </td>
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
</html>