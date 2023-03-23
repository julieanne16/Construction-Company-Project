<?php

session_start();

require_once 'functions.php';

// Check if the user is logged in
if (!isset($_SESSION['account_id'])) {
	header("Location: login.php");
	exit();
}


// Retrieve the account_id value from the session
$user_id = $_SESSION['user_id'];

// Get user info
$user = getRow($conn, 'user_id', $user_id, 'users');

print_r($user);
?>

<?php require_once 'includes/header.php' ?>

<h1>This is the product page</h1>
<h3>Welcome! <?php echo $account_id; ?></h3>



<?php require_once 'includes/footer.php' ?>