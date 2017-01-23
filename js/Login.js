$(function(){
	$('#Layout_Log').layout();
	$('#accordion_info').accordion({
		fit:true
		});
	$('#center').panel();
	
	});
	
function Test(){
	$("#center").load("Network_Test_Paper.php");
	
};

function Approval(){
			$("#center").load("Marking.php");
			};
			
function Simple(){
			$("#center").load("Simple_Admin.php");
	};
		
function paper(){
		$('#center').load("Paper_Eedit.php");
	};

function Inf(){
		$('#center').load("Examination_Info.php");
	};

function Edit_Password(){
		$('#center').load("Edit_Password.php");
	};
function Set_Test(){
		$('#center').load("Set_Test/Set_Test.php");
	};

