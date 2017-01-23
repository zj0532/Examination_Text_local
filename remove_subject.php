<?php

$Subject_ID = intval($_REQUEST['Subject_ID']);

include 'config.php';
$sql = "update desktop_subjeck set status='2' where Subject_ID=$Subject_ID";
$result = mysqli_query($conn,$sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Some errors occured.'));
}
?>