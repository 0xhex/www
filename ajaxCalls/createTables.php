<?php
$conn = include_once '../dbConnect.php';
$commands = file_get_contents("../efekan_pulatli.sql");   
$conn->multi_query($commands); 

?>
