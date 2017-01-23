<?php

$Subject_ID = intval($_REQUEST['Subject_ID']);
$Subject_Title = $_REQUEST['Subject_Title'];
$Type_Job = $_REQUEST['Type_Job'];

include 'config.php';

$sql = "update desktop_subjeck set Subject_Title='$Subject_Title',Type_Job='$Type_Job' where Subject_ID=$Subject_ID";
$result = mysqli_query($conn,$sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Some errors occured.'));
}
?>