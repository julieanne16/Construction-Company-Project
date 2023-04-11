<?php

//  checks if a session has already been started
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

require_once 'functions.php';

// Set default category to "All" if none is provided
$category = isset($_GET['category']) ? $_GET['category'] : 'all';

$products = filter($conn, $category);

?>


<?php if (count($products) === 0) : ?>
	<h3>No products</h3>
<?php else : ?>
	<?php foreach ($products as $product) : ?>
		<div class="product-card">
			<div class="product-img">
				<img src="img/products/<?php echo $product['img'] ?>" alt="Cement">
			</div>
			<div class="product-info">
				<p><?php echo $product['name'] ?></p>
				<!-- <p><?php echo $product['category'] ?></p> -->
				<p>₱ <?php echo $product['price'] . ".00" ?></p>
			</div>
			<div class="btn-group">
				<?php if (!isset($_SESSION['account_id'])) : ?>
					<a href="login.php">Add to Cart <i class="fa-solid fa-basket-shopping"></i></a>
				<?php else : ?>
					<a class="add-to-cart" data-product-id="<?php echo $product['product_id'] ?>">Add to Cart <i class="fa-solid fa-basket-shopping"></i></a>
				<?php endif; ?>
				<a href="details.php">View Details <i class="fa-solid fa-info"></i></a>
			</div>
		</div>
	<?php endforeach; ?>
<?php endif; ?>

<script src="js/jquery-3.6.0.min.js"></script>
<script src="js/main.js"></script>