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
//echo 'Connected to database ' . DB_NAME . "\n";
    echo "<h2>Wine Search Page</h2>";
    echo "<form action='results.php' method='GET' name='wineryform'>";
    echo "<table width='100%'>";
    echo "<tr><td>Wine Name:</td><td> <input class='text' name='winename' type='text'  /></td></tr>";
    echo "<tr><td>Winery Name:</td><td> <input class='text' name='wineryname' type='text'  /></td></tr>";

	$region = mysql_query("SELECT * FROM region");
	echo "<tr><td>Region ";
	echo "<select name='region'>";
	while($row = mysql_fetch_array($region))
  	{
	echo "<option value='" .$row['region_name'] . "'>" .$row['region_name'] ."</option>";	
 	// echo $row['region_id'] . " " . $row['region_name'];
 	// echo "\n";
  	}
	echo "</select></td></tr>";
	
	$grape_v = mysql_query("SELECT * FROM grape_variety");
	echo "<tr><td>Grape Variety: ";
	echo "<select name='grape_v'>";
	while($row = mysql_fetch_array($grape_v))
  	{
	echo "<option value='" .$row['variety'] . "'>" .$row['variety'] ."</option>";
	// echo $row['variety_id'] . " " . $row['variety'];
 	// echo "\n";
  	}
	echo "</select></td></tr>";    
	
	$years = mysql_query("SELECT DISTINCT year from wine ORDER BY year ASC");
	echo "<tr><td>Year: ";
	echo "<select name='years'>";
	while($row = mysql_fetch_array($years))
	{
	echo "<option value='" .$row['year'] . "'>" .$row['year'] ."</option>";
	}
	echo "</select></td></tr>";  
		
    echo "<tr><td>Minimum number of wines in stock:</td><td> <input class='text' name='wineinstock' type='text'  /></td></tr>";
    echo "<tr><td>Minimum number of wines ordered:</td><td> <input class='text' name='wineordered' type='text'  /></td></tr>";
    echo "<tr><td>Dollar cost range: </td><td> <input class='text' name='dcr' type='text'  /></td></tr>";
    echo "<tr><td colspan='2' align='center'><input class='text' type='submit' name='submitBtn' value='Submit' /></td></tr>";



?>
</body>
</head>
</html>
