<?php require_once 'includes/header.php'; ?>

<section class="hero" id="home">
	<div class="container">
		<h1>Tagline of the <br />Construction <br />Company</h1>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
		<button>SHOP NOW</button>
	</div>
</section>


<!--products-->
<section class="our-product" id="product">
	<h1>Explore our product</h1>
	<div class="main-product">
		<div class="inner-product">
			<div class="image">
				<img src="img/images/Gravel-img.png" />
			</div>
			<div class="title">
				<h1>GRAVEL</h1>
			</div>
		</div>
		<div class="inner-product">
			<div class="image">
				<img src="img/images/cement-sack-img.png" />
			</div>
			<div class="title">
				<h1>CEMENT</h1>
			</div>
		</div>
		<div class="inner-product">
			<div class="image">
				<img src="img/images/metal-pipes-img.png" />
			</div>
			<div class="title">
				<h1>PIPES</h1>
			</div>
		</div>

		<div class="inner-product">
			<div class="image">
				<img src="img/images/paint-img.png" />
			</div>
			<div class="title">
				<h1>PAINT</h1>
			</div>
		</div>
		<div class="inner-product">
			<div class="image">
				<img src="img/images/plyboard-img.png" />
			</div>
			<div class="title">
				<h1>PLYBOARD</h1>
			</div>
		</div>
		<div class="inner-product">
			<div class="image">
				<img src="img/images/cinderblock-img.png" />
			</div>
			<div class="title">
				<h1>CINDERBLOCK</h1>
			</div>
		</div>
	</div>
</section>

<!--about us-->
<section class="about" id="about">
	<div class="column">
		<img src="img/images/about-us-img.png" />
	</div>
	<div class="column">
		<h1>About Us</h1>
		<p>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Integer quis auctor elit
			sed. Totor consequat id porta nibh venenatis. Viverra ipsumnunc aliquet bibendum. Massa sapien faucibus et molestie ac feugiat sed lectus. Ut sem
			viverra aliquet eget sit. Vel eros donec ac odio tempor orci dapibus ultrices in.
		</p>
	</div>
</section>

<!--company-perks-->
<section class="company" id="company">
	<h1>COMPANY PERKS</h1>
	<div class="main-company">
		<div class="company-content">
			<div class="perks-img">
				<img src="img/images/check-icon.png" alt="" />
			</div>
			<div class="title">
				<h2>EXCELENT QUALITY</h2>
			</div>
			<div class="des">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
			</div>
		</div>

		<div class="company-content">
			<div class="perks-img">
				<img src="img/images/handshake-icon.png" alt="" />
			</div>
			<div class="title">
				<h2>TRUSTED PARTNERS</h2>
			</div>
			<div class="des">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
			</div>
		</div>

		<div class="company-content">
			<div class="perks-img">
				<img src="img/images/delivery-icon.png" alt="" />
			</div>
			<div class="title">
				<h2>FAST DELIVERY</h2>
			</div>
			<div class="des">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
			</div>
		</div>
	</div>
</section>

<!--get-in-touch-->
<section class="getintouch" id="contact">
	<div class="column">
		<h1>
			Get in touch <br />
			With us!
		</h1>
		<div class="description">
			<p>Need to ask? Fill out the form to inquire! Or visit us at our Head Office</p>
		</div>
		<div class="sub-description">
			<p><i class="fas fa-map-marker-alt"></i> Head office located at 1017 Vicente Cruz St. Sampaloc Manila, Philippines</p>
		</div>
		<div class="getintouch-img">
			<img src="img/images/Map.png" alt="" />
		</div>
	</div>
	<div class="column">
		<div class="card">
			<h1>SEND US A MESSAGE</h1>
			<label for="fname">Your Name</label>
			<input type="text" id="fname" name="firstname" placeholder="First name" />
			<input type="text" id="lname" name="lastname" placeholder="Last name" />

			<label for="emailadd">Email Address</label>
			<input type="text" id="emailadd" name="emailadd" placeholder="your_mail@website.com" />

			<label for="contactnum">Contact Number</label>
			<input type="text" id="contactnum" name="contactnum" placeholder="#### ### ####" />

			<label for="message">Message</label>
			<textarea id="subject" name="subject" placeholder="Your message here.." style="height: 100px"></textarea>

			<input type="submit" value="SEND MESSAGE" />
		</div>
	</div>
</section>

<?php require_once 'includes/footer.php'; ?>