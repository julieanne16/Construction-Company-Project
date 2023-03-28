<?php

session_start();

?>

<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/navbar.php'; ?>

<section class="hero" id="home">
	<div class="container">
		<h1>Tagline of the <br />Construction <br />Company</h1>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
		<button>SHOP NOW</button>
	</div>
</section>


<!--products-->
<section class="product" id="products">
	<div class="container">
		<h1>explore our products</h1>
		<div class="product-wrap">
			<div class="card">
				<div class="card-img">
					<img src="img/products/gravel-sack.png" alt="Gravel">
				</div>
				<div class="card-info">
					<span>gravel</span>
				</div>
			</div>

			<div class="card">
				<div class="card-img">
					<img src="img/products/gravel-sack.png" alt="Gravel">
				</div>
				<div class="card-info">
					<span>gravel</span>
				</div>
			</div>

			<div class="card">
				<div class="card-img">
					<img src="img/products/gravel-sack.png" alt="Gravel">
				</div>
				<div class="card-info">
					<span>gravel</span>
				</div>
			</div>

			<div class="card">
				<div class="card-img">
					<img src="img/products/gravel-sack.png" alt="Gravel">
				</div>
				<div class="card-info">
					<span>gravel</span>
				</div>
			</div>

			<div class="card">
				<div class="card-img">
					<img src="img/products/gravel-sack.png" alt="Gravel">
				</div>
				<div class="card-info">
					<span>gravel</span>
				</div>
			</div>

			<div class="card">
				<div class="card-img">
					<img src="img/products/gravel-sack.png" alt="Gravel">
				</div>
				<div class="card-info">
					<span>gravel</span>
				</div>
			</div>
		</div>
	</div>
</section>

<!--about us-->
<section class="about" id="about">
	<div class="container">
		<div class="about-wrap">
			<div class="about-text">
				<h1>about us</h1>
				<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Minus rerum fugiat non ratione repellendus dolore nostrum quisquam nulla perferendis voluptatibus.</p>
				<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Minus rerum fugiat non ratione repellendus dolore nostrum quisquam nulla perferendis voluptatibus.</p>
			</div>
			<div class="about-img">
				<img src="img/assets/about-img.jpg" alt="About">
			</div>
		</div>
	</div>
</section>

<!--company-perks-->
<section class="perks" id="perks">
	<div class="container">
		<h1>company perks</h1>
		<div class="perks-wrap">

			<div class="perks-item">
				<div class="perks-icon">
					<img src="img/icons/quality.png" alt="Quality">
				</div>
				<h2>excellent quality</h2>
				<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod voluptas doloremque iure alias nostrum fugit.</p>
			</div>

			<div class="perks-item">
				<div class="perks-icon">
					<img src="img/icons/quality.png" alt="Quality">
				</div>
				<h2>excellent quality</h2>
				<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod voluptas doloremque iure alias nostrum fugit.</p>
			</div>

			<div class="perks-item">
				<div class="perks-icon">
					<img src="img/icons/quality.png" alt="Quality">
				</div>
				<h2>excellent quality</h2>
				<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod voluptas doloremque iure alias nostrum fugit.</p>
			</div>
		</div>
	</div>
</section>

<!--get-in-touch-->
<section class="contact" id="contact">
	<div class="container">
		<div class="contact-location">
			<h1>get in touch with us!</h1>
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
					<input type="text" name="fname" id="fname" placeholder="First name" class="mb-3">
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
	</div>
</section>

<?php require_once 'includes/footer.php'; ?>