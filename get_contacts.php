<?php

if (isset($_GET["id"])) {
	$my_id = $_GET["id"];
}
if (isset($_GET["action"])) {
	$action = $_GET["action"];
}
if (isset($_GET["contact_1_id"])) {
	$contact_1_id = $_GET["contact_1_id"];
}
if (isset($_GET["contact_2_id"])) {
	$contact_2_id = $_GET["contact_2_id"];
}
if (isset($_GET["contact_1_name"])) {
	$contact_1_name = $_GET["contact_1_name"];
}
if (isset($_GET["contact_2_name"])) {
	$contact_2_name = $_GET["contact_2_name"];
}
if (isset($_GET["type"])) {
	$type = $_GET["type"];
}


mysql_connect($mysql_host, $mysql_user, $mysql_password);
mysql_select_db($mysql_database);
mysql_set_charset('utf8');


if ($my_id != ''){
	if ($action == 'get_contacts') {
		$q = mysql_query("SELECT * FROM `contacts` WHERE contact_1_id = '".$my_id."' OR contact_2_id = '".$my_id."'");
			while($e=mysql_fetch_assoc($q))
        			$output[]=$e;
			print(json_encode($output));
	}
}
if ($action == 'new_contacts') {
	$q = mysql_query("INSERT INTO `contacts`(`contact_1_id`, `contact_2_id`, `contact_1_name_surname`, `contact_2_name_surname`, `type`) VALUES ('".$contact_1_id."', '".$contact_2_id."', '".$contact_1_name."','".$contact_2_name."', '".$type."' )");
}
if ($action == 'get_new_contacts') {
	$q = mysql_query("SELECT `new_friend` FROM `chat` WHERE `_id` = '".$id."");
	while($e=mysql_fetch_assoc($q))
       		$output[]=$e;
	print(json_encode($output));
}
mysql_close();
?>