<?php
// ******************** ���ݿ����� ********************
$dbserver   = "127.0.0.1";
$dbuser     = "root";              							// ���ݿ��û���
$dbpassword = "root";               						// ���ݿ�����
$dbdatabase = "examination";       						// ���ݿ�����
///////////
 $conn = mysqli_connect("localhost","root","Haier,123","Examination") or die("���ݿ����Ӵ���".mysql_error());
 mysqli_query($conn,"SET NAMES utf8");
?>