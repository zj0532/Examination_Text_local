<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改密码</title>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/Edit_Password.js"></script>
</head>
<?php
	session_start();
	if(isset($_SESSION['username']))
	{ 	}
	else{header("Location:index.php");}
?>
<body>
</body>
	<h1 align="center">修改密码</h1>
	<div >
    <div align="center"><label>原 密 码：</label><input type="text" id="old_passwd" name="old_passwd" /></div><br />
    <div align="center"><label>新 密 码：</label><input type="text"  id="new_passwd" name="new_passwd"/></div><br />
    <div align="center"><label>再次输入新密码：</label><input type="text"  id="new_passwd_agent" name="new_passwd_agent"/></div><br />
    <div align="center"><input type="submit" id="Post" value="确定修改" /></div>
    </div>
</html>