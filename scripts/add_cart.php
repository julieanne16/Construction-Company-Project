<?php

//  checks if a session has already been started
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

require_once '../db/connection.php';
require_once '../db/functions.php';

if (!isset($_SESSION['account_id'])) {
	$_SESSION['account_id'] = session_id();
}

$account_id = $_SESSION['account_id'];

// Add 1 item by default
if (isset($_POST['product_id']) && isset($_POST['product_price'])) {
	$product_id = $_POST['product_id'];
	$product_price = $_POST['product_price'];

	$add_cart = add_to_cart($conn, $account_id, $product_id, 1, $product_price);
	echo json_encode($add_cart);
	exit;
}

if (isset($_POST['quantity_id']) && isset($_POST['updated_price'])) {
	$product_id = $_POST['quantity_id'];
	$quantity_value = $_POST['quantity_value'];
	$updated_price = $_POST['updated_price'];

	$update_cart = add_to_cart($conn, $account_id, $product_id, $quantity_value, $updated_price);
	exit;
}
