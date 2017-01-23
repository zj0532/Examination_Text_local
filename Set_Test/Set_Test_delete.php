<?php
	$Custom_name=$_POST['Custom_name'];
	include('../config.php');
	mysqli_query($conn,"delete from text_custom where Custom_name='$Custom_name'");
?>