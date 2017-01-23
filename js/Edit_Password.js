// JavaScript Document
$(document).ready(function () {
       $('#Post').click(function () {
        if ($("input[name='old_passwd']").val() == "") {
            alert("原密码不能为空");
            return false;
        }
        else if ($("input[name='new_passwd']").val() == "") {
            alert("新密码不能为空");
			return false;
		}
		else if ($("input[name='new_passwd_agent']").val() == "") {
            alert("新密码不能为空");
            return false;
        }
		else if($("input[name='new_passwd']").val()!=$("input[name='new_passwd_agent']").val())
		{
			alert("两次新密码不一致，请重新输入");
			return false;
		}
        else {
            $.ajax({
                type: "post",
                url: "Edit_Password_Data.php",
                async: false,
                data: { old_passwd: $("input[name='old_passwd']").val(),
                    	new_passwd: $("input[name='new_passwd']").val(),
                   		new_passwd_agent: $("input[name='new_passwd_agent']").val()
                },
                success: function (data, status) {
					var types = data;
                    if (types.toString() != "密码修改成功") {
                        alert(data);
                    }
                    else{
					alert(data);
                    window.location.href="Login.php";
                    }
                },
                error: function () { alert("用户名密码验证失败") }
                
            });
        }
    });
});