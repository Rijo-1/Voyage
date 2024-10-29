<?php
// Database credentials
$servername = "localhost"; // or your server hostname
$username = "root"; // your MySQL username
$password = ""; // your MySQL password
$database = "tourist_recommendation"; // your database name
$port="3306";
// Create connection
$conn = new mysqli($servername, $username, $password, $database,$port);
$conn = new mysqli($servername, $username, $password, $database,$port);

// Check connection
//if ($conn) {
//    echo "Connection Succes";
//}
//else{
    // echo "Connection Failed";
//}
?>
