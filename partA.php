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
echo 'Connected to mysql on ' . DB_HOST . "\n";
if (!mysql_select_db(DB_NAME, $dbconn)) {
	echo 'Could not use database ' . DB_NAME . "\n";
	echo mysql_error() . "\n";
exit;
}
echo 'Connected to database ' . DB_NAME . "\n";
?>


		<form action="" method="post" name="registerform">
        	<table width="100%">
          	<tr><td>Wine Name:</td><td> <input class="text" name="winename" type="text"  /></td></tr>
          	<tr><td>Winery Name:</td><td> <input class="text" name="wineryname" type="text"  /></td></tr>

</body>
</head>
</html>

