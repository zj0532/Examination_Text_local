// JavaScript Document

$(function(){
		$('#dg').datagrid({    
		url:'Set_Test/Set_Test_Data.php',  
		fitColumns:true,
		loadMsg:'加载中，请稍等', 
		rownumbers:true,
		singleSelect:true,
		queryParams: {
		name: 'easyui',
		subject: 'datagrid'
				},
		columns:[[ 
        {field:'Custom_name',title:'试卷名称',width:100,align:'center'},    
        {field:'date',title:'创建时间',width:100,align:'center'},    
        {field:'Status_Init',title:'状态',width:100,align:'center'}    
   		 ]],
		toolbar: [{
					iconCls: 'icon-search',
					text:'查看试卷信息',
		handler: function(){
							var Custom_name=$('#dg').datagrid('getSelected');
							Custom_name=Custom_name.Custom_name;
							console.log(Custom_name);
							$('#Layout_Log').layout('add',{
								region: 'east',
								collapsible:false,
								closable:true,
								title:'查看信息',
								width:800,
								href:"Set_Test/look_details_data.php?name="+Custom_name+"",
							onClose:function(){
							parent.location.reload();
											  }
														})
						  }
				},'-',{
						text:'删除试卷',
						iconCls: 'icon-cancel',
						handler: function(){
						var Custom_name=$('#dg').datagrid('getSelected');
						$.messager.confirm('删除确认','您确认想要删除此试卷吗？',function(r){    
  			 				   if (r){    
       			     			$.ajax({
										type:"post",
										url: "Set_Test/Set_Test_delete.php",
										async: false,
										data: { Custom_name:Custom_name.Custom_name},
										success: function (data, status) { 
												$.messager.alert('提示','删除成功！');
												$('#dg').datagrid('reload');  
									   },
							error: function () { alert("删除失败") }
               							})
   				 						}    
										})  
				 }
					},'-',
				{
					text:'设置为考试试卷',
					iconCls:'icon-tip',
					handler:function()
					{
						var Custom_name=$('#dg').datagrid('getSelected');
						$.messager.confirm('设置','您确认要设置成考试试卷吗？',function(r)
						{
							if(r)
							{
							  $.ajax(
							  {
							  	type:'POST',
								url:'Set_Test/Set_Test_One.php',
								async:'false',
								data:{Custom_name:Custom_name.Custom_name},
								success: function (data, status)
									{
										$.messager.alert('提示',data);
										$('#dg').datagrid('reload');
									},
								error: function () { alert("设置为考试试卷失败！") }
							  })	
							}
						})
					}	
				},'-',
				{
					text:'考试开关',
					iconCls:'filter',
					handler:function()
					{
						$.ajax(
							  {
							  	type:'POST',
								url:'Set_Test/switch.php',
								async:'false',
								success: function (data)
									{
										$.messager.alert('提示',data);
									},
								error: function () { alert("设置为考试试卷失败！") }
							  })
					}
				}]

		
		
		})
})