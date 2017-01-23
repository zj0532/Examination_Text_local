<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>阅卷</title>
<link rel="stylesheet" type="text/css" href="css/easyui.css">
	<link rel="stylesheet" type="text/css" href="css/icon.css">
	<link rel="stylesheet" type="text/css" href="css/demo.css">
	<script type="text/javascript" src="js/jquery-1.4.4.min.js"></script>
	<script type="text/javascript" src="js/jquery.easyui.min.js"></script>
	<script type="text/javascript">
		function doSearch(){
			$('#Simple_Table').datagrid('load',{
				Title: $('#Title').val(),
				Name: $('#Name').val()
			});
		}
		function ClickRow(){
			var row = $('#Simple_Table').datagrid('getSelected');
			if(row){
				$('#dlg').dialog('open').dialog('setTitle','New User');
				$('#fm').form('load',row);
				url='Marking_update.php?id='+row.Simple_test_paper_id;
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
						$('#Simple_Table').datagrid('reload');	// reload the user data		
					} else {
						$.messager.show({
							title: 'Error',
							msg: result.msg
						});
					}
				}
			});
		}
	</script>
</head>
<body>
	<div class="demo-info" style="margin-bottom:10px">
		<div class="demo-tip icon-tip">&nbsp;</div>
		
	</div>
	
	<table id="Simple_Table" class="easyui-datagrid" 
			url="Marking_data.php"
			title="简答题" iconCls="icon-search" toolbar="#tb" 
			rownumbers="true" pagination="true" data-options="nowrap:false,singleSelect:true,onClickRow:ClickRow" >
		<thead>
			<tr>
				<th field="Simple_test_paper_id" width="40" align="center">题号</th>
				<th field="Title" width="200" align="center" name="123">题目</th>
				<th field="Answer" width="550" align="center">内容</th>
				<th field="Name" width="80" align="center">答题人</th>
				<th field="Fraction" width="80" align="center">分数</th>
				<th field="Date" width="200" align="center">答题日期</th>
			</tr>
		</thead>
	</table>
	<div id="tb" style="padding:3px">
        <span>题目:</span>
		<input id="Title" style="line-height:26px;border:1px solid #ccc">
		<span>姓名:</span>
		<input id="Name" style="line-height:26px;border:1px solid #ccc">
		<a href="#" class="easyui-linkbutton" plain="true" onclick="doSearch()">查找</a>      
	</div>
    
    <div id="dlg" class="easyui-dialog" style="width:400px;height:480px;padding:10px 20px"
			closed="true" buttons="#dlg-buttons">
		<div class="ftitle" align="center">打分</div>
        <p>--------------------------------------------------------------------</p>
		<form id="fm" method="post" novalidate>
			<div class="fitem">
            	<input name="Simple_test_paper_id" type="hidden"/>
				<p>题目:</p>
				<textarea  name="Title" style="width:300px; height:80px;" disabled="disabled"></textarea>
			</div>
			<div class="fitem">
				<p>内容:</p>
				<textarea name="Answer" style="width:300px; height:150px" disabled="disabled" ></textarea>
			</div>
			<div class="fitem">
            	<br />
				<label>分数:</label>
				<input name="Fraction">
			</div>
		</form>
	</div>
	<div id="dlg-buttons">
		<a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="saveUser()">确定</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')">取消</a>
	</div>
    
</body>
</html>