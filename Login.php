<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php 
	session_start();
	if(isset($_SESSION['username']))
	{ 	}
	else{header("Location:index.php");}
	include("config.php");
	$name=$_SESSION['username'];
	$sql=mysqli_query($conn,"select Job from user where name='$name' and Stauts='在职'");
	$lv=mysqli_fetch_array($sql);
?>
<title>主界面</title>
	<link rel="stylesheet" type="text/css" href="css/easyui.css">
	<link rel="stylesheet" type="text/css" href="css/icon.css">
	<link rel="stylesheet" type="text/css" href="css/demo.css">
    <link rel="stylesheet" type="text/css" href="css/Login.css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.easyui.min.js"></script>
    <script type="text/javascript" src="js/Login.js"></script>
 	
<style>
#Welcome{
	float:right;
	color:#FFF;
	text-align:right;
		}
#Top_Pic{
	background:url(img/bei_jing.jpg);
	}
#Title_Top{
	text-align:center;
	font-size:24px;
		}
a.abc{text-decoration:none;
	color:#FFF;}
</style>
<script>
	function Choose_Edit(){
		$('#center').load("Choose_Edit/Choose_Edit.php");
	};
</script>
<body id="Layout_Log" >    
    <div id="Top_Pic" data-options="region:'north'" style="height:50px;"><div id="Title_Top">考试系统</div><div id="Welcome">欢迎您，<?php echo $name  ?>,
    <a href="index.php" class="abc">点击注销</a></div></div>   
    <div data-options="region:'south',split:true" style="height:100px;"></div>
    
    <div data-options="region:'west',title:'导航菜单',split:true" style="width:120px;">
    	<div id="accordion_info">
        	<div title="考试信息">
            	<div class="Look"><a href="#" onclick="Inf()" >查看成绩</a></div><br />
                <div class="Look"><a href="#" onclick="Test()">参加考试</a></div><br />
            </div>
            <div title="管理设置">
            	<div class="Look"><a href="#" onclick="Edit_Password()">修改密码</a></div><br />
            <?php 
				if($lv[0]<3)
				{
					echo "
				<div class='Look'><a href='#' onclick='Approval();'>审批简答</a></div><br />
                <div class='Look'><a href='#'>编辑单选</a></div><br />
                <div class='Look'><a href='#' onclick='Choose_Edit()'>编辑多选</a></div><br />
                <div class='Look'><a href='#' onclick='Simple()'>编辑简答</a></div><br />
                <div class='Look'><a href='#' onclick='paper()'>编辑试卷</a></div><br />
				<div class='Look'><a href='#' onclick='Set_Test()'>设置试卷</a></div><br />";
				}
			?>
                
            </div>
         </div>
        </div>  
    <div data-options="region:'center'" style="padding:5px;background:#eee;">
   
    	<div id="progressbar"></div>
        <div id="center"></div>
    </div>
 	<div id="looka"></div>
    
   
</body> 
</html>
