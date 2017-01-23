<?
	session_start();
	if(isset($_SESSION['username']))
	{ 	}
	else{header("Location:index.php");}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>开始考试</title>
<style>
	body{
		background:#CCC;
	}
</style>
<script language="javascript">
 function checkform()
 {
	if(confirm("确定要交卷吗？")){ 
        //$("name").submit(); 
     }
	for(var s=1;s<16;s++)
	{
	var a = document.getElementsByName(s);
	var frequency =0; //单选次数
	for(var i = 0;i<a.length;i++){
		if(a[i].checked == false)
		{
 	 		frequency+=1;
 		}
			if(frequency==4){
				alert("您还有未答的题");
				return false;
				}
			
		}
	}
 }
</script>
</head>
<?php
	include('config.php');
	$i=0;
	$date=date('Y-m-d G:i:s',time());
	//判断是否提交过试卷
	$Judge_Sentence=mysql_query("select test_paper_date from test_paper where name='$name' order by test_paper_date desc");
	$Judge_Result=mysql_fetch_array($Judge_Sentence);
	$Judge_Str=substr($Judge_Result[0],0,10);
	$Judge_Date=substr($date,0,10);
	if($Judge_Str=$Judge_Date)
	{echo "<script>alert('你已交卷！')</script>";
	 //exit();		
	}
?>
<body>
<form  name="name" id="name" method="POST" action="Assignment.php"  onsubmit="checkform()">
	<p>单选题</p>
	<?php
		$Result=mysql_query("select * from desktop_subjeck where status='1'and Type='1' limit 15");
		$Result_Multiselect =mysql_query("select * from desktop_subjeck where status='1' and Type='2' limit 5");
		$Result_Simple=mysql_query("select * from desktop_subjeck where status='1' and Type='3' limit 2");
		while($row=mysql_fetch_array($Result)){		
			$i=$i+1;
	?> 
    <p><?php echo "第".$i."题"?>：<?php echo $row['Subject_Title']  ?></p>
    <p><input type="radio" id="1_A"  name="<?php echo $row['Subject_ID']; ?>" value="A" /><?php echo $row['Subject_A'] 	 ?></p>
    <p><input type="radio" id="1_B"  name="<?php echo $row['Subject_ID']; ?>" value="B" /><?php echo $row['Subject_B']	 ?></p>
	<p><input type="radio" id="1_C"  name="<?php echo $row['Subject_ID']; ?>" value="C" /><?php echo $row['Subject_C'] 	 ?></p>
    <p><input type="radio" id="1_D"  name="<?php echo $row['Subject_ID']; ?>" value="D" /><?php echo $row['Subject_D']  ;} ?></p>
    <p>多选题</p>
    <?php while($Row_Multiselect=mysql_fetch_array($Result_Multiselect)){ $i=$i+1 ;	?>
    
	<p><?php echo "第".$i."题" ?>：<?php echo $Row_Multiselect['Subject_Title']  ?></p>
    <p><input type="checkbox" id="1_A"  name="<?php echo $Row_Multiselect['Subject_ID']; ?>[]" value="A" /><?php echo $Row_Multiselect['Subject_A'] 	 ?></p>
    <p><input type="checkbox" id="1_B"  name="<?php echo $Row_Multiselect['Subject_ID']; ?>[]" value="B" /><?php echo $Row_Multiselect['Subject_B']	 ?></p>
	<p><input type="checkbox" id="1_C"  name="<?php echo $Row_Multiselect['Subject_ID']; ?>[]" value="C" /><?php echo $Row_Multiselect['Subject_C'] 	 ?></p>
    <p><input type="checkbox" id="1_D"  name="<?php echo $Row_Multiselect['Subject_ID']; ?>[]" value="D" /><?php echo $Row_Multiselect['Subject_D']  ;} ?></p>
    
    <p>简答题</p>
    <?php while($Row_Simple=mysql_fetch_array($Result_Simple)){ $i=$i+1 ;	?>
    <p><?php echo "第".$i."题" ?>：<?php echo $Row_Simple['Subject_Title']  ?></p>
    <p><textarea name="<?php echo $Row_Simple['Subject_ID']; ?>" style="width:400px;height:150px;"></textarea><p>
    <?php } ?>
    <input type="submit" name="Assignment" value="交卷"  />
</form>
</body>
</html>