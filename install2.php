<?php

$conn = include_once 'dbConnect.php';
$commands = file_get_contents("mernis/data_dump.sql");   
$conn->multi_query($commands); 

?>