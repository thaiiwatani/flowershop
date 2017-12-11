
<?php
    ob_start();
    include 'connect.php';
    if(isset ($_REQUEST['cid']))
        {
            $cid=$_REQUEST['cid'];
            if($cid=="-1")
                {
                $sql="select tenhoa,idhoa,hoa.hinhanh as hinhanh1,chietkhau,dongia
                    from hoa join khuyenmai on hoa.idkhuyenmai=khuyenmai.idkhuyenmai where `trangthai` = 1";
                }
                else {
                                $sql="select tenhoa,idhoa,hoa.hinhanh as hinhanh1,chietkhau,dongia
                    from hoa join khuyenmai on hoa.idkhuyenmai=khuyenmai.idkhuyenmai where idDM=$cid and `trangthai` = 1";
                }
            $ds=mysql_query($sql);
            ?>
            <div class="center_title_bar">Sản phẩm</div>
            <?php
            while ($pt=mysql_fetch_array($ds))
                {
                  ?>  <div class="prod_box">
        	<div class="top_prod_box"></div>
            <div class="center_prod_box">
                 <div class="product_title"><a href="index.php?page=chitiethoa&id=<?php echo $pt['idhoa']; ?>"><?php echo $pt['tenhoa']?></a></div>
                 <div class="product_img"><a href="index.php?page=chitiethoa&id=<?php echo $pt['idhoa']; ?>"><img src="upload/<?php echo $pt['hinhanh1'] ?>"width="150px" height="150 px" alt="" title="" border="0" /></a></div>
                 <div class="prod_price"><span class="reduce"><?php echo $pt['dongia'];?>VNĐ</span> <span class="price"><?php echo ($pt['dongia']*(100-$pt['chietkhau']))/100; ?>VNĐ</span></div>
            </div>
            <div class="bottom_prod_box"></div>
            <div class="prod_details_tab">
                <a href="index.php?page=chovaogio&id=<?php echo $pt['idhoa'] ?>" title="header=[Cho vào giỏ] body=[&nbsp;] fade=[on]"><img src="images/cart.gif" alt="" title="" border="0" class="left_bt" /></a>

            <a href="index.php?page=chitiethoa&id=<?php echo $pt['idhoa'];?>" class="prod_details">Chi tiết</a>
            </div>
        </div>
            <?php
                }
        }

?>
