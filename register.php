<?php

session_start();

$msg = "";

$success = "";

require_once 'functions.php';

if (isset($_POST['register'])) {
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	$new_user = register($conn, $fname, $lname, $email, $password);
	if (!$new_user) {
		$msg = "This email is already registered.";
	} else {
		$success = "Registration successful.";
	}
}

?>

<?php require_once 'includes/header.php'; ?>
<main>
	<div class="form">
		<h1>SIGN UP</h1>
		<p>Please fill out the form to register</p>
		<form id="login-form" method="post" action="register.php">

			<!-- Show message if error -->
			<?php if ($msg) : ?>
				<p class="error"><?php echo $msg; ?></p>
			<?php endif;
			unset($msg);
			?>
			<!-- Show message if error -->

			<!-- Show message if error -->
			<?php if ($success) : ?>
				<p class="success"><?php echo $success; ?></p>
			<?php endif;
			unset($success);
			?>
			<!-- Show message if error -->

			<div class="form-group">
				<label>Your Name</label>
				<input type="text" name="fname" placeholder="First name" required>
				<input type="text" name="lname" placeholder="Last name" required>
			</div>
			<div class="form-group">
				<label>Email Address</label>
				<input type="email" name="email" placeholder="your_mail@website.com" required>
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" name="password" placeholder="*******" required>
			</div>
			<div class="form-group">
				<label>Confirm Password</label>
				<input type="password" name="confirm_password" placeholder="*******" required>
			</div>

			<button type="submit" name="register" class="form-btn">SIGN UP</button>
			<p>I have read and agree to the <a href="#">Terms & Conditions</a>
				<br>Have an account? <a href="login.php">Login</a>
			</p>
		</form>
	</div>
</main>


<?php require_once 'includes/footer.php' ?>

</html>