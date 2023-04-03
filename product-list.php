<?php

//  checks if a session has already been started
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

require_once 'functions.php';


?>
<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/navbar.php'; ?>


<section>
	<div class="container">
		<h1>PRODUCTS</h1>
		<ul class="categories">
			<li id="default-category-item" class="category-item category-active">all</li>
			<li class="category-item">gravel</li>
			<li class="category-item">pipes</li>
			<li class="category-item">cement</li>
			<li class="category-item">paint</li>
			<li class="category-item">plyboard</li>
			<li class="category-item">cinderblock</li>
		</ul>

		<div id="product-wrap" class="products">
			<!-- fetch the products here using ajax -->
		</div>

	</div>
</section>

<?php require_once 'includes/footer.php' ?>


<script>
	$(document).ready(function() {
		// Trigger click on default category item
		$('#default-category-item').click();
	})
</script>