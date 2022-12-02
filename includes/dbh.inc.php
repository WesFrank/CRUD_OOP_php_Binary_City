<?php 

// Credentials

$dbServername = "dreadnought.aserv.co.za";
$dbUsername = "lambdijo_lambda";
$dbPassword = "12113sAs12Ww*#";
$dbName = "lambdijo_post390";

// Connection Established

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

// Database Access

if (!$conn) {

  die("connection failed: " . mysqli_connecti_error());

};