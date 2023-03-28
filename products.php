<?php

session_start();

require_once 'functions.php';
?>

<?php require_once 'includes/header.php' ?>

<div class="container">
	<section class="container mt-3">
		<h2>Products</h2>
		<!-- Notificationa -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="alert alert-success alert-dismissible fade show py-1" role="alert">
				<small><?php echo $_SESSION['success']; ?></small>
				<i type="button" class="btn-close small py-0 h-100" data-bs-dismiss="alert" aria-label="Close"></i>
			</div>
		<?php endif; ?>
		<?php unset($_SESSION['success']) ?>
		<!--  -->
		<div class="row justify-content-center justify-content-md-start">
			<?php
			$products = read('products');
			foreach ($products as $product) : ?>
				<div class="col-md-4 col-lg-3 col-sm-6 col-9">
					<div class="card mb-4 shadow-sm">
						<img src="img/Products/<?php echo $product['img'] ?>"  alt="<?php echo $product['name'] ?>">
						<div class="card-body">
							<h5 class="card-title mb-0"><?php echo $product['name'] ?></h5>
							<small class="card-text text-muted">Stock: <?php echo $product['quantity']; ?></small>
							<div class="d-flex justify-content-between align-items-center">
								<div class="btn-group mt-2">
									<form action="cart.php" method="post">
										<input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
										<button type="submit" class="btn btn-sm btn-primary">Add to Cart</a>
									</form>
								</div>
								<small class="text-muted mt-2">₱ <?php echo $product['price']; ?></small>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach ?>
		</div>
	</section>
</div>




<?php require_once 'includes/footer.php' ?>