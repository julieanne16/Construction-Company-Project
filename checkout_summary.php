<?php

//  checks if a session has already been started
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

require_once 'db/connection.php';
require_once 'db/functions.php';

if (isset($_SESSION['account_id'])) {
	$user = getRow($conn, 'user_id', $_SESSION['account_id'], 'users');
}

$rows = display_cart($conn, $_SESSION['account_id']);

?>

<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/navbar.php'; ?>

<section class="checkout-summary mt">

	<div class="container">

		<h1 class="section-header">
			<i class="fa-solid fa-check"></i>
			CHECKOUT
		</h1>

		<div class="checkout-wrap">
			<!-- Checkout FORM -->
			<form id="place-order">
				<div class="form-1">
					<h3><span>1</span>Delivery</h3>
					<?php if (isset($_SESSION['logged_in'])) : ?>
						<ul class="shipping-details">
							<h6>Shipping Details</h6>
							<li>Name: <input type="text" value="<?php echo $user['fname'] . ' ' . $user['lname'] ?>" name="default_name" readonly></li>
							<li>Phone: <input type="text" value="<?php echo $user['phone'] ?>" name="default_phone" readonly></li>
							<li>Address: <input type="text" value="<?php echo $user['address'] ?>" name="default_addr" readonly></li>
						</ul>
						<div class="form-terms flex-center">
							<input type="checkbox" name="add_address" id="add-address">
							<p>Use different address</p>
						</div>

						<input type="hidden" value="" name="set_params" id="set-params">

						<ul id="new-form" class="new-details">
							<h6>Add Another Address</h6>
							<div class="form-group">
								<label for="">Name</label>
								<input type="text" placeholder="First name" name="order_fname">
								<input type="text" placeholder="Last name" name="order_lname" class="mb">
							</div>

							<div class="form-group">
								<label for="">Phone</label>
								<input type="text" placeholder="Mobile Number" name="order_phone">
							</div>

							<div class="form-group">
								<label for="">Address</label>
								<input type="text" placeholder="Full Address" name="order_addr">
							</div>
						</ul>
					<?php else : ?>
						<input type="hidden" value="new-users" name="set_params" id="set-params">
						<ul>
							<h6>For New Customer</h6>
							<div class="form-group">
								<label for="">Name</label>
								<input type="text" placeholder="First name" name="reg_fname">
								<input type="text" placeholder="Last name" name="reg_lname" class="mb">
							</div>

							<div class="form-group">
								<label for="">Address</label>
								<input type="text" placeholder="Full Address" name="reg_addr">
							</div>

							<div class="form-group">
								<label for="">Email</label>
								<input type="email" placeholder="Email address" name="reg_email">
							</div>

							<div class="form-group">
								<label for="">Create Password</label>
								<input type="password" placeholder="******" name="reg_password">
							</div>

							<p class="checkout-link">If you are a registered user, please <a href="login.php">Sign In</a></p>
						</ul>
					<?php endif; ?>

				</div>

				<div class="form-2">
					<h3><span>2</span>Payment Option</h3>
					<div class="choose-payment">Please select your mode of payment.</div>

					<div class="option">
						<div>
							<input type="radio" name="order_payment" value="cod" id="cod">
						</div>
						<div class="option-desc">
							<p>Cash on Delivery</p>
							<p>Pay with cash when your order is delivered</p>
						</div>
					</div>

					<div class="option">
						<div>
							<input type="radio" name="order_payment" value="gcash" id="gcash">
						</div>
						<div class="option-desc">
							<p>GCash</p>
							<p>Enter your GCash number below</p>
							<input type="text" name="gcash_num" id="gcash-num" class="form-control" placeholder="Mobile Number">
							<div class="invalid-feedback"></div>
						</div>
					</div>

					<div class="option">
						<div>
							<input type="radio" name="order_payment" value="bank" id="bank_transfer">
						</div>
						<div class="option-desc">
							<p>Bank Transfer</p>
							<p>Enter your account name below</p>
							<input type="text" name="account_num" id="account-num" class="form-control" placeholder="Account Number">
							<div class="invalid-feedback"></div>
						</div>
					</div>
				</div>

				<input type="hidden" name="order_total" id="order-total" value="">
				<div class="checkout-btn">
					<button type="button" class="back-to-cart" id="cancel-order">BACK TO CART</button>
					<button type="submit">COMPLETE ORDER</button>
				</div>
			</form>

			<div class="summary">
				<h3><i class="fa-solid fa-basket-shopping"></i> Order Summary</h3>
				<div>
					<div class="summary-header">
						<p>Product</p>
						<p>Total</p>
					</div>
					<?php foreach ($_SESSION['cart_items'] as $item) : ?>
						<ul class="order-items">
							<li>
								<div class="order-img flex-center">
									<img src="src/img/products/<?php echo $item['img']; ?>" alt="Product">
								</div>
								<p class="order-name"><?php echo $item['name']; ?></p>
							</li>
							<li>
								<p class="order-price">₱ <?php echo number_format($item['total'], 0, '.', ','); ?></p>

							</li>
						</ul>
					<?php endforeach; ?>
				</div>
				<div class="summary-body">
					<div class="subtotal">
						<p>Subtotal:</p>
						<p>₱ <?php echo number_format($_SESSION['total_amount'], 0, '.', ',') ?></p>
					</div>
					<div class="shipping">
						<p>Shipping Fee:</p>
						<p>₱ 100</p>
					</div>
					<div class="total">
						<p>Total:</p>
						<p>₱ <?php echo number_format($_SESSION['total_amount'] + 100, 0, '.', ',') ?></p>
					</div>
				</div>
			</div>

		</div>

	</div>
</section>

<?php require_once 'includes/footer.php' ?>