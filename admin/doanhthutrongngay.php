<?php
ob_start();
include 'connect.php';
include 'checklogin.php';
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Thống kê doanh thu</title>
<script type="text/javascript" src="js/js.js"></script>
</head>
<form id="form1" name="form1" method="post" action="">
<table>
    <caption>
        Doanh thu theo ngày
    </caption>
    <tr>
        <td>
            Ngày tháng
        </td>
        <td width="350"><input type="Text" readonly id="txtdate" name="txtdate" maxlength="25" size="25"/>
        <img src="images/cal.gif" alt="" onclick="javascript:NewCssCal('txtdate','ddMMyyyy','dropdown',false,'12',false)" />
        </td>
    </tr>
    <tr>
        <td></td>
        <td><input type="submit" value="Thống kê" name="btntk"/></td>
    </tr>
</table>
</form>
<?php
if(isset ($_POST['btntk']))
 {
    $date= date("Y-m-d",strtotime($_POST['txtdate']));
    $date1= date("d-m-Y",strtotime($_POST['txtdate']));
    $year=date("Y",strtotime($_POST['txtdate']));
    $month=date("m",strtotime($_POST['txtdate']));
    $day=date("d",strtotime($_POST['txtdate']));
    $sql="select year(thoigian),month(thoigian), day(thoigian),sum(tongtien) as thongke from hoadon
    where year(thoigian)='$year' and month(thoigian)='$month' and day(thoigian)='$day' and thanhtoan=1";
    $ds=mysql_query($sql);
    while($thongke=mysql_fetch_array($ds))
        {
    echo 'Doanh thu trong ngày ';
    echo $date1;
    echo ' của website là: ';
    echo number_format($thongke['thongke'],0,'','.');
    echo ' VNĐ';
        }

 }
?>
</html>