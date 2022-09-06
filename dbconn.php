<?php
$host         = "localhost";
$username     = "root";
$password     = "";
$dbname       = "petshop";
try {
    $dbconn = new PDO('mysql:host=localhost;dbname=petshop', $username, $password);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}