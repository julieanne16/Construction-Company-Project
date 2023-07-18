<?php

//  checks if a session has already been started
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

require_once 'functions.php';

// Fetch cart items
if (isset($_SESSION['account_id'])) {
	$cart_items = display_transaction($conn, $_SESSION['account_id']);
}

?>

<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/navbar.php'; ?>


<section class="my-cart">
	<div class="container">
		<h1>MY TRANSACTIONS<br>
		</h1>
		<?php if (count($cart_items) == 0) : ?>
			<p class="page-msg">Your transaction is empty. Add an item to your cart first!</p>
		<?php else : ?>
			<table>
				<thead>
					<tr>
						<th>Product</th>
						<th>Item Price</th>
						<th>Quantity</th>
						<th>Total Price</th>
						<th>Purchase Date</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($cart_items as $item) : ?>
						<tr>
							<td>
								<div class="cart-item-wrap">
									<div class="cart-item-img">
										<img src="img/products/<?php echo $item['img'] ?>" alt="Product">
									</div>
									<p class="cart-item-info"><?php echo $item['name'] ?></p>
								</div>
							</td>

							<td>₱ <?php echo $item['price'] ?></td>

							<td><?php echo $item['quantity'] ?></td>

							<td>₱ <?php echo $item['total'] ?></td>

							<td><?php echo $item['purchase_date'] ?></td>

						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		<?php endif; ?>
	</div>
</section>

<?php require_once 'includes/footer.php' ?>