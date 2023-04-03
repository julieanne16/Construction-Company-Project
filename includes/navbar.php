<!-- Nav links -->
<div id="navbar-dim" class="overlay"></div>

<!-- Modal for logout -->
<div id="confirm-modal" class="modal">
	<div class="modal-content">
		<p>Are you sure you want to logout?</p>
		<div class="modal-buttons">
			<button id="cancel">Cancel</button>
			<button id="confirm">Logout</button>
		</div>
	</div>
</div>

<!-- Navigation Bar -->
<nav>
	<div class="container">
		<a href="#" class="navbar-brand">
			Construction <span>Co.</span>
		</a>
		<!-- Links -->
		<ul class="navbar-nav">
			<li class="nav-item">
				<a href="index.php#home" class="nav-link">HOME</a>
			</li>
			<li class="nav-item">
				<a href="index.php#about" class="nav-link">ABOUT US</a>
			</li>
			<li class="nav-item">
				<a href="index.php#products" class="nav-link">PRODUCTS</a>
			</li>
			<li class="nav-item">
				<a href="index.php#contact" class="nav-link">CONTACT US</a>
			</li>
			<?php if (isset($_SESSION['account_id'])) : ?>
				<li class="nav-item dropdown-toggle">
					<a class="nav-link">
						<i class="fa-solid fa-user-circle" id="profile-toggle"></i>
						<div class="profile-dropdown">
							<div class="profile-heading">
								<i class="fa-solid fa-user-circle"></i>
								<div>
									<p><?php echo $_SESSION['name'] ?></p>
									<p><?php echo $_SESSION['email'] ?></p>
								</div>
							</div>
							<ul>
								<li><a href="profile.php">Profile</a></li>
								<li><a href="settings.php">Settings</a></li>
								<li><a id="logoutBtn">Sign Out</a></li>
							</ul>
						</div>
					</a>
				</li>
			<?php else : ?>
				<li id="register-link" class="nav-item">
					<a href="register.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'register.php') ? 'active' : ''; ?>">REGISTER</a>
				</li>
				<li id="login-link" class="nav-item">
					<a href="login.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'login.php') ? 'active' : ''; ?>">LOGIN</a>
				</li>
			<?php endif; ?>
			<!-- Basket Icon -->
			<li class="nav-item">
				<a href="" class="nav-link">
					<i class="fa-solid fa-magnifying-glass"></i>
				</a>
			</li>
			<!-- Basket Icon -->
			<li class="nav-item">
				<a href="cart.php" class="nav-link cart">
					<i class="fa-solid fa-basket-shopping"></i>
					<span id="cart-count"></span>
				</a>
			</li>
		</ul>

		<!-- Bars Icon -->
		<i id="navToggler" class="fa-solid fa-bars"></i>
	</div>
</nav>