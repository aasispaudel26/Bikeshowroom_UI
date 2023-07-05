<?php

$serverName = 'AASISPC\SQLEXPRESS02';
$databaseName = 'AasisShowRoom';
// $username = $_POST['username'];
// $password = $_POST['password'];

$connection = [
  "Database" => $databaseName
];
$conn = sqlsrv_connect($serverName, $connection);
