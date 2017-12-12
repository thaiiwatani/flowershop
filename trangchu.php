<?php
    ob_start();
    include 'connect.php';
?>
<div class="center_title_bar">Sản phẩm mới</div>
        <?php
        $sql = "SELECT hoa.hinhanh as hinhanh1,dongia,chietkhau,tenhoa,chitiet,idhoa FROM hoa join khuyenmai on hoa.idkhuyenmai=khuyenmai.idkhuyenmai where khuyenmai.trangthai = 1 order by idhoa desc limit 6 ";
//        $sql="select * from hoa order by idhoa desc limit 6";
        $ds=mysqli_query($connect,$sql);
        while($pt= mysqli_fetch_array($ds))
            {      
        ?>

    	<div class="prod_box">
        	<div class="top_prod_box"></div>
            <div class="center_prod_box">
                 <div class="product_title"><a href="index.php?page=chitiethoa&id=<?php echo $pt['idhoa'];?>"><?php echo $pt['tenhoa'] ?></a></div>
                 <div class="product_img"><a href="index.php?page=chitiethoa&id=<?php echo $pt['idhoa'];?>"><img src="upload/<?php echo $pt['hinhanh1'] ?>" width="150px" height="150 px" alt="" title="" border="0" /></a></div>
                  <div class="prod_price"><span class="reduce"><?php echo number_format($pt['dongia'],0,'','.');?>VNĐ</span> <span class="price"><?php echo number_format(($pt['dongia']*(100-$pt['chietkhau']))/100,0,'','.'); ?>VNĐ</span></div>
            </div>
            <div class="bottom_prod_box"></div>
            <div class="prod_details_tab">
            <a href="index.php?page=chovaogio&id=<?php echo $pt['idhoa'] ?>" title="header=[Cho vào giỏ] body=[&nbsp;] fade=[on]"><img src="images/cart.gif" alt="" title="" border="0" class="left_bt" /></a>

            <a href="index.php?page=chitiethoa&id=<?php echo $pt['idhoa'];?>" class="prod_details">Chi tiết</a>
            </div>
        </div>
    <?php
            }
?>




 <div class="center_title_bar">Sản phẩm bán chạy</div>
 <?php
 $sql1="select hoa.dongia as giagoc, hoa.hinhanh as hinhanh2, hoa.idhoa,tenhoa,sum(soluong) as tong, trangthai,chietkhau
        from hoa join hoadonchitiet on hoa.idhoa=hoadonchitiet.idhoa join khuyenmai on khuyenmai.idkhuyenmai=hoa.idkhuyenmai
        where khuyenmai.trangthai = 1
        group by hoa.idhoa order by tong desc limit 3";
 $ds1=mysqli_query($connect,$sql1);
 while ($pt1 =mysqli_fetch_array($ds1)) {
     ?>
 <div class="prod_box">
        	<div class="top_prod_box"></div>
            <div class="center_prod_box">
                 <div class="product_title"><a href="index.php?page=chitiethoa&id=<?php echo $pt1['idhoa'];?>"><?php echo $pt1['tenhoa'] ?></a></div>
                 <div class="product_img"><a href="index.php?page=chitiethoa&id=<?php echo $pt1['idhoa'];?>"><img src="upload/<?php echo $pt1['hinhanh2'] ?>" width="150px" height="150 px" alt="" title="" border="0" /></a></div>
                  <div class="prod_price"><span class="reduce"><?php echo number_format($pt1['giagoc'],0,'','.');?>VNĐ</span> <span class="price"><?php echo number_format(($pt1['giagoc']*(100-$pt1['chietkhau']))/100,0,'','.'); ?>VNĐ</span></div>
            </div>
            <div class="bottom_prod_box"></div>
            <div class="prod_details_tab">
            <a href="index.php?page=chovaogio&id=<?php echo $pt1['idhoa'] ?>" title="header=[Cho vào giỏ] body=[&nbsp;] fade=[on]"><img src="images/cart.gif" alt="" title="" border="0" class="left_bt" /></a>

            <a href="index.php?page=chitiethoa&id=<?php echo $pt1['idhoa'];?>" class="prod_details">Chi tiết</a>
            </div>
        </div>
 <?php
 }


 ?>


      	





