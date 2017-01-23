<?php 
	include('../config.php');

	$sql=mysqli_query($conn,"select distinct Custom_name,Status_Init,date from text_custom");
	$item=array();
	while($row=mysqli_fetch_object($sql)){
			array_push($item,$row);
		}
	
	echo json_encode($item);

?>