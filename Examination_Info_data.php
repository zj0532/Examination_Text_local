<?php 
	session_start();
	$Name=$_SESSION['username'];
	$sort=$_POST['sort'];
	$order=$_POST['order'];
	include('config.php');
	$sql=mysqli_query($conn,"select * from result_table ORDER BY $sort $order;");
	
	$item=array();
	while($row=mysqli_fetch_object($sql)){
	
			array_push($item,$row);
		};
	echo json_encode($item);
?>	
