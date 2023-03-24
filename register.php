<?php

session_start();

$msg = "";

require_once 'functions.php';

if (isset($_POST['register'])) {
	$new_user = register($_POST['name'], $_POST['email'], $_POST['password']);
	if (!$new_user) {
		$msg = "This email is already registered.";
	} else {
		header('Location: login.php');
		exit();
	}
}

?>

<?php require_once 'includes/header.php'; ?>
    <main>
        <div class="form">
		  <h1>SIGN UP</h1>
          <p>Please fill out the form to register</p>
		   <form id="login-form">
            <div class="form-group">
                 <label>Your Name</label>
                 <input type="text" name="name" placeholder="First name">
                 <input type="text" name="name" placeholder="Last name">
             </div>  
             <div class="form-group">
                 <label>Email Address</label>
                 <input type="email" name="email" placeholder="your_mail@website.com">
             </div>    
             <div class="form-group">
                 <label>Password</label>
                 <input type="password" name="password" placeholder="*******">
             </div>
             <div class="form-group">
                 <label>Confirm Password</label>
                 <input type="password" name="password" placeholder="*******">
             </div>

             <button class="form-btn">SIGN UP</button> 
             <p>I have read and agree to the <a href="#">Terms & Conditions</a> 
                <br> Have an account? <a href="#">Login</a></p>   
           </form>
		</div>
    </main>

    
<?php require_once 'includes/footer.php' ?>
</body>
</html>