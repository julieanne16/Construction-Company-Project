<?php

require_once 'functions.php';

if (isset($_POST['registration'])) {
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	$new_account = register($conn, $fname, $lname, $email, $password);

	echo json_encode($new_account);
}

?>

<?php require_once 'includes/header.php'; ?>
<section class="forms">
	<div class="container">
		<h1>SIGN UP</h1>
		<p>Please fill out the form to register</p>
		<form id="register" method="POST">
			<input type="hidden" name="registration">

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
				<label class="password">Password</label>
				<input type="password" class="form-control" id="password" name="password" placeholder="*******">
				<span class="invalid-feedback"></span>
			</div>

			<div class="form-group">
				<label class="cPassword">Confirm Password</label>
				<input type="password" class="form-control" id="cPassword" name="confirm_password" placeholder="*******">
				<span class="invalid-feedback"></span>
			</div>

			<div class="form-group terms">
				<div class="form-terms">
					<input type="checkbox" name="terms" id="terms">
					<p>I agree to the <a href="#">terms and conditions</a></p>
				</div>
				<span class="invalid-feedback">Please agree</span>
			</div>

			<button type="submit" name="register" class="form-btn">SIGN UP</button>
			<br>Have an account? <a href="login.php">Login</a>
			</p>
		</form>
	</div>
</section>


<?php require_once 'includes/footer.php' ?>

</html>