<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Basic Panel - jQuery EasyUI Demo</title>
	<link rel="stylesheet" type="text/css" href="css/easyui.css">
	<link rel="stylesheet" type="text/css" href="css/icon.css">
	<link rel="stylesheet" type="text/css" href="css/demo.css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.easyui.min.js"></script>
    <script type="text/javascript" src="js/jquery-1.4.4.min.js"></script>
</head>
<script type="text/javascript" >
var url;

function addUser(){
	$('#dlg').dialog('open').dialog('setTitle','New User');
	$('#fm').form('clear');
	url = 'save_subject.php';
	}
	
	function editUser(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$('#dlg').dialog('open').dialog('setTitle','Edit User');
				$('#fm').form('load',row);
				url = 'update_subject.php?id='+row.id;
			}
		}
		
		function saveUser(){
			$('#fm').form('submit',{
				url: url,
				onSubmit: function(){
					return $(this).form('validate');
				},
				success: function(result){
					var result = eval('('+result+')');
					if (result.success){
						$('#dlg').dialog('close');		// close the dialog
						$('#dg').datagrid('reload');	// reload the user data
					} else {
						$.messager.show({
							title: 'Error',
							msg: result.msg
						});
					}
				}
			});
		}
		
		function removeUser(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$.messager.confirm('删除','确认删除此题吗？',function(r){
					if (r){
						$.post('remove_subject.php',{Short_Answer_Questions_ID:row.Short_Answer_Questions_ID},function(result){
							if (result.success){
								$('#dg').datagrid('reload');	// reload the user data
							} else {
								$.messager.show({	// show error message
									title: 'Error',
									msg: result.msg
								});
							}
						},'json');
					}
				});
			}
		}
</script>

<body>
	<table id="dg" title="简答题题目列表" class="easyui-datagrid"  style="width:550px;height:400px"
		url="Simple_Answer_List.php"
		toolbar="#toolbar" iconCls="icon-save"
		rownumbers="true" fitColumns="true" singleSelect="true" pagination="true">
	<thead>
		<tr>
			<th field="Short_Answer_Questions_ID" width="50">题号</th>
			<th field="Short_Answer_Questions_Title" width="50">题目</th>
            <th field="Short_Answer_Questions_Type" width="50">类型</th>
		</tr>
	</thead>
</table>
<div id="toolbar">
	<a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="addUser()">出题</a>
	<a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">编辑题目</a>
	<a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="removeUser()">删除题目</a>
   <div id="dlg" class="easyui-dialog" style="width:400px;height:280px;padding:10px 20px"
		closed="true" buttons="#dlg-buttons">
	<div class="ftitle"></div>
	<form id="fm" method="post">	
			<input name="Short_Answer_Questions_ID" type="hidden">
        <div class="fitem">
			<label>题目:</label>
			<input name="Short_Answer_Questions_Title" class="easyui-validatebox" required>
		</div>
		<div class="fitem">
			<label>类型:</label>
			<input name="Short_Answer_Questions_Type" class="easyui-validatebox" required>
		</div>
	</form>
</div>
<div id="dlg-buttons">
	<a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="saveUser()">保存</a>
	<a href="#" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')">取消</a>
    
</div>
</div>
</body>
</html>