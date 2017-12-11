<?php
ob_start();
include 'connect.php';
include 'checklogin.php';
?>

<script type="text/javascript">
function showsp(str,page)
{
if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","ajaxsanpham.php?cid="+str+"&trang="+page,true)
xmlhttp.send();
}
</script>

<script type="text/javascript">
    showsp(-1,1);
</script>
<form name ="form1" action="" method="post">
    <select name="chondm" onchange="showsp(this.value,1)">
        <option value="-1">Tất cả</option>
        <?php
            $sql1="select * from danhmuchoa";
            $ds1=  mysql_query($sql1);
            while ($pt= mysql_fetch_array($ds1))
            {

            ?>
        <option value="<?php echo $pt['idDM']?>" 
        <?php
        if($pt['idDM']==$_REQUEST['cid'])
        {echo "selected";} ?>><?php echo $pt['tenDM']?>
        </option>
            <?php
            }

        ?>
    </select>
<div id="txtHint"></div>
<div id="txttest"></div>
</form>




