<?php
 $connect=mysql_connect("localhost","root","");
  mysql_select_db("shophoa");
    mysql_query("SET charactor_set_results=utf8",$connect);
    mysql_query("SET NAMES 'utf8'");
?>
