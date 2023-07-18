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
		<form id="register" method="POST">
			<h1>SIGN UP</h1>
			<p class="subheader">Please fill out the form to register</p>
			<input type="hidden" name="registration">

			<!-- Show message if error -->
			<div class="invalid-form"></div>
			<!-- Show message if error -->

			<div class="form-group">
				<label class="fname">First Name</label>
				<input type="text" class="form-control" id="fname" name="fname" placeholder="First name">
				<span class="invalid-feedback"></span>
			</div>

			<div class="form-group">
				<label for="lname">Last Name</label>
				<input type="text" class="form-control" id="lname" name="lname" placeholder="Last name">
				<span class="invalid-feedback"></span>
			</div>

			<div class="form-group">
				<label class="email">Email Address</label>
				<input type="email" class="form-control" id="email" name="email" placeholder="your_mail@website.com">
				<span class="invalid-feedback"></span>
			</div>

			<div class="form-group">
				<label class="address">Address</label>
				<input type="text" class="form-control" id="address" name="address" placeholder="Full Address">
				<span class="invalid-feedback"></span>
			</div>

			<div class="form-group">
				<label class="password">Password</label>
				<input type="password" class="form-control" id="password" name="password" placeholder="*******">
				<span class="invalid-feedback"></span>
			</div>

			<div class="form-group">
				<label class="cPassword">Confirm Password</label>
				<input type="password" class="form-control" id="confirm-password" name="confirm_password" placeholder="*******">
				<span class="invalid-feedback"></span>
			</div>

			<div class="form-group">
				<div class="wrap flex-center">
					<div class="captcha-wrap">
						<span id="captcha"></span>
					</div>
					<i id="reset" class="fa-solid fa-arrows-rotate"></i>
				</div>
				<input type="text" name="captcha" id="captcha-input" class="form-control" placeholder="Please retype the code above">
				<span class="invalid-feedback"></span>
			</div>

			<div class="form-group terms">
				<div class="form-terms flex-center">
					<input type="checkbox" name="terms" id="terms">
					<p>I have read and agree to the <a href="terms_and_conditions.php">Terms & Conditions</a></p>
				</div>
				<span class="invalid-feedback"></span>
			</div>

			<button type="submit" name="register" class="form-btn">SIGN UP</button>
			<p>Have an account? <a href="login.php">Sign In here</a></p>
		</form>
	</div>

</section>


<?php require_once 'includes/footer.php' ?>

</html>