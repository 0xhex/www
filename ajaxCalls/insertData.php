<?php
$conn = include_once '../dbConnect.php';
$handle = fopen('../csvFiles/namesurnames.csv','r');
ini_set('auto_detect_line_endings',TRUE);
$names[] = array();
$surnames[] = array();
while ( ($data = fgetcsv($handle) ) !== FALSE ) {
$names[] = $data[0];
$surnames[] = $data[1];
}


for ($i=0;$i < 1620; $i++ ) {
	$randomNameSurname = $names[rand()%count($names)] . " " . $surnames[rand()%count($surnames)];
	$queryForInsertion = "insert into customer (fullname) values ('" . $randomNameSurname . "')";
	mysqli_query($conn,$queryForInsertion);
}
for ($i=0;$i < 1215; $i++ ) {
	$randomNameSurname = $names[rand()%count($names)] . " " . $surnames[rand()%count($surnames)];
	$queryForInsertion = "insert into salesman (fullname) values ('" . $randomNameSurname . "')";
	mysqli_query($conn,$queryForInsertion);
}


$handle = fopen('../csvFiles/distAndCity.csv','r');
ini_set('auto_detect_line_endings',TRUE);
while ( ($data = fgetcsv($handle) ) !== FALSE ) {
$queryForInsertion = "insert into City (name,dist) values ('" . $data[0] . "','" . $data[1] . "')";
mysqli_query($conn,$queryForInsertion);
}

$handle = fopen('../csvFiles/districts.csv','r');
ini_set('auto_detect_line_endings',TRUE);
while ( ($data = fgetcsv($handle) ) !== FALSE ) {
$queryForInsertion = "insert into Districts (name) values ('" . $data[0] . "')";
mysqli_query($conn,$queryForInsertion);
}


$handle = fopen('../csvFiles/products.csv','r');
$products[] = array();
while ( ($data = fgetcsv($handle) ) !== FALSE ) {
$queryForInsertion = "insert into product (name) values ('" . $data[0] . "')";
mysqli_query($conn,$queryForInsertion);
}

$markets = array("Macro Center","Migros","A101","Bim","Şok","Carrefour","Adese","Berka","SSD","Pana");
foreach ($markets as $market) {
	$queryForInsertion = "insert into markets (name) values ('" . $market . "')";
	mysqli_query($conn,$queryForInsertion);
}

for ($i = 1;$i < 82 ; $i++) {
$randKeys = array_rand($markets,5);

$queryForInsertion = "insert into cityMarkets (cityID,marketID,salesman1,salesman2,salesman3) values (" . $i . "," . ($randKeys[0]+1) .  "," . generateRandomSalesmanID() .  "," . generateRandomSalesmanID() .  "," . generateRandomSalesmanID(). ")";
mysqli_query($conn,$queryForInsertion);
$queryForInsertion = "insert into cityMarkets (cityID,marketID,salesman1,salesman2,salesman3) values (" . $i . "," . ($randKeys[1]+1) .  "," . generateRandomSalesmanID() .  "," . generateRandomSalesmanID() .  "," . generateRandomSalesmanID(). ")";
mysqli_query($conn,$queryForInsertion);
$queryForInsertion = "insert into cityMarkets (cityID,marketID,salesman1,salesman2,salesman3) values (" . $i . "," . ($randKeys[2]+1) .  "," . generateRandomSalesmanID() .  "," . generateRandomSalesmanID() .  "," . generateRandomSalesmanID(). ")";
mysqli_query($conn,$queryForInsertion);
$queryForInsertion = "insert into cityMarkets (cityID,marketID,salesman1,salesman2,salesman3) values (" . $i . "," . ($randKeys[3]+1) .  "," . generateRandomSalesmanID() .  "," . generateRandomSalesmanID() .  "," . generateRandomSalesmanID(). ")";
mysqli_query($conn,$queryForInsertion);
$queryForInsertion = "insert into cityMarkets (cityID,marketID,salesman1,salesman2,salesman3) values (" . $i . "," . ($randKeys[4]+1) .  "," . generateRandomSalesmanID() .  "," . generateRandomSalesmanID() .  "," . generateRandomSalesmanID(). ")";
mysqli_query($conn,$queryForInsertion);
}

for ($i=1;$i < 1620; $i++ ) {
	$rand = rand() %5;
	for($k = 0;$k < $rand;$k++){
		$salesmanID = generateRandomSalesmanID();
		$productID = rand()%1000+1;
		$queryForInsertion = "insert into sale (customerID,salesmanID,productID) values (" . $i . "," . $salesmanID .  "," . $productID. ")";
		mysqli_query($conn,$queryForInsertion);
	}
}

function generateRandomSalesmanID(){
	return rand()%1215+1;
}
ini_set('auto_detect_line_endings',FALSE);

?>