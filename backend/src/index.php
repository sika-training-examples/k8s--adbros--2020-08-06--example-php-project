<?php

$servername = "db";
$username = "root";
$password = getenv("MYSQL_ROOT_PASSWORD");

// Create connection
$conn = new mysqli($servername, $username, $password, "default");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "update counter set count = count + 1";
$conn->query($sql);

$sql = "SELECT count FROM counter";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
echo json_encode(["counter" => (int)$row["count"]]);

$conn->close();
