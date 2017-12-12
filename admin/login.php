<?php 
	ob_start();
	session_start();
	include 'connect.php';
	if(isset($_POST['btnlogin']))
	{
		if($_POST['txtuser']!='' && $_POST['txtpass']!='')
		{
			$user=$_POST['txtuser'];
                        $pass=$_POST['txtpass'];
			$sql="select * from admin where user='$user' and pass='$pass'";
			$ds=mysqli_query($connect,$sql);
			if(mysqli_num_rows($ds)>0)
			{
				$_SESSION['admin']=1;
			   	$_SESSION['username']=$user;
			   	header('location:index.php');
			}
			else
       		{
           		echo "Ten dang nhap hoac mat khau khong ton tai";
       		}
			
		}
		else
		{
			 
		}
	}
	
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login Admin Flower Shop</title>

<link href="css/login-box.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
function checkLogin()
{
	if(document.getElementById('name').value=='')
	{
		alert("Vui long nhap ten dang nhap");
		return false;
	}

	if(document.getElementById('pass').value=='')
	{
		alert("Vui long nhap mat khau");
		return false;
	}
	
	return true;
}
</script>

</head>

<body>

<div id="login_box_all" >

    <div id="login-box">
    
    	<H2>Đăng nhập </H2>
    	(Dành cho Administrator)
    <br />
    <br />
    <form id="form1" name="form1" method="post" action="" onsubmit="return checkLogin();">
    	<div id="login-box-name-top">Tài Khoản:</div>
        	<div id="login-box-field" style="margin-top:20px;">
            <input name="txtuser" type="text" id="name" class="form-login" title="Username" value="" size="30" maxlength="2048" /></div>
    	<div id="login-box-name">Mật Khẩu</div>
       		<div id="login-box-field"><input name="txtpass" type="password" id="pass" class="form-login" title="Password" value="" size="30" maxlength="2048" /></div>
    				<br />
    <span class="login-box-options">
        	<input type="checkbox" name="chkRemember" value=""> Ghi nhớ <a href="#" style="margin-left:30px;">Quên mật khẩu</a></span>
                	<br />
                	<br />
        	<input name="btnlogin" type="submit"  value="" id="submit_img"/>
    </form>
    </div>

</div>


</body>
</html>
