<?php

//  checks if a session has already been started
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

require_once 'db/connection.php';
require_once 'db/functions.php';

// Fetch cart items
if (isset($_SESSION['account_id'])) {
	$rows = display_cart($conn, $_SESSION['account_id']);
} else {
	$rows = []; // or fetch the cart items for guest user from db
}

if (!empty($rows)) {
	$cart_items = $rows['rows'];
} else {
	$cart_items = [];
}

$_SESSION['cart_items'] = $cart_items;


// Remove cart items
if (isset($_GET['remove'])) {
	$product_id = $_GET['remove'];
	$remove_item = delete($conn, 'cart', 'product_id', $product_id);
	header('Location: cart.php');
}

// UPDATE CART ITEM QUANTITY
if (isset($_POST['action']) == 'update_cart_quantity') {

	$product_id = $_POST['product_id'];
	$user_id = $_POST['user_id'];
	$quantity = $_POST['quantity'];
	$price = $_POST['product_price'];

	$update_cart_quantity = update_cart_quantity($conn, $user_id, $product_id, $quantity, $price);

	echo json_encode($update_cart_quantity);
	exit;
}

?>

<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/navbar.php'; ?>

<div id="clear-modal" class="modal">
	<div class="modal-content">
		<p>Are you sure you want to clear your cart?</p>
		<div class="modal-buttons">
			<button id="yes">Yes</button>
			<button id="no">No</button>
		</div>
	</div>
</div>

<section class="my-cart mt">

	<div class="container">

		<h1 class="section-header"><i class="fa-solid fa-basket-shopping"></i> MY CART<br></h1>
		<?php if (count($cart_items) == 0) : ?>
			<p class="page-warning">Your cart is empty. Browse our products now!</p>
		<?php else : ?>
			<div class="table-header">
				<p>Product</p>
				<p>Info</p>
			</div>

			<div class="table-header-2">
				<p>Product</p>
				<p></p>
				<p>Price</p>
				<p>Quantity</p>
				<p>Total</p>
				<p></p>
			</div>

			<div class="table-body">
				<?php foreach ($_SESSION['cart_items'] as $item) : ?>
					<div class="table-row">

						<div class="col-product">
							<div class="img">
								<img src="src/img/products/<?php echo $item['img'] ?>" alt="Product" />
							</div>
						</div>

						<div class="col-product col-info">
							<!-- Name -->
							<p class="name"><?php echo $item['name'] ?></p>

							<!-- Price -->
							<p class="price">₱ <?php echo number_format($item['price'], 0, '.', ',') ?></p>

							<!-- Quantity -->
							<div class="col-quantity">
								<span class="cart-quantity">
									<i class="fa-solid fa-minus"></i>
									<span contenteditable="true" class="cart-quantity-value" data-product-id="<?php echo $item['product_id'] ?>" data-user-id="<?php echo $item['user_id'] ?>" data-product-price="<?php echo $item['price'] ?>"><?php echo $item['quantity'] ?></span>
									<i class="fa-solid fa-plus"></i>
								</span>
								<div class="spinner-sm"></div>
							</div>

							<!-- Total -->
							<p class="total">₱ <?php echo number_format($item['total'], 0, '.', ',') ?></p>

							<div class="remove">
								<a href="cart.php?remove=<?php echo $item['product_id']; ?>" title="remove"><i class="fa-solid fa-trash"></i></a>
							</div>

						</div>
					</div>

				<?php endforeach; ?>
			</div>

			<div class="row-total">
				<p>TOTAL: <span id="cart-total"></span></p>
				<div class="spinner-wrap">
					<div class="spinner-sm spinner-total"></div>
				</div>
			</div>

			<div class="row-control">
				<button id="proceed-checkout">CHECK OUT <i class="fa-solid fa-check"></i></button>
				<button id="clear-cart">CLEAR CART <i class="fa-solid fa-trash"></i></button>
				<button class="btn-shop">CONTINUE SHOPPING <i class="fa-solid fa-basket-shopping"></i></button>
			</div>
		<?php endif; ?>

	</div>

</section>

<?php require_once 'includes/footer.php' ?>