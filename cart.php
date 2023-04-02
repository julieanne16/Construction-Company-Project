<?php

//  checks if a session has already been started
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

?>

<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/navbar.php'; ?>

<section class="cart">
	<div class="container">
		<h1>CART PAGE</h1>
		<?php if (isset($_SESSION['account_id'])) : ?>
			<p>Your cart is empty. Please browse our products now.</p>
		<?php else : ?>
			<p>You need to login first to view your cart items.</p>
		<?php endif; ?>
	</div>
</section>

<?php require_once 'includes/footer.php' ?>