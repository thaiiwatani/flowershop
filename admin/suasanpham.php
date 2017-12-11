<?php
ob_start();
include 'connect.php';
if(isset ($_REQUEST['page']))
{
    if(isset ($_REQUEST['id']))
    {
        $id=$_REQUEST['id'];
        $sql="select * from hoa where idhoa=$id";
        $ds=mysql_query($sql);
        while ($pt=  mysql_fetch_array($ds))
        {
            $name=$pt['tenhoa'];
            $dongia=$pt['dongia'];
            $tt=$pt['trangthai'];
            $chitiet=$pt['chitiet'];
            $hinhanh=$pt['hinhanh'];
            $cid=$pt['idDM'];

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


      <form name="form1" action="xulysuasanpham.php" method="post">
          <table border="1" cellpadding="5">
              <caption>Thông tin sản phẩm cần sửa</caption>
              <tr>
                  <td></td>
                  <td><input type="hidden" name="id"  value="<?php echo $id;?>"</td>
              </tr>
              <tr>
                    <td>Chọn danh mục</td>
                    <td>
                        <select name="chondm">
                        <?php
                            $sql2="select * from danhmuchoa where idDM=.$cid";
                            $ds2=  mysql_query($sql2);
                            while ($pt2= mysql_fetch_array($ds2))
                                {
                                ?>
                            <option value="<?Php echo $pt2['idDM']?>"><?php echo $pt2['tenDM']?></option>
                            <?php
                                }
                        ?>
                        <?php
                         $sql1="select * from danhmuchoa where idDM !=.$cid";
                          $ds1=  mysql_query($sql1);
                        while ($pt= mysql_fetch_array($ds1))
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
                  <td>Tên sản phẩm hoa</td>
                  <Td><input type="text" name="txtname" value="<?php echo $name ?>"/></Td>
              </tr>
              <tr>
                  <td>Đơn giá</td>
                  <td><input type="text" name="txtdongia" value="<?php echo $dongia?>"</td>
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
                  <td>Chi tiết</td>
                  <Td><textarea name="txtchitiet" value="" rows="6" cols="25"><?php echo $chitiet; ?> </textarea> </Td>
              </tr>
              <tr>
                  <td>Hình ảnh</td>
                  <td><img src="pic/<?php echo $hinhanh; ?>" width="80px" height="80px"/><input type="file" name="txtanh"/></td>
              </tr>

               <tr>
                  <td></td>
                  <Td><input type="submit" name="btnedit" value="Sửa sản phẩm"/></Td>
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
