<?php
ob_start();
include 'checklogin.php';
include 'connect.php';
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Flower Shop</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script type="text/javascript" src="js/zoom.js"></script>
<script type="text/javascript" src="js/boxOver.js"></script>
</head>

<body>
<div id="swapper">

	<div class="header">
		<div class="banner"></div>
        <div class="wellcome">
            <ul>
                <li>Xin chào:<b><?php echo $_SESSION['username']?></b> </li>

                <li><a href="index.php?page=doimatkhau">Đổi mật khẩu</a></li>
                <li><a href="index.php?page=dangxuat">Thoát</a></li>
            </ul>
        </div>
	</div>
	<div id="container">
	<!--The nav_menu-->
	<div id="nav_menu">
	<div id="nav_ad">
		<div id="quanly"><span id="menu_quanly">Menu Quản Lý</span> </div>
                <div id="sidebar">
                    <ul id="main-nav">
                        <li>
                            <a href="#" class="nav-top-item current-submenu"> <!-- Add the class "current" to current menu item -->
                            Quản lý danh mục
                            </a>
                            <ul>

                                <li><a  href="index.php?page=danhmuc">Danh mục</a></li> <!-- Add class "current" to sub menu items also -->
                                <li><a href="index.php?page=themdanhmuc">Thêm danh mục</a></li>

                            </ul>
			</li>
                        <li>
                            <a href="#" class="nav-top-item current-submenu"> <!-- Add the class "current" to current menu item -->
                            Quản lý sản phẩm
                            </a>
                            <ul>

                                <li><a  href="index.php?page=sanpham">Sản phẩm</a></li> <!-- Add class "current" to sub menu items also -->
                                <li><a href="index.php?page=themsanpham">Thêm sản phẩm mục</a></li>

                            </ul>
			</li>
                        <li>
                            <a href="#" class="nav-top-item current-submenu"> <!-- Add the class "current" to current menu item -->
                            Quản lý tin tức
                            </a>
                            <ul>

                                <li><a  href="index.php?page=tintuc">Tin tức</a></li> <!-- Add class "current" to sub menu items also -->
                                <li><a href="index.php?page=themtintuc">Thêm tin tức</a></li>

                            </ul>
			</li>
                        <li>
                            <a href="#" class="nav-top-item current-submenu"> <!-- Add the class "current" to current menu item -->
                            Quản lý khuyến mãi
                            </a>
                            <ul>

                                <li><a  href="index.php?page=khuyenmai">Khuyến mãi</a></li> <!-- Add class "current" to sub menu items also -->

                            </ul>
			</li>
                        <li>
                            <a href="#" class="nav-top-item current-submenu"> <!-- Add the class "current" to current menu item -->
                            Quản lý khách hàng
                            </a>
                            <ul>

                                <li><a  href="index.php?page=khachhang">Khách hàng</a></li> <!-- Add class "current" to sub menu items also -->

                            </ul>
			</li>
                        <li>
                            <a href="#" class="nav-top-item current-submenu"> <!-- Add the class "current" to current menu item -->
                            Quản lý hóa đơn
                            </a>
                            <ul>

                                <li><a  href="index.php?page=hoadon">Hóa đơn</a></li> <!-- Add class "current" to sub menu items also -->

                            </ul>
			</li>
                        <li>
                            <a href="#" class="nav-top-item current-submenu"> <!-- Add the class "current" to current menu item -->
                            Thống kê
                            </a>
                            <ul>

                                <li><a  href="index.php?page=danhmuc">Danh mục</a></li> <!-- Add class "current" to sub menu items also -->
                                <li><a href="index.php?page=themdanhmuc">Thêm danh mục</a></li>

                            </ul>
			</li>

                    </ul>
                </div>
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
                case 'dangxuat':
                        include 'dangxuat.php';
                        break;
                case 'doimatkhau':
                        include 'doimatkhau.php';
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
                case 'themtintuc':
                    include 'themtintuc.php';
                    break;
                case 'suatintuc':
                    include 'suatintuc.php';
                    break;
                case 'xoatintuc':
                    include 'xoatintuc.php';
                    break;
                case 'suakhuyenmai':
                    include 'suakhuyenmai.php';
                    break;
                case 'updatetrangthaikh':
                    include 'updatetrangthaikh.php';
                    break;
                case 'xoakhachhang':
                    include 'xoakhachhang.php';
                    break;
                case 'hoadonchitiet':
                    include 'hoadonchitiet.php';
                    break;
                case 'hoadonchitiet2':
                    include 'hoadonchitiet2.php';
                    break;
                case 'updatetrangthaihoadon':
                    include 'updatetrangthaihoadon.php';
                    break;
                case 'updatethanhtoanhoadon':
                    include 'updatethanhtoanhoadon.php';
                    break;
                case 'xoahoadon':
                    include 'xoahoadon.php';
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
	<div class="footer">

		<!--
        <div class="left_footer">
        <img src="images/footer_logo.png" alt="" title="" width="170" height="49"/>
        </div>
		-->

        <div class="center_footer">
        Flower Shop Hotline:01663036555
        <!--<a href="http://csscreme.com"><img src="images/csscreme.jpg" alt="csscreme" title="csscreme" border="0" /></a><br />
        <img src="images/payment.gif" alt="" title="" />
		-->
        </div>

        <div class="right_footer">
        <a href="index.php?page=danhmuc">Danh mục</a>
        <a href="index.php?page=sanpham&cid=-1">Sản phẩm</a>
        <a href="index.php?page=hoadon">Hóa đơn</a>
        <a href="index.php?page=tintuc">Tin tức</a>
        <a href="index.php?page=khuyenmai">Khuyến mãi</a>
        <a href="index.php?page=thongke">Thống kê</a>
        </div>

   </div>
</div>
</body>
</html>
