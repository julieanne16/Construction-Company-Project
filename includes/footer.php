<footer>
	<div class="container">

		<div class="footer-main">
			<div class="footer-brands">
				<div class="navbar-brand">
					<a href="index.php">
						<img src="src/img/assets/brand_logo.png" alt="Brand">
					</a>
				</div>
				<p>Tagline of the Construction Company</p>
				<div class="footer-media">
					<i class="fa-brands fa-square-facebook"></i>
					<i class="fa-brands fa-square-instagram"></i>
					<i class="fa-brands fa-linkedin"></i>
				</div>
			</div>

			<div class="footer-contact">
				<p class="footer-heading">Head Office</p>
				<ul>
					<li>
						<i class="fa-solid fa-location-dot"></i>
						<span>Cruz St. Sampaloc, Manila Philippines</span>
					</li>
					<li>
						<i class="fa-solid fa-phone"></i>
						<span>+63 8831-0000</span>
					</li>
					<li>
						<i class="fa-solid fa-envelope"></i>
						<span>construction.co@gmail.com</span>
					</li>
				</ul>
			</div>

			<div class="footer-links">
				<p class="footer-heading">Site Map</p>
				<ul>
					<li>
						<a href="index.php#home">Home</a>
					</li>
					<li>
						<a href="index.php#about">About</a>
					</li>
					<li>
						<a href="products.php">Products</a>
					</li>
					<?php if (!isset($_SESSION['logged_in'])) : ?>
						<li>
							<a href="register.php">Register</a>
						</li>
						<li>
							<a href="login.php">Login</a>
						</li>
					<?php endif; ?>
					<li>
						<a href="index.php#contact">Contact Us</a>
					</li>
				</ul>
			</div>
		</div>

		<div class="footer-policy">
			<ul>
				<li><a href="terms_and_conditions.php">Terms and Conditions</a></li>
				<li><a href="privacy_policy.php">Privacy Policy</a></li>
			</ul>
		</div>

	</div>

	<div class="footer-author">
		<div class="container">
			<p>Copyright &copy; Construction Co. <span>|</span> </p>
			<p>Design by KAI - Powered by Tech2serV</p>
		</div>
	</div>

</footer>

<!-- jQuery (offline mode) -->
<!-- <script src="src/js/jquery-3.6.0.min.js"></script> -->

<!-- jQuery (cdn / online mode) -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- jQuery Datatables -->
<script src="https://cdn.datatables.net/v/dt/dt-1.13.4/datatables.min.js"></script>

<!-- Fontawesome Kit -->
<script src=" https://kit.fontawesome.com/0ebd665efa.js" crossorigin="anonymous"></script>

<!-- Main script -->
<script src="src/js/main.js"></script>

</body>

</html>