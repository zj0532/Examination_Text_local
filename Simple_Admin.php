<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>管理简答题</title>
	<link rel="stylesheet" type="text/css" href="css/easyui.css">
	<link rel="stylesheet" type="text/css" href="css/icon.css">
	<link rel="stylesheet" type="text/css" href="css/demo.css">
    <link rel="stylesheet" type="text/css" href="css/Simple_Admin.css">
    <script type="text/javascript" src="js/jquery-1.6.min.js"></script>
    <script type="text/javascript" src="js/jquery.easyui.min.js"></script>
    <script type="text/javascript" src="js/Simple_Admin.js"></script>
	<?php
    session_start();
	if(isset($_SESSION['username']))
	{ 	}
	else{header("Location:index.php");}
	?>
</head>
<body>
	<table id="dg"></table>
<div id="toolbar">
	<a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">出题</a>
	<a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">编辑题目</a>
	<a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="removeUser()">删除题目</a>
   <div id="dlg" class="easyui-dialog" style="width:400px;height:280px;padding:10px 20px"
		closed="true" buttons="#dlg-buttons">
	<div class="ftitle"></div>
	<form id="fm" method="post">
		<div class="fitem">
			<label>题目:</label>
			<input name="Subject_Title" class="easyui-validatebox" >
		</div>
		<div class="fitem">
			<label>类别:</label>
           <input id="Type_Job" name="Type_Job" class="validatebox">
           <input id="Subject_ID" name="Subject_ID" style="display:none">
		</div>
	</form>
</div>
<div id="dlg-buttons">
	<a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="saveUser()">保存</a>
	<a href="#" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')">Cancel</a>
    
</div>
</div>
</body>
</html>