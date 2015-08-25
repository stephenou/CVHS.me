<?php

define('DB_HOST', '');
define('DB_USER', '');
define('DB_PASSWORD', '');
define('DB_NAME', '');

if (!mysql_connect(DB_HOST, DB_USER, DB_PASSWORD)) die('Error connecting server.');
if (!mysql_select_db(DB_NAME)) die('Error connecting database.');

$url = $_GET['url'];

mysql_query("INSERT INTO visits (short_url, ip, time) VALUES ('".$url."', '".$_SERVER['REMOTE_ADDR']."', '".time()."')");

$query = mysql_query("SELECT * FROM urls WHERE short_url='".$url."'");

$array = mysql_fetch_array($query);

$url = $array['long_url'];

header('Location: '.$url);

if (!$url) echo 'This short link isn\'t set up yet.';

?>