<?php
ini_set('memory_limit', '-1');
require_once("../vendor/autoload.php");
require_once("keys.php");
$config = new \PHRETS\Configuration;
$config->setLoginUrl('http://ris-matrix.retsiq.com/rets/login');
$config->setUsername(getRetsUser());
$config->setPassword(getRetsPassword());
$config->setUserAgent(getRetsUserAgent());
$config->setUserAgentPassword(getRetsPasswordAgent());
$config->setRetsVersion('1.7.2');
$config->setOption('use_post_method', true);
$rets = new \PHRETS\Session($config);
$bulletin = $rets->Login();
echo "Start Search\n";
$limit = $argc == 1 ? 50000 : $argv[1];
$results = $rets->Search('Property', 'Listing', '(ListPrice=1+)',  ['Limit' => $limit]);
echo "End Search\n";
// $data = $results->toJSON();
$ar = $results->toArray();
echo "Start Photos\n";
for ($q = 0; $q < sizeof($ar); $q++) {
	echo $q . " of " . count($ar) . "\n";
	$dir = "../images/rets/" . $ar[$q]['MLSNumber'];
	// if (file_exists($dir)) {
	// 	continue;
	// }
	$address = $a['FullStreetNum'] . "," . $ar[$q]["City"] . "," . $ar[$q]["StateOrProvince"] . "," . $ar[$q]["PostalCode"];
	$geo = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($address).'&sensor=false');
	$geo = json_decode($geo, true);
	$ar[$q]["Latitude"] = $geo['results'][0]['geometry']['location']['lat'];
	$ar[$q]["Longitude"] = $geo['results'][0]['geometry']['location']['lng'];
	$photos = $rets->GetObject("Property", "Photo", $ar[$q]['Matrix_Unique_ID'], "*", 0);
	if (!file_exists($dir)) {
		mkdir($dir);
	}
	for ($i = 0; $i < count($photos); $i++) {
		file_put_contents($dir . "/" . $i . ".jpg", $photos[$i]->getContent());
	}
	$largePhotos = $rets->GetObject("Property", "LargePhoto", $ar[$q]['Matrix_Unique_ID'], "*", 0);
	$largeDir = "../images/largeRets/" . $ar[$q]['MLSNumber'];
	if (!file_exists($largeDir)) {
		mkdir($largeDir);
	}
	for ($i = 0; $i < count($largePhotos); $i++) {
		file_put_contents($largeDir . "/" . $i . ".jpg", $largePhotos[$i]->getContent());
	}
}
$data = json_encode($ar);
$conn = new mysqli("localhost", getDBUser(), getDBPassword(), getDBName());
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error . "\n");
}
echo "Connected successfully\n";
$query = "UPDATE RetsData SET json_data='" . $conn->real_escape_string($data) . "'";
if (mysqli_query($conn, $query)) {
	echo "New record updated successfully\n";
} else {
	echo "Error: " . $sql . "\n" . $conn->error . "\n";
}
// $my_file = 'rets-data.json';
// $handle = fopen($my_file, 'w');
// fwrite($handle, $data);
// fclose($handle);
?>
