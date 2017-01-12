<?php

if(isset($_GET["id"])){
	$id=$_GET['id'];
}
if(isset($_GET["phone"])){
	$phone=$_GET['phone'];
}
if(isset($_GET["password"])){
	$password=$_GET['password'];
}
if(isset($_GET["name"])){
	$name=$_GET['name'];
}
if(isset($_GET["surname"])){
	$surname=$_GET['surname'];
}
if(isset($_GET["sex"])){
	$sex=$_GET['sex'];
}

mysql_connect($mysql_host, $mysql_user, $mysql_password);
mysql_select_db($mysql_database);
mysql_set_charset('utf8');

/*$q = mysql_query("SELECT `author_id` FROM `users_dialogs` WHERE (author_id='".$author_id."' AND client_id='".$client_id."') OR (author_id='".$client_id."' AND client_id='".$author_id."')");
while($e=mysql_fetch_assoc($q))
        $output[]=$e;
$author = $output[0]['author_id'];
echo ' Author Id: '.$author;*/

$q=mysql_query("SELECT * FROM chat WHERE `_id` = '".$id."'");
while($e=mysql_fetch_assoc($q))
        $output[]=$e;
$new_password = $output[0]['password'];
$new_name = $output[0]['name'];
$new_surname = $output[0]['surname'];
$new_sex = $output[0]['sex'];
if(isset($password)){
	if($password!=null){
		$new_password=$password;
	}
}
if(isset($name)){
	if($name!=null){
		$name=$name;
	}
}
if(isset($surname)){
	if($surname!=null){
		$new_surname=$surname;
	}
}
if(isset($sex)){
	if($sex!=null){
		$new_sex=$sex;
	}
}

//mysql_query("UPDATE `chat` SET `password` = '".$new_password."', `name` = '".$new_name."', `surname` = '".$new_surname."', `sex` = '".$new_sex."' WHERE _id ='".$id."'");
mysql_query("UPDATE `chat` SET `password` = '".$new_password."', `name` = '".$new_name."', `surname` = '".$new_surname."', `sex` = '".$new_sex."' WHERE _id ='".$id."'");

mysql_close();

?>