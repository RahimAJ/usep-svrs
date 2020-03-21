<?php

/** DATABASE CONFIG */
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "usep-svrs";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

/** CONNECTION VALIDATION */
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
