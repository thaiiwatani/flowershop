<?php
ob_start();
include 'connect.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Flower Shop</title>
<link rel="stylesheet" type="text/css" href="css/layout_slideshow.css" />
<link rel="stylesheet" type="text/css" href="css/style_slideshow.css" />
<link rel="stylesheet" type="text/css" href="style1.css" />
<!--[if IE 6]>
<link rel="stylesheet" type="text/css" href="iecss.css" />
<![endif]-->
<script language="javascript" type="text/javascript" src="js/jquery.js"></script>
<script language="javascript" type="text/javascript" src="js/jquery.easing.js"></script>
<script language="javascript" type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/boxOver.js"></script>
<script type="text/javascript">
 $(document).ready( function(){
		// buttons for next and previous item
		var buttons = { previous:$('#jslidernews1 .button-previous') ,
						next:$('#jslidernews1 .button-next') };
		 $obj = $('#jslidernews1').lofJSidernews( { interval : 4000,
												buttons:buttons} );
	});
</script>
</head>
<body>

<div id="main_container">
	<div class="top_bar">
    	<div class="top_search">
        	<div class="search_text"><a href="#">Tìm kiếm</a></div>
            <input type="text" class="search_input" name="search" />
            <input type="image" src="images/search.gif" class="search_bt"/>
        </div>

      <!--div logo-->

    </div>


   <div id="main_content">

            <div id="menu_tab">
            <div class="left_menu_corner"></div>
                    <ul class="menu">
                         <li><a href="index.php?page=trangchu" class="nav1">  Trang chủ </a></li>
                         <li class="divider"></li>
                         <li><a href="index.php?page=danhmuc" class="nav2">Danh mục hoa</a></li>
                         <li class="divider"></li>
                         <li><a href="index.php?page=khuyenmai" class="nav3">Khuyến mãi</a></li>
                         <li class="divider"></li>
                         <li><a href="index.php?page=taikhoan" class="nav4">Tài khoản</a></li>
                         <li class="divider"></li>
                         <li><a href="index.php?page=dangnhap" class="nav4">Đăng nhập</a></li>
                         <li class="divider"></li>
                         <li><a href="index.php?page=huongdan" class="nav5">Hướng dẫn mua hàng </a></li>
                         <li class="divider"></li>
                         <li><a href="index.php?page=timhieu" class="nav6">Tìm hiểu hoa</a></li>
			 <li class="divider"></li>


                    </ul>

             <div class="right_menu_corner"></div>
            </div><!-- end of menu tab -->
<div id="container">
<!------------------------------------- THE CONTENT ------------------------------------------------->
<div id="jslidernews1" class="lof-slidecontent" style="width:980px; height:340px;">
	<div class="preload"><div></div></div>
    		 <div  class="button-previous">Previous</div>
              <div  class="button-next">Next</div>
    		 <!-- MAIN CONTENT -->
              <div class="main-slider-content" style="width:980px; height:340px;">
                <ul class="sliders-wrap-inner">
                    <li>
                        <a href="#"><img src="images2/bannehoatulip.png" title="Newsflash 1" ></a>

                    </li>
                   <li>
                      	<a href="#"><img src="images2/banner8-3_moi.png" title="Newsflash 2" >    </a>

                    </li>
                   <li>
                      <a href="#"><img src="images2/bannersocola8-3.png" title="Newsflash 3" >        </a>

                    </li>
                    <li>
                      <a href="#"><img src="images2/quatang.png" title="Newsflash 4" >            </a>

                    </li>
                    <li>
                     <a href="#"> <img src="images2/hoangay8-3_copy.png" title="Newsflash 5" >        </a>

                    </li>
                    <li>

                      <img src="images2/hoa_tinh_yeu2.png" title="Newsflash 6" >

                    </li>
                     <li>
                      <img src="images2/hoangay8-3_copy.png" title="Newsflash 7" >

                    </li>

                  </ul>
            </div>
 		   <!-- END MAIN CONTENT -->
           <!-- NAVIGATOR -->
           	<div class="navigator-content">
                  <div class="button-control"><span></span></div>
                  <div class="navigator-wrapper">
                        <ul class="navigator-wrap-inner">
                           <li><span>1</span></li>
                           <li><span>2</span></li>
                           <li><span>3</span></li>
                           <li><span>4</span></li>
                           <li><span>5</span></li>
                           <li><span>6</span></li>
                           <li><span>7</span></li>

                        </ul>
                  </div>

             </div>
          <!----------------- END OF NAVIGATOR --------------------->
 </div>


