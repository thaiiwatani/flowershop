<?php
ob_start();

if (isset($_REQUEST['id']))
{
	$id = $_REQUEST['id'];


$sql = "SELECT hoa.hinhanh as hinhanh1,dongia,chietkhau,tenhoa,chitiet,idhoa
        FROM hoa join khuyenmai on hoa.idkhuyenmai=khuyenmai.idkhuyenmai where idhoa = $id and `trangthai` = 1";
$ds = mysql_query($sql);
$pt= mysql_fetch_array($ds);
$giakm=$pt['dongia']*(100-$pt['chietkhau'])/100;



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title></title>

<script>
PositionX = 100;
PositionY = 100;


defaultWidth  = 500;
defaultHeight = 500;
var AutoClose = true;

if (parseInt(navigator.appVersion.charAt(0))>=4){
var isNN=(navigator.appName=="Netscape")?1:0;
var isIE=(navigator.appName.indexOf("Microsoft")!=-1)?1:0;}
var optNN='scrollbars=no,width='+defaultWidth+',height='+defaultHeight+',left='+PositionX+',top='+PositionY;
var optIE='scrollbars=no,width=150,height=100,left='+PositionX+',top='+PositionY;
function popImage(imageURL,imageTitle){
if (isNN){imgWin=window.open('about:blank','',optNN);}
if (isIE){imgWin=window.open('about:blank','',optIE);}
with (imgWin.document){
writeln('<html><head><title>Loading...</title><style>body{margin:0px;}</style>');writeln('<sc'+'ript>');
writeln('var isNN,isIE;');writeln('if (parseInt(navigator.appVersion.charAt(0))>=4){');
writeln('isNN=(navigator.appName=="Netscape")?1:0;');writeln('isIE=(navigator.appName.indexOf("Microsoft")!=-1)?1:0;}');
writeln('function reSizeToImage(){');writeln('if (isIE){');writeln('window.resizeTo(300,300);');
writeln('width=300-(document.body.clientWidth-document.images[0].width);');
writeln('height=300-(document.body.clientHeight-document.images[0].height);');
writeln('window.resizeTo(width,height);}');writeln('if (isNN){');
writeln('window.innerWidth=document.images["George"].width;');writeln('window.innerHeight=document.images["George"].height;}}');
writeln('function doTitle(){document.title="'+imageTitle+'";}');writeln('</sc'+'ript>');
if (!AutoClose) writeln('</head><body bgcolor=ffffff scroll="no" onload="reSizeToImage();doTitle();self.focus()">')
else writeln('</head><body bgcolor=ffffff scroll="no" onload="reSizeToImage();doTitle();self.focus()" onblur="self.close()">');
writeln('<img name="George" src='+imageURL+' style="display:block"></body></html>');
close();
}}

</script>
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
										and `trangthai` = 1
										and idhoa not like '$id'
										limit 3";
					$ds2= mysql_query($sql2);
					while($pt2=mysql_fetch_array($ds2))
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