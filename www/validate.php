<?php
session_start();

require "database.php";

$email = $_POST['email'];
$password = $_POST['password'];
$name = $_POST['name'];

if (!empty($name)) {
  // Register new user
	if (strlen($password) < 8) {
		header('location:index.php?err=3');
    exit();
	}

	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	  $emailErr = "Invalid email format";
		header('location:index.php?err=4');
    exit();
	}

	$hash = password_hash($password, PASSWORD_DEFAULT);

  $sql = "INSERT INTO user (name, email, hash) VALUES ('$name', '$email', '$hash')";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();

	doLogin($email, $name);
} else {
  // Check if user exists
  $sql 	= "SELECT hash, name FROM user WHERE email = '$email'";

  $stmt = $pdo->prepare($sql); // Prevent MySQl injection. $stmt means statement
  $stmt->execute();
  $row = $stmt->fetch();

  if (password_verify($password, $row['hash'])) {
    doLogin($email, $row['name']);
  } else {
    header('location:index.php?err=1');
  }
}



function doLogin($email, $name)
{
	$_SESSION['auth'] = true;
	$_SESSION['email'] = $email;
	$_SESSION['name'] = $name;
	header('location:product.php');
}
 ?>
