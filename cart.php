<?php

//  checks if a session has already been started
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

?>

<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/navbar.php'; ?>

<section class="forms">
	<div class="container">
		<h1>This is the cart page</h1>
		<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repellendus fuga accusantium quos nam aliquid, ea officia quaerat doloremque animi placeat natus? Reprehenderit voluptates iusto repellendus animi quas. Quae officia, aliquid optio est porro possimus dignissimos unde dolore tempora animi eligendi.</p>

		<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis mollitia nemo, in minus et error?</p>
	</div>

</section>

<?php require_once 'includes/footer.php' ?>