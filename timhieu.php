<?php
ob_start();
include 'connect.php';
$sql="select * from tintuc";
$ds=mysqli_query($connect,$sql);
$tongso=  mysqli_num_rows($ds);
$spt=6;
$sotrang=  ceil($tongso/$spt);
if($sotrang>1)
    {
    for($i=1;$i<=$sotrang;$i++)
        {
            ?>
             <a href="index.php?page=timhieu&trang=<?php  echo $i ?>">Trang<?php  echo $i ?></a>
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
<div class="center_title_bar">Trang tin tức</div>
<?php
while ($pt = mysqli_fetch_array($ds1)) {
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
