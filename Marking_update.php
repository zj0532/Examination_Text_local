<?php
	include("config.php");
	$id = intval($_REQUEST['Simple_test_paper_id']);
	$Fraction = $_REQUEST['Fraction'];
	session_start();
	$Name=$_SESSION['username'];
	$sql = "update simple_test_paper set Fraction='$Fraction' where Simple_test_paper_id=$id";
	$result_Mark=mysqli_query($conn,$sql);
	//计算总成绩
	$Simple_sql=mysqli_query($conn,"select * from result_table a,simple_test_paper b  where  a.Result_Date=b.Date");
	while($Simple_zhi=mysqli_fetch_array($Simple_sql,MYSQL_ASSOC))
	{
		if($Simple_zhi['Date']==@$date)
		{
			$Simple_total=intval($Simple_zhi['Fraction'])+intval($value);
			mysqli_query($conn,"update result_table set Simple_Results='$Simple_total' where Result_ID='$Simple_zhi[Result_ID]' ");
			$total_value=intval($Simple_zhi['Radio_Results'])+intval($Simple_zhi['Multiselect_Results'])+intval($Simple_total);
			mysqli_query($conn,"update result_table set Total='$total_value' where Result_ID='$Simple_zhi[Result_ID]' ");	
		}
			$date=$Simple_zhi['Date'];
			$value=$Simple_zhi['Fraction'];
	}
	

	
	if($result_Mark){
		echo json_encode(array('success'=>true));
		}else{
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
?>