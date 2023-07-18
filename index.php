<?php

//  checks if a session has already been started
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

require_once 'db/connection.php';
require_once 'db/functions.php';

$categories = fetch_data($conn, 'category');

?>

<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/navbar.php'; ?>

<section class="hero flex-center scroll-target" id="home">

	<div class="container">
		<h1>Tagline of the <br />Construction <br />Company</h1>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do labore et dolore magna aliqua.</p>
		<button class="btn btn-shop">shop now</button>
	</div>

</section>


<!--products-->
<section class="categories scroll-target" id="categories">

	<div class="container">

		<h1 class="section-header">explore our products</h1>

		<div class="flex-center">

			<?php foreach ($categories as $category) : ?>
				<div class="card">
					<div class="card-img flex-center">
						<img src="src/img/products/<?php echo $category['cat_img'] ?>">
					</div>
					<div class="card-info">
						<a href="products.php?category=<?php echo $category['cat_name'] ?>"><span><?php echo $category['cat_name'] ?></span></a>
					</div>
				</div>
			<?php endforeach; ?>

		</div>
	</div>

</section>

<!--about us-->
<section class="about scroll-target" id="about">

	<div class="container">

		<div class="about-wrap">

			<div class="about-text">
				<h1 class="section-header">about us</h1>
				<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolore sequi vitae, tenetur doloremque sapiente atque! Veniam impedit, qui eligendi omnis neque aspernatur inventore consectetur nesciunt?</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab doloribus quae magni accusamus, voluptas consequuntur commodi recusandae perspiciatis voluptates animi pariatur dolorem expedita repellat corporis.</p>
			</div>

			<div class="about-img">
				<img src="src/img/assets/about-img.jpg" alt="About">
			</div>

		</div>

	</div>

</section>

<!--company-perks-->
<section class="perks scroll-target" id="perks">

	<div class="container">

		<h1 class="section-header">company perks</h1>

		<div class="flex-center">

			<div class="perks-item">
				<div class="perks-icon">
					<img src="src/img/icons/quality.png" alt="Quality">
				</div>
				<h2>excellent quality</h2>
				<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod voluptas doloremque iure alias nostrum fugit.</p>
			</div>

			<div class="perks-item">
				<div class="perks-icon">
					<img src="src/img/icons/support.png" alt="Quality">
				</div>
				<h2>trusted partners</h2>
				<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod voluptas doloremque iure alias nostrum fugit.</p>
			</div>

			<div class="perks-item">
				<div class="perks-icon">
					<img src="src/img/icons/fast-delivery.png" alt="Quality">
				</div>
				<h2>fast delivery</h2>
				<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod voluptas doloremque iure alias nostrum fugit.</p>
			</div>
		</div>

	</div>

</section>

<!--get-in-touch-->
<section class="contact scroll-target" id="contact">

	<div class="container flex-center">

		<div class="contact-location">
			<h1 class="section-header">get in touch with us!</h1>
			<p>Need to ask? Fill out the form to inquire! Or visit us at our Head Office</p>
			<p><i class="fas fa-map-marker-alt"></i> Head office located at 1017 Vicente Cruz St. Sampaloc Manila, Philippines</p>

			<div class="contact-maps">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3840.3960685452566!2d120.92528443471957!3d15.730173215193783!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3390d6454e46b4e3%3A0x9dae6dfa8f1f690f!2sCLSU%20Main%20Gate!5e0!3m2!1sen!2sph!4v1679921885423!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			</div>
		</div>

		<div class="contact-form">
			<form action="">
				<h2>send us a message</h2>

				<div class="form-group">
					<label for="">Your Name</label>
					<input type="text" name="fname" id="fname" placeholder="First name" class="first-input">
					<input type="text" name="lname" id="lname" placeholder="Last name">
				</div>

				<div class="form-group">
					<label for="email">Email Address</label>
					<input type="email" name="email" id="email" placeholder="your.mail@website.com">
				</div>

				<div class="form-group">
					<label for="phone">Contact Number</label>
					<input type="tel" name="phone" id="phone" placeholder="#### ### ####">
				</div>

				<div class="form-group">
					<label for="message">Message</label>
					<textarea name="message" id="message" cols="30" rows="10" placeholder="Say something here ..."></textarea>
				</div>

				<button>send message</button>
			</form>
		</div>

	</div>

</section>

<?php require_once 'includes/footer.php'; ?>