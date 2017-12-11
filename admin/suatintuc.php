<?php
ob_start();
include 'connect.php';
if(isset ($_REQUEST['page']))
{
    if(isset ($_REQUEST['id']))
    {
        $id=$_REQUEST['id'];
        $sql="select * from tintuc where idtintuc=$id";
        $ds=mysql_query($sql);
        while ($pt=  mysql_fetch_array($ds))
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
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  </head>
  <body>


      <form name="form1" action="xulysuatintuc.php" method="post" enctype="multipart/form-data">
          <table border="1" cellpadding="5">
              <caption>Thông tin tin tức cần sửa</caption>
              <tr>
                  <td></td>
                  <td><input type="hidden" name="id"  value="<?php echo $id;?>"</td>
              </tr>
              <tr>
                  <td>Tiêu đề trang tin</td>
                  <Td><input type="text" name="txttieude" value="<?php echo $tieude ?>"/></Td>
              </tr>
            
               
              <tr>
                  <td>Nội dung</td>
                  <Td><textarea name="txtnoidung" value="" rows="10" cols="25"><?php echo $noidung; ?> </textarea> </Td>
              </tr>
              <tr>
                  <td>Hình ảnh</td>
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
