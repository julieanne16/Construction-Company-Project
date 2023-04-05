$(document).ready(function () {
	// Call the updateCartCount() function every 5 seconds
	updateCartCount();

	// Responsive Navbar Toggler
	$('#navToggler').on('click', function () {
		if ($('.navbar-nav').css('display') === 'none') {
			$('.navbar-nav').css('display', 'block');
			$('#navbar-dim').fadeIn(300);
			$('.overlay').css('display', 'block');
		} else {
			$('.navbar-nav').css('display', 'none');
			$('#navbar-dim').fadeOut(300);
			$('.overlay').css('display', 'none');
		}
		// Change icons (vice versa)
		$(this).toggleClass('fa-bars fa-times');
	});

	// validate email inputs
	function validateEmail(email) {
		let regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

		return regex.test(email);
	}

	// validate password inputs
	function validatePassword(password) {
		return password.length >= 6;
	}

	function validateName(name) {
		let regex = /^[a-zA-Z ]+$/;

		return regex.test(name);
	}

	// check if empty fields
	function isEmptyField(id) {
		applyValidationStyle(id, 'This field is required.');
	}

	function applyValidationStyle(id, message) {
		$(id).siblings('.invalid-feedback').html(message).show();
		$(id).addClass('is-invalid');
	}

	function removeValidationStyle(id) {
		$(id).siblings('.invalid-feedback').hide();
		$(id).removeClass('is-invalid');
	}

	function displayWarning(id, message) {
		$(id).html(message).show();
		$('html,body').animate({ scrollTop: 0 }, 'slow');
	}

	// function to toggle css classes for validation
	function onInputValidation(id) {
		$(id).on('input', function () {
			if ($(this).val().trim() !== '') {
				$(this).siblings('.invalid-feedback').hide();
				$(this).removeClass('is-invalid');
			}
		});
	}

	function randomCharacters() {
		let characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
		let result = '';
		for (let i = 0; i < 6; i++) {
			result += characters.charAt(Math.floor(Math.random() * characters.length));
		}
		return result;
	}

	let random = randomCharacters();

	$('#captcha').text(random);

	$('#reset').click(function () {
		$('#captcha').text(randomCharacters());
	});

	// Login
	$('#login').submit(function (event) {
		event.preventDefault();

		let email = $('#email');
		let password = $('#password');

		// if empty email
		if (!email.val()) isEmptyField('#email');
		// if empty password
		if (!password.val()) isEmptyField('#password');
		// if empty at least one of them
		if (!email.val() || !password.val()) displayWarning('.invalid-form', 'Please complete the required fields.');

		// count the number of invalid warnings
		let invalidCount = $('.invalid-feedback:visible').length;

		if (invalidCount > 0) {
			// prevent form submission
			return false;
		} else {
			// Ajax call for login page
			$.ajax({
				url: 'login.php',
				type: 'POST',
				data: $(this).serialize(),
				dataType: 'json',
			})
				.then(function (response) {
					console.log(response);
					if (response.status) {
						window.location.href = 'profile.php';
					} else {
						$('#password').val('');
						applyValidationStyle('#' + response.field, response.message);
						displayWarning('.invalid-form', response.message);
					}
				})
				.catch(function (error) {
					console.log(error);
				});
		}
	});

	onInputValidation('#email');
	onInputValidation('#password');
	onInputValidation('#fname');
	onInputValidation('#lname');
	onInputValidation('#captcha-input');

	// function to validate terms and conditions
	$('#terms').change(function () {
		if ($(this).is(':checked')) {
			$('.terms .invalid-feedback').hide();
		}
	});

	function classValidation(id, message) {
		$(id).siblings('.invalid-feedback').html(message).show();
		$(id).addClass('is-invalid');
	}

	// REGISTRATION
	$('#register').submit(function (event) {
		event.preventDefault();

		// if form fields are empty
		if (!$('#fname').val()) isEmptyField('#fname');
		if (!$('#lname').val()) isEmptyField('#lname');
		if (!$('#email').val()) isEmptyField('#email');
		if (!$('#password').val()) isEmptyField('#password');
		if (!$('#confirm-password').val()) isEmptyField('#confirm-password');

		// if empty at least one of them
		let countEmpty = $('input').filter(function () {
			return !this.value;
		}).length;

		if (countEmpty > 0) {
			displayWarning('.invalid-form', 'Please complete the required fields.');
		}

		// if terms is not checked
		if (!$('#terms').is(':checked')) {
			$('.terms .invalid-feedback').html('This checkbox is required.').show();
		}

		// validate captcha
		if (random === $('#captcha-input').val()) {
			console.log('same');
		} else {
			console.log('not same');
			random = randomCharacters();
			$('#captcha').text(random);
			applyValidationStyle($('#captcha-input'), 'Captcha not match. Please try again');
		}

		// count warning
		let invalidCount = $('.invalid-feedback:visible').length;

		if (invalidCount > 0) {
			return false; // prevent form submission
		} else {
			$.ajax({
				url: 'register.php',
				type: 'POST',
				data: $(this).serialize(),
				dataType: 'json',
			})
				.then(function (response) {
					console.log(response);
					if (response.status) {
						console.log(response.status);
						window.location.href = 'loading-screen.php';
					} else {
						console.log(response.status);
						$('.invalid-form').html(response.message).show();
						$('#password').val('');
						$('#confirm-password').val('');
					}
				})
				.catch(function (error) {
					console.log(error);
				});
		}
	});

	$('#confirm-password').on('keyup', function () {
		let password = $('#password').val();
		let confirmPassword = $('#confirm-password').val();

		if (confirmPassword !== password) {
			applyValidationStyle('#confirm-password', 'Password not match');
		} else {
			removeValidationStyle('#confirm-password');
		}
	});

	$('#password').on('blur', function () {
		if (!validatePassword($(this).val())) {
			applyValidationStyle('#password', 'Password must at least 6 characters');
		}
	});

	$('#fname').on('blur', function () {
		if (!validateName($(this).val())) {
			applyValidationStyle('#fname', 'Only alphabets and spaces.');
		}
	});

	$('#lname').on('blur', function () {
		if (!validateName($(this).val())) {
			applyValidationStyle('#lname', 'Only alphabets and spaces.');
		}
	});

	$('#profile-toggle').click(function () {
		$('.profile-dropdown').slideToggle('fast');
	});

	// show the modal and overlay when logout button is clicked
	$('#logoutBtn').click(function () {
		$('#confirm-modal').fadeIn('fast');
		$('.profile-dropdown').slideToggle('fast');
		$('.overlay').css('display', 'block');
	});

	// hide the modal and overlay when close button is clicked
	$('#cancel').click(function () {
		$('#confirm-modal').fadeOut('fast');
		$('.overlay').css('display', 'none');
	});

	$('#confirm').click(function () {
		window.location.href = 'logout.php';
	});

	// Filtering
	$('.category-item').click(function () {
		$('.category-item').removeClass('category-active');
		$(this).addClass('category-active');

		let category = $(this).text().toLowerCase();

		$.ajax({
			url: 'get-products.php',
			type: 'GET',
			cache: false,
			data: { category: category },
		})
			.then(function (response) {
				$('#product-wrap').html(response);
				$('#category-value').html(category);
				$('#category-value').css('text-transform', 'uppercase');
			})
			.catch(function (error) {
				console.log(error);
			});
	});

	// Add items to cart
	$('.add-to-cart').click(function (e) {
		e.preventDefault();

		let productId = $(this).data('product-id');

		$.ajax({
			url: 'add-to-cart.php',
			type: 'POST',
			data: { product_id: productId },
		})
			.then(function (response) {
				// update cart count
				updateCartCount();
			})
			.catch(function (error) {
				console.log(error);
			});
	});

	function updateCartCount() {
		$.ajax({
			url: 'ajax.php',
			type: 'POST',
			data: { action: 'update_cart_count' },
			dataType: 'json',
		})
			.then(function (response) {
				// console.log(response);
				// Update the cart count in the HTML code
				$('#cart-count').text(response);
			})
			.catch(function (error) {
				console.log(error);
			});
	}

	// Quantity
	let valueElement = $('.quantity-value');
	let value = parseInt(valueElement.text());

	$('i.fa-plus').click(function () {
		value++;
		valueElement.text(value);
	});

	$('i.fa-minus').click(function () {
		if (value > 1) {
			value--;
			valueElement.text(value);
		}
	});

	// End
});
