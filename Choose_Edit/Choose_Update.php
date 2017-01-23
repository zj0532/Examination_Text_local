<?php

$Subject_ID = intval($_REQUEST['Subject_ID']);
$Subject_Title = $_POST['Subject_Title'];
$Type_Job = $_POST['Type_Job'];
$Subject_A=$_POST['Subject_A'];
$Subject_B=$_POST['Subject_B'];
$Subject_C=$_POST['Subject_C'];
$Subject_D=$_POST['Subject_D'];
$Subject_Answer=$_POST['Subject_Answer'];

switch ($Type_Job)
{
	case '桌面':
		$Type_Job=1;
		break;
	case '网络':
		$Type_Job=2;
		break;
	case '服务器':
		$Type_Job=3;
		break;	
}

include('../config.php');

$sql = "update desktop_subjeck set Subject_Title='$Subject_Title',Type_Job='$Type_Job',Subject_A='$Subject_A',Subject_B='$Subject_B',Subject_C='$Subject_C',Subject_D='$Subject_D',Subject_Answer='$Subject_Answer' where Subject_ID=$Subject_ID";
$result = mysqli_query($conn,$sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Some errors occured.'));
}
?>