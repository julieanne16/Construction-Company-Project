<?php

//  checks if a session has already been started
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

require_once '../db/connection.php';
require_once '../db/functions.php';

// REGISTRATION
if (isset($_POST['registration'])) {
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$password = $_POST['password'];

	$new_account = register($conn, $fname, $lname, $email, $address, $password);

	echo json_encode($new_account);
	exit;
}

// LOGIN
if (isset($_POST['email']) && isset($_POST['password'])) {

	$email = trim($_POST['email']);
	$password = trim($_POST['password']);

	// sanitize email input
	$email = filter_var($email, FILTER_SANITIZE_EMAIL);

	// sanitize password
	$password = htmlspecialchars($password, ENT_QUOTES);

	$account = login($conn, $email, $password);

	echo json_encode($account);
	exit;
}
