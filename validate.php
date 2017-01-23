<?php
	session_start(); 
	$_SESSION['username']=$_POST['user'];
	$pass=$_POST['pass'];
	include("config.php");
	$query=mysqli_query($conn,"select * from user where Name='$_SESSION[username]' and Passwd='$pass'");
	if(mysqli_fetch_array($query,MYSQL_NUM)){
		echo "1";
		}else{
		echo "账号密码有误，请重新输入！";
		}
?>