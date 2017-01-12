<?php

if (isset($_GET["blog_post_text"])){
	$blog_posts_text = $_GET["blog_posts_text"];
}

mysql_connect($mysql_host, $mysql_user, $mysql_password);
mysql_select_db($mysql_database);
mysql_set_charset('utf8');


$q = mysql_query("SELECT * FROM `tuch_blog` WHERE 1");

mysql_close();
?>