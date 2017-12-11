<?php
ob_start();
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dăng nhập</title>
<script type="text/javascript" src="js/jquerymoi.js"></script>
<script type="text/javascript" src="js/jquery.validate.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
    $('#form').validate();
});
</script>
<style type="text/css">
td
{
color:#FFFFFF;
}
#login
{
    margin: 5px;
    color: white;
}
.form
{
    width: 400px;
    border-radius:5px;
    background-color: black;
}

</style>
</head>

<body>
<center>
    <div id="login">
        <?php
        if(isset($_POST['dangnhap']))
        {
            if($_POST['txtname']=="" || $_POST['txtpass']=="")
            {
                echo '<h2 align="center" style="color:#ffffff;">Mời đăng nhập</h2>  <br/>';
            }
       else
            {
              $txtname=$_POST['txtname'];
              $txtpass=$_POST['txtpass'];
              $sql="select * from khachhang where user='$txtname' and pass='$txtpass' limit 1";
              $ds=mysql_query($sql);
              while ($pt = mysql_fetch_array($ds)) {
                  $idKH=$pt['idKH'];

              }
              
              
              if(mysql_num_rows($ds)>0)
              {
                 $_SESSION['user_id']=$idKH;
                 $_SESSION['user']=$txtname;
                 header("location:index.php");
              }
              echo $idKH;
              
            }
        }
 else
      {
        echo' <h2 align="center" style="color:#ffffff;">Vui lòng đăng nhập vào hệ thống</h2>  <br/>';
      }
        ?>




<form id="form" name="form1" method="post" action="">
    <table width="400" border="0" bgcolor="white">
    <tr>
      <td width="108" height="44">Tài khoản : </td>
      <td width="217"><label>
              <input name="txtname" type="text" id="txtname" class="required" />
      </label></td>
    </tr>
    <tr>
      <td height="47">Mật khẩu : </td>
      <td><label>
        <input name="txtpass" type="password" id="txtpass" class="required" />
      </label></td>
    </tr>
    <tr>
      <td height="41">&nbsp;</td>
      <td><label>
        <input name="dangnhap" type="submit" id="submit" value="Đăng nhập" />
      </label></td
    ></tr>
  </table>
    <b><a href="index.php?page=matmatkhau">->>Mất mật khẩu<<-</a></b>
<br/>

    <b><a href="index.php?page=dangky">Đăng ký</a></b>

</form>
    </div>
</center>
</body>
</html>

<?php
?>
