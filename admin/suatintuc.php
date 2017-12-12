<?php
ob_start();
include 'connect.php';
include 'checklogin.php';
if(isset ($_REQUEST['page']))
{
    if(isset ($_REQUEST['id']))
    {
        $id=$_REQUEST['id'];
        $sql="select * from tintuc where idtintuc=$id";
        $ds=mysqli_query($connect,$sql);
        while ($pt=  mysqli_fetch_array($ds))
        {
            $tieude=$pt['tieude'];
            $noidung=$pt['noidung'];
            $hinhanh=$pt['hinhanh'];
        }
    }


?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <title>Sửa tin tức</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script type="text/javascript" src="js/ckeditor.js"></script>
  </head>
  <body>


      <form name="form1" action="xulysuatintuc.php" method="post" enctype="multipart/form-data">
          <table border="1" cellpadding="5" width="650">
              <caption>Thông tin tin tức cần sửa</caption>
              <tr>
                  <td style="width: 100px;"></td>
                  <td><input type="hidden" name="id"  value="<?php echo $id;?>"</td>
              </tr>
              <tr>
                  <td style="width: 100px;">Tiêu đề</td>
                  <Td><input style="width: 600px;" type="text" name="txttieude" value="<?php echo $tieude ?>"/></Td>
              </tr>
            
               
              <tr>
                  <td style="width: 100px;">Nội dung</td>
                  <td><textarea cols="70" id="editor1" name="txtnoidung" rows="10" class="ckeditor"><?php echo $noidung; ?></textarea>
                  <script type="text/javascript">
				CKEDITOR.replace( 'editor1' );
                  </script>
                  </td>
              </tr>
              <tr>
                  <td style="width: 100px;">Hình ảnh</td>
                  <td><img src="../upload/<?php echo $hinhanh; ?>" width="80px" height="80px"/><input type="file" name="txtanh"/></td>
              </tr>

               <tr>
                  <td></td>
                  <Td><input type="submit" name="btnedit" value="Sửa tin tức"/></Td>
              </tr>
          </table>
      </form>
  </body>
</html>
    <?php
}
else
{
    echo "Không tồn tại trang này đâu";
}
?>
