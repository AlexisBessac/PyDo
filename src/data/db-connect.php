<?php

$host = "localhost";
$user = "root";
$password = "";
$dbname = "pydo";

try{
    $dbh = new PDO("mysql:host=$host;dbname=$dbname", $user, $password, [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
}
catch (PDOException $e){
    echo "Error :" . $e->getMessage();
    exit;
}