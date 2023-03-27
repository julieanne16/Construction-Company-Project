<?php

session_start();

require_once 'functions.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
	header("Location: login.php");
	exit();
}

// Retrieve the account_id value from the session
$user_id = $_SESSION['user_id'];

// Get user info
$user = getRow($conn, 'user_id', $user_id, 'users');

// print_r($user);
?>

<?php require_once 'includes/header.php' ?>

<div class="container profile">
	<h1>Profile</h1>
	<p>Welcome! <span><?php echo $user['fname'] . " " . $user['lname']; ?></span></p>
	<p>My email: <span><?php echo $user['email']; ?></span></p>
</div>




<?php require_once 'includes/footer.php' ?>