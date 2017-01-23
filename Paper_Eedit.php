<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>编辑试卷</title>
	<link rel="stylesheet" type="text/css" href="css/easyui.css">
	<link rel="stylesheet" type="text/css" href="css/icon.css">
	<link rel="stylesheet" type="text/css" href="css/demo.css">
    <link rel="stylesheet" type="text/css" href="css/Simple_Admin.css">
    <script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
    <script type="text/javascript" src="js/jquery.easyui.min.js"></script>
    <script type="text/javascript" src="js/Paper_Eedit.js"></script>
</head>
<script>
$(function(){
	
	})
function get(){
	$('#tb_from').show();
	$('#Droplist').combobox({
		valueField:'label',
		textField:'value',
		method:'POST',
		data:[{
			label:'桌面',
			value:'桌面',
			},{
			label:'网络',
			value:'网络',	
			
			}]
		}).combobox('setValue','001')
	
	var row=$('#Paper').datagrid('getChecked');
	var Loop_Num=row.length;
		$('#tb_from').form('clear');
		$('#dialog').dialog({
			title:'生成试卷',
			buttons:[{
				text:'生成试卷',
				handler:function(){
						  var Droplist=$('#Droplist').combobox('getText');
						  $.ajax({
							  type:'POST',
							  async:'false',
							  url:'Paper_Eedit_date.php',
							  data:{subject:row,
							  		Radio_Scores:$('#Radio_Scores').val(),
									Multi_Fraction:$('#Multi_Fraction').val(),
									Simple_Fraction:$('#Simple_Fraction').val(),
									rs:$('#rs').val(),
									Droplist:Droplist,
									Loop_Num:Loop_Num,
									},
							success:function(data){
								$.messager.alert('提示','试卷生成成功！');
								$('#dialog').dialog('close');
								window.location.reload();
								//$('#Paper').datagrid('reload');
								}
							  })
						},
					},{
						text:'取消',
						handler:function(){
							$('#dialog').dialog('close');
							}
						
				}]
			});
}


</script>
<body>
	<table id="Paper">
    	<div id="tb">
        	<a class="easyui-linkbutton" onclick="get()">生成试卷</a>
        </div>
    </table>
    <div id="dialog">
    <form id="tb_from" hidden="true" >	
    		<div>
			<label>单选题分数:</label>
			<input type="text" id="Radio_Scores" name="Radio_Scores" class="easyui-validatebox"  >
			</div>
            <br />
            <div>
            <label>多选题分数:</label>
			<input type="text" id="Multi_Fraction" name="Multi_Fraction" class="easyui-validatebox" >
			</div>
            <br />
            <div>
            <label>简答题分数:</label>
			<input type="text" id="Simple_Fraction" name="Simple_Fraction"  class="easyui-validatebox"  />
			</div>
            <br />
            <div>
            <label>试 卷 名 称:</label>
			<input type="text" id="rs" name="rs"  class="easyui-validatebox"  />
			</div>
            <br />
            <div>
            	<label>题目 类型：</label>
                <input id="Droplist"  name="Droplist" value="桌面" width="200" />
            </div>
    </form>
    </div>
</body>
</html>