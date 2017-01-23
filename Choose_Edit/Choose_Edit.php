<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>编辑多选题</title>
	<link rel="stylesheet" type="text/css" href="css/easyui.css">
	<link rel="stylesheet" type="text/css" href="css/icon.css">
	<link rel="stylesheet" type="text/css" href="css/demo.css">
    <script type="text/javascript" src="js/jquery-1.6.min.js"></script>
    <script type="text/javascript" src="js/jquery.easyui.min.js"></script>
    <script type="text/javascript" src="js/Choose_Edit.js"></script>
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
   <div id="dlg" class="easyui-dialog" style="width:800px;height:400px;padding:10px 20px"
		closed="true" buttons="#dlg-buttons">
	<div class="ftitle"></div>
	<form id="fm" method="post">
		<div class="fitem">
        	<div style="line-height:50px; width:50px; float:left">
			<label>题&nbsp;&nbsp;目:</label>
			</div>
            <textarea name="Subject_Title" style="width:600px; height:50px; resize:none"></textarea>
		</div>
        <br>
		<div class="fitem">
			<label>类&nbsp;&nbsp;别:</label>&nbsp;&nbsp;
           <select id="Type_Job" name="Type_Job" class="validatebox">
           		<option value='桌面' selected="selected">桌面</option>
                <option>网络</option>
                <option>服务器</option>
           </select>
		</div>
        <br>
        <div class="fitem">
		   <div style="line-height:50px; width:50px; float:left">
           <label>选项A:</label>
           </div>
           <textarea id="Subject_A" name="Subject_A" class="validatebox" style="width:600px; height:50px; resize:none">
           </textarea>
		</div>
        <br>
        <div class="fitem">
        	<div style="line-height:50px; width:50px; float:left">
			<label>选项B:</label>
            </div>
           <textarea id="Subject_B" name="Subject_B" class="validatebox" style="width:600px; height:50px; resize:none">
           </textarea>
		</div>
        <br>
        <div class="fitem">
        	<div style="line-height:50px; width:50px; float:left">
			<label>选项C:</label>
            </div>
            <textarea id="Subject_C" name="Subject_C" class="validatebox" style="width:600px; height:50px; resize:none">
            </textarea>
		</div>
        <br>
        <div class="fitem">
        	<div style="line-height:50px; width:50px; float:left">
			<label>选项D:</label>
             </div>
            <textarea id="Subject_D" name="Subject_D" class="validatebox" style="width:600px; height:50px; resize:none">
            </textarea>
		</div>
        <br>
        <div class="fitem">
			<label>答&nbsp;&nbsp;案:</label>&nbsp;&nbsp;
           <select id="Subject_Answer" name="Subject_Answer" class="validatebox">
           		<option  selected="selected" value="A">A</option>
                <option>B</option>
                <option>C</option>
                <option>D</option>
           </select>
		</div>
        <div id="dlg-buttons">
			<a href="#" class="easyui-linkbutton"  onclick="saveUser()">保存</a>
			<a href="#" class="easyui-linkbutton"  onclick="javascript:$('#dlg').dialog('close')">
    			取消</a>
	   </div>
	</form>
</div>

</div>
</body>
</html>