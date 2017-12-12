<?php
ob_start();
include 'connect.php';
include 'checklogin.php';
if(isset ($_REQUEST['page']))
{
    if(isset ($_REQUEST['id']))
    {
        $id=$_REQUEST['id'];
        $sql="select * from hoa where idhoa=$id";
        $ds=mysqli_query($connect,$sql);
        while ($pt=  mysqli_fetch_array($ds))
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
    <title>Sửa sản phẩm</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script type="text/javascript" src="js/ckeditor.js"></script>
  </head>
  <body>


      <form name="form1" action="xulysuasanpham.php" method="post" enctype="multipart/form-data">
          <table border="1" cellpadding="5" width="650">
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
                            $ds2=  mysqli_query($connect,$sql2);
                            while ($pt2= mysqli_fetch_array($ds2))
                                {
                                ?>
                            <option value="<?Php echo $pt2['idDM']?>"><?php echo $pt2['tenDM']?></option>
                            <?php
                                }
                        ?>
                        <?php
                         $sql1="select * from danhmuchoa where idDM !=.$cid";
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
                  <td>Tên sản phẩm hoa</td>
                  <Td><input type="text" name="txtname" value="<?php echo $name ?>"/></Td>
              </tr>
              <tr>
                  <td>Đơn giá</td>
                  <td><input type="text" name="txtdongia" value="<?php echo $dongia; ?>"></td>
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
                  <td><textarea cols="70" id="editor1" name="txtchitiet" rows="10" class="ckeditor"><?php echo $chitiet; ?></textarea>
                  <script type="text/javascript">
				CKEDITOR.replace( 'editor1' );
                  </script>
                  </td>
              </tr>
              <tr>
                  <td>Hình ảnh</td>
                  <td><img src="../upload/<?php echo $hinhanh; ?>" width="80px" height="80px"/><input type="file" name="txtanh"/></td>
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
