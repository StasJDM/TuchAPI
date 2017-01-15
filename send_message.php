<?php


if (isset($_POST["author_id"])) {
	$author_id = $_POST["author_id"];
}
if (isset($_POST["client_id"])) {
	$client_id = $_POST["client_id"];
}
if (isset($_POST["author_name"])) {
	$author_name = $_POST["author_name"];
}
if (isset($_POST["client_name"])) {
	$client_name = $_POST["client_name"];
}
if (isset($_POST["type"])) {
	$type = $_POST["type"];
}
if (isset($_POST["text"])) {
	$text = $_POST["text"];
}
if (isset($_POST["sticker_id"])) {
	$sticker_id = $_POST["sticker_id"];
}

mysql_connect($mysql_host, $mysql_user, $mysql_password);
mysql_select_db($mysql_database);
mysql_set_charset('utf-8');

$isread = 0;
$name = '';
$time = date("Y-m-d H:i:s");


$q = mysql_query("SELECT `author_id` FROM `users_dialogs` WHERE (author_id='".$author_id."' AND client_id='".$client_id."') OR (author_id='".$client_id."' AND client_id='".$author_id."')");
while($e=mysql_fetch_assoc($q))
        $output[]=$e;
$author = $output[0]['author_id'];

if($author == null)
{
	mysql_query(" INSERT INTO `users_dialogs` (`author_id`, `client_id`, `author_name`, `client_name`, `type`, `name`, `last_message`, `last_message_time`, `is_read_1`, `is_read_2`) VALUES ('".$author_id."', '".$client_id."', '".$author_name."', '".$client_name."', '".$type."', '".$name."', '".$text."', '".$time."', '0', '1') ");
} else {
	mysql_query("UPDATE `users_dialogs` SET `last_message`='".$text."', `last_message_time`='".$time."', `is_read_2`=`is_read_2`+1, `author_id`='".$author_id."', `client_id`='".$client_id."', `author_name`='".$author_name."', `client_name`='".$client_name."' WHERE (author_id='".$author_id."' AND client_id='".$client_id."') OR (author_id='".$client_id."' AND client_id='".$author_id."')");
}

mysql_query("INSERT INTO `users_messages`(`author_id`, `client_id`, `isread`, `time`, `text`, `sticker_id`) VALUES ('".$author_id."', '".$client_id."', '".$isread."', '".$time."', '".$text."', '".$sticker_id."')");


mysql_close();
?>