<?php
$servername = "localhost:3306";
$username = "andressa_eatery";
$password = ")B?YGVYocXoG";
$dbname = "andressa_eatery";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";

?>
