<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/easyui.css">
	<link rel="stylesheet" type="text/css" href="css/icon.css">
	<link rel="stylesheet" type="text/css" href="css/demo.css">
    <script type="text/javascript" src="js/jquery-1.6.min.js"></script>
    <script type="text/javascript" src="js/jquery.easyui.min.js"></script>
    <?php
	$a=$_GET['name'];
	include('../config.php');
	$result=mysqli_query($conn,"select * from text_custom a,Type b where Custom_name='$a' and a.Type=b.Type");
	?>
</head>
<body>
	<table border="1px">
    	<?php while($rs=mysqli_fetch_array($result)){  ?>
        <tr>
        	<td>类型:</td><td><?php echo $rs['Type_Name'] ?></td>  
        </tr>
        <tr>
        	<td>题目：</td><td><?php echo $rs['Subject_Title'] ?></td>
        </tr>
        <tr>
        	<td>选项A：</td><td><?php echo $rs['Subject_A'] ?></td>
        </tr>
        <tr>
        	<td>选项B：</td><td><?php echo $rs['Subject_B'] ?></td>
        </tr>
        <tr>
        	<td>选项C：</td><td><?php echo $rs['Subject_C'] ?></td>
        </tr>
        <tr>
        	<td>选项D：</td><td><?php echo $rs['Subject_D'] ?></td>
        </tr>
        <tr>
        	<td>正确答案：</td><td><?php echo $rs['Subject_Answer'] ;} ?></td>
        </tr>
    </table>
</body>
</html>
