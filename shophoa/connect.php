<?php

$servername = '127.0.0.1:3306';
$username = 'root';
$password = '';
$dataname = 'shophoa';

// Create connection
$connect = mysqli_connect($servername, $username, $password,$dataname);
//mysql_connect
// Check connection
if ($connect->connect_error) {
    die('Connection failed: ' . $connect->connect_error);
    die ('Can\'t use foo : ' . mysqli_connect_error());
} 
//mysqli_query("SET NAMES 'utf8'");
//echo 'Connected successfully';
mysqli_set_charset($connect, 'UTF8');
//  //$db_selected =mysql_select_db('shophoa',$connect);
//  if (!$db_selected) {
//      die ('Can\'t use foo : ' . mysqli_connect_error());
//    
//}
//  mysqli_connect("SET charactor_set_results=utf8",$connect);
//  mysqli_query("SET NAMES 'utf8'");
//  mysql_query("SET NAMES 'utf8'");
  
//$link = @mysql_connect($servername, $username,$password);
//if (!$link) {
//    die('Could not connect: ' . mysql_error());
//}
//echo 'Connected successfully';
//mysql_close($link);
?>
