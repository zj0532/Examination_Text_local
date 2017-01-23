<?php 
	include('../config.php');
	$rs=mysqli_query($conn,"select status from text_custom");
	$row=mysqli_fetch_array($rs);
	if($row[0]==1)
	{
		mysqli_query($conn,"UPDATE text_custom SET status='0';");
		echo "考试开启！"	;
	}
	if($row[0]==0)
	{
		mysqli_query($conn,"UPDATE text_custom SET status='1';");	
		echo "考试关闭！";
	}
?>