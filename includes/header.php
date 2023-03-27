<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Construction</title>

	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="https://kit.fontawesome.com/0ebd665efa.js" crossorigin="anonymous" defer></script>
</head>

<body>
	<nav>
		<div class="container">
			<a href="#" class="navbar-brand">
				Construction <span>Co.</span>
			</a>
			<li class="nav-item">
				<a href="" class="nav-link">
					<i class="fas fa-bars"></i>
				</a>
			</li>
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="index.php#home" class="nav-link">Home</a>
				</li>
				<li class="nav-item">
					<a href="index.php#about" class="nav-link">About</a>
				</li>
				<li class="nav-item">
					<a href="index.php#product" class="nav-link">Products</a>
				</li>
				<li class="nav-item">
					<a href="index.php#contact" class="nav-link">Contact</a>
				</li>
				<?php if (isset($_SESSION['user_id'])) : ?>
					<li class="nav-item">
						<a href="logout.php" class="nav-link" onclick="return confirm('Are you sure you want to logout?');">Sign Out</a>
					</li>
				<?php else : ?>
					<li class="nav-item">
						<a href="login.php" class="nav-link">Login</a>
					</li>
					<li class="nav-item">
						<a href="products.php" class="nav-link">
							<i class="fa-solid fa-basket-shopping"></i>
						</a>
					</li>
				<?php endif; ?>
			</ul>
		</div>
	</nav>