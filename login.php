<?php

//  checks if a session has already been started
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}


require_once 'functions.php';


if (isset($_POST['email']) && isset($_POST['password'])) {

	$email = trim($_POST['email']);
	$password = trim($_POST['password']);

	// sanitize email input
	$email = filter_var($email, FILTER_SANITIZE_EMAIL);

	// sanitize password
	$password = htmlspecialchars($password, ENT_QUOTES);

	$account = login($conn, $email, $password);

	echo json_encode($account);
	exit;
}
?>


<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/navbar.php'; ?>

<section class="forms">
	<div class="container">
		<h1>SIGN IN</h1>
		<p>Please fill your email and password to login</p>

		<form id="login" method="POST">

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