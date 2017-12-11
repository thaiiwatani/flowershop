
<?php
    ob_start();
    include 'connect.php';
    if(isset ($_REQUEST['cid']))
        {
            $cid=$_REQUEST['cid'];
            $sql="select * from hoa where idDM=$cid";
//            $ds=mysql_query($sql);
            $ds=mysqli_query($connect,$sql);
            ?>
            <div class="center_title_bar">Sản phẩm mới</div>
            <?php
            while ($pt=mysqli_fetch_array($ds))
                {
                  ?>  <div class="prod_box">
        	<div class="top_prod_box"></div>
            <div class="center_prod_box">
                 <div class="product_title"><a href="index.php?page=chitiet&id=<?php echo $pt['idhoa']; ?>">Hoa Cưới</a></div>
                 <div class="product_img"><a href="index.php?page=chitiet&id=<?php echo $pt['idhoa']; ?>"><img src="images/anhhoa.png" alt="" title="" border="0" /></a></div>
                 <div class="prod_price"><span class="reduce"><?php echo $pt['dongia'];?></span> <span class="price"><?php echo $pt['dongia'];?>vnd</span></div>
            </div>
            <div class="bottom_prod_box"></div>
            <div class="prod_details_tab">
            <a href="#" title="header=[Cho vào giỏ] body=[&nbsp;] fade=[on]"><img src="images/cart.gif" alt="" title="" border="0" class="left_bt" /></a>

            <a href="details.html" class="prod_details">Chi tiết</a>
            </div>
        </div>
            <?php
                }
        }

?>
