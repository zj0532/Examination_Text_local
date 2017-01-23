<?php 
	include('config.php');
	$sql=mysqli_query($conn,"select * from desktop_subjeck");
	$item=array();
	while($row=mysqli_fetch_object($sql)){
			array_push($item,$row);
		}
	
	echo json_encode($item);

?>