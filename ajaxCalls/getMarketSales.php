<?php
$conn = include_once("../dbConnect.php");
$queryForCity = "select * from cityMarkets where cityID = 14";
$result = mysqli_query($conn,$queryForCity);
$response = array();
$productData;
$searchedMarkets = array();
while ($row = mysqli_fetch_assoc($result)) {

$queryForCity = "select *  from markets where id = " . $row["marketID"];
$result3 = mysqli_query($conn,$queryForCity);
$marketRow = mysqli_fetch_assoc($result3);
$marketName = $marketRow["name"];
$marketID = $marketRow["id"];
if(in_array($marketRow["name"], $searchedMarkets)){
	print_r($searchedMarkets);
	continue;
}
$queryForCity = "select * from sale where salesmanID = " . $row["salesman1"] . " OR salesmanID = " . $row["salesman2"] . " OR salesmanID = " . $row["salesman3"];
$result2 = mysqli_query($conn,$queryForCity);
$productData = [];
$saleData = [];
$salesmanData = [];
while ($row2 = mysqli_fetch_assoc($result2)) {
	$queryForProduct = "select *  from product where id = " . $row2["productID"];
	$result3 = mysqli_query($conn,$queryForProduct);
	$productRow = mysqli_fetch_assoc($result3);
	if(strlen($productRow["id"]) == 0) continue;
	
	$saleData [] = $row2;
    
    $queryForProduct = "select count(id) as countt  from sale where productID = " . $productRow["id"];
    $result3 = mysqli_query($conn,$queryForProduct);
    $productCount = mysqli_fetch_assoc($result3);
    $productData [] = array($productRow["id"],mb_convert_encoding($productRow["name"], "UTF-8"),$productCount["countt"]);
    
}
$marketData[]= array("productData"=>$productData,"saleData"=>$saleData,"marketData"=>array("market"=>$marketName,"marketID"=>$marketID));
$searchedMarkets[] = $marketRow["name"];
}
$response[] = $marketData;

echo json_encode($response);

?>