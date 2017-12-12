<?php
ob_start();

if (isset($_REQUEST['id']))
{
	$id = $_REQUEST['id'];


$sql = "SELECT hoa.hinhanh as hinhanh1,dongia,chietkhau,tenhoa,chitiet,idhoa
        FROM hoa join khuyenmai on hoa.idkhuyenmai=khuyenmai.idkhuyenmai where idhoa = $id and khuyenmai.trangthai = 1";
$ds = mysqli_query($connect,$sql);
$pt= mysqli_fetch_array($ds);
$giakm=$pt['dongia']*(100-$pt['chietkhau'])/100;



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title></title>
<script type="text/javascript" src="js/zoom.js"></script>
<script type="text/javascript" src="js/boxOver.js"></script>

</head>
<div class="center_content">
			  <div class="center_title_bar"><?php echo ($pt['tenhoa']); ?></div>

			  <div class="prod_box_big">
						<div class="top_prod_box_big"></div>
						<div class="center_prod_box_big">
							 <div class="product_img_big">
                                                             <a href="javascript:popImage('upload/<?php echo $pt['hinhanh1'];  ?>','<?php echo $pt['tenhoa'] ?>')"  title="header=[Zoom] body=[&nbsp;] fade=[on]"><img src="upload/<?php echo $pt['hinhanh1'];  ?>" width="130px" height="130px" alt="" title="" border="0" /></a>                                                               <br />

                                                             <a href="javascript:popImage('upload/<?php echo $pt['hinhanh1'];  ?> ','<?php echo $pt['tenhoa'] ?>')"  title="header=[Zoom] body=[&nbsp;] fade=[on]">Xem ảnh kích cỡ lớn</a>
                                                         </div>
								 <div class="details_big_box">
									 <div class="product_title_big"><?php echo $pt['tenhoa']?></div>
                                                                         <br />
                                                                         <br />
                                                                         <div class="specifications">
										Giá: <span class="reduce"><?php echo number_format($pt['dongia'],0,'','.') ?> VNĐ</span><br />
										Giá Khuyến Mãi: <span class="price"><?php echo number_format($giakm,0,'','.') ?> VNĐ</span><br />
									 </div>
									 <a href="index.php?page=chovaogio&id=<?php echo $pt['idhoa'] ?>" class="addtocart">Thêm vào giỏ</a>

								 </div>
                                                </div>
						<div class="bottom_prod_box_big"></div>
					</div>

				 <div class="prod_box_big">
						<div class="top_prod_box_big"></div>
						<div class="center_prod_box_big">
						<div class="specifications">
							<h2><span class="blue">Mô tả sản phẩm: <br /></span></h2>
							<?php echo $pt['chitiet']; ?>

							</div>

						</div>
						<div class="bottom_prod_box_big"></div>
				 </div>
</div>
<div class="center_title_bar">SẢN PHẨM TƯƠNG TỰ:</div>
					<?php
					$sql2= "select hoa.hinhanh as hinhanh1,dongia,chietkhau,tenhoa,chitiet,idhoa FROM hoa join khuyenmai on hoa.idkhuyenmai=khuyenmai.idkhuyenmai
								where `dongia` between ($giakm * 0.8) and ($giakm * 1.2)
										and khuyenmai.trangthai = 1
										and idhoa not like '$id'
										limit 3";
					$ds2= mysqli_query($connect,$sql2);
					while($pt2=mysqli_fetch_array($ds2))
					{
					?>
						<div class="prod_box">
							<div class="top_prod_box"></div>
							<div class="center_prod_box">
								<div class="product_title"><a href="index.php?page=chitiethoa&id=<?php echo $pt2["idhoa"]; ?>"> <?php echo $pt2['tenhoa'];  ?> </a></div>
								<div class="product_img"><a href="index.php?page=chitiethoa&id=<?php echo $pt2["idhoa"]; ?>">
									<img src="upload/<?php echo $pt2['hinhanh1']; ?>" width="102" height="92" alt="" title="" border="0"/></a></div>
								<div class="prod_price">
									<span class="reduce"><?php echo number_format($pt2["dongia"],0,'','.');?> VNĐ</span> <br />
									<span class="price"><?php echo number_format(($pt2['dongia']*(100-$pt2['chietkhau']))/100,0,'','.'); ?> VNĐ</span>
                                                                </div>
							</div>
							 <div class="bottom_prod_box"></div>
							<div class="prod_details_tab">
                                                            <a href="index.php?page=chovaogio&id=<?php echo $pt2['idhoa'] ?>" title="header=[Cho vào giỏ] body=[&nbsp;] fade=[on]"><img src="images/cart.gif" alt="" title="" border="0" class="left_bt" /></a>

                                                        <a href="index.php?page=chitiethoa&id=<?php echo $pt2['idhoa'];?>" class="prod_details">Chi tiết</a>
							</div>
						</div>
					<?php } ?>

</html>
<?php
}
?>