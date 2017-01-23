<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_examination = "127.0.0.1";
$database_examination = "examination";
$username_examination = "root";
$password_examination = "root";
$examination = mysql_pconnect($hostname_examination, $username_examination, $password_examination) or trigger_error(mysql_error(),E_USER_ERROR); 
?>