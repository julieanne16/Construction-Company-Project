<!-- Navigation Bar -->
<nav>
	<div class="container">
		<a href="#" class="navbar-brand">
			Construction <span>Co.</span>
		</a>
		<div class="navbar-group">
			<!-- Links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="index.php#home" class="nav-link">Home</a>
				</li>
				<li class="nav-item">
					<a href="index.php#about" class="nav-link">About Us</a>
				</li>
				<li class="nav-item">
					<a href="index.php#products" class="nav-link">Products</a>
				</li>
				<li class="nav-item">
					<a href="index.php#contact" class="nav-link">Contact Us</a>
				</li>
				<?php if (isset($_SESSION['account_id'])) : ?>
					<li class="nav-item dropdown-toggle">
						<a class="nav-link">
							<i class="fa-solid fa-user-circle" id="profile-toggle"></i>
							<div class="profile-dropdown">
								<div class="profile-heading">
									<i class="fa-solid fa-user-circle"></i>
									<a href="my-profile.php">
										<div>
											<p><?php echo $_SESSION['name'] ?></p>
											<p><?php echo $_SESSION['email'] ?></p>
										</div>
									</a>
								</div>
								<ul>
									<li><a href="settings.php">Settings</a></li>
									<li><a id="logoutBtn">Sign Out</a></li>
								</ul>
							</div>
						</a>
					</li>
				<?php else : ?>
					<li class="nav-item">
						<a href="login.php" class="nav-link">Login</a>
					</li>
					<li class="nav-item">
						<a href="register.php" class="nav-link">Register</a>
					</li>
				<?php endif; ?>
			</ul>
			<!-- Basket Icon -->
			<a href="products.php" class="nav-link">
				<i class="fa-solid fa-basket-shopping"></i>
			</a>
			<!-- Bars Icon -->
			<i id="navToggler" class="fa-solid fa-bars"></i>
		</div>

	</div>

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
</nav>