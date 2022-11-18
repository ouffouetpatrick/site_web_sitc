<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_sitc = "localhost";
$database_sitc = "datacollector_db";
$username_sitc = "root";
$password_sitc = "";
$sitc = mysql_pconnect($hostname_sitc, $username_sitc, $password_sitc) or trigger_error(mysql_error(),E_USER_ERROR); 
?>