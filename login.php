<?php

session_start();


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
			<div class="form-group">
				<label for="captcha">Captcha</label>
				<input type="text" class="form-control" name="captcha" id="" placeholder="Enter Captcha" required> 
				<input type="hidden" name="captcha-rand" value="<?php echo $rand; ?>">
			</div>
			<div class="form-group">
				<label for="captcha" class="form-control" >Captcha Code</label>
				<div class="captcha" class="form-control" ><?php echo $rand; ?></div> 
			</div>

			<button type="submit" name="login" id="loginBtn" class="form-btn">SIGN IN</button>
			<p>Don't have an account? <a href="register.php">Sign Up here</a> </p>
		</form>
	</div>
</section>

<?php require_once 'includes/footer.php' ?>