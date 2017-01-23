<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/favicon.ico">

    <title>考试系统</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script src="js/index.js"></script>
    <script>
		$(document).ready(function () {
       $('#from').click(function () {
        if ($("input[name='user']").val() == "") {
            alert("用户名不能为空");
            return false;
        }
        else if ($("input[name='pass']").val() == "") {
            alert("密码不能为空");

            return false;
        
        }
        else {
            $.ajax({
                type: "post",
                url: "validate.php",
                async: false,
                data: { user: $("input[name='user']").val(),
                    	pass: $("input[name='pass']").val(),
                },
                success: function (data, status) {
                    var types = data;
                    if (types.toString() != "1") {
                        alert(data);
                    }
                    else{
					
                    window.location.href="Login.php";
                    }
                },
                error: function () { alert("用户名密码验证失败") }
                
            });
        }
    });
});
    </script>
  </head>

  <body>

    <div class="container">

        <div  class="form-signin">
        <h1 class="form-signin-heading">考试系统</h1>
        <label for="inputEmail" class="sr-only">账号</label>
        <input type="text" name="user" id="user" class="form-control" placeholder="账号" required autofocus>
        <label for="inputPassword" class="sr-only">密码</label>
        <input type="password" name="pass" id="pass" class="form-control" placeholder="密码" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> 保存
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" id="from">登录</button>
      </div>
     </div> 
   
  </body>
</html>
