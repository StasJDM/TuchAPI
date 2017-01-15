<?php


if(isset($_GET["phone"])){
	$phone=$_GET['phone'];
}
if(isset($_GET["password"])){
	$password=$_GET['password'];
}

mysql_connect($mysql_host, $mysql_user, $mysql_password);
mysql_select_db($mysql_database);
mysql_set_charset('utf8');

$q=mysql_query("SELECT `_id`,`password`, `name`, `surname` FROM users WHERE phone = '".$phone."'");
while($e=mysql_fetch_assoc($q))
        $output[]=$e;
print(json_encode($output));

mysql_close();
?> 