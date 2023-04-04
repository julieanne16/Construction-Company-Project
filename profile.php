<?php

session_start();

require_once 'functions.php';

// // Check if the user is logged in
// if (!isset($_SESSION['account_id'])) {
// 	header("Location: login.php");
// 	// exit();
// }

// Retrieve the account_id value from the session
$user_id = $_SESSION['account_id'];

// Get user info
// $user = getRow($conn, 'user_id', $user_id, 'users');

// print_r($user);
?>

<?php require_once 'includes/header.php' ?>
<?php require_once 'includes/navbar.php' ?>

<section class="profile">
	<div class="container">

		<ul class="profile-tabs">
			<li class="tab-active">
				<i class="fa-solid fa-user"></i>
				<a href="#">MY PROFILE</a>
			</li>
			<li>
				<i class="fa-solid fa-cart-shopping"></i>
				<a href="#">MY ORDERS</a>
			</li>
			<li>
				<i class="fa-solid fa-arrow-right-arrow-left"></i>
				<a href="#">MY TRANSACTIONS</a>
			</li>
		</ul>

		<div class="profile-content">
			<p>MY PROFILE</p>
			<div class="profile-img">
				<i class="fa-solid fa-file-image"></i>
			</div>

			<ul class="profile-info">
				<li>
					<i class="fa-solid fa-user"></i>
					<p>Name: <?php echo $_SESSION['name'] ?></p>
				</li>

				<li>
					<i class="fa-solid fa-envelope"></i>
					<p>Email: <?php echo $_SESSION['email'] ?></p>
				</li>

				<li>
					<i class="fa-solid fa-phone"></i>
					<p>Mobile: </p>
				</li>
			</ul>
		</div>
	</div>
	</div>

</section>


<?php require_once 'includes/footer.php' ?>