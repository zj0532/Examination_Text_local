<?php
	session_start();
	if(isset($_SESSION['username']))
	{ 	}
	else{header("Location:index.php");}
	include('config.php');
	$name=$_SESSION['username'];
	$old_passwd=$_POST['old_passwd'];
	$new_passwd=$_POST['new_passwd'];
	$rs=mysqli_query($conn,"select * from user where Name='$name' and Passwd='$old_passwd'");
	$result=mysqli_fetch_array($rs);
	if($result)
	{
		$passwd_result=mysqli_query($conn,"update user set Passwd='$new_passwd' where Name='$name'");
		@mysqli_fetch_array($passwd_result);
	}
		
		
		if(mysqli_affected_rows($conn))
			{
			echo "密码修改成功";
			}
			else
			{
				echo "修改密码失败,请重试！";
			}
	
?>