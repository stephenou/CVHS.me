<?php

define('DB_HOST', '');
define('DB_USER', '');
define('DB_PASSWORD', '');
define('DB_NAME', '');

if (!mysql_connect(DB_HOST, DB_USER, DB_PASSWORD)) die('Error connecting server.');
if (!mysql_select_db(DB_NAME)) die('Error connecting database.');

mysql_query("INSERT INTO visits (short_url, ip, time) VALUES ('add.php', '".$_SERVER['REMOTE_ADDR']."', '".time()."')");

if (isset($_POST['submit'])) {
	if (empty($_POST['long_url'])) {
		$message = 'Your long URL is empty.';
	} elseif (empty($_POST['short_url'])) {
		$message = 'Your short URL is empty.';
	} elseif (empty($_POST['name'])) {
		$message = 'Your description is empty.';
	} elseif (!preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $_POST['long_url'])) {
		$message = 'This long URL is invalid.';
	} elseif (mysql_num_rows(mysql_query("SELECT * FROM urls WHERE short_url='".$_POST['short_url']."'")) == 1) {
		$message = 'This short URL has been taken.';
	} else {
		mysql_query("INSERT INTO urls (long_url, short_url, type, name) VALUES ('".$_POST['long_url']."', '".$_POST['short_url']."', '0', '".$_POST['name']."')");
		$message = 'URL added.';
	}
} else {
	$message = '';
}

?>

<!-- Heya, Stephen wrote all of these. Enjoy! -->
<html>
<head>
<title>Castro Valley High School Link Shortener</title>
<style type="text/css">
body {
	width: 99%;
	background-color: #F9F9F9;
	font-family: Georgia, Arial, sans-serif;
}
.container {
	width: 680px;
	background-color: #FFFFFF;
	-moz-box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.5);
	-webkit-box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.5);
	margin: 30px 0px;
	padding: 15px 30px;
	text-align: left;
}
h2 {
	border-top: 1px #CCCCCC solid;
	padding-top: 15px;
}
p.small {
	font-size: 10pt;
	line-height: 15pt;
}
form {
	margin-top: 30px;
}
table .left {
	width: 200px;
	text-align: center;
	margin: 8px 0px;
}
table input {
	font-size: 10pt;
	padding: 5px 5px;
	border: #AAAAAA 1px solid;
	width: 400px;
	background: #F9F9F9;
	margin: 8px 0px;
}
</style>
</head>
<body>
<center>
<div class="container">
<h1>CVHS Link Shortener - Add a New URL</h1>
<center><?=$message?></center>
<form action="add.php" method="post">
<table>
<tr>
<td class="left">Long URL:</td>
<td><input name="long_url" type="text" /></td>
</tr>
<tr>
<td class="left">Short URL:</td>
<td><input name="short_url" type="text" /></td>
</tr>
<tr>
<td class="left">Description:</td>
<td><input name="name" type="text" /></td>
</tr>
</table>
<br />
<center><input name="submit" type="submit" value="Submit" /></center>
</form>
</div>
</center>
</body>
</html>
<!-- Find a long-handle gardening tool in H&R Block. -->