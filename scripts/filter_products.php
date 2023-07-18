<?php

//  checks if a session has already been started
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

require_once '../db/connection.php';
require_once '../db/functions.php';

// Set default category to "All" if none is provided
$products = filter($conn, $_GET['category']);
?>

<?php if (count($products) === 0) : ?>
	<h3>No products</h3>
<?php else : ?>
	<tbody>
		<?php foreach ($products as $product) : ?>
			<tr>
				<td>
					<div class="product-img flex-center">
						<img src="src/img/products/<?php echo $product['img'] ?>" alt="Cement">
					</div>
					<div class="product-info">
						<p class="sample"><?php echo $product['name'] ?></p>
						<p><?php echo $product['category'] ?></p>
						<p>₱ <?php echo number_format($product['price'], 0, '.', ','); ?></p>
					</div>
					<div class="btn-group">
						<a class="add-to-cart" data-product-id="<?php echo $product['product_id'] ?>" data-product-price="<?php echo $product['price'] ?>">
							<span>Add to Cart</span>
							<i class="fa-solid fa-basket-shopping"></i>
						</a>
						<a href="product_details.php?product_id=<?php echo $product['product_id'] ?>">View Details <i class="fa-solid fa-info"></i></a>
					</div>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
<?php endif; ?>