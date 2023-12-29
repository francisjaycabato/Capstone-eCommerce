<?php

$host = "localhost";
$dbname = "ecommerce";
$username = "root";
$password = "FrozenDrink9876!";

$mysqli = new mysqli($host,$username,$password,$dbname);
                     
if ($mysqli->connect_errno) {
    die("Connection error: " . $mysqli->connect_error);
}

return $mysqli;