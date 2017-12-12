<?php
    ob_start();
    include 'connect.php';
    if(isset ($_REQUEST['cid']))
        {
            $cid=$_REQUEST['cid'];
            if($cid=="-1")
                {
                $sql="select tenhoa,idhoa,hoa.hinhanh as hinhanh1,chietkhau,dongia
                    from hoa join khuyenmai on hoa.idkhuyenmai=khuyenmai.idkhuyenmai where khuyenmai.trangthai = 1";
                }
                else {
                $sql="select tenhoa,idhoa,hoa.hinhanh as hinhanh1,chietkhau,dongia
                    from hoa join khuyenmai on hoa.idkhuyenmai=khuyenmai.idkhuyenmai where idDM=$cid and khuyenmai.trangthai = 1";
                }
            $ds=mysqli_query($connect,$sql);
            $tongso= mysqli_num_rows($ds);
            $spt=7;
            $sotrang=  ceil($tongso/$spt);
            if($sotrang>1){
            for($i=1;$i<=$sotrang;$i++)
            {
            ?>
             <a href="index.php?page=danhmuc&cid=<?php echo $cid ?>&trang=<?php  echo $i ?>">Trang<?php  echo $i ?></a>
             <?php
            }
             }
            if(isset($_REQUEST['trang']))
            {
            $trang=$_REQUEST['trang'];
            $batdau=($trang-1)*$spt;
            }
            else
            {
             $batdau=0;
            }
            $sql1=$sql." limit $batdau,$spt";
            $ds1=  mysqli_query($connect,$sql1);
              ?>

<html>
    <head>
        <title>Danh mục sản phẩm</title>
        <script type="text/javascript" src="js/zoom.js"></script>
        <script type="text/javascript" src="js/boxOver.js"></script>
    </head>
            <div class="center_title_bar">Sản phẩm</div>
            <?php
            while ($pt=mysqli_fetch_array($ds1))
                {
                  ?>  <div class="prod_box">
        	<div class="top_prod_box"></div>
            <div class="center_prod_box">
                 <div class="product_title"><a href="index.php?page=chitiethoa&id=<?php echo $pt['idhoa']; ?>"><?php echo $pt['tenhoa']?></a></div>
                 <div class="product_img"><a href="javascript:popImage('upload/<?php echo $pt['hinhanh1'];  ?>','<?php echo $pt['tenhoa'] ?>')"  title="header=[Zoom] body=[&nbsp;] fade=[on]"><img src="upload/<?php echo $pt['hinhanh1'];  ?>" width="150px" height="150px" alt="" title="" border="0" /></a></div>
                 <div class="prod_price"><span class="reduce"><?php echo number_format($pt['dongia'],0,'','.');?>VNĐ</span> <span class="price"><?php echo number_format(($pt['dongia']*(100-$pt['chietkhau']))/100,0,'','.'); ?>VNĐ</span></div>
            </div>
            <div class="bottom_prod_box"></div>
            <div class="prod_details_tab">
                <a href="index.php?page=chovaogio&id=<?php echo $pt['idhoa'] ?>" title="header=[Cho vào giỏ] body=[&nbsp;] fade=[on]"><img src="images/cart.gif" alt="" title="" border="0" class="left_bt" /></a>

            <a href="index.php?page=chitiethoa&id=<?php echo $pt['idhoa'];?>" class="prod_details">Chi tiết</a>
            </div>
        </div>
</html>
            <?php
                }
        }

?>
