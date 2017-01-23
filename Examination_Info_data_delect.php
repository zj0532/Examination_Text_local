<?php

$Result_ID = intval($_REQUEST['Result_ID']);

include 'config.php';
$sql = "delete from result_table where Result_ID='$Result_ID'";
$result = mysqli_query($conn,$sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Some errors occured.'));
}
?>