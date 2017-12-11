<?php
ob_start();
include"connect.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
.style1
{
color:#FF0000;
}
</style>
<script type="text/javascript" src="js/script_validate.js" language="javascript" ></script>
</head>
<body>
    <div id="dangky">
<?php

if(isset($_POST['dangky']))
    {
	 $er="";
       if($_POST['user']=="" || $_POST['pass']=="" || $_POST['tenKH']=="" || $_POST['email']=="" || $_POST['diachi']=="" || $_POST['dienthoai']=="" || $_POST['ngaysinh']=="")
        {
        $er =' <h1 align="center">Vui lòng đăng ký vào hệ thống</h1>  <br/>';
        }
       else
        {


        $user=$_POST['user'];
        $pass=md5($_POST['pass']);
		$tenKH=$_POST['tenKH'];       
        $diachi=$_POST['diachi'];
        $dienthoai=$_POST['dienthoai'];
		$email=$_POST['email'];
        $ngaysinh=$_POST['ngaysinh'];
		
        $sql="insert into khachhang(user,pass,tenKH,diachi,dienthoai,email,ngaysinh) values('$user','$pass','$tenKH','$diachi','$dienthoai','$email','$ngaysinh')";
		
		
        mysql_query($sql);
        if(mysql_affected_rows()>0)
           {
            header("location:index.php?page=dangnhap");
           }

      else {
                $er = "<h1 align='center'>Kiêm tra lại thông tin đăng ký</h1>  <br/>";
           }
           

        }
         
  }
  else
        {
         $er =' <h1 align="center">Mời đăng ký thông tin đầy đủ vào hệ thống</h1>  <br/>';
        }
?>
<center>
<div style="border:5px solid#ccc;border-radius:10px; width:570px; height:500px; background-color:#FFFFFF">
 <?php echo $er;?>
    <form class="form" id="form1" name="form1" method="post" action="">
    <table width="524" border="0">
        <tr>
        <td height="30">Tên đăng nhập<span class="style1">(*)</span> </td>
        <td><label>
          <input name="user" type="text" id="user" />
        </label></td>
		<td width="189"><span id="error_user" class="style1" ></span></td>
      </tr>
      <tr>
        <td height="30">Mật khẩu<span class="style1">(*)</span> </td>
        <td><label>
          <input name="pass" type="password" id="pass" />
        </label></td>
		<td><span id="error_pass" class="style1" ></span></td>
      </tr>
      <tr>
        <td height="30">nhập lại mật khẩu<span class="style1">(*)</span> </td>
        <td><label>
        <input name="re_pass" type="password" id="re_pass" />
        </label></td>
		<td><span id="error_re_pass" class="style1" ></span></td>
      </tr>
	  <tr>
        <td width="144" height="30">Họ và tên<span class="style1">(*)</span> </td>
        <td width="177"><label>
          <input name="tenKH" type="text" id="tenKH" />
        </label></td>
		<td><span id="error_tenKH" class="red" ></span></td>
      </tr>
	  <tr>
        <td height="96">Địa chỉ<span class="style1">(*)</span>  </td>
        <td><label>
          <textarea name="diachi" cols="25" rows="5" id="diachi"></textarea>
        </label></td>
		<td><span id="error_diachi" class="style1" ></span></td>
      </tr>
	  <tr>
          <td height="30">Số điện thoại<span class="style1">(*)</span> </td>
       <td><input type="text" name="dienthoai" id="dienthoai"/></td>      
	  <td><span id="error_dienthoai" class="style1" ></span></td>
      </tr>
      <tr>
          <td height="30">Email<span class="style1">(*)</span> </td>
        <td><label>
          <input name="email" type="text" id="email" />
        </label></td>
		<td><span id="error_email" class="style1" ></span></td>
      </tr>      
	    <tr>
          <td height="30">Ngày sinh<span class="style1">(*)</span> </td>
        <td><label>
          <input name="ngaysinh" type="text" id="ngaysinh" />
        </label></td>
		<td><span id="error_ngaysinh" class="style1" ></span></td>
      </tr>
      <tr>
        <td><label></label></td>
        <td><input type="submit" name="dangky" value="Đăng ký"  onclick="return mod_register()"/></td>
      </tr>
    </table>
  </form>
</div>
</center>

    </div>
</body>
</html>