<!------------------------------------- END OF THE CONTENT ------------------------------------------------->


    </div>

   <div class="left_content">
    <div class="title_box">Danh Mục</div>

        <ul class="left_menu">
            <?php
                $sql="select * from danhmuchoa order by stt asc";
                $ds=mysqli_query($connect,$sql);
                while($pt=mysqli_fetch_array($ds))
                    {
                    ?>

		<li class="odd"><a href="index.php?page=danhmuc&cid=<?php echo  $pt['idDM']?>"><?php echo $pt['tenDM']?></a></li>
                <?php
                    }
                    ?>
       

        </ul>


     <div class="title_box">Sản phẩm đặc biệt</div>
     <div class="border_box">

        <?php
        $sql="select * from hoa order by idhoa desc limit 1";
        $ds=mysqli_query($connect,$sql);
        while ($pt=mysqli_fetch_array($ds))
            {
        ?>
         <div class="product_title"><a href="index.php?page=chitiethoa&id=<?php echo $pt['idhoa'];?>"><?php echo $pt['tenhoa'] ?></a></div>
         <div class="product_img"><a href="index.php?page=chitiethoa&id=<?php echo $pt['idhoa'];?>"><img src="../admin/pic/<?php echo $pt['hinhanh'] ?>" width="150px" height="150 px" alt="" title="" border="0" /></a></div>
         <div class="prod_price"><span class="reduce"></span> <span class="price"><?php echo $pt['dongia'];?>vnd</span></div>
         <?php
            }
         ?>
     </div>


     <!--<div class="title_box">Newsletter</div>
     <div class="border_box">
		<input type="text" name="newsletter" class="newsletter_input" value="your email"/>
        <a href="#" class="join">join</a>
     </div>
	 -->
	 <!--

     <div class="banner_adds">

     <a href="#"><img src="images/bann2.jpg" alt="" title="" border="0" /></a>
     </div>
	 -->


   </div><!-- end of left content -->


   <div class="center_content">
   	

    <?php
        if(isset($_REQUEST['page']))
    			{
        		switch ($_REQUEST['page'])
        		{
                            case 'danhmuc':
                                include 'danhmuc.php';
                                break;
                            case 'khuyenmai':
                                include 'khuyenmai.php';
                                break;
                            case 'taikhoan':
                                include 'taikhoan.php';
                                break;
                            case 'dangnhap':
                                include 'dangnhap.php';
                                break;
                            case 'huongdan':
                                include 'huongdan.php';
                                break;
                            case 'timhieu':
                                include 'timhieu.php';
                                break;
                            case 'chitiethoa':
                                include 'chitiethoa.php';
                                break;
                            default:
                                include 'trangchu.php';
                                break;
                     
                        }
                        }
                        else{

                            include 'trangchu.php';
                        }
                        

        
    ?>
   </div><!-- end of center content -->

   <div class="right_content">
   		<div class="shopping_cart">
        	<div class="cart_title">Giỏ hàng</div>

            <div class="cart_details">
            3 sản phẩm <br />
            <span class="border_cart"></span>
            Total: <span class="price">500000đ</span>
            </div>

            <div class="cart_icon"><a href="#" title="header=[Xóa giỏ] body=[&nbsp;] fade=[on]"><img src="images/shoppingcart.png" alt="" title="" width="48" height="48" border="0" /></a></div>

        </div>

   <!--
     <div class="title_box">Whatï¿½s new</div>
     <div class="border_box">
         <div class="product_title"><a href="details.html">Motorola 156 MX-VL</a></div>
         <div class="product_img"><a href="details.html"><img src="images/p2.gif" alt="" title="" border="0" /></a></div>
         <div class="prod_price"><span class="reduce">350$</span> <span class="price">270$</span></div>
     </div>
     -->



    <div class="title_box">Bạn cần tư vấn</div>
        <ul class="left_menu">
            <li class="hotro"><h2>01663036555</h2></li>
            <li class="hotro" >
        <a href=ymsgr:sendim?kjndboy mce_href=”ymsgr:sendim?kjndboy” border=”0″><img src=http://opi.yahoo.com/online?u=kjndboy&t=2 width="125" height="25" border="0" mce_src=”http://opi.yahoo.com/online?u=kjndboy&t=2″></a>
		</li>
        </ul>


     <div class="banner_adds">

     <a href="#"><img src="images/bann1.jpg" alt="" title="" border="0" /></a>
     </div>

   </div><!-- end of right content -->


   </div><!-- end of main content -->



   <div class="footer">

        <div class="center_footer">
        Shop Flower<br />
        <!--<a href="http://csscreme.com"><img src="images/csscreme.jpg" alt="csscreme" title="csscreme" border="0" /></a><br />
        <img src="images/payment.gif" alt="" title="" />
		-->
        </div>

        <div class="right_footer">
        <a href="index.html">Trang chủ</a>
        <a href="details.html">Danh mục hoa</a>
        <a href="details.html">Khuyến mãi</a>
        <a href="details.html">Hướng dẫn mua</a>
        <a href="contact.html">Thông tin</a>
        </div>

   </div>


</div>
<!-- end of main_container -->
</body>
</html>