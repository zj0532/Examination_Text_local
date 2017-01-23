// JavaScript Document
$(function(){
	$('#Paper').datagrid({
		url:'Paper_Data.php',
		loadMsg:"正在加载",
		pagination:true,
		rownumbers:true,
		ctrlSelect:true,
		fitColumns:true,
		toolbar:'#tb',
		columns:[[    
        {field:'Subject_ID',title:'题号',width:50,checkbox:true},    
        {field:'Subject_Title',title:'题目',width:100,align:'center'},    
        {field:'Subject_A',title:'选项A',width:100,align:'center'},
		{field:'Subject_B',title:'选项B',width:100,align:'center'},
		{field:'Subject_C',title:'选项C',width:100,align:'center'},
		{field:'Subject_D',title:'选项D',width:100,align:'center'}, 
		{field:'Subject_Answer',title:'答案',width:100,align:'center'}, 
    ]]    
	})
	}) 

