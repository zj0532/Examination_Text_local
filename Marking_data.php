<?php
	include 'config.php';
	
	$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
	$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
	$Title = isset($_POST['Title']) ? mysqli_real_escape_string($_POST['Title']) : '';
	$Name = isset($_POST['Name']) ? mysqli_real_escape_string($_POST['Name']) : '';
	
	
	$offset = ($page-1)*$rows;
	
	$result = array();
	
	$where = "Title like '$Title%' and Name like '$Name%'";
	$rs = mysqli_query($conn,"select count(*) from simple_test_paper where " . $where);
	$row = mysqli_fetch_row($rs);
	$result["total"] = $row[0];
	
	$rs = mysqli_query($conn,"select * from simple_test_paper where " . $where . " limit $offset,$rows");
	
	$items = array();
	while($row = mysqli_fetch_object($rs)){
		array_push($items,$row);
	}
	$result["rows"] = $items;
	
	echo json_encode($result);
	
	
?>