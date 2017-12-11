<?php
// $connect=mysql_connect("localhost:3306","root","");
//  mysql_select_db("shophoa");
//    mysql_query("SET charactor_set_results=utf8",$connect);
//    mysql_query("SET NAMES 'utf8'");
$servername = '127.0.0.1:3306';
$username = 'root';
$password = '';
$dataname = 'shophoa';
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
?>
