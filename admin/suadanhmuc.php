<?php
ob_start();
include 'connect.php';
include 'checklogin.php';
if(isset ($_REQUEST['page']))
{
    if(isset ($_REQUEST['cid']))
    {
        $cid=$_REQUEST['cid'];
        $sql="select * from danhmuchoa where idDM=$cid";
        $ds=mysqli_query($connect,$sql);
        while ($pt=  mysqli_fetch_array($ds))
        {
            $name=$pt['tenDM'];
            $stt=$pt['stt'];
            $tt=$pt['trangthai'];
            $ghichu=$pt['ghichu'];
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


      <form name="form1" action="xulysua.php" method="post">
          <table border="1" cellpadding="5">
              <caption>Thông tin danh mục cần sửa</caption>
              <tr>
                  <td></td>
                  <td><input type="hidden" name="cid"  value="<?php echo $cid;?>"</td>
              </tr>
              <tr>
                  <td>Tên danh mục hoa</td>
                  <Td><input type="text" name="txtname" value="<?php echo $name ?>"/></Td>
              </tr>
               <tr>
                  <td>Thứ tự</td>
                  <Td><input type="text" name="txtstt" value="<?php echo $stt ?>"/></Td>
              </tr>
               <tr>
                  <td>Trạng thái</td>
                  <Td>
                      <?php
                      if($tt==1)
                      {
                          ?>
                      <input type="checkbox" name="cbtt" checked="yes"/>
                      <?php
                      }
                      else
                      {
                          ?>
                      <input type="checkbox" name="cbtt"/>
                      <?php
                      }
                      ?>
                  </Td>
              </tr>
              <tr>
                  <td>Ghi chú</td>
                  <Td><textarea name="txtghichu" value="" rows="10" cols="20"><?php echo $ghichu; ?> </textarea> </Td>
              </tr>
               <tr>
                  <td></td>
                  <Td><input type="submit" name="btnedit" value="Sửa danh mục"/></Td>
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
