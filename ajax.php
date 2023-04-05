<?php

//  checks if a session has already been started
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

require_once 'functions.php';


if (isset($_SESSION['account_id'])) {
	$account_id = $_SESSION['account_id'];
}

// UPDATE CART COUNT IN ICON BASKET
if (isset($_POST['action']) == 'update_cart_count') {
	$cart_count = countCartItems($conn, $account_id);

	// header('Content-Type: application/json');
	echo json_encode($cart_count);
}
