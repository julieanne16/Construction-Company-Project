<?php

session_start();

require_once 'functions.php';


$msg = "";


if (isset($_POST['login'])) {
	$user = login($conn, $_POST['email'], $_POST['password']);

	if ($user) {
		// Success login
		$_SESSION['user_id'] = $user['user_id'];
		header('Location: products.php');
		exit();
	} else {
		$msg = "Login Failed.";
	}
} ?>

<?php require_once 'includes/header.php'; ?>

<main>
	<div class="form">
		<h1>SIGN IN</h1>
		<p>Please fill your email and password to login</p>
		<form id="login-form" method="POST" action="login.php">

			<!-- Show message if error -->
			<?php if ($msg) : ?>
				<small><?php echo $msg; ?></small>
			<?php endif; ?>
			<!-- Show message if error -->

			<div class="form-group">
				<label for="email">Email Address</label>
				<input type="email" id="email" name="email" placeholder="your_mail@website.com" required>
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" id="password" name="password" placeholder="*******" required>
			</div>

			<button type="submit" name="login" class="form-btn">SIGN IN</button>
			<p>Don't have an account? <a href="#">Register here</a> </p>
		</form>
	</div>
</main>

<?php require_once 'includes/footer.php' ?>