<?php

//  checks if a session has already been started
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

// require 'connection.php';

// USER LOGIN
function login($conn, $email, $password)
{
	try {
		$stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
		$stmt->execute(array(':email' => $email));
		$account = $stmt->fetch(PDO::FETCH_ASSOC);

		// if email not exist
		if (!$account) {
			return array(
				'status' => false,
				'field' => 'email',
				'message' => 'This email is not registered yet.'
			);
		} elseif (!password_verify($password, $account['password'])) {
			return array(
				'status' => false,
				'field' => 'password',
				'message' => 'Incorrect password.'
			);
		} else {
			// Password is correct
			$_SESSION['logged_in'] = true;


			$_SESSION['account_id'] = $account['user_id'];
			$_SESSION['name'] = $account['fname'] . ' ' . $account['lname'];
			$_SESSION['email'] = $account['email'];
			return array(
				'status' => true
			);
		}
	} catch (PDOException  $error) {
		return  "<strong>ERROR: </strong> " . $error->getMessage();
	}
}

// REGISTRATION
function register($conn, $fname, $lname, $email, $address, $password)
{
	try {
		// Check if email is already registered
		$stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE email = :email");
		$stmt->execute(array(':email' => $email));
		$count = $stmt->fetchColumn();

		// Email is already registered
		if ($count > 0) {
			return array(
				'status' => false,
				'message' => 'This email is already registered'
			);
		} else {
			// Email is not registered, insert new user into database

			$hashed_password = password_hash($password, PASSWORD_BCRYPT);
			$stmt = $conn->prepare("INSERT INTO users (fname, lname, email, address, password) VALUES (:fname, :lname, :email, :address, :password)");
			$stmt->execute(array(':fname' => $fname, ':lname' => $lname, ':email' => $email, ':address' => $address, ':password' => $hashed_password));

			$user_id = $conn->lastInsertId();

			$_SESSION['registered'] = true;

			return array(
				'status' => true,
				'last_id' => $user_id,
			);
		}
	} catch (PDOException  $error) {
		return  "<strong>ERROR: </strong> " . $error->getMessage();
	}
}

