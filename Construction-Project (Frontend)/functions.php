<?php

// USER LOGIN
function login($email, $password)
{
	global $conn;
	try {
		$email = $_POST['email'];
		$password = $_POST['password'];

		$stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
		$stmt->execute(array(':email' => $email));
		$user = $stmt->fetch(PDO::FETCH_ASSOC);

		// Verify password
		if ($user && password_verify($password, $user['password'])) {
			// Password is correct, return user information
			return $user;
		} else {
			// Password is incorrect or user doesn't exist, return false
			return false;
		}
	} catch (PDOException  $error) {
		return  "<strong>ERROR: </strong> " . $error->getMessage();
	}
}

// REGISTRATION
function register($name, $email, $password)
{
	global $conn;

	try {
		// Check if email is already registered
		$stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE email = :email");
		$stmt->execute(array(':email' => $email));
		$count = $stmt->fetchColumn();

		if ($count > 0) {
			// Email is already registered
			return false;
		} else {
			// Email is not registered, insert new user into database
			$hashed_password = password_hash($password, PASSWORD_BCRYPT);
			$stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
			$stmt->execute(array(':name' => $name, ':email' => $email, ':password' => $hashed_password));
			return true;
		}
	} catch (PDOException  $error) {
		return  "<strong>ERROR: </strong> " . $error->getMessage();
	}
}
