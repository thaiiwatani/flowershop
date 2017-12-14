<?php
ob_start();

include 'connect.php';
include 'checklogin.php';
if(isset ($_REQUEST['page']))
{
    if(isset ($_POST['btnadd']))
    {
        if($_POST['txtname']=='')
        {
            echo 'Nhập tên danh mục hoa';
        }
        else
        {
            $name=$_POST['txtname'];
            $stt=$_POST['txtstt'];
            $ghichu=$_POST['txtghichu'];
            if(isset ($_POST['cbtt']))
            {
                $tt=1;
            }
            else
            {
                $tt=0;
            }
            $sql="insert into danhmuchoa(tenDM,stt,trangthai,ghichu) values('$name',$stt,$tt,'$ghichu')";
            mysql_query($sql);
            if(mysql_affected_rows ()>0)
            {
                header('location:index.php?page=danhmuc');
            }
            else
            {
                echo "Kiểm tra dữ liệu nhập <br />";
              
            }
        }
    }


/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  </head>
  <body>
      
      
      <form name="form1" action="" method="post">
          <table border="1" cellpadding="5">
              <caption>Thông tin danh mục</caption>

              <tr>
                  <td>Tên danh mục hoa</td>
                  <Td><input type="text" name="txtname"/></Td>
              </tr>
               <tr>
                  <td>Thứ tự</td>
                  <Td><input type="text" name="txtstt"/></Td>
              </tr>
               <tr>
                  <td>Trạng thái</td>
                  <Td><input type="checkbox" name="cbtt"/></Td>
              </tr>
              <tr>
                  <td>Ghi chú</td>
                  <Td><textarea name="txtghichu" value="<?php echo $ghichu ?>" rows="10" cols="20"></textarea> </Td>
              </tr>
               <tr>
                  <td></td>
                  <Td><input type="submit" name="btnadd" value="Thêm mới"/></Td>
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
