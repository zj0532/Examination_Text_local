<?php
// ******************** 数据库设置 ********************
$dbserver   = "127.0.0.1";
$dbuser     = "root";              							// 数据库用户名
$dbpassword = "root";               						// 数据库密码
$dbdatabase = "examination";       						// 数据库名称
///////////
 $conn = mysqli_connect("localhost","root","Haier,123","Examination") or die("数据库链接错误".mysql_error());
 mysqli_query($conn,"SET NAMES utf8");
?>