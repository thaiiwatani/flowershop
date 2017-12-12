<?php
ob_start();
include 'connect.php';
include 'checklogin.php';
$tenhoa=$_POST['txttensp'];
$dongia=$_POST['txtgiasp'];
$iddm=$_POST['chondm'];
$chitiet=$_POST['txtchitiet'];
$tenanh=$_FILES['txtanh']['name'];
if(isset ($_POST['cbtt']))
            {
                $tt=1;
            }
            else
            {
                $tt=0;
            }
if($tenanh=='')
    {
    echo "Chọn ảnh";
    }
else
    {
    $ext = substr(strrchr($tenanh, '.'), 1);
    $tenanh=time().'.'.$ext;
    move_uploaded_file($_FILES['txtanh']['tmp_name'], '../upload/'.$tenanh);
    $sql="insert into hoa(tenhoa,dongia,trangthai,hinhanh,chitiet,idDM) values('$tenhoa',$dongia,$tt,'$tenanh','$chitiet',$iddm)";
    mysqli_query($connect,$sql);
    if(mysqli_affected_rows($connect)>0)
    {
        header('location:index.php?page=sanpham&cid='.$iddm);
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
<title>Thêm sản phẩm</title>
<script type="text/javascript" src="js/js.js"></script>
<script type="text/javascript" src="js/ckeditor.js"></script>
</head>
<form name="form1" action="" method="post" enctype="multipart/form-data">
    <table width="680px">
        <tr>
            <td>Chọn danh mục</td>
            <td>
                <select name="chondm">
        <?php
            $sql1="select * from danhmuchoa";
            $ds1=  mysqli_query($connect,$sql1);
            while ($pt= mysqli_fetch_array($ds1))
            {
?>
        <option value="<?Php echo $pt['idDM']?>"><?php echo $pt['tenDM']?></option>
    <?php

            }
        ?>
    </select>
            </td>
        </tr>
         <tr>
            <td>Tên sản phẩm</td>
            <td><input type="text" name="txttensp"/></td>
        </tr>
         <tr>
            <td>Đơn giá</td>
            <td><input type="text" name="txtgiasp"/></td>
        </tr>

         <tr>
            <td>Trạng thái</td>
            <td><input type="checkbox" name="cbtt"/></td>
        </tr>
        <tr>
            <td>
                Chi tiết
            </td>
            <td><textarea cols="70" id="editor1" name="txtchitiet" rows="10" class="ckeditor"></textarea>
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
            <td><input type="submit" name="btnadd" value="Thêm sản phẩm mới"/></td>
        </tr>


    </table>
</form>
</html>