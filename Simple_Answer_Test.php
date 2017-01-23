<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>简答题试卷</title>
<link rel="stylesheet" type="text/css" href="js/jquery.easyui.min.js">
	<link rel="stylesheet" type="text/css" href="css/icon.css">
	<script type="text/javascript" src="js/jquery-1.6.min.js"></script>
	<script type="text/javascript" src="js/jquery.easyui.min.js"></script>
	<script type="text/javascript">
		$(function(){
			$('#ff').form({
				success:function(data){
					$.messager.alert('Info', data, 'info');
				}
			});
		});
	</script>
</head>
<?php 
include("config.php");

$i=1; 
?>
<body>
<div style="padding:3px 2px;border-bottom:1px solid #ccc">简答题</div>
	<form id="ff" action="form1_proc.php" method="post">
		<table>
			<?php while($row=mysql_fetch_array($Result))
            { ?>
            <tr>
				<td>第<?php echo $i ?>题: </td>
				<td><?php echo $row['Short_Answer_Questions_Title'] ?></td>
			</tr>
            <tr>
            	<td colspan="2"><textarea name="Simple" style="width:400px;height:150px;"></textarea></td>
            </tr>
          <?php $i++; } ?>
			<tr>
				<td></td>
				<td><input type="submit" value="交卷"></input></td>
			</tr>
		</table>
	</form>
</body>
</html>