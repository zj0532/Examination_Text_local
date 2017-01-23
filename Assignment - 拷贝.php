<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>交卷</title>
<?php
	session_start();
	//if(isset($_SESSION['username']))
	//{ 	}
	//else{header("Location:index.php");}
	include('config.php');
	mysql_query("set name utf8");
	session_start();
	$name=$_SESSION['username'];
	$date=date('Y-m-d G:i:s',time());
	
	
	$Result=mysql_query("select * from desktop_subjeck where Type='1' and Type_Job='1' and status='1' order by Subject_ID desc LIMIT 15");
	$Result_Multiselect =mysql_query("select * from desktop_subjeck where status='1' and Type='2' and status='1'  ORDER BY Subject_ID desc LIMIT 5");
	$Result_Simple=mysql_query("select * from desktop_subjeck where status='1' and Type='3' and status='1' ORDER BY Subject_ID DESC limit 2");
	$i=1;
	$Fraction=0; //分数
	$Answer_questions=0; //答对题数
	$Fraction_Multiselect=0; //多选分数
	$Answer_Questions_Multiselect=0; //多选答对题数
	
	//单选循环
	while($row=mysql_fetch_array($Result))
	{
		$Subject_ID=$row['Subject_ID'];
		$Subject_SD=$_POST[$Subject_ID];
		mysql_query("insert into test_paper (Name,Subject_Title,Subject_A,Subject_B,Subject_C,Subject_D,My_Options,Subject_Answer,test_paper_date) values ('$name','$row[Subject_Title]','$row[Subject_A]','$row[Subject_B]','$row[Subject_C]','$row[Subject_D]','$Subject_SD','$row[Subject_Answer]','$date')");
		if($Subject_SD==$row['Subject_Answer'])
		{
			$Fraction+=3;
			$Answer_questions+=1;
		}
		$i=$i+1;
	}
	
	//多选循环
	while($Row_Multiselect=mysql_fetch_array($Result_Multiselect))
	{
		$ID=$Row_Multiselect['Subject_ID'];
		$SD=$_POST[$ID];
		$Multiselect_Answer=implode("",$SD); //选择的答案
		
		mysql_query("insert into test_paper (Name,Subject_Title,Subject_A,Subject_B,Subject_C,Subject_D,My_Options,Subject_Answer,test_paper_date) values ('$name','$Row_Multiselect[Subject_Title]','$Row_Multiselect[Subject_A]','$Row_Multiselect[Subject_B]','$Row_Multiselect[Subject_C]','$Row_Multiselect[Subject_D]','$Multiselect_Answer','$Row_Multiselect[Subject_Answer]','$date')");
		
		if($Multiselect_Answer==$Row_Multiselect['Subject_Answer'])
		{
			$Fraction_Multiselect+=5;
			$Answer_Questions_Multiselect+=1;
		}
		$i=$i+1;
	}
	
	//简答题循环
	while($Row_Answer=mysql_fetch_array($Result_Simple))
	{
		$ID=$Row_Answer['Subject_ID'];
		$Answer=$_POST[$ID];
		
		
		mysql_query("insert into simple_test_paper (Title,Answer,Name,Date) values ('$Row_Answer[Subject_Title]','$Answer','$name','$date')");
	
	}
	
mysql_query("insert into result_table (Name,Radio_Results,Multiselect_Results,Result_Date) values ('$name','$Fraction','$Fraction_Multiselect','$date')"); //将成绩写入数据库

?>
</head>

<body>
您的单选题成绩为：<?php 	echo $Fraction; 	?>分
<br />
您答对<?php echo $Answer_questions  ?>道单选题
<br />
您的多选题成绩为：<?php 	echo $Fraction_Multiselect 	?>分
<br />
您答对<?php echo $Answer_Questions_Multiselect  ?>道多选题
</body>
</html>
