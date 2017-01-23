$(function(){
	$('#btn').linkbutton(
	{
		text:'交卷',
		onClick:function()
		{
			
			$('#ff').form('submit',{    
			url:'Assignment.php',    
			onSubmit: function()
			{
				for(var i=1;i<100;i++)
				{
					if($('#'+i+'').val())
					{
						var radio=$("input:radio[id="+i+"]:checked").val();
						var checkbox=$("input:checkbox[id="+i+"]:checked").val();
							if(radio==null)
							{
								if(checkbox==null)
								{
									alert('您的第'+i+'题没有选中');
									return false;
								}
							}
					}
				}
				
			},
		
			     
			   
			success:function(data){    
			$.messager.alert('考试成绩',data);
			
			//$("#center").load("Examination_Info.php");
				}
			  
			});	

		}	
	})
	
		   
})
