<?
//设置为考试试卷页面处理
include('../config.php');
$Custom_name=$_POST['Custom_name'];
mysqli_query($conn,"UPDATE text_custom set Status_Init='';");
$rs=mysqli_query($conn,"UPDATE text_custom set Status_Init='考试试卷' where Custom_name='$Custom_name';");
if(mysqli_affected_rows($conn))
{
	echo "设置考试试卷成功！";
}
else
{
	echo "设置考试试卷失败！";
}
?>