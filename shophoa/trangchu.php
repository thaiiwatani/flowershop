<?php
    ob_start();
    include 'connect.php';
?>
<div class="center_title_bar">Sản phẩm mới</div>
        <?php
        $sql="select * from hoa order by idhoa desc limit 6";
//        $ds=mysqli_query($sql);
        $ds=mysqli_query($connect,$sql);
        while ($pt=mysqli_fetch_array($ds))
            {      
        ?>

    	<div class="prod_box">
        	<div class="top_prod_box"></div>
            <div class="center_prod_box">
                 <div class="product_title"><a href="index.php?page=chitiethoa&id=<?php echo $pt['idhoa'];?>"><?php echo $pt['tenhoa'] ?></a></div>
                 <div class="product_img"><a href="index.php?page=chitiethoa&id=<?php echo $pt['idhoa'];?>"><img src="../admin/pic/<?php echo $pt['hinhanh'] ?>" width="150px" height="150 px" alt="" title="" border="0" /></a></div>
                 <div class="prod_price"><span class="reduce"></span> <span class="price"><?php echo $pt['dongia'] ?>vnd</span></div>
            </div>
            <div class="bottom_prod_box"></div>
            <div class="prod_details_tab">
            <a href="#" title="header=[Cho vào giỏ] body=[&nbsp;] fade=[on]"><img src="images/cart.gif" alt="" title="" border="0" class="left_bt" /></a>

            <a href="index.php?page=chitiethoa&id=<?php echo $pt['idhoa'];?>" class="prod_details">Chi tiết</a>
            </div>
        </div>
    <?php
            }
?>




 <div class="center_title_bar">Sản phẩm bán chạy</div>


      	<div class="prod_box">
        	<div class="top_prod_box"></div>
            <div class="center_prod_box">
                 <div class="product_title"><a href="details.html">Hoa Cưới</a></div>
                 <div class="product_img"><a href="details.html"><img src="images/anhhoa.png" alt="" title="" border="0" /></a></div>
                 <div class="prod_price"><span class="reduce">0vnd</span> <span class="price">0vnd</span></div>
            </div>
            <div class="bottom_prod_box"></div>
            <div class="prod_details_tab">
            <a href="#" title="header=[Cho vào giỏ] body=[&nbsp;] fade=[on]"><img src="images/cart.gif" alt="" title="" border="0" class="left_bt" /></a>

            <a href="details.html" class="prod_details">Chi tiết</a>
            </div>
        </div>



     	<div class="prod_box">
        	<div class="top_prod_box"></div>
            <div class="center_prod_box">
                 <div class="product_title"><a href="details.html">Hoa Cưới</a></div>
                 <div class="product_img"><a href="details.html"><img src="images/anhhoa.png" alt="" title="" border="0" /></a></div>
                 <div class="prod_price"><span class="reduce">0vnd</span> <span class="price">0vnd</span></div>
            </div>
            <div class="bottom_prod_box"></div>
            <div class="prod_details_tab">
            <a href="#" title="header=[Cho vào giỏ] body=[&nbsp;] fade=[on]"><img src="images/cart.gif" alt="" title="" border="0" class="left_bt" /></a>

            <a href="details.html" class="prod_details">Chi tiết</a>
            </div>
        </div>

     	<div class="prod_box">
        	<div class="top_prod_box"></div>
            <div class="center_prod_box">
                 <div class="product_title"><a href="details.html">Hoa Cưới</a></div>
                 <div class="product_img"><a href="details.html"><img src="images/anhhoa.png" alt="" title="" border="0" /></a></div>
                 <div class="prod_price"><span class="reduce">0vnd</span> <span class="price">0vnd</span></div>
            </div>
            <div class="bottom_prod_box"></div>
            <div class="prod_details_tab">
            <a href="#" title="header=[Cho vào giỏ] body=[&nbsp;] fade=[on]"><img src="images/cart.gif" alt="" title="" border="0" class="left_bt" /></a>

            <a href="details.html" class="prod_details">Chi tiết</a>
            </div>
        </div>





