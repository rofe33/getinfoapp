<?php
/* 2023-09-27 21:45:53 */

/* Database Credentials */
$db_host = ""; // Servername
$db_user = ""; // Username
$db_pass = ""; // Password
$db_name = ""; // Database name

try {
  $dbh = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
} catch (PDOException $e) {
  echo "Couldn't Connect";
}
