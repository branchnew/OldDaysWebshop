<?php
session_start();

require "database.php";
//sparat uppgifterna skickat från index.php i variabler
$email = $_POST['email'];
$password = $_POST['password'];
$name = $_POST['name'];

//validera name och password och email vid registrering
if (!empty($name)) {
	if (strlen($password) < 8) {
		header('location:index.php?err=3');
    exit();
	}

	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	  $emailErr = "Invalid email format";
		header('location:index.php?err=4');
    exit();
	}
//kryptering med hash så att den sparas och inte den riktiga password
	$hash = password_hash($password, PASSWORD_DEFAULT);

  $sql = "INSERT INTO user (name, email, hash) VALUES ('$name', '$email', '$hash')";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();

	doLogin($email, $name);
} else {
  // vid login
  $sql 	= "SELECT hash, name FROM user WHERE email = '$email'";

  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $row = $stmt->fetch();

  if (password_verify($password, $row['hash'])) { //validera password som användaren har skrivit stämmer med den hash som är sparat
    doLogin($email, $row['name']);
  } else {
    header('location:index.php?err=1');
  }
}



function doLogin($email, $name) //sparar i session email och name och skickat till product sidan
{
	$_SESSION['auth'] = true;
	$_SESSION['email'] = $email;
	$_SESSION['name'] = $name;
	header('location:product.php');
}
 ?>
