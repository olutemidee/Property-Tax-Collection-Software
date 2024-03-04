<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_amac_connection = "localhost";
$database_amac_connection = "amac";
$username_amac_connection = "tenement-rate";
$password_amac_connection = "admin1234";
$amac_connection = mysql_pconnect($hostname_amac_connection, $username_amac_connection, $password_amac_connection) or trigger_error(mysql_error(),E_USER_ERROR); 
?>