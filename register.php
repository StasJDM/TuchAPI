<?php


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

mysql_query("INSERT INTO `users` (`phone`, `password`, `name`, `surname`, `sex`) VALUES ('".$phone."','".$password."','".$name."','".$surname."','".$sex."')");

mysql_close();

?>