// GET ROW BY ID
function getRow($conn, $row_id, $id, $table)
{
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
function display_cart($conn, $user_id)
{
	try {

		$stmt = $conn->prepare("SELECT products.product_id, products.img, products.name, cart.cart_id, cart.user_id, cart.product_id, cart.quantity, cart.price, (cart.price * cart.quantity) as total FROM cart INNER JOIN products ON cart.product_id = products.product_id WHERE cart.user_id = :user_id");
		$stmt->execute(array(":user_id" => $user_id));
		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

		// If there are rows, return them, otherwise return a message
		if (!empty($rows)) {
			$total_amount = 0;
			foreach ($rows as $row) {
				$total_amount += $row['total'];
			}
			unset($row);
			$_SESSION['total_amount'] = $total_amount;
			return array('rows' => $rows, 'total_amount' => $total_amount,);
		} else {
			$empty = [];
			return $empty;
		}
	} catch (PDOException  $error) {
		return  "<strong>ERROR: </strong> " . $error->getMessage();
	}
}

// DISPLAY CART
function display_transaction($conn, $user_id)
{
	try {
		$sql = "SELECT 
							o.order_id, 
							o.address, 
							o.payment_opt, 
							o.shipping_fee,
							o.purchase_date,
							o.order_status,
       				SUM(o.total) AS order_total,
       				GROUP_CONCAT(CONCAT(p.name, '|', p.img, '|', o.quantity, '|', o.price)) AS product_details
						FROM orders o
						INNER JOIN products p ON o.product_id = p.product_id
						WHERE o.user_id = :user_id
						GROUP BY o.order_id
						ORDER BY o.purchase_date DESC
						";
		$stmt = $conn->prepare($sql);
		$stmt->execute(array(":user_id" => $user_id));
		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

		// If there are rows, return them, otherwise return a message
		if (!empty($rows)) {
			$total_amount = 0;
			foreach ($rows as $row) {
				$total_amount += $row['order_total'];
			}
			unset($row);
			// return array('rows' => $rows, 'total_amount' => $total_amount,);
			return $rows;
		} else {
			$empty = [];
			return $empty;
		}
	} catch (PDOException  $error) {
		return  "<strong>ERROR: </strong> " . $error->getMessage();
	}
}


// CRUD FUNCTIONS
function fetch_data($conn, $table)
{
	try {
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
function delete($conn, $table, $id_column, $id_value)
{
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
function update($conn, $table, $idField, $idValue, $fieldsToUpdate)
{
	try {
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

		return "Record updated successfully";
	} catch (PDOException $e) {
		return "Error: " . $e->getMessage();
	}
}


function checkout($conn, $user_id, $shipping_info, $billing_info, $name)
{
	try {
		// Retrieve the order details from the session variable
		$order_details = $_SESSION['order_details'];

		$stmt = $conn->prepare("SELECT order_id FROM order_info ORDER BY order_id DESC LIMIT 1");
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);

		$last_order_id = $result['order_id'];
		$new_order_id = $last_order_id + 1;

		// Insert new order ID into order_info table
		$stmt = $conn->prepare("INSERT INTO order_info (order_id) VALUES (?)");
		$stmt->execute([$new_order_id]);


		// Insert into checkout table and update product quantity
		$stmt = $conn->prepare("INSERT INTO orders (order_id, user_id, receivers_name, product_id, quantity, price, total, address, payment_opt, purchase_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())");
		$update_stmt = $conn->prepare("UPDATE products SET stocks = stocks - ? WHERE product_id = ?");
		foreach ($order_details as $order_detail) {
			$stmt->execute([
				$new_order_id, $user_id, $name, $order_detail['product_id'], $order_detail['quantity'], $order_detail['price'], $order_detail['total'], $shipping_info, $billing_info
			]);
			$update_stmt->execute([$order_detail['quantity'], $order_detail['product_id']]);
		}

		$reference_number = uniqid();
		$prefix = 'REF-';
		$suffix = '-2023';
		$reference_number = $prefix . uniqid() . $suffix;

		$_SESSION['ref_number'] = $reference_number;



		// Unset the session variables used for the order details and ID
		unset($_SESSION['order_details']);
		unset($_SESSION['total_amount']);
		unset($_SESSION['cart_items']);

		// Delete all items from the cart
		$sql = "DELETE FROM cart WHERE user_id=:user_id";
		$stmt = $conn->prepare($sql);
		$params = array(
			':user_id' => $_SESSION['account_id']
		);
		$stmt->execute($params);

		$_SESSION['order_id'] = $new_order_id;
	} catch (Exception $e) {
		return "Checkout failed: " . $e->getMessage();
	}
}

function editPass($conn, $password)
{
	try {

		$current_password = $_POST['c-pass'];
		$password1 = $_POST['n-pass'];
		$password2 = $_POST['con-pass'];

		if ($password1 != $password2) {
			return array(
				'status' => false,
				'message' => 'Password does not match'
			);
		} else {


			$hashed_password = password_hash($password, PASSWORD_BCRYPT);
			$stmt = $conn->prepare("UPDATE users SET password = :password WHERE id =id");
			$stmt->execute(array(':password' => $hashed_password));

			$_SESSION['registered'] = true;
			return array(
				'status' => true,
			);
		}
	} catch (PDOException  $error) {
		return  "<strong>ERROR: </strong> " . $error->getMessage();
	}
}

// Fetch function
function filter($conn, $category)
{
	try {
		if ($category == 'all') {
			$sql = "SELECT * FROM products";
		} else {
			$sql = "SELECT * FROM products WHERE category = :category";
		}

		// Prepare the SQL statement
		$stmt = $conn->prepare($sql);

		// Bind the category parameter (if applicable)
		if ($category != 'all') {
			$stmt->bindParam(':category', $category);
		}

		// Execute the statement and fetch the results
		$stmt->execute();
		$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $products;
	} catch (PDOException $error) {
		return "<strong>ERROR: </strong> " . $error->getMessage();
	}
}


// Fetch function
function fetch_similar_products($conn, $category, $excludeId)
{
	try {
		$sql = "SELECT * FROM products WHERE category = :category AND product_id != :excludeId LIMIT 4";

		// Prepare the SQL statement
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':category', $category);
		$stmt->bindParam(':excludeId', $excludeId);

		// Execute the statement and fetch the results
		$stmt->execute();
		$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $products;
	} catch (PDOException $error) {
		return "<strong>ERROR: </strong> " . $error->getMessage();
	}
}

// ADD CART
function add_to_cart($conn, $user_id, $product_id, $quantity, $price)
{
	try {
		// Calculate total price
		$total = $quantity * $price;

		// Check if item already exists in cart
		$stmt = $conn->prepare("SELECT * FROM cart WHERE user_id = :user_id AND product_id = :product_id");
		$stmt->bindParam(':user_id', $user_id);
		$stmt->bindParam(':product_id', $product_id);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if ($row) { // If item already exists in cart, update the quantity and total
			$stmt = $conn->prepare("UPDATE cart SET quantity = quantity + :quantity, total = total + :total WHERE user_id = :user_id AND product_id = :product_id");
			$stmt->bindParam(':user_id', $user_id);
			$stmt->bindParam(':product_id', $product_id);
			$stmt->bindParam(':quantity', $quantity);
			$stmt->bindParam(':total', $total);
			$stmt->execute();
		} else { // Otherwise, insert a new row into the cart table
			$stmt = $conn->prepare("INSERT INTO cart (user_id, product_id, quantity, price, total, date_added) VALUES (:user_id, :product_id, :quantity, :price, :total, NOW())");
			$stmt->bindParam(':user_id', $user_id);
			$stmt->bindParam(':product_id', $product_id);
			$stmt->bindParam(':quantity', $quantity);
			$stmt->bindParam(':price', $price);
			$stmt->bindParam(':total', $total);
			$stmt->execute();
		}
		return 'Item added to cart.';
	} catch (PDOException  $error) {
		return  "<strong>ERROR: </strong> " . $error->getMessage();
	}
}

function prepare_order($conn, $user_id)
{
	try {
		// Retrieve all items in the cart table
		$stmt = $conn->prepare("SELECT * FROM cart WHERE user_id = :user_id");
		$stmt->execute(array(':user_id' => $user_id));
		$cart_items = $stmt->fetchAll();

		// Store the order details in the session variable
		$order_details = array();
		foreach ($cart_items as $cart_item) {
			$total = $cart_item['quantity'] * $cart_item['price'];
			$order_details[] = array(
				'user_id' => $user_id,
				'product_id' => $cart_item['product_id'],
				'quantity' => $cart_item['quantity'],
				'price' => $cart_item['price'],
				'total' => $total
			);
		}

		$_SESSION['order_details'] = $order_details;
		// return $order_details;
	} catch (PDOException $error) {
		return  "<strong>ERROR: </strong> " . $error->getMessage();
	}
}

function update_cart_quantity($conn, $user_id, $product_id, $quantity, $price)
{
	try {
		// Calculate the new total based on the updated quantity and price
		$total = $quantity * $price;

		// Update cart quantity and total in the database
		$stmt = $conn->prepare("UPDATE cart SET quantity = :quantity, total = :total WHERE user_id = :user_id AND product_id = :product_id");
		$stmt->bindParam(':user_id', $user_id);
		$stmt->bindParam(':product_id', $product_id);
		$stmt->bindParam(':quantity', $quantity);
		$stmt->bindParam(':total', $total);
		$stmt->execute();

		return intval($total);
	} catch (PDOException $error) {
		return  "<strong>ERROR: </strong> " . $error->getMessage();
	}
}



// Count products
function count_cart_items($conn, $user_id)
{
	try {
		$stmt = $conn->prepare("SELECT SUM(quantity) as count FROM cart WHERE user_id = :user_id");
		$stmt->execute(array('user_id' => $user_id));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		return $row['count'];
	} catch (PDOException  $error) {
		return  "<strong>ERROR: </strong> " . $error->getMessage();
	}
}

function is_exist($conn, $table, $column, $value)
{
	$stmt = $conn->prepare("SELECT COUNT(*) FROM $table WHERE $column = :value");
	$stmt->execute(array(':value' => $value));
	$count = $stmt->fetchColumn();
	return $count > 0;
}

function search_products($conn, $value)
{
	try {
		// Create the search query
		$sql = "SELECT * FROM products WHERE name LIKE :value OR price LIKE :value OR category LIKE :value";

		$stmt = $conn->prepare($sql);
		$stmt->bindValue(':value', '%' . $value . '%', PDO::PARAM_STR);
		$stmt->execute();

		// Check if any results were found
		if ($stmt->rowCount() > 0) {
			// Fetch the results into an array
			$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $results;
		} else {
			return array();
		}
	} catch (PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
}

function change_password($conn, $user_id, $current_password, $new_password)
{
	try {
		$stmt = $conn->prepare("SELECT password FROM users WHERE user_id = :id");
		$stmt->execute(array(':id' => $user_id));
		$hashed_password = $stmt->fetchColumn();

		if (!password_verify($current_password, $hashed_password)) {
			// current password does not match the password hash in the database
			return array(
				'status' => false,
				'field' => 'current-pass',
				'message' => 'Incorrect password.'
			);
		} else {
			// update the password hash in the database
			$new_hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
			$stmt = $conn->prepare("UPDATE users SET password = :password WHERE user_id = :id");
			$stmt->execute(array(':password' => $new_hashed_password, ':id' => $user_id));

			return array(
				'status' => true
			);
		}
	} catch (PDOException $e) {
		// handle database errors
		echo "Error: " . $e->getMessage();
	}
}
