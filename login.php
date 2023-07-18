<?php

//  checks if a session has already been started
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

require_once 'db/connection.php';
require_once 'db/functions.php';

?>

<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/navbar.php'; ?>

<section class="forms mt">

	<div class="container">

		<form id="login" method="POST">
			<h1>SIGN IN</h1>
			<p class="subheader">Please fill your email and password to login</p>

			<!-- Show message if error -->
			<div class="invalid-form"></div>
			<!-- Show message if error -->

			<div class="form-group">
				<label for="email">Email Address</label>
				<input type="email" class="form-control" id="email" name="email" placeholder="your_mail@website.com">
				<span class="invalid-feedback"></span>
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" class="form-control" id="password" name="password" placeholder="*******">
				<span class="invalid-feedback"></span>
			</div>
			<button type="submit" name="login" id="loginBtn" class="form-btn">SIGN IN</button>
			<p>Don't have an account? <a href="register.php">Sign Up here</a> </p>
		</form>

	</div>

</section>

<?php require_once 'includes/footer.php' ?>