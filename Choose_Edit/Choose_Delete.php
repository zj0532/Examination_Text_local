<?php

$Subject_ID = intval($_REQUEST['Subject_ID']);

include('../config.php');
$sql = "delete from desktop_subjeck where Subject_ID='$Subject_ID'";
$result = mysqli_query($conn,$sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Some errors occured.'));
}
?>