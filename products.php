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


<section class="filters mt">
	<div class="container">
		<h1 class="section-header">products</h1>
		<ul class="category flex-center">
			<li class="category-item category-active">all</li>
			<li class="category-item">gravel</li>
			<li class="category-item">pipes</li>
			<li class="category-item">cement</li>
			<li class="category-item">paint</li>
			<li class="category-item">plyboard</li>
			<li class="category-item">cinderblock</li>
		</ul>
		<h3 class="category-selected">Showing <span id="category-value">ALL</span> products</h3>

		<div class="add-cart-alert">
			<i class="fa-solid fa-check"></i>
			<p>Item added to cart</p>
		</div>
		<div class="loading-alert">
			<div class="spinner"></div>
		</div>

		<table id="product-wrap" class="flex-table">

		</table>

	</div>
</section>

<?php require_once 'includes/footer.php' ?>

<script>
	// $(document).ready(function() {
	// 	$('#product-wrap').DataTable({
	// 		bSort: false,
	// 		searching: false,
	// 		ordering: false,
	// 		info: false,
	// 		orderCellsTop: true,
	// 		paging: true,
	// 	});
	// })

	$(".display tbody tr:first-child").each(function() {
		$(this).closest("table").prepend("<thead></thead>").children("thead").append($(this).remove());
	});

	$(document).ready(function() {
		// Get the search query parameter from the URL
		let urlParams = new URLSearchParams(window.location.search);
		let searchQuery = urlParams.get('search');
		let category = urlParams.get('category');

		// Set the default category item based on the category value
		if (category) {
			$('.category-item').removeClass('category-active');
			$('.category-item:contains("' + category + '")').addClass('category-active');
		}

		if (searchQuery) {
			$.ajax({
					url: 'scripts/search.php',
					type: 'get',
					data: {
						search_product: searchQuery
					},
				})
				.then(function(response) {
					$('#product-wrap').html(response);
				})
				.catch(function(error) {
					console.log(error.responseText);
				});
		} else {
			$('.category-active').click();
		}
	})
</script>