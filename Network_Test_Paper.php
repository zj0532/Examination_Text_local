<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>开始考试</title>
    <link rel="stylesheet" type="text/css" href="css/easyui.css">
	<link rel="stylesheet" type="text/css" href="css/icon.css">
	<link rel="stylesheet" type="text/css" href="css/demo.css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.easyui.min.js"></script>
    <script type="text/javascript" src="js/Network_Test_Paper.js"></script>   	
<script language="javascript">
/*
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
 */
</script>
</head>
<?php

	include('config.php');
	session_start();
	$name=$_SESSION['username'];
	if(isset($_SESSION['username']))
	{ 	}
	else{header("Location:index.php");}
	$i=0;
	$date=date('Y-m',time());
	//判断考试是否开启
	$Whether=mysqli_fetch_array(mysqli_query($conn,"select status from text_custom"));
	if($Whether[0]==1)
	{
		echo "<script>$.messager.show({title:'提示',msg:'考试未开放！'})</script>";
	 	echo "<script>$('#center').load('Examination_Info.php')</script>";	
	}
	//判断是否提交过试卷
	$Judge_Sentence=mysqli_query($conn,"SELECT Result_Date FROM result_table WHERE `Name`='周杰' ORDER BY Result_Date DESC LIMIT 1");
	$Judge_Result=mysqli_fetch_array($Judge_Sentence);
	$Judge_Str=substr($Judge_Result[0],0,7);
	if($Judge_Str==$date)
	{
		echo "<script>$.messager.show({title:'提示',msg:'本月考试您已交卷！'})</script>";
	 	echo "<script>$('#center').load('Examination_Info.php');
				</script>";
		
	}

?>
<body>


<form id="ff" method="post">
	
	<?php
		$Result=mysqli_query($conn,"SELECT * FROM text_custom where Status_Init='考试试卷' and Type='1';");
		$Result_Fraction=mysqli_query($conn,"SELECT * FROM text_custom where Status_Init='考试试卷' and Type='1';");
		$Result_Multiselect =mysqli_query($conn,"SELECT * FROM text_custom where Status_Init='考试试卷' and Type='2';");
		$Result_Simple=mysqli_query($conn,"SELECT * FROM text_custom WHERE Status_Init = '考试试卷' AND Type = '3';");
		$rows=mysqli_fetch_array($Result_Fraction)
	?>
    <h3>单选题<?php echo "(每道单选题".$rows['Radio_Scores']."分)"; ?></h3>
    <hr />
	<?php	
		while($row=mysqli_fetch_array($Result)){		
			$i=$i+1;
	?> 
    <p id="Number"><?php echo "第".$i."题"?>：<?php echo $row['Subject_Title']  ?></p>
    <p><input type="radio" id="<?php echo $i ?>"  name="<?php echo $row['Text_id']; ?>" value="A" /><?php echo $row['Subject_A'] 	 ?></p>
    <p><input type="radio" id="<?php echo $i ?>"  name="<?php echo $row['Text_id']; ?>" value="B" /><?php echo $row['Subject_B']	 ?></p>
	<p><input type="radio" id="<?php echo $i ?>"  name="<?php echo $row['Text_id']; ?>" value="C" /><?php echo $row['Subject_C'] 	 ?></p>
    <p><input type="radio" id="<?php echo $i ?>"  name="<?php echo $row['Text_id']; ?>" value="D" /><?php echo $row['Subject_D']  ;} ?></p>
    <h3>多选题<?php echo "(每道单选题".$rows['Multi_Fraction']."分)"; ?></h3>
    <hr />
    <?php while($Row_Multiselect=mysqli_fetch_array($Result_Multiselect)){ $i=$i+1 ;	?>
    
	<p><?php echo "第".$i."题" ?>：<?php echo $Row_Multiselect['Subject_Title']  ?></p>
    <p><input type="checkbox" id="<?php echo $i ?>"  name="<?php echo $Row_Multiselect['Text_id']; ?>[]" value="A" /><?php echo $Row_Multiselect['Subject_A'] 	 ?></p>
    <p><input type="checkbox" id="<?php echo $i ?>"  name="<?php echo $Row_Multiselect['Text_id']; ?>[]" value="B" /><?php echo $Row_Multiselect['Subject_B']	 	 ?></p>
	<p><input type="checkbox" id="<?php echo $i ?>"  name="<?php echo $Row_Multiselect['Text_id']; ?>[]" value="C" /><?php echo $Row_Multiselect['Subject_C'] 	 ?></p>
    <p><input type="checkbox" id="<?php echo $i ?>"  name="<?php echo $Row_Multiselect['Text_id']; ?>[]" value="D" /><?php echo $Row_Multiselect['Subject_D']  ;}  ?></p>
    
    <h3>简答题<?php echo "(每道单选题".$rows['Simple_Fraction']."分)"; ?></h3>
    <hr />
    <?php while($Row_Simple=mysqli_fetch_array($Result_Simple)){ $i=$i+1 ;	?>
    <p><?php echo "第".$i."题" ?>：<?php echo $Row_Simple['Subject_Title']  ?></p>
    <p><textarea  name="<?php echo $Row_Simple['Text_id']; ?>" style="width:400px;height:150px;"></textarea><p>
    <?php } ?>
    <a id="btn"></a>
</form>
</body>
</html>