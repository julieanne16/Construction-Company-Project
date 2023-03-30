<?php

require_once 'functions.php';

if (isset($_POST['registration'])) {
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	$new_account = register($conn, $fname, $lname, $email, $password);

	echo json_encode($new_account);
	exit;
}

?>

<?php
require_once ('connection.php');
$rand = rand(9999,1000);
if(isset($_REQUEST['login']))
{


	$email = $_REQUEST['email'];
	$password = $_REQUEST['password'];
	$captcha = $_REQUEST['captcha'];
	$captcharandom = $_REQUEST['captcha-rand'];
	if($captcha!=$captcharandom)
	{?>
		<script type="text/javascript"> alert("Invalid")</script>
	<?php
	}
	else
	{
		$select_query = mysql_query($connection, "SELECT * from users where email = '$email' and password = '$password'");
		$result = mysql_num_rows($select_query);
		if($result>0)
	{?>
			<script type="text/javascript">
				alert("Login Success");
			</script>
<?php
		}
		else
		{?>
			<script type="text/javascript">
				alert("Invalid Captcha");
			</script>
			<?php
		}
	}	
}
?>

<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/navbar.php'; ?>

<section class="forms">
	<div class="container">
		<h1>SIGN UP</h1>
		<p>Please fill out the form to register</p>
		<form id="register" method="POST">
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
				<label class="password">Password</label>
				<input type="password" class="form-control" id="password" name="password" placeholder="*******">
				<span class="invalid-feedback"></span>
			</div>

			<div class="form-group">
				<label class="cPassword">Confirm Password</label>
				<input type="password" class="form-control" id="confirm-password" name="confirm_password" placeholder="*******">
				<span class="invalid-feedback"></span>
			</div>

			<div class="form-group terms">
				<div class="form-terms">
					<input type="checkbox" name="terms" id="terms">
					<p>I agree to the <a href="#">terms and conditions</a></p>
				</div>
				<span class="invalid-feedback">Please agree</span>
			</div>

			<div class="form-group">
				<label for="captcha">Captcha</label>
				<input type="text" class="form-control" name="captcha" id="" placeholder="Enter Captcha" required> 
				<input type="hidden" name="captcha-rand" value="<?php echo $rand; ?>">
			</div>
			<div class="form-group">
				<label for="captcha" class="form-control" >Captcha Code</label>
				<div class="captcha" class="form-control" ><?php echo $rand; ?></div> 
			</div>

			<button type="submit" name="register" class="form-btn">SIGN UP</button>
			<p>Already have an account? <a href="login.php">Sign In here</a></p>
		</form>
	</div>
</section>


<?php require_once 'includes/footer.php' ?>

</html>