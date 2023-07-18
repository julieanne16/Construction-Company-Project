<?php

//  checks if a session has already been started
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

?>

<?php require_once 'includes/header.php' ?>

<nav class="load-nav">
	<div class="container flex-center">
		<div class="navbar-brand">
			<a href="index.php">
				<img src="src/img/assets/brand_logo.png" alt="Brand">
			</a>
		</div>
	</div>
</nav>

<section class="load-screen mt">
	<div class="container loading-content">
		<i class="fa-solid fa-user-check"></i>
		<h1>Registration Complete</h1>
		<p>Redirecting to <em>Sign In</em> page in <span id="count-text">10</span> seconds</p>
		<a href="login.php">Skip here</a>
	</div>
</section>

<!-- jQuery (cdn / online mode) -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Fontawesome Kit -->
<script src=" https://kit.fontawesome.com/0ebd665efa.js" crossorigin="anonymous"></script>

<script>
	// Countdown;
	let count = 10;
	let countDown = setInterval(function() {
		if (count < 0) {
			clearInterval(countDown);
			window.location.href = 'login.php';
		} else {
			$('#count-text').html(count);
			count--;
		}
	}, 1000);
</script>