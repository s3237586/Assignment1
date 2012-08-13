<html>
<head>
<title>WDA Assignment Part A</title>
<body>	
<?php
require_once('db.php');
if (!$dbconn = mysql_connect(DB_HOST, DB_USER, DB_PW)) {
	echo 'Could not connect to mysql on ' . DB_HOST . "\n";
	exit;
}
//echo 'Connected to mysql on ' . DB_HOST . "\n";
if (!mysql_select_db(DB_NAME, $dbconn)) {
	echo 'Could not use database ' . DB_NAME . "\n";
	echo mysql_error() . "\n";
exit;
}
$wineName = $_GET['winename'];
$wineryName = $_GET['wineryname'];
$regionName = $_GET['region'];
$grapev = $_GET['grape_v'];
$year = $_GET['years'];

?>
</body>
</head>
</html>
