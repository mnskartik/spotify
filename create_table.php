<?php

// Replace 'your_database_name', 'username', and 'password' with your actual credentials
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql = "CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL
);";


if ($conn->query($sql) === TRUE) {
  echo "Table users created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();

?>
