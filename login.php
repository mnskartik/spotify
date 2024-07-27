<?php

// Replace 'your_database_name', 'username', and 'password' with your actual credentials
$servername = "localhost";
$username = "root@localhost";
$password = "";
$dbname = "users";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$username = $_POST["username"];
$password = $_POST["password"];


$hashed_password = md5($password);


$sql = "SELECT * FROM users WHERE username='$username' AND password='$hashed_password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    session_start();
    $_SESSION["username"] = $username;
    header("Location: welcome.php"); 
} else {
   
    echo "Invalid username or password.";
}

$conn->close();

?>