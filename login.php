<?php

require_once 'includes/header.php';

$msg = "";

if (isset($_POST['email']) && isset($_POST['password'])) {
	$user = login($_POST['email'], $_POST['password']);

	if ($user) {
		// Success login
		$_SESSION['user_id'] = $user['user_id'];
		header('Location: products.php');
		exit();
	} else {
		$msg = "Login Failed.";
	}
} ?>

<main>
	<div class="form">
		<h1>SIGN IN</h1>
		<p>Please fill your email and password to login</p>
		<form id="login-form" method="POST">

			<!-- Show message if error -->
			<?php if ($msg) : ?>
				<small><?php echo $msg; ?></small>
			<?php endif; ?>
			<!-- Show message if error -->

			<div class="form-group">
				<label>Email Address</label>
				<input type="email" name="email" placeholder="your_mail@website.com" required>
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" name="password" placeholder="*******" required>
			</div>

			<button class="form-btn">SIGN IN</button>
			<p>Don't have an account? <a href="#">Register here</a> </p>
		</form>
	</div>
</main>

<?php require_once 'includes/footer.php' ?>