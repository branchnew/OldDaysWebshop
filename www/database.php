<?php
$servername = "mariadb";
$username = "root";
$password = "password";
$dbname = "webbshop";

// Open connection
try
{
	$pdo = new PDO('mysql:host=mariadb;dbname=webbshop', $username, $password);

}
catch (PDOException $e)
{
    header('location:index.php?err=2');
    exit();
}

 ?>
