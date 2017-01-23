var url;

$(function(){
	$('#dg').datagrid({    
    url:'datagrid_data.json',
	title:'简答题题目列表',
	url:'Simple_Answer_List.php',
	toolbar:'#toolbar',
	rownumbers:'true',
	fitColumns:'true', 
	singleSelect:'true', 
    columns:[[    
        {field:'Subject_ID',title:'题号',width:100},
		{field:'Subject_Title',title:'题目',width:100},  
		{field:'Type_Job_Name',title:'类型',width:100},  
    ]]    
});  

	})


function newUser(){
	$('#dlg').dialog('open').dialog('setTitle','添加新题');
	$('#fm').form('clear');
	url = 'save_subject.php';
}
	
	function editUser(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$('#dlg').dialog('open').dialog('setTitle','编辑简答题');
				$('#fm').form('load',row);
				url = 'update_subject.php?Subject_ID=row.Subject_ID';
			}
		}
		

function saveUser(){
	$('#fm').form('submit',{
		url:url,
		onSubmit: function(){
			return $(this).form('validate');
		},
		success: function(result){
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
				$.post('remove_subject.php',{Subject_ID:row['Subject_ID']},function(result){
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
