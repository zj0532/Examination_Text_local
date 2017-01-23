<?php

$Subject_Title = $_REQUEST['Subject_Title'];
$Type_Job = $_REQUEST['Type_Job'];


include 'config.php';

$sql = "insert into desktop_subjeck(Type,Type_Job,Subject_Title) values('3','$Type_Job','$Subject_Title')";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('msg'=>'Some errors occured.'));
}
?>