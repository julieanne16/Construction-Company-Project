<?php

require_once 'functions.php';

// if (isset($_SESSION['registered'])) {
// 	// 
// } else {
// 	header('Location: register.php');
// }

?>

<?php require_once 'includes/header.php' ?>

<nav class="load-nav">
	<div class="container">
		<a href="#" class="navbar-brand">
			Construction <span>Co.</span>
		</a>
	</div>
</nav>

<section class="load-screen">
	<div class="container loading-content">
		<i class="fa-solid fa-user-check"></i>
		<h1>Registration Complete</h1>
		<p>Redirecting to <em>Sign In</em> page in <span id="count-text">10</span> seconds</p>
		<a href="login.php">Skip here</a>
	</div>
</section>

<?php require_once 'includes/footer.php' ?>