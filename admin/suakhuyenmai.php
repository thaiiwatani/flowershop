<?php
ob_start();
include 'connect.php';
include 'checklogin.php';
if(isset ($_REQUEST['page']))
{
    if(isset ($_REQUEST['id']))
    {
        $id=$_REQUEST['id'];
        $sql="select * from khuyenmai where idkhuyenmai=$id";
        $ds=mysqli_query($connect,$sql);
        while ($pt=  mysqli_fetch_array($ds))
        {
            $hinhanh=$pt['hinhanh'];
            $thongtin=$pt['thongtin'];
            $chietkhau=$pt['chietkhau'];
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


      <form name="form1" action="xulysuakhuyenmai.php" method="post" enctype="multipart/form-data">
          <table border="1" cellpadding="5">
              <caption>Thông tin khuyến mại cần sửa</caption>
              <tr>
                  <td></td>
                  <td><input type="hidden" name="id"  value="<?php echo $id;?>"</td>
              </tr>
              <tr>
                  <td>Thông tin khuyến mãi</td>
                  <Td><textarea name="txtthongtin" value="" rows="4" cols="25"><?php echo $thongtin; ?> </textarea> </Td>
              </tr>
              <tr>
                  <td>Hình ảnh</td>
                  <td><img src="../upload/<?php echo $hinhanh; ?>" width="80px" height="80px"/><input type="file" name="txtanh"/></td>
              </tr>
              <tr>
                  <td>Chiết khấu %</td>
                  <td><input type="text" name="txtchietkhau" value="<?php echo $chietkhau ?>"</td>
              </tr>
               <tr>
                  <td></td>
                  <Td><input type="submit" name="btnedit" value="Sửa khuyến mãi"/></Td>
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
