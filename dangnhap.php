<?php
ob_start();
include 'connect.php';
if(isset ($_SESSION['user']))
    {
    header("location:index.php");
    }
else
    {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Đăng nhập</title>

</head>

<body>
<center>
    <div id="login">
        <?php
		$er ="";
        if(isset($_POST['dangnhap']))
        {
            if($_POST['user']=="" || $_POST['pass']=="")
            {
               $er = '<h1 align="center" style="color:#000;">Mời đăng nhập lại *</h1>  <br/>';
            }
       else
            {
              $user=$_POST['user'];
              $pass=md5($_POST['pass']);
              $sql="select * from khachhang where user='$user' and pass='$pass'";
              $ds=mysql_query($sql);
              while ($pt = mysql_fetch_array($ds)) {
                  $idKH=$pt['idKH'];

              }
              if(mysql_num_rows($ds)>0)
              {	 $_SESSION['user']=$user;
                 $_SESSION['user_id']=$idKH;
                 if(isset($_SESSION['cart']))
                     {
                     header("location:index.php?page=giohang");
                     }
                     else  
                     {
                         header("location:index.php");
                     }
              }
            }
        }
 else
      {
        $er=' <h2 align="center" style="color:#000;">Vui lòng đăng nhập vào hệ thống</h2>  <br/>';
      }
        ?>
          


<div style="border:5px solid#ccc;border-radius:10px; width:570px; height:500px; background-color:#FFFFFF">
<?php echo $er; ?>
<form id="form" name="form1" method="post" action="">
  <table width="400" border="0">
    <tr>
      <td width="108" height="44">Tài khoản : </td>
      <td width="217"><label>
              <input name="user" type="text" id="user" />
      </label></td>
    </tr>
    <tr>
      <td height="47">Mật khẩu : </td>
      <td><label>
        <input name="pass" type="password" id="pass"/>
      </label></td>
    </tr>
    <tr>
      <td height="41">&nbsp;</td>
      <td><label>
        <input name="dangnhap" type="submit" id="submit" value="Đăng nhập" />
      </label></td
    ></tr>
  </table>           
    <b>click để <a href="index.php?page=dangky">Đăng ký</a></b>
    
</form>
</div>
    </div>
</center>
</body>
</html>

<?php
    }
?>
