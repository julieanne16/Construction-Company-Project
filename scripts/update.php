<?php

//  checks if a session has already been started
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

require_once '../db/connection.php';
require_once '../db/functions.php';


$account_id = $_SESSION['account_id'];

// Update password
if ($_POST['action'] == 'update_pass') {
	// Get the form data
	parse_str($_POST['data'], $data);

	$verify_password = change_password($conn, $account_id, $data['current_pass'], $data['new_pass']);

	echo json_encode($verify_password);
	exit;
}

// UPDATE USER INFO
if ($_POST['action'] == 'update_info') {

	// Get the form data
	parse_str($_POST['form_data'], $formData);

	// Check if email already exists
	$current_email = $formData['current_email'];
	$new_email = $formData['new_email'];

	if ($new_email == '') {
		$email = $current_email;
	} else {
		$email = $new_email;
	}

	if (is_exist($conn, 'users', 'email', $new_email)) {
		$response = array(
			'status' => false,
			'field' => 'email',
			'message' => 'Email already used.'
		);
		echo json_encode($response);
		exit;
	}

	// Get the file data (if set)
	if (isset($_FILES['file']) && $_FILES['file']['error'] == UPLOAD_ERR_OK) {
		$file = $_FILES['file'];

		$targetDir = '../src/img/profile/';
		$fileName = basename($file['name']);
		$targetPath = $targetDir . $fileName;

		if (move_uploaded_file($file['tmp_name'], $targetPath)) {
			$data = array(
				'fname' => $formData['update_fname'],
				'lname' => $formData['update_lname'],
				'phone' => $formData['update_contact'],
				'address' => $formData['update_address'],
				'profile' => $fileName,
				'email' => $email,
			);
		}
	} else {
		// If No file was uploaded, dont pass image
		$data = array(
			'fname' => $formData['update_fname'],
			'lname' => $formData['update_lname'],
			'phone' => $formData['update_contact'],
			'address' => $formData['update_address'],
			'email' => $email,
		);
	}

	$update_info = update($conn, 'users', 'user_id', $account_id, $data);

	$response = array(
		'status' => true,
		'message' => 'Updated successfully.'
	);

	echo json_encode($response);
	exit;
}
