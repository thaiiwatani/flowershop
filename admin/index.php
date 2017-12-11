<?php
ob_start();
include 'checklogin.php';
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Flower Shop</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<body>
<div id="swapper">

	<div class="header">
		<div class="banner"></div>
        <div class="wellcome">
            <ul>
                <li>Xin chào:<b><?php echo $_SESSION['username']?></b> </li>

                <li><a href="#">Đổi mật khẩu</a></li>
                <li><a href="logout.php">Thoát</a></li>
            </ul>
        </div>
	</div>
	<div id="container">
	<!--The nav_menu-->
	<div id="nav_menu">
	<div id="nav_ad">
		<div id="quanly"><span id="menu_quanly">Menu Quản Lý</span> </div>
		<div id="sidebar_ad">
			<ul>
				<li><a href="index.php?page=danhmuc">Quản lý danh mục</a>	
			  	</li> 
				<li><a href="index.php?page=sanpham&cid=-1">Quản lý sản phẩm</a>
                                </li>
				<li><a href="index.php?page=hoadon">Quản lý hoá đơn </a>
                                </li>
				<li><a href="index.php?page=tintuc">Quản lý tin tức</a>
                                </li>
				<li><a href="index.php?page=khuyenmai">Quản lý khuyến mãi</a>	
                </li>
                <li><a href="index.php?page=thongke">Thống kê</a>
                </li>
			</ul>
		</div>
	</div>
	</div>
	<!--End div nav_menu-->
	<div class="noidung">
           <?php
    			if(isset($_REQUEST['page']))
    			{
        		switch ($_REQUEST['page'])
        		{
            	case 'danhmuc':
                	include 'danhmuc.php';
                	break;
            	case 'sanpham':
			include 'sanpham.php';
			break;
		case 'hoadon':
			include 'hoadon.php';
			break;
		case 'tintuc':
			include 'tintuc.php';
			break;
		case 'khuyenmai':
			include 'khuyenmai.php';
			break;
		case 'thongke':
			include 'thongke.php';
			break;
                case 'themdanhmuc':
                    include 'themdanhmuc.php';
                    break;
                case 'suadanhmuc':
                    include 'suadanhmuc.php';
                    break;
                case 'xoadanhmuc':
                    include 'xoadanhmuc.php';
                    break;
                case 'themsanpham':
                    include 'themsanpham.php';
                    break;
                case 'suasanpham':
                    include 'suasanpham.php';
                    break;
                case 'xoasanpham':
                    include 'xoasanpham.php';
                    break;
		default:
			break;
        }
    }
    else
        {
        include 'danhmuc.php';
        }
    ?>


	</div>
	</div>
	<!--end div container-->
	<div id="footer">
            <br />            	
                <p>Flower Shop</p>
				<p>Hotline:01663036555</p>
				<!--<p>Email:forever.exe@gmail.com</p>-->
                                <p>Email:thaidd.fpt@gmail.com</p>
				
	</div>
</div>
</body>
</html>
