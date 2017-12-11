<?php
if (isset($_REQUEST['id']))
{
	$id = $_REQUEST['id'];
}

$sql = "SELECT * FROM hoa where idhoa = $id and `trangthai` = 1";
//$ds = mysql_query($sql);
//$pt= mysql_fetch_array($ds);
$ds = mysqli_query($connect,$sql);
$pt= mysqli_fetch_array($ds);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title></title>


<!--[if IE 6]>
<link rel="stylesheet" type="text/css" href="iecss.css" />
<![endif]-->
<script type="text/javascript" src="../js/zoomImg.js"></script>
<script type="text/javascript" src="../js/boxOver.js"></script>
</head>
<div class="center_content">
			  <div class="center_title_bar"><?php echo ($pt['tenhoa']); ?></div>

			  <div class="prod_box_big">
						<div class="top_prod_box_big"></div>
						<div class="center_prod_box_big">

							 <div class="product_img_big">
								<a  href="javascript:popImages('../pic/<?php echo $pt['hinhanh']; ?>','<?php echo $pt['tenhoa']; ?>')">
								<img src="../admin/pic/<?php echo $pt['hinhanh'];  ?>" alt="" width="102" height="92" border="0" title="header=[Zoom] body=[&nbsp;] fade=[on]"/></a><br />
								<a class="none" href="javascript:popImages('/pic/<?php echo $pt['hinhanh'];  ?>','<?php echo $pt['tenhoa']; ?>')" >Xem ảnh kích cỡ lớn</a></div>
								 <div class="details_big_box">
									 <div class="product_title_big"><?php echo $pt['tenhoa']?></div>
                                                                         <div class="specifications">
										Giá: <span class="reduce"><?php echo $pt['dongia'] ?> VNĐ</span><br />
										Giá Khuyến Mãi: <span class="price"><?php echo $pt['dongia'] ?> VNĐ</span><br />
									 </div>
									 <a href="#" class="addtocart">Thêm vào giỏ</a>

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
</html>