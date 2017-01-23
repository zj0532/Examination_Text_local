$(function(){
	$('#Examination_Info').datagrid({
		url:'Examination_Info_data.php',
		fitColumns:true,
		singleSelect:'true',
		sortName:'Total',
		sortOrder:'desc',
		rownumbers:true,
		columns:[[
		{field:'Result_ID',hidden:true},  
        {field:'Name',title:'姓名',width:100,align:'center',sortable:true},    
        {field:'Radio_Results',title:'单选题得分',width:100,align:'center',sortable:true},    
        {field:'Multiselect_Results',title:'多选题得分',width:100,align:'center',sortable:true},
		{field:'Simple_Results',title:'简答题得分',width:100,align:'center',sortable:true},
		{field:'Total',title:'总分',width:100,align:'center',sortable:true},
		{field:'Result_Date',title:'考试日期',width:300,align:'center',sortable:true}   
    ]],  
		toolbar: [{
		text:'删除成绩',
		iconCls: 'icon-cancel',
		handler: function(){
			var row = $('#Examination_Info').datagrid('getSelected');
			if (row){
				$.messager.confirm('删除','确认删除此题吗？',function(r){
					if (r){
						$.post('Examination_Info_data_delect.php',{Result_ID:row.Result_ID},function(result){
							if (result.success){
								$('#Examination_Info').datagrid('reload');	// reload the user data
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
	}]
	
		});
		 
	});