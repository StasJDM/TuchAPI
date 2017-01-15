<?php


if (isset($_GET["action"])) {
	$action = $_GET['action'];
}
if (isset($_GET["phone"])){
	$phone=$_GET['phone'];
}
if (isset($_GET["id"])){
	$id = $_GET['id'];
}

mysql_connect($mysql_host, $mysql_user, $mysql_password);
mysql_select_db($mysql_database);
mysql_set_charset('utf8');

if($action == 'select_from_phone') {
	$q=mysql_query("SELECT `name`, `surname` FROM users WHERE phone = '".$phone."'");
	while($e=mysql_fetch_assoc($q))
        	$output[]=$e;
	print(json_encode($output));
}

if($action == 'select_from_id') {
	$q=mysql_query("SELECT `name`, `surname` FROM users WHERE `_id` = '".$id."'");
	while($e=mysql_fetch_assoc($q))
        	$output[]=$e;
	print(json_encode($output));
}

mysql_close();
?> 