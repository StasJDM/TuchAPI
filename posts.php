<?php

if (isset($_GET["action"])){
	$action=$_GET["action"];
}
if (isset($_GET["id"])){
	$id=$_GET["id"];
}
if (isset($_GET["author_id"])){
	$author_id = $_GET["author_id"];
}
if (isset($_GET["author_name"])){
	$author_name = $_GET["author_name"];
}
if (isset($_GET["author_surname"])){
	$author_surname = $_GET["author_surname"];
}
if (isset($_GET["data_create"])){
	$data_create = $_GET["data_create"];
}
if (isset($_GET["text"])){
	$text = $_GET["text"];
}

mysql_connect($mysql_host, $mysql_user, $mysql_password);
mysql_select_db($mysql_database);
mysql_set_charset('utf8');

if ($action == 'insert'){
	mysql_query("INSERT INTO `users_posts` (`author_id`, `author_name`, `author_surname`, `data_create`, `text`) VALUES ('".$author_id."','".$author_name."','".$author_surname."','".$data_create."','".$text."')");
	print $author_id+" "+$author_name+" "+$author_surname+" "+$date_create;+" "+$text;
}
if ($action == 'select'){
	$q=mysql_query("SELECT * FROM `users_posts` WHERE author_id='".$author_id."'");
	while($e=mysql_fetch_assoc($q))
        	$output[]=$e;
	print(json_encode($output));
}
if($action == 'delete'){}
	#mysql_query("DELETE FROM `users_posts` WHERE id='".$id."'");
mysql_close();
?>