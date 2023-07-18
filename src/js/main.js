$(document).ready(function () {
	updateCartCount();

	// MENU BARS TOGGLER
	$('#menu-bars').on('click', function () {
		if ($('.navbar-nav').css('display') == 'none') {
			$('.navbar-nav').css('display', 'flex');
		} else {
			$('.navbar-nav').css('display', 'none');
		}
	});

	$('.navbar-nav .nav-link').click(function () {
		// Check if the viewport width is less than or equal to your mobile breakpoint
		if ($(window).width() <= 768) {
			$('.navbar-nav').css('display', 'none');
		}
	});

	// Add active class to clicked link and store its information in local storage
	$('.navbar-nav .nav-item').click(function () {
		// Remove active class from all links
		$('.navbar-nav .nav-item').removeClass('active');

		// Add active class to clicked link
		$(this).addClass('active');

		// Store the href of the clicked link in local storage
		var href = $(this).find('a').attr('href');
		localStorage.setItem('activeLink', href);
	});

	// Retrieve active link information from local storage on page load
	$(document).ready(function () {
		// Get the stored active link from local storage
		var activeLink = localStorage.getItem('activeLink');

		// Add active class to the stored link
		if (activeLink) {
			$('.navbar-nav .nav-item')
				.find('a[href="' + activeLink + '"]')
				.parent()
				.addClass('active');
		}
	});

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

	// Filtering
	$('.category-item').click(function () {
		$('.category-item').removeClass('category-active');
		$(this).addClass('category-active');

		let category = $(this).text().toLowerCase();

		$('#category-value').html(category);
		$('#category-value').css('text-transform', 'uppercase');

		$('.loading-alert').show();

		// Destroy DataTables instance if it exists
		if ($.fn.DataTable.isDataTable('#product-wrap')) {
			$('#product-wrap').DataTable().destroy();
		}

		$.ajax({
			url: 'scripts/filter_products.php',
			type: 'get',
			data: { category: category },
		})
			.then(function (response) {
				// set a timer to hide the loading alert after 0.5 seconds
				setTimeout(function () {
					$('.loading-alert').hide();
				}, 500);

				$('#product-wrap').html(response);

				$('#product-wrap').DataTable({
					lengthChange: false,
					searching: false,
					ordering: false,
					info: false,
					orderCellsTop: true,
					paging: true,
					language: {
						emptyTable: ' ',
					},
					columns: [null],
				});
			})
			.catch(function (error) {
				console.log(error.responseText);
			});
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

	// apply css validation styles
	function applyValidationStyle(id, message) {
		$(id).siblings('.invalid-feedback').html(message).show();
		$(id).addClass('is-invalid');
	}

	// remove validation styles
	function removeValidationStyle(id) {
		$(id).siblings('.invalid-feedback').hide();
		$(id).removeClass('is-invalid');
	}

	// display alert warning
	function displayWarning(id, message) {
		$(id).html(message).show();
		$('html,body').animate({ scrollTop: 0 }, 'slow');
	}

	$('input, select').on('input change', function () {
		if ($(this).val().trim() !== '') {
			$(this).siblings('.invalid-feedback').hide();
			$(this).removeClass('is-invalid');
		}
	});

	function addCartAlert() {
		$('.add-cart-alert').fadeIn('fast', function () {
			// Hide alert after 3 seconds
			setTimeout(function () {
				$('.add-cart-alert').fadeOut('slow');
			}, 500);
		});
	}

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
				url: 'scripts/auth.php',
				type: 'POST',
				data: $(this).serialize(),
				dataType: 'json',
			})
				.then(function (response) {
					console.log(response);
					if (response.status) {
						window.location.href = 'settings.php';
					} else {
						$('#password').val('');
						applyValidationStyle('#' + response.field, response.message);
						displayWarning('.invalid-form', response.message);
					}
				})
				.catch(function (error) {
					console.log(error.responseText);
				});
		}
	});

	// function to validate terms and conditions
	$('#terms').change(function () {
		if ($(this).is(':checked')) {
			$('.terms .invalid-feedback').hide();
		}
	});

	// REGISTRATION
	$('#register').submit(function (event) {
		event.preventDefault();

		// if form fields are empty
		if (!$('#fname').val()) isEmptyField('#fname');
		if (!$('#lname').val()) isEmptyField('#lname');
		if (!$('#email').val()) isEmptyField('#email');
		if (!$('#address').val()) isEmptyField('#address');
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
				url: 'scripts/auth.php',
				type: 'POST',
				data: $(this).serialize(),
				dataType: 'json',
			})
				.then(function (response) {
					console.log(response);
					if (response.status) {
						window.location.href = 'loading_screen.php';
					} else {
						console.log(response.status);
						$('.invalid-form').html(response.message).show();
						applyValidationStyle('#email', response.message);
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

	function isPasswordValid(inputId) {
		$('#' + inputId).on('blur', function () {
			if (!validatePassword($(this).val())) {
				applyValidationStyle('#' + inputId, 'Password must at least 6 characters');
			}
		});
	}

	function isNameValid(inputId) {
		$('#' + inputId).on('blur', function () {
			if (!validateName($(this).val())) {
				applyValidationStyle('#' + inputId, 'Only alphabets and spaces.');
			}
		});
	}

	function isEmailValid(inputId) {
		$('#' + inputId).on('blur', function () {
			if (!validateEmail($(this).val())) {
				applyValidationStyle('#' + inputId, 'Enter a valid email.');
			}
		});
	}

	isNameValid('update-fname');

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
		$('#confirm-modal').fadeOut('fast');
	});

	// Add items to cart
	$(document).on('click', '.add-to-cart', function (e) {
		e.preventDefault();

		let productId = $(this).data('product-id');
		let productPrice = $(this).data('product-price');

		$.ajax({
			url: 'scripts/add_cart.php',
			type: 'post',
			data: { product_id: productId, product_price: productPrice },
		})
			.then(function (response) {
				updateCartCount();

				addCartAlert();
			})
			.catch(function (error) {
				console.log(error.responseText);
			});
	});

	// Add items to cart
	$('.add-quantity').click(function (e) {
		e.preventDefault();

		let productId = $(this).data('product-id');
		let productPrice = $(this).data('product-price');
		let quantity = $('.quantity-value').text();

		$.ajax({
			url: 'scripts/add_cart.php',
			type: 'post',
			data: { quantity_id: productId, quantity_value: quantity, updated_price: productPrice },
		})
			.then(function (response) {
				updateCartCount();
				addCartAlert();
			})
			.catch(function (error) {
				console.log(error);
			});
	});

	function updateCartCount() {
		$.ajax({
			url: 'scripts/count_cart.php',
			type: 'post',
			data: { action: 'update_cart_count' },
			dataType: 'json',
		})
			.then(function (response) {
				if (response === null) {
					$('.cart-count').text('0');
				} else {
					if (response > 99) {
						$('.cart-count').text('99+');
					} else {
						$('.cart-count').text(response);
					}
				}
			})
			.catch(function (error) {
				console.log(error.responseText);
			});
	}

	function fetchTotalAmount() {
		$('.spinner-total').show();
		$.ajax({
			url: 'scripts/checkout.php',
			method: 'post',
			data: { action: 'calc_total' },
			dataType: 'json',
			success: function (response) {
				let amount = parseInt(response);
				$('#cart-total').text('₱ ' + amount.toLocaleString());
				setTimeout(function () {
					$('.spinner-total').hide();
				}, 500);
			},
		});
	}

	// Quantity
	let valueElement = $('.quantity-value');
	let value = parseInt(valueElement.text());

	$('.quantity i.fa-plus').click(function () {
		value++;
		valueElement.text(value);
	});

	$('.quantity i.fa-minus').click(function () {
		if (value > 1) {
			value--;
			valueElement.text(value);
		}
	});

	fetchTotalAmount();
	// Updating cart qunatity
	$('.cart-quantity i').click(function () {
		let productId = $(this).siblings('.cart-quantity-value').data('product-id');
		let userId = $(this).siblings('.cart-quantity-value').data('user-id');
		let productPrice = $(this).siblings('.cart-quantity-value').data('product-price');

		let quantityText = $(this).siblings('.cart-quantity-value').text();
		let quantity = parseInt(quantityText);

		if ($(this).hasClass('fa-minus') && quantity > 1) {
			quantity--;
		} else if ($(this).hasClass('fa-plus')) {
			quantity++;
		}

		$(this).siblings('.cart-quantity-value').text(quantity);

		let $this = $(this); // save the reference to $(this)

		$.ajax({
			url: 'cart.php',
			type: 'post',
			data: {
				action: 'update_cart_quantity',
				product_id: productId,
				user_id: userId,
				quantity: quantity,
				product_price: productPrice,
			},
			beforeSend: function () {
				$this.closest('tr').find('.spinner-sm').show();

				setTimeout(function () {
					$this.closest('tr').find('.spinner-sm').hide();
				}, 500);
			},
			success: function (response) {
				fetchTotalAmount();
				updateCartCount();

				let amount = parseInt(response);
				$this
					.closest('tr')
					.find('.cart-item-total')
					.text('₱ ' + amount.toLocaleString());
			},
		});
	});

	// UPdates
	$('#profile').on('change', function () {
		const file = this.files[0];

		if (file) {
			const ext = file.name.split('.').pop().toLowerCase();
			const validExtensions = ['jpg', 'jpeg', 'png', 'gif'];

			if (!validExtensions.includes(ext)) {
				applyValidationStyle('#profile', 'Only JPG, JPEG, and, PNG files are allowed');
				// clear the file input
				$(this).val('');
				return false;
			}
		}
	});

	// UPdates
	$('#update-user').submit(function (event) {
		event.preventDefault();

		// if form fields are empty
		if (!$('#update-fname').val()) isEmptyField('#update-fname');
		if (!$('#update-lname').val()) isEmptyField('#update-lname');
		if (!$('#update-contact').val()) isEmptyField('#update-contact');
		if (!$('#update-address').val()) isEmptyField('#update-address');
		if (!$('#update-email').val()) isEmptyField('#update-email');

		// count the number of invalid warnings
		let invalidCount = $('.invalid-feedback:visible').length;

		let formData = $(this).serialize();

		let fileInput = $('input[name="profile"]')[0];
		let file = fileInput.files[0];

		let data = new FormData();

		data.append('file', file);
		data.append('form_data', formData);
		data.append('action', 'update_info');

		console.log(data);

		if (invalidCount > 0) {
			return false;
		} else {
			$.ajax({
				url: 'scripts/update.php',
				type: 'post',
				data: data,
				dataType: 'json',
				processData: false,
				contentType: false,
				success: function (response) {
					console.log(response);
					if (response.status) {
						location.reload();
					} else {
						if (response.field == 'email') {
							applyValidationStyle('#new-email', response.message);
						}
					}
				},
				error: function (error) {
					console.log(error.responseText);
				},
			});
		}
	});

	$('.form-btn-cancel').click(function () {
		location.reload();
	});

	$('#search').click(function () {
		$('#search-bar').toggle('fast');
	});

	$('.btn-shop').click(function () {
		location.href = 'products.php';
	});

	$('#clear-cart').click(function () {
		$('#clear-modal').show();
	});

	$('#no').click(function () {
		$('#clear-modal').hide();
	});

	$('#yes').click(function () {
		$('#clear-modal').hide();
		$.ajax({
			url: 'scripts/delete.php',
			method: 'post',
			data: { action: 'clear_cart' },
			success: function (response) {
				location.reload();
			},
			error: function (error) {
				console.log(error.responseText);
			},
		});
	});

	$('#proceed-checkout').click(function () {
		$.ajax({
			url: 'scripts/checkout.php',
			method: 'post',
			data: { action: 'proceed_checkout' },
			success: function (response) {
				location.href = 'checkout_summary.php';
			},
			error: function (error) {
				console.log(error.responseText);
			},
		});
	});

	$('#cancel-order').click(function () {
		$.ajax({
			url: 'scripts/checkout.php',
			method: 'post',
			data: { action: 'cancel_checkout' },
			success: function (response) {
				location.href = 'cart.php';
			},
		});
	});

	// Back to cart
	$('#place-order').submit(function (event) {
		event.preventDefault();

		// if form fields are empty
		if (!$('#order-fname').val()) isEmptyField('#order-fname');
		if (!$('#order-lname').val()) isEmptyField('#order-lname');
		if (!$('#order-addr').val()) isEmptyField('#order-addr');

		// count the number of invalid warnings
		let invalidCount = $('.invalid-feedback:visible').length;

		const paymentForm = $('.form-2');
		const paymentOptions = paymentForm.find('input[name="order_payment"]');

		if (!paymentOptions.is(':checked')) {
			$('.choose-payment').show();
			return false;
		}

		if (invalidCount > 0) {
			return false;
		} else {
			$.ajax({
				url: 'scripts/checkout.php',
				method: 'post',
				data: { action: 'place_order', data: $(this).serialize() },
				dataType: 'json',
				success: function (response) {
					location.href = 'checkout_success.php';
				},
				error: function (error) {
					console.log(error.responseText);
				},
			});
		}
	});

	// Radio Button
	$('.option').on('click', function () {
		$(this).find("input[type='radio']").prop('checked', true);
		$('.choose-payment').hide();

		// Add CSS styles to clicked option
		$(this).css({
			'background-color': 'var(--color-pear)',
			border: 'none',
			color: 'var(--color-plantation)',
		});

		// Remove CSS styles from other options
		$('.option').not(this).css({
			'background-color': '',
			border: '',
			color: '',
		});

		const selectedOption = $(this).find("input[type='radio']").val();

		if (selectedOption === 'gcash') {
			applyValidationStyle('#gcash-num', 'This field is required.');
			removeValidationStyle('#account-num');
		} else if (selectedOption === 'bank') {
			applyValidationStyle('#account-num', 'This field is required.');
			removeValidationStyle('#gcash-num');
		} else if (selectedOption === 'cod') {
			removeValidationStyle('#gcash-num');
			removeValidationStyle('#account-num');
		}
	});

	$('#add-address').on('change', function () {
		// If the checkbox is checked, show the new address fields
		if ($(this).is(':checked')) {
			$('#new-form').show();
			$('#set-params').val('true');
		} else {
			// If the checkbox is not checked, hide the new address fields
			$('#new-form').hide();
			$('#set-params').val('');
		}
	});

	$('#new-pass').on('blur', function () {
		if (!validatePassword($(this).val())) {
			applyValidationStyle('#new-pass', 'Password must at least 6 characters');
		}
	});

	$('#confirm-pass').on('blur', function () {
		let password = $('#new-pass').val();
		let confirmPassword = $('#confirm-pass').val();

		if (confirmPassword !== password) {
			applyValidationStyle('#confirm-pass', 'Password not match');
		} else {
			removeValidationStyle('#confirm-pass');
		}
	});

	$('#change-pass').submit(function (event) {
		event.preventDefault();

		if (!$('#current-pass').val()) isEmptyField('#current-pass');
		if (!$('#new-pass').val()) isEmptyField('#new-pass');
		if (!$('#confirm-pass').val()) isEmptyField('#confirm-pass');

		let invalidCount = $('.invalid-feedback:visible').length;

		let formData = $(this).serialize();

		if (invalidCount > 0) {
			return false;
		} else {
			$.ajax({
				url: 'scripts/update.php',
				type: 'post',
				data: { action: 'update_pass', data: $(this).serialize() },
				dataType: 'json',
				success: function (response) {
					console.log(response);
					if (response.status) {
					} else {
						applyValidationStyle('#' + response.field, response.message);
					}
				},
				error: function (error) {
					console.log(error.responseText);
				},
			});
		}
	});

	// End
});
