var url;

$(function(){
	$('#dg').datagrid({
	title:'多选题题目列表',
	url:'Choose_Edit/Choose_List.php',
	toolbar:'#toolbar',
	rownumbers:'true',
	fitColumns:'true', 
	singleSelect:'true',
	pagination:'true', 
    columns:[[    
        {field:'Subject_ID',title:'题号',width:100},
		{field:'Subject_Title',title:'题目',width:100}, 
		{field:'Subject_A',title:'选项A',width:100}, 
		{field:'Subject_B',title:'选项B',width:100}, 
		{field:'Subject_C',title:'选项C',width:100}, 
		{field:'Subject_D',title:'选项D',width:100}, 
		{field:'Subject_Answer',title:'正确答案',width:100},  
		{field:'Type_Job_Name',title:'类型',width:100}, 
    ]]    
});  

	})


function newUser(){
	$('#dlg').dialog('open').dialog('setTitle','添加新题');
	$('#fm').form('clear');
	url = 'Choose_Edit/Choose_Save.php'
}
	
	function editUser(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$('#dlg').dialog('open').dialog('setTitle','编辑多选题');
				$('#fm').form('load',row);
				url = 'Choose_Edit/Choose_Update.php?Subject_ID='+row.Subject_ID+'';
				
			}
		}
		

function saveUser(){
	$('#fm').form('submit',{
		url:url,
		onSubmit: function(){
			return $(this).form('validate');
		},
		success: function(result){
			//alert(result);
			var result = eval('('+result+')');
			if (result.errorMsg){
				$.messager.show({
					title: 'Error',
					msg: result.errorMsg
				});
			} else {
				$('#dlg').dialog('close');		// close the dialog
				$('#dg').datagrid('reload');	// reload the user data
			}
		}
	});
}

function removeUser(){
	var row = $('#dg').datagrid('getSelected');
	if (row){
		$.messager.confirm('删除','确定删除此题吗？',function(r){
			if (r){
				$.post('Choose_Edit/Choose_Delete.php',{Subject_ID:row['Subject_ID']},function(result){
					if (result.success){
						$('#dg').datagrid('reload');	// reload the user data
					} else {
						$.messager.show({	// show error message
							title: 'Error',
							msg: result.errorMsg
						});
					}
				},'json');
			}
		});
	}
}
