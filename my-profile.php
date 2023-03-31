<?php

//  checks if a session has already been started
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

require_once 'db/functions.php';

?>

<?php require_once 'includes/header.php' ?>
<?php require_once 'includes/navbar.php' ?>

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
					<p>Name: Julie Ann Sapla</p>
				</li>

				<li>
					<i class="fa-solid fa-user"></i>
					<p>Email: juli@gmail.com</p>
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