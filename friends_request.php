<?php


if (isset($_POST["id"])) {
	$my_id = $_POST["id"];
}
if (isset($_POST["action"])) {
	$action = $_POST["action"];
}
if (isset($_POST["contact_1_id"])) {
	$contact_1_id = $_POST["contact_1_id"];
}
if (isset($_POST["contact_2_id"])) {
	$contact_2_id = $_POST["contact_2_id"];
}
if (isset($_POST["contact_1_name"])) {
	$contact_1_name = $_POST["contact_1_name"];
}
if (isset($_POST["contact_2_name"])) {
	$contact_2_name = $_POST["contact_2_name"];
}
if (isset($_POST["type"])) {
	$type = $_POST["type"];
}

mysql_connect($mysql_host, $mysql_user, $mysql_password);
mysql_select_db($mysql_database);
mysql_set_charset('utf8');


if ($action == 'new_contact_0') {
	$q = mysql_query("INSERT INTO `users_contacts`(`contact_1_id`, `contact_2_id`, `contact_1_name_surname`, `contact_2_name_surname`, `type`) VALUES ('".$contact_1_id."', '".$contact_2_id."', '".$contact_1_name."','".$contact_2_name."', '".$type."' )");
	$q = mysql_query("UPDATE `users` SET `new_friend`=`new_friend`+1 WHERE `_id` = '".$contact_2_id."'");
}
if ($action == 'new_contact_1') {
	$q = mysql_query("UPDATE `users_contacts` SET `type`='1' WHERE (`contact_1_id`='".$contact_1_id."' AND `contact_2_id`='".$contact_2_id."')OR(`contact_1_id`='".$contact_1_id."' AND `contact_2_id`='".$contact_2_id."') )");
	$q = mysql_query("UPDATE `users` SET `new_friend`=`new_friend`-1 WHERE `_id` = '".$contact_2_id."'");
}
if ($action == 'new_contact_2') {
	$q = mysql_query("UPDATE `users_contacts` SET `type`='2' WHERE (`contact_1_id`='".$contact_1_id."' AND `contact_2_id`='".$contact_2_id."')OR(`contact_1_id`='".$contact_1_id."' AND `contact_2_id`='".$contact_2_id."') )");
	$q = mysql_query("UPDATE `users` SET `new_friend`=`new_friend`-1 WHERE `_id` = '".$contact_2_id."'");
}

mysql_close();
?>