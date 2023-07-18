<?php

//  checks if a session has already been started
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

require_once '../db/connection.php';
require_once '../db/functions.php';

if (isset($_SESSION['account_id'])) {
	$account_id = $_SESSION['account_id'];
} else {
	$account_id = null;
}


// UPDATE CART COUNT IN ICON BASKET
if (isset($_POST['action']) == 'update_cart_count') {
	$cart_count = count_cart_items($conn, $account_id);

	echo json_encode($cart_count);
	exit;
}
