<?php

$Subject_Title = $_REQUEST['Subject_Title'];
$Type_Job = $_REQUEST['Type_Job'];
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
include '../config.php';

$sql = "insert into desktop_subjeck(Type,Type_Job,Subject_Title,Subject_A,Subject_B,Subject_C,Subject_D,Subject_Answer) values('2','$Type_Job','$Subject_Title','$Subject_A','$Subject_B','$Subject_C','$Subject_D','$Subject_Answer')";
$result = mysqli_query($conn,$sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Some errors occured.'));
}
?>