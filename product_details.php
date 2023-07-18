<?php

//  checks if a session has already been started
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

require_once 'db/connection.php';
require_once 'db/functions.php';

if (isset($_GET['product_id'])) {
	$product_id = $_GET['product_id'];
	$selected_item = getRow($conn, 'product_id', $product_id, 'products');

	$items = fetch_similar_products($conn, $selected_item['category'], $product_id);
}


?>

<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/navbar.php'; ?>

<div class="add-cart-alert">
	<i class="fa-solid fa-circle-check"></i>
	<p>Added to cart</p>
</div>


<section class="details mt">

	<div class="container">

		<div class="product-details">

			<div class="detail-img flex-center">
				<img src="src/img/products/<?php echo $selected_item['img'] ?>" alt="Gravel">
			</div>

			<div class="detail-info">
				<p><?php echo $selected_item['name'] ?></p>
				<p>Category: <?php echo $selected_item['category'] ?></p>
				<p>₱ <?php echo number_format($selected_item['price'], 0, '.', ','); ?></p>
				<p>SKU: 123XYZ</p>
				<p>Stock: <?php echo number_format($selected_item['stocks'], 0, '.', ','); ?></p>

				<p class="quantity-group">
					<span>Quantity</span>
					<span class="quantity">
						<i class="fa-solid fa-minus"></i>
						<i contenteditable="true" class="quantity-value">1</i>
						<i class="fa-solid fa-plus"></i>
					</span>
				</p>
				<a class="add-quantity" data-product-id="<?php echo $selected_item['product_id'] ?>" data-product-price="<?php echo $selected_item['price'] ?>">ADD TO CART</a>
			</div>
		</div>

		<div class="product-specs">
			<p class="specs-title"><i class="fa-solid fa-minus"></i> Product Details</p>
			<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, Mmaking it over 2000 years old. Richard McClintock, a latin professor at Hampden-Sydney College in Virginia.</p>
			<p class="specs-title"> <i class="fa-solid fa-minus"></i>Specifications</p>
			<ul>
				<li>Brand XYZ</li>
				<li>Sub Brand: ABC</li>
				<li>Color: Assorted</li>
				<li>Type: River Black</li>
			</ul>
		</div>

		<h3>PRODUCTS UNDER SAME CATEGORY</h3>
		<div class="similar-products products">
			<?php foreach ($items as $product) : ?>
				<div class="product-card">
					<div class="product-img flex-center">
						<img src="src/img/products/<?php echo $product['img'] ?>" alt="Cement">
					</div>
					<div class="product-info">
						<p><?php echo $product['name'] ?></p>
						<p><?php echo $product['category'] ?></p>
						<p>₱ <?php echo number_format($product['price'], 0, '.', ','); ?></p>

					</div>
					<div class="btn-group">
						<a class="add-to-cart" data-product-id="<?php echo $product['product_id'] ?>" data-product-price="<?php echo $product['price'] ?>">Add to Cart <i class="fa-solid fa-basket-shopping"></i></a>
						<a href="product_details.php?product_id=<?php echo $product['product_id'] ?>">View Details <i class="fa-solid fa-info"></i></a>
					</div>
				</div>
			<?php endforeach; ?>
		</div>

		<div class="list-control">
			<a class="btn" href="products.php?category=<?php echo $product['category'] ?>"><span>VIEW MORE</span></a>
		</div>

</section>

<?php require_once 'includes/footer.php'; ?>