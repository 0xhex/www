<?php
$conn = include_once("dbConnect.php");
$queryForCity = "select * from city";
$result = mysqli_query($conn,$queryForCity);
print '<span id="responde"><label>Select City</label><select onchange="javascript:selectedCity();" id="city">';
while ($row = mysqli_fetch_assoc($result)) {
		print '<option  name="' . $row["id"] . '">' . $row["name"] . ' </option>' . "\n";

}
print '</select></span>';
print '<span id="dd">
<label></label>
</span>';
print '<span id="responce">
<p>
</span>';



?>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>

var responseArr;
var arr_selectedMarket;
var str_selectedCity;
var str_selectedMarketID;
var str_selectedMarket;
function selectedCity() {
	var e = document.getElementById("city");
	var option = e.options[e.selectedIndex];
	var opt_id = option.getAttribute("name");
	str_selectedCity = option.value;
$.ajax({ url: 'ajaxCalls/getMarketSales.php',
		 data:{cityID:opt_id},
		 type: 'post',
		 json:"YES",
		 success: function(output) {
					  responseArr = JSON.parse(output);
					  printSalesCounts();
				  }
});

function printSalesCounts() {
	
	document.getElementById('responce').innerHTML = "</br>";
	for (var k = 0;k<(responseArr[0]).length;k++) {
		document.getElementById('responce').innerHTML += "Market("  +   JSON.stringify(responseArr[0][k]["marketData"]["market"]) +  ")  in " + str_selectedCity + " has sold " +  responseArr[0][k]["saleData"].length    +" product</br>";
		
	}
	
	document.getElementById('responce').innerHTML += "</br>";
	document.getElementById('responce').innerHTML += '<span id="marketArea"><label>Select Market</label><select id="market">';
	for (var k = 0;k<(responseArr[0]).length;k++) {
			document.getElementById('market').innerHTML += '<option  name="'+ responseArr[0][k]["marketData"]["marketID"] + '">' + responseArr[0][k]["marketData"]["market"] + ' </option>' + "\n";;
	
	}
	document.getElementById('responce').innerHTML += '</select></span>';
	
	document.getElementById('market').addEventListener('change',function(){
		 selectedMarket();
	});
	
	
}
    
function seeProduct(){
    alert("asd");
    
}
    
    
function selectedMarket() {
	var e = document.getElementById("market");
	var option = e.options[e.selectedIndex];
	str_selectedMarketID = option.getAttribute("name");
	str_selectedMarket = option.value;
	document.getElementById('dd').innerHTML = '<input style="float:center; margin-left:12px" onclick="seeProduct();" type="submit" value="Product Data">';
	document.getElementById('dd').innerHTML += '<input style="float:center; margin-left:12px" onclick="seeSalesman();" type="submit" value="Salesman Data">';
    
    for (var k = 0;k<(responseArr[0]).length;k++) {
        var marketID = JSON.stringify(responseArr[0][k]["marketData"]["marketID"]);
        if(marketID == ('"' + str_selectedMarketID + '"')){
            arr_selectedMarket = responseArr[0][k];
        }
        
    }

    
}
   
   
    
    
    
}

</script>
	
	
