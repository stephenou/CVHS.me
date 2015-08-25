<?php

define('DB_HOST', '');
define('DB_USER', '');
define('DB_PASSWORD', '');
define('DB_NAME', '');

if (!mysql_connect(DB_HOST, DB_USER, DB_PASSWORD)) die('Error connecting server.');
if (!mysql_select_db(DB_NAME)) die('Error connecting database.');

$url = $_GET['url'];

mysql_query("INSERT INTO visits (short_url, ip, time) VALUES ('', '".$_SERVER['REMOTE_ADDR']."', '".time()."')");

$query = mysql_query("SELECT * FROM urls WHERE type='0' ORDER BY name");

$past = '';
$echo = '';
$array = array();

while ($row = mysql_fetch_assoc($query)) {
	$current = substr($row['name'], 0, 1);
	$link = '';
	if ($current != $past) {
		$past = $current;
		$link = $current;
		array_push($array, $current);
	}
	$echo .= '<tr><td class="letter"><a name="'.$link.'">'.$link.'</a></td><td class="name"><a href="http://cvhs.me/'.$row['short_url'].'">'.$row['name'].'</a></td><td class="url"><input onclick="this.select();" type="text" value="http://cvhs.me/'.$row['short_url'].'" /></td></tr>';
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
table .letter {
	width: 50px;
}
table .name {
	width: 200px;
}
table input {
	font-size: 10pt;
	padding: 3px 4px;
	border: #AAAAAA 1px solid;
	width: 250px;
	background: #F9F9F9;
}
</style>
</head>
<body>
<center>
<div class="container">
<h1>CVHS Link Shortener</h1>
<p>A URL shortener for <a href="http://castrovalleyhigh.org/">Castro Valley High School</a>'s teacher websites. Created by <a href="http://stephenou.com">Stephen Ou</a>.</p>
<p><b>Why should you use it?</b></p>
<p class="small">It's hard to go to a teacher's webpage through <a href="http://castrovalleyhigh.org/">the school website</a>. You have to find the department, the teacher, and the period before you arrive, which <b>takes 20 seconds</b>. I made it <b>4 times faster</b> by letting you to type in a short URL like <a href="http://cvhs.me/goldstein">http://cvhs.me/goldstein</a> or find in the list below.</p>
<p class="small">PS: Shout-out to <a href="http://www.facebook.com/whaddupitsyoungant">Anthony Wong</a> for helping out on the site!</p>
<h2>Teacher's URL list:</h2>
<p>
<?php
foreach ($array as $row) {
	echo '<a href="#'.$row.'">'.$row.'</a> | ';
}
?>
</p>
<table>
<?php echo $echo; ?>
</table>
<p>More coming!</p>
<h2>Donate:</h2>
<p>It takes money to buy <a href="http://en.wikipedia.org/wiki/Server_(computing)">servers</a>. Any donation from staff, parents and students are appreciated.</p>
<p>10 bucks donation (via PayPal). You probably spend more at <a href="http://www.starbucks.com/" target="_blank">Starbucks</a> each month.</p>
<p>Have questions? <a href="mailto:me@stephenou.com">Email Stephen Ou</a>, the creator of cvhs.me.</p>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<center>
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="T3RJ68QBLDFKA">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</center>
</form>
<!--
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="V63NHWDLV8V2C">
<table>
<tr><td class="name"><input type="hidden" name="on0" value="Donation Amount">Donation amount</td><td><select name="os0">
	<option value="S Donation">S Donation: $1.00 monthly</option>
	<option value="M Donation">M Donation: $2.00 monthly</option>
	<option value="L Donation">L Donation: $5.00 monthly</option>
	<option value="XL Donation">XL Donation: $10.00 monthly</option>
</select> </td></tr>
<tr><td class="name"><input type="hidden" name="on1" value="Mind to leave your name?">Mind to leave your name?</td><td><input type="text" name="os1" maxlength="200"></td></tr>
</table>
<div style="text-align:center;width:400px;margin-top:25px;">
<input type="hidden" name="currency_code" value="USD">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</div>
</form>
-->
</div>
<a style="position:absolute;left:0px;" href="http://cvhs.me/goldstein"><img src="DrEvil.jpg" title="Mr. Goldstein, thanks for giving cvhs.me so much support. This is the credit for you!" alt="" width="10" height="10" border="0" /></a>
</center>
</body>
</html>
<!-- Find a long-handle gardening tool in H&R Block. -->