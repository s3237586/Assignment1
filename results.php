<html>
<head>
<title>WDA Assignment Part B</title>
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
$minyear = $_GET['minyears'];
$maxyear = $_GET['maxyears'];
$minstock = $_GET['wineinstock'];


// Start a query ...
    $query = "SELECT wine.wine_id, wine_name, description, year, winery_name, variety, on_hand, cost
FROM winery, region, wine, grape_variety, inventory
WHERE winery.region_id = region.region_id
AND wine.winery_id = winery.winery_id
AND wine.wine_type = grape_variety.variety_id
AND inventory.wine_id = wine.wine_id";


  // ... then, if the user has specified a region, add the regionName
  // as an AND clause ...
  if (isset($regionName) && $regionName != "All") {
    $query .= " AND region_name = '{$regionName}'";
  } 
  if (isset($wineName) && $wineName != "") {
    $query .= " AND wine_name = '{$wineName}'";
  }
  if (isset($wineryName) && $wineryName != "") {
    $query .= " AND winery_name = '{$wineryName}'";
  }
  if (isset($minyear) && $minyear != "") {
    $query .= " AND year>= '{$minyear}'";
  }
  if (isset($maxyear) && $maxyear != "") {
    $query .= " AND year<= '{$maxyear}'";
  }
  if (isset($grapev) && $grapev != "") {
    $query .= " AND variety = '{$grapev}'";
  }
  if (isset($minstock) && $minstock != "") {
    $query .= " AND on_hand>= '{$minstock}'";
  }  


  	// ... and then complete the query.
 	$query .= " ORDER BY wine_name";

	$result = @ mysql_query($query);

	$rowsFound = @ mysql_num_rows($result);
	// If the query has results ...
    	if ($rowsFound > 0) {     
	
	print "<h3>Region: $regionName<br>"; 
     
      print "\n<table>\n<tr>" .
          "\n\t<th>Wine ID</th>" .
          "\n\t<th>Wine Name</th>" .
	   "\n\t<th>Cost</th>" .
	   "\n\t<th>Stock on hand</th>" .
          "\n\t<th>Year</th>" .
          "\n\t<th>Winery</th>" .
	   "\n\t<th>Grape Variety</th>" .
          "\n\t<th>Description</th>\n</tr>";

      // Fetch each of the query rows
      while ($row = @ mysql_fetch_array($result)) {
        // Print one row of results
        print "<tr><td>{$row["wine_id"]}</td>" .
            "<td>{$row["wine_name"]}</td>" .
  	     "<td>{$row["cost"]}</td>" .	
	     "<td align='center'>{$row["on_hand"]}</td>" .
            "<td>{$row["year"]}</td>" .
            "<td align='center'>{$row["winery_name"]}</td>" .
	     "<td align='center'>{$row["variety"]}</td>" .
            "<td align='center'>{$row["description"]}</td></tr>";
      } // end while loop body

      // Finish the <table>
      print "\n</table>";
    }

    print "{$rowsFound} records found matching your criteria<br>";

//echo "$query";

?>
</body>
</head>
</html>
