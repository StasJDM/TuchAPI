<?php


if (isset($_GET["author_id"])) {
	$author_id = $_GET["author_id"];
}
if (isset($_GET["client_id"])) {
	$client_id = $_GET["client_id"];
}

mysql_connect($mysql_host, $mysql_user, $mysql_password);
mysql_select_db($mysql_database);
mysql_set_charset('utf8');

$q=mysql_query("SELECT `id`, `author_id` FROM `users_dialogues` WHERE (author_id='".$author_id."' AND client_id='".$client_id."') OR (author_id='".$client_id."' AND client_id='".$author_id."')");
while($e=mysql_fetch_assoc($q))
        $output[]=$e;
$id = $output[0]['id'];
$author_id_old = $output[0]['author_id'];
if ($author_id_old==$author_id) {
	mysql_query("UPDATE `users_dialogues` SET `is_read_1`='0' WHERE `id`='".$id."'");
} else if (($author_id_old!=$author_id)&&($author_id_old!='')) {
	mysql_query("UPDATE `users_dialogues` SET `is_read_2`='0' WHERE `id`='".$id."'");
}
mysql_close();
?>