<?php

if(isset($_GET["word_1"])){
	$word_1=$_GET['word_1'];
}
if(isset($_GET["word_2"])){
	$word_2 = $_GET['word_2'];
}

mysql_connect($mysql_host, $mysql_user, $mysql_password);
mysql_select_db($mysql_database);
mysql_set_charset('utf8');

if($word_1!=null && $word_2!=null){
	$q=mysql_query("SELECT `_id`, `name`, `surname` FROM `chat` WHERE (`name` = '".$word_1."' AND `surname`='".$word_2."' ) OR (`name` = '".$word_2."' AND `surname`='".$word_1."' )");
	while($e=mysql_fetch_assoc($q))
        	$output[]=$e;
	print(json_encode($output));
}
if($word_1!=null && $word_2==null){
	$q=mysql_query("SELECT `_id`, `name`, `surname` FROM `chat` WHERE `name` = '".$word_1."' OR surname='".$word_1."'");
	while($e=mysql_fetch_assoc($q))
        	$output[]=$e;
	print(json_encode($output));
}

mysql_close();
?> 