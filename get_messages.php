<?php


if (isset($_GET["action"])){
	$action = $_GET["action"];
}
if (isset($_GET["author_id"])){
	$author_id = $_GET["author_id"];
}
if (isset($_GET["client_id"])){
	$client_id = $_GET["client_id"];
}

mysql_connect($mysql_host, $mysql_user, $mysql_password);
mysql_select_db($mysql_database);
mysql_set_charset('utf8');

if ($action == 'all_messages') {
	$q=mysql_query("SELECT * FROM `users_dialogues` WHERE author_id='".$author_id."' OR client_id='".$author_id."'");
	while($e=mysql_fetch_assoc($q))
        	$output[]=$e;
	print(json_encode($output));
}
if ($action == 'messages_of_one_dialogue') {
	$q=mysql_query("SELECT * FROM `users_messages` WHERE (author_id='".$author_id."' AND client_id='".$client_id."') OR (author_id='".$client_id."' AND client_id='".$author_id."')");
	while($e=mysql_fetch_assoc($q))
        	$output[]=$e;
	print(json_encode($output));
}

mysql_close();
?>