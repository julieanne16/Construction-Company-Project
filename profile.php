<?php

session_start();

require_once 'functions.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
	header("Location: login.php");
	// exit();
}

// Retrieve the account_id value from the session
$user_id = $_SESSION['user_id'];

// Get user info
$user = getRow($conn, 'user_id', $user_id, 'users');

// print_r($user);
?>

<?php require_once 'includes/header.php' ?>

<section class="profile">
	<div class="container">

		<ul class="profile-tabs">
			<li class="tab-active">
				<i class="fa-solid fa-user"></i>
				<a href="#">Profile</a>
			</li>
			<li>
				<i class="fa-solid fa-cart-shopping"></i>
				<a href="#">My Orders</a>
			</li>
			<li>
				<i class="fa-solid fa-arrow-right-arrow-left"></i>
				<a href="#">My Transactions</a>
			</li>
		</ul>

		<div class="profile-content">
			<p>my profile</p>
			<div class="profile-img">
				<img src="src/img/products/cement.png" alt="">
			</div>

			<ul class="profile-info">
				<li>
					<i class="fa-solid fa-user"></i>
					<p>Name: <?php echo $_SESSION['name'] ?></p>
				</li>

				<li>
					<i class="fa-solid fa-user"></i>
					<p><?php echo $_SESSION['email'] ?></p>
				</li>

				<li>
					<i class="fa-solid fa-user"></i>
					<p>Mobile: 09955945857</p>
				</li>
			</ul>
		</div>
	</div>
	</div>

</section>




<?php require_once 'includes/footer.php' ?>