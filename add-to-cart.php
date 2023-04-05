<?php

//  checks if a session has already been started
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

require_once 'functions.php';


if (isset($_SESSION['account_id'])) {
	$account_id = $_SESSION['account_id'];
}

if (isset($_POST['product_id'])) {
	$product_id = $_POST['product_id'];
}

echo $product_id;

$update_cart = addToCart($conn, $account_id, $product_id);
