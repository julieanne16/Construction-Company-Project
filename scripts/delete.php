<?php

//  checks if a session has already been started
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

require_once '../db/connection.php';
require_once '../db/functions.php';

// Clear CART ITEMs
if ($_POST['action'] == 'clear_cart') {

	$clear_item = delete($conn, 'cart', 'user_id', $_SESSION['account_id']);

	echo json_encode($clear_item);
	exit;
}

// cancel checkout
if ($_POST['action'] == 'cancel_checkout') {

	$clear_items = delete($conn, 'checkout', 'order_id', $_SESSION['order_id']);
	unset($_SESSION['order_id']);

	echo json_encode($clear_items);
	exit;
}
