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

// GET ROW BY ID
function getRow($row_id, $id, $table)
{
	global $conn;

	try {
		$stmt = $conn->prepare("SELECT * FROM $table WHERE $row_id = :id");
		$stmt->execute(array(':id' => $id));

		// Fetch the row as an associative array
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		// Return the row
		return $row;
	} catch (PDOException  $error) {
		return  "<strong>ERROR: </strong> " . $error->getMessage();
	}
}


// DISPLAY CART
function displayCart($user_id)
{
	global $conn;

	try {

		$stmt = $conn->prepare("SELECT products.product_id, products.img, products.name, products.price, cart.cart_id, cart.quantity, (cart.quantity * products.price) AS total FROM cart INNER JOIN products ON cart.product_id = products.product_id WHERE cart.user_id = :user_id");
		$stmt->execute(array(":user_id" => $user_id));
		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

		// If there are rows, return them, otherwise return a message
		if (!empty($rows)) {
			$total_amount = 0;
			foreach ($rows as $row) {
				$total_amount += $row['total'];
			}
			unset($row);
			return array('rows' => $rows, 'total_amount' => $total_amount,);
		} else {
			return array('message' => "There are no items in your cart.", 'total_amount' => 0);
		}
	} catch (PDOException  $error) {
		return  "<strong>ERROR: </strong> " . $error->getMessage();
	}
}


// CRUD FUNCTIONS
// READ OR DISPLAY QUERY
function read($table)
{
	try {
		global $conn;

		$stmt = $conn->prepare("SELECT * FROM $table");
		$stmt->execute();

		// Fetch results
		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $results;
	} catch (PDOException  $error) {
		return  "<strong>ERROR: </strong> " . $error->getMessage();
	}
}

// DELETE OR REMOVE QUERY
function delete($table, $id_column, $id_value)
{
	global $conn;

	try {
		$stmt = $conn->prepare("DELETE FROM $table WHERE $id_column = :id_value");
		$stmt->bindValue(':id_value', $id_value);
		$stmt->execute();
	} catch (PDOException  $error) {
		return  "<strong>ERROR: </strong> " . $error->getMessage();
	}
}

// ADD OR CREATE QUERY
function create($table, $data)
{
	global $conn;

	$fields = implode(',', array_keys($data));
	$values = ':' . implode(',:', array_keys($data));
	$sql = "INSERT INTO $table ($fields) VALUES ($values)";
	$stmt = $conn->prepare($sql);
	$stmt->execute($data);
}

// UPDATE OR EDIT QUERY
function update($table, $idField, $idValue, $fieldsToUpdate)
{
	global $conn;

	// Construct the SET clause of the SQL query
	$setClause = '';
	foreach ($fieldsToUpdate as $fieldName => $fieldValue) {
		$setClause .= "`$fieldName` = :$fieldName, ";
	}
	$setClause = rtrim($setClause, ', ');

	// Construct the SQL query
	$sql = "UPDATE `$table` SET $setClause WHERE `$idField` = :$idField";

	// Prepare the query
	$stmt = $conn->prepare($sql);

	// Bind the parameters
	$stmt->bindParam(":$idField", $idValue, PDO::PARAM_INT);
	foreach ($fieldsToUpdate as $fieldName => $fieldValue) {
		$stmt->bindValue(":$fieldName", $fieldValue);
	}
	// Execute the query
	$stmt->execute();
}
