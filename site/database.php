<?php
$servername = "mariadb";
$username = "user";
$password = "password";

try {
  $conn = new PDO("mysql:host=$servername;dbname=receptenboek", $username, $password);
  
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "";
} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
