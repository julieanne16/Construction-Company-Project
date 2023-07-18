<?php

//  checks if a session has already been started
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

require_once '../db/connection.php';
require_once '../db/functions.php';

if (isset($_SESSION['account_id'])) {
	$user_id = $_SESSION['account_id'];
}

if (isset($_SESSION['order_id'])) {
	$order_id = $_SESSION['order_id'];
}

if (isset($_SESSION['order_details'])) {
	$order_details = $_SESSION['order_details'];
}


// Proceed Checkout
if ($_POST['action'] == 'proceed_checkout') {
	$prepare_order = prepare_order($conn, $user_id);
	echo json_encode($prepare_order);
	exit;
}

// Cancel checkout
if ($_POST['action'] == 'cancel_checkout') {

	unset($_SESSION['order_details']);
	unset($_SESSION['total_amount']);

	echo 'Your order process is cancelled';
	exit;
}

// final order
if ($_POST['action'] == 'place_order') {

	// Get the form data
	parse_str($_POST['data'], $data);

	$order_total = $data['order_total'];
	$payment_method = $data['order_payment'];

	$payment_info = '';
	if ($payment_method == 'gcash') {
		$payment_info .= $payment_method . ' - ' . $data['gcash_num'];
	} else if ($payment_method == 'bank') {
		$payment_info .= $payment_method . ' - ' . $data['account_num'];
	} else if ($payment_method == 'cod') {
		$payment_info = $payment_method;
	}

	if ($data['set_params'] === 'new-users') {
		$new_account = register($conn, $data['reg_fname'], $data['reg_lname'], $data['reg_email'], $data['reg_addr'], $data['reg_password']);

		$name = $data['reg_fname'] . ' ' . $data['reg_lname'];
		$address = $data['reg_addr'];
		$uid = $new_account['last_id'];

		$order = checkout($conn, $uid, $address, $payment_info, $name);
		echo json_encode($order);
		exit;
	}

	if ($data['set_params'] === 'true') {
		$name = $data['order_fname'] . ' ' . $data['order_lname'];
		$phone = $data['order_phone'];
		$address = $data['order_addr'];

		$order = checkout($conn, $user_id, $address, $payment_info, $name);
		echo json_encode($order);
		exit;
	} else {
		$name = $data['default_name'];
		$phone = $data['default_phone'];
		$address = $data['default_addr'];

		$order = checkout($conn, $user_id, $address, $payment_info, $name);
		echo json_encode($order);
		exit;
	}
}

// Fetch total amount
if ($_POST['action'] == 'calc_total') {
	$total = display_cart($conn, $user_id);

	if (!empty($total)) {
		$total_amount = $total['total_amount'];
		echo json_encode($total_amount);
		exit;
	}
}
