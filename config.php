<?php

$connString = "mysql:host=localhost; dbname=map_album";
$user = "username";
$pass = "123";

$pdo = new pdo($connString, $user, $pass);

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>