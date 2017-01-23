<?php
	$a=$_POST['subject'];
	$Droplist=$_POST['Droplist'];
	$b=$_POST['rs'];
	$Loop_Num=$_POST['Loop_Num'];
	$date=date('y-m-d h:i:s',time());
	$Radio_Scores=$_REQUEST['Radio_Scores'];
	$Multi_Fraction=$_REQUEST['Multi_Fraction'];
	$Simple_Fraction=$_REQUEST['Simple_Fraction'];
	include('config.php');
	
	
	for($i=0;$i<$Loop_Num;$i++){	
		$type=$a[$i]['Type'];
		$Subject_Title=$a[$i]['Subject_Title'];
		$Subject_A=$a[$i]['Subject_A'];
		$Subject_B=$a[$i]['Subject_B'];
		$Subject_C=$a[$i]['Subject_C'];
		$Subject_D=$a[$i]['Subject_D'];
		$Subject_Answer=$a[$i]['Subject_Answer'];
		
		mysqli_query($conn,"INSERT INTO text_custom (Type,Type_Name,Subject_Title,Subject_A,Subject_B,Subject_C,Subject_D,Subject_Answer,Custom_name,Status,date,Radio_Scores,Multi_Fraction,Simple_Fraction) VALUES ('$type','$Droplist','$Subject_Title','$Subject_A','$Subject_B','$Subject_C','$Subject_D','$Subject_Answer','$b','1','$date','$Radio_Scores','$Multi_Fraction','$Simple_Fraction')");
		}
	
	
	echo "生成试卷成功！";
	
?>