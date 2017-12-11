<?php
ob_start();
include 'connect.php';
$sql="select * from tintuc";
$ds=mysql_query($sql);
?>
<div class="center_title_bar">Trang tin tức</div>
<?php
while ($pt = mysql_fetch_array($ds)) {
?>


						<div class="center_prod_box_big">
							 <div class="product_img_big">
                                                             <img src="upload/<?php echo $pt['hinhanh'];  ?>" width="130px" height="130px" alt="" title="" border="0" />                                                             <br />

                                                         </div>
								 <div class="details_big_box">
									 <div class="product_title_big"><?php echo $pt['tieude']?></div>
                                                                         <br />
                                                                         <?php echo substr(strip_tags($pt["noidung"],'<br>'),0,250)."..."; ?>
                                                                         <br />

									 <a href="index.php?page=chitiettintuc&id=<?php echo $pt['idtintuc']?>">Chi tiết</a>

								 </div>
                                                    
                                                </div>
<?php
}
?>
