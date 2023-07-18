<!-- Nav links -->
<div id="navbar-dim" class="overlay"></div>
<?php

if (isset($_SESSION['account_id'])) {
	$user = getRow($conn, 'user_id', $_SESSION['account_id'], 'users');
}

?>

<!-- Navigation Bar -->

<div id="confirm-modal" class="modal">
	<div class="modal-content">
		<p>Are you sure you want to logout?</p>
		<div class="modal-buttons">
			<button id="cancel">Cancel</button>
			<button id="confirm">Yes</button>
		</div>
	</div>
</div>

<nav>
	<div class="container flex-between">
		<div class="navbar-brand">
			<a href="index.php">
				<img src="src/img/assets/brand_logo.png" alt="Brand">
			</a>
		</div>
		<!-- Links -->
		<ul class="navbar-nav flex-center">
			<li class="nav-item">
				<a href="index.php#home" class="nav-link">HOME</a>
			</li>
			<li class="nav-item">
				<a href="index.php#about" class="nav-link">ABOUT</a>
			</li>
			<li class="nav-item <?php if (basename($_SERVER['PHP_SELF']) == 'products.php') echo 'active'; ?>">
				<a href="products.php" class="nav-link">PRODUCTS</a>
			</li>
			<li class="nav-item">
				<a href="index.php#contact" class="nav-link">CONTACT US</a>
			</li>
			<!-- DISPLAY USER PROFILE -->
			<?php if (isset($_SESSION['logged_in'])) : ?>
				<li class="nav-item dropdown-toggle">
					<a class="nav-link">
						<?php if (empty($user['profile'])) : ?>
							<i class="fa-solid fa-user-circle" id="profile-toggle"></i>
						<?php else : ?>
							<div class="navbar-profile" id="profile-toggle">
								<img src="src/img/profile/<?php echo $user['profile'] ?>" alt="profile">
							</div>
						<?php endif; ?>
						<div class="profile-dropdown">
							<div class="profile-heading">
								<i class="fa-solid fa-user-circle"></i>
								<div>
									<p><?php echo $user['fname'] . ' ' . $user['lname'] ?></p>
									<p><?php echo $user['email'] ?></p>
								</div>
							</div>
							<ul>
								<li><a href="settings.php">ACCOUNT</a></li>
								<li><a href="settings.php">SETTINGS</a></li>
								<li><a id="logoutBtn">SIGN OUT</a></li>
							</ul>
						</div>
					</a>
				</li>
			<?php else : ?>

				<!-- REGISTER -->
				<li id="register-link" class="nav-item ">
					<a href="register.php" class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'register.php') echo 'active'; ?>">REGISTER</a>
				</li>

				<!-- LOGIN -->
				<li id="login-link" class="nav-item <?php if (basename($_SERVER['PHP_SELF']) == 'login.php') echo 'active'; ?>">
					<a href="login.php" class="nav-link">LOGIN</a>
				</li>
			<?php endif; ?>

			<!-- SEARCH ICON -->
			<div class="search-wrap">
				<li class="nav-item" id="search">
					<i class="fa-solid fa-search"></i>
				</li>
				<div id="search-bar" class="search-bar">
					<form id="search-form" action="products.php">
						<input type="text" name="search" id="search" placeholder="Search a product ...">
						<input type="submit" value="SEARCH">
					</form>
				</div>
			</div>

			<!-- CART ICON -->
			<li class="nav-item">
				<a href="cart.php" class="cart">
					<i class="fa-solid fa-basket-shopping"></i>
					<span class="cart-count"></span>
				</a>
			</li>
		</ul>
		<ul class="sp-nav">
			<li class="nav-item">
				<a href="cart.php" class="cart">
					<i class="fa-solid fa-basket-shopping"></i>
					<span class="cart-count"></span>
				</a>
			</li>
			<li id="menu-bars" class="nav-item">
				<i class="fa-solid fa-bars"></i>
			</li>
		</ul>
	</div>
</nav>