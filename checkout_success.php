<?php
//  checks if a session has already been started
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

if (isset($_SESSION['order_id'])) {
	$order_id = $_SESSION['order_id'];
}

require_once 'db/connection.php';
require_once 'db/functions.php';


?>

<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/navbar.php'; ?>

<section class="checkout-success mt">
	<div class="container">
		<i class="fa-regular fa-circle-check"></i>
		<h1>THANK YOU FOR YOUR PURCHASE!</h1>
		<p>Your order number is <span><?php echo $_SESSION['order_id'] ?></span>. We will email you an order confirmation with details and tracking information shortly.</p>
		<?php unset($_SESSION['order_id']) ?>
		<p>You can track your order using the following reference number: <span><?php echo $_SESSION['ref_number'] ?></span></p>
		<?php unset($_SESSION['ref_number']) ?>
		<button class="btn-shop">CONTINUE SHOPPING</button>
	</div>
</section>

<?php require_once 'includes/footer.php' ?>