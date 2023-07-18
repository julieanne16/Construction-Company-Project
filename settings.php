<?php

//  checks if a session has already been started
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

require_once 'db/connection.php';
require_once 'db/functions.php';

$user = getRow($conn, 'user_id', $_SESSION['account_id'], 'users');

$orders = display_transaction($conn, $_SESSION['account_id']);


?>


<!-- <link rel="stylesheet" href="settings.css"> -->
<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/navbar.php'; ?>


<section class="settings mt">
	<div class="container">

		<div class="settings-flex">
			<!-- Tab Links -->
			<div class="tab">
				<button class="tablinks" onclick="openPage(event, 'account')" id="defaultOpen"><i class="fa-solid fa-circle-user"></i>ACCOUNT</button>
				<button class="tablinks" onclick="openPage(event, 'transaction')"><i class="fa-solid fa-arrow-right-arrow-left"></i></i>TRANSACTIONS</button>
				<button class="tablinks" onclick="openPage(event, 'setting')"><i class="fa-solid fa-user-gear"></i>SETTINGS</button>
				<button class="tablinks" onclick="openPage(event, 'password')"><i class="fa-solid fa-key"></i>CHANGE PASSWORD</button>
			</div>

			<!-- Tab Content -->
			<div id="account" class="tabcontent">
				<div class="form">

					<!-- Page title -->
					<div class="title section-header">
						<i class="fa-solid fa-user-circle"></i>
						<h1>ACCOUNT</h1>
					</div>

					<div class="profile-img flex-center">
						<?php if (empty($user['profile'])) : ?>
							<i class="fa-solid fa-file-image"></i>
						<?php else : ?>
							<img src="src/img/profile/<?php echo $user['profile'] ?>" alt="<?php echo $user['profile'] ?>">
						<?php endif; ?>
					</div>

					<ul class="profile-info">
						<li>
							<i class="fa-solid fa-user"></i>
							<p>Name: <?php echo $user['fname'] . " " .  $user['lname'] ?></p>
						</li>

						<li>
							<i class="fa-solid fa-envelope"></i>
							<p>Email: <?php echo $user['email'] ?></p>
						</li>

						<li>
							<i class="fa-solid fa-phone"></i>
							<p>Phone: <?php echo $user['phone'] ?></p>
						</li>

						<li>
							<i class="fa-solid fa-location-dot"></i>
							<p>Address: <?php echo $user['address'] ?></p>
						</li>
					</ul>

				</div>
			</div>

			<!-- Tabcontent -->
			<div id="transaction" class="tabcontent transaction">

				<?php
				foreach ($orders as $order) :
					$products = explode(',', $order['product_details']);

					$dateStr = $order['purchase_date'];
					$timestamp = strtotime($dateStr);
					$purchase_date = date('F j, Y g:i a', $timestamp);
				?>
					<div class="datasets">
						<div class="orders">
							<div class="orders-header">
								<p>Date Ordered: <span><?php echo $purchase_date ?></span></p>
								<p>Status: <span><?php echo $order['order_status'] ?></span></p>
							</div>
						</div>

						<?php foreach ($products as $product) :
							$product_details = explode('|', $product);
							$product_name = $product_details[0];
							$product_image = $product_details[1];
							$order_quantity = $product_details[2];
							$order_price = $product_details[3];
						?>
							<ul class="order-items">
								<li>
									<div class="order-img flex-center">
										<img src="src/img/products/<?php echo $product_image; ?>" alt="Product">
									</div>
									<p class="order-name"><?php echo $product_name; ?></p>
								</li>
								<li>
									<p class="order-quantity">Qty: <span><?php echo $order_quantity; ?></span></p>
								</li>
								<li>
									<p class="order-price">₱ <?php echo number_format($order_price, 0, '.', ','); ?></p>

								</li>
							</ul>
						<?php endforeach; ?>

						<div class="order-summary">
							<ul class="order-details">
								<li><i class="fa-solid fa-basket-shopping"></i> Order #: <?php echo $order['order_id'] ?></li>
								<li><i class="fa-solid fa-location-dot"></i> Address: <?php echo $order['address'] ?></li>
								<li><i class="fa-solid fa-money-bill-wave"></i> Payment Method: <?php echo $order['payment_opt'] ?></li>
							</ul>
							<ul class="order-total">
								<li>
									<p>Total Summary</p>
								</li>
								<li>
									<p>Subtotal:</p>
									<p>₱ <?php echo number_format($order['order_total'], 0, '.', ',') ?></p>

								</li>
								<li>
									<p>Shipping Fee:</p>
									<p>₱ <?php echo $order['shipping_fee'] ?></p>
								</li>
								<li>
									<p>Total:</p>
									<p>₱ <?php echo number_format($order['order_total'] + $order['shipping_fee'], 0, '.', ',') ?></p>

								</li>
							</ul>
						</div>
					</div>
				<?php endforeach; ?>




			</div>

			<!-- Tab Content -->
			<div id="setting" class="tabcontent">
				<div class="form">

					<!-- Page title -->
					<div class="title section-header">
						<i class="fa-solid fa-user-gear"></i>
						<h1>SETTINGS</h1>
					</div>


					<form id="update-user" enctype="multipart/form-data">

						<div class="profile-img flex-center">
							<?php if (empty($user['profile'])) : ?>
								<i class="fa-solid fa-file-image"></i>
							<?php else : ?>
								<img src="src/img/profile/<?php echo $user['profile'] ?>" alt="<?php echo $user['profile'] ?>">
							<?php endif; ?>
						</div>

						<!-- Profile -->
						<div class="group-validate">
							<input type="file" name="profile" id="profile" class="upload-img" value="Upload Profile">
							<span class="invalid-feedback"></span>
						</div>

						<!-- Fname -->
						<div class="form-group">
							<label>First Name *</label>
							<input type="fname" name="update_fname" id="update-fname" class="form-control" placeholder="First Name" value="<?php echo $user['fname']; ?>">
							<span class="invalid-feedback"></span>
						</div>

						<!-- Lname -->
						<div class="form-group">
							<label>Last Name *</label>
							<input type="lname" name="update_lname" id="update-lname" class="form-control" placeholder="Last Name" value="<?php echo $user['lname']; ?>">
							<span class="invalid-feedback"></span>
						</div>

						<!-- Contact -->
						<div class="form-group">
							<label>Contact Number *</label>
							<input type="contact" name="update_contact" id="update-contact" class="form-control" placeholder="Contact Number" value="<?php echo $user['phone']; ?>">
							<span class="invalid-feedback"></span>
						</div>

						<!-- Address -->
						<div class="form-group">
							<label>Address *</label>
							<input type="text" name="update_address" id="update-address" class="form-control" placeholder="Full Address" value="<?php echo $user['address']; ?>">
							<span class="invalid-feedback"></span>
						</div>

						<!-- Email -->
						<div class="form-group">
							<label>Current Email Address</label>
							<input type="email" class="form-control readonly" name="current_email" id="current-email" value="<?php echo $user['email']; ?>" readonly>
						</div>

						<!-- New Email -->
						<div class="form-group">
							<label>New Email Address</label>
							<input type="email" name="new_email" id="new-email" class="form-control" placeholder="New Email Address">
							<span class="invalid-feedback"></span>
						</div>

						<div class="update-btn">
							<button class="form-btn" name="updateUser">SAVE CHANGES</button>
							<button class="form-btn-cancel" type="button">CANCEL</button>
						</div>
					</form>
				</div>
			</div>

			<!-- Tabcontent -->
			<div id="password" class="tabcontent">
				<div class="form">

					<!-- Page title -->
					<div class="title section-header">
						<i class="fa-solid fa-key"></i>
						<h1>CHANGE PASSWORD</h1>
					</div>

					<form id="change-pass">
						<p>Password must be at least 6 characters</p>

						<div class="form-group">
							<label>Current Password *</label>
							<input type="password" name="current_pass" id="current-pass" placeholder="Current Password" class="form-control">
							<span class="invalid-feedback"></span>
						</div>
						<div class="form-group">
							<label>New Password *</label>
							<input type="password" name="new_pass" id="new-pass" placeholder="New Password" class="form-control">
							<span class="invalid-feedback"></span>
						</div>
						<div class="form-group">
							<label>Confirm New Password *</label>
							<input type="password" name="confirm_pass" id="confirm-pass" placeholder="Confirm New Password" class="form-control">
							<span class="invalid-feedback"></span>
						</div>

						<div class="update-btn">
							<button class="form-btn" name="update_pass">SAVE CHANGES</button>
							<button class="form-btn-cancel" type="button">CANCEL</button>
						</div>
					</form>
				</div>
			</div>

		</div>
</section>

<script>
	function openPage(evt, pageName) {
		var i, tabcontent, tablinks;
		tabcontent = document.getElementsByClassName("tabcontent");
		for (i = 0; i < tabcontent.length; i++) {
			tabcontent[i].style.display = "none";
		}
		tablinks = document.getElementsByClassName("tablinks");
		for (i = 0; i < tablinks.length; i++) {
			tablinks[i].className = tablinks[i].className.replace(" active", "");
		}
		document.getElementById(pageName).style.display = "block";
		evt.currentTarget.className += " active";
	}

	// Get the element with id="defaultOpen" and click on it
	document.getElementById("defaultOpen").click();
</script>


</main>

<?php require_once 'includes/footer.php' ?>