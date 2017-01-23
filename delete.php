<?php require_once('Connections/examination.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

if ((isset($_GET['id'])) && ($_GET['id'] != "")) {
  $deleteSQL = sprintf("DELETE FROM personnel_management WHERE id=%s",
                       GetSQLValueString($_GET['id'], "int"));

  mysql_select_db($database_examination, $examination);
  $Result1 = mysql_query($deleteSQL, $examination) or die(mysql_error());

  $deleteGoTo = "executive_director.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}

$colname_Recordset1 = "-1";
if (isset($_GET['id'])) {
  $colname_Recordset1 = $_GET['id'];
}
mysql_select_db($database_examination, $examination);
$query_Recordset1 = sprintf("SELECT * FROM personnel_management WHERE id = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $examination) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title></title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta name="generator" content="" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
<link href="css/haiersoft.css" rel="stylesheet" type="text/css" media="screen,print" />
<link href="css/print.css" rel="stylesheet" type="text/css"  media="print" />
<script src="js/jquery-1.10.1.min.js"></script>
<script src="js/side.js" type="text/javascript"></script>
<!--[if lt IE 9]>
<script src="js/html5.js"></script>
<![endif]-->
<style>
#one{
	text-align:center;
	border:0;
}
h2{
	text-align:center;
	letter-spacing:5px;
}
input{
	text-align:center;
	border: none;
    margin-bottom: 22px;
	background-color:transparent;
}    

</style>
</head>

<body>
<div class="wrap_left" id="frmTitle" name="fmTitle">
<div id="Logo">
  <blockquote>
    <p><span></span></p>
  </blockquote>
</div>
<div class="menu_list">
<dl>
<dt>人员管理</dt>
<dt>试题管理</dt>
<dt>成绩查询</dt>
<dt>修改密码</dt>
</dl>
</div>

</div>


<div class="picBox" onclick="switchSysBar()" id="switchPoint"></div>




<div class="wrap_right">
<header>

<div id="Header">

<div id="Head">
<h1>考试后台管理系统</h1>
<script language="javascript">
function showmenu(id){id.style.visibility = "visible";}
function hidmenu(){UserList.style.visibility = "hidden";}
document.onclick = hidmenu;

</script>
<div class="user"><a href="javascript:showmenu(UserList)"><?php session_start();echo $_SESSION['username']; ?></a>
<div id="UserList"><a href="">修改</a>
<a href="">注销</a>
<a href="">退出</a></div>
</div>
</div>
<nav>

</nav>
</div>
<!-- /Header -->
</header>


<!-- Contents -->
<dl class="select" style="width:200px;">
  
</dl>

  <div id="Contents">
    <script type="text/javascript">
$(function(){
$(".select").each(function(){
var s=$(this);
var z=parseInt(s.css("z-index"));
var dt=$(this).children("dt");
var dd=$(this).children("dd");
var _show=function(){dd.slideDown(200);dt.addClass("cur");s.css("z-index",z+1);};
var _hide=function(){dd.slideUp(200);dt.removeClass("cur");s.css("z-index",z);};
dt.click(function(){dd.is(":hidden")?_show():_hide();});
dd.find("a").click(function(){dt.html($(this).html());_hide();});
$("body").click(function(i){ !$(i.target).parents(".select").first().is(s) ? _hide():"";});})})
</script>
    <!-- TopMain -->
    <div id="TopMain">
      
      <!-- MainForm -->
      <div id="MainForm">
        <div class="form_boxA">
          <h1>修改信息</h1>
          <form name="form" method="POST" >
            <table cellpadding="0" cellspacing="0">
              <tr>
                <th>编号</th>
                <th>姓名</th>
                <th>职位</th>
                <th>操作</th>
              </tr>
              <tr>
                <th><input name="id" type="text" id="id" value="<?php echo $row_Recordset1['id']; ?>" readonly="readonly" /></th>
                <th><input name="name" type="text" id="name" value="<?php echo $row_Recordset1['name']; ?>" /></th>
                <th><input name="position" type="text" id="position" value="<?php echo $row_Recordset1['position']; ?>" /></th>
                <th><input type="submit" value="修改" />|<a href="delete.php?id=<?php echo $row_Recordset1['id']; ?>">删除</a></th>
              </tr>
              <tr>
           
              </tr>
            </table>
          </form>
        </div>            
      </div>
</div>
    
    <footer>
      <address>
      	电子邮箱：liantong@haiersoft.com  技术支持：联通海尔项目组<br> 
      	Copyright &copy; 2016 Haiersoft Corporation, All Rights.
      </address>
    </footer>
  </div>

<!-- /wrap_right -->
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>

