<?php
$servername = "localhost";
$username = "root";
$password = "mysql";

// Create connection
$conn = new mysqli($servername, $username, $password,"efekan_pulatli");
// Check connection
if ($conn->connect_error) {
	$conn = new mysqli($servername, $username, $password);
    
    
}
return $conn;
?>