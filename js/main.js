$(document).ready(function () {
	// Responsive Navbar Toggler
	$('#navToggler').on('click', function () {
		if ($('.navbar-nav').is(':visible')) {
			$('.navbar-nav').slideUp(300);
		} else {
			$('.navbar-nav').slideDown(300);
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
				url: 'login.php',
				type: 'POST',
				data: $(this).serialize(),
				dataType: 'json',
			})
				.then(function (response) {
					console.log(response);
					if (response.status) {
						window.location.href = 'products.php';
					} else {
						$('#password').val('');
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
	onInputValidation('#email');

	// function to validate terms and conditions
	$('#terms').change(function () {
		if ($(this).is(':checked')) {
			$('.terms .invalid-feedback').hide();
		}
	});

	// function to toggle css classes for validation
	function onInputValidation(id) {
		$(id).on('input', function () {
			if ($(this).val().trim() !== '') {
				$(this).siblings('.invalid-feedback').hide();
				$(this).removeClass('is-invalid');
			}
		});
	}

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
			$('.terms .invalid-feedback').html('Please agree.').show();
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
						// window.location.href = 'loading-screen.php';
						// Countdown
						// let count = 10;
						// let countDown = setInterval(function () {
						// 	if (count < 0) {
						// 		clearInterval(countDown);
						// 		window.location.href = 'login.php';
						// 	} else {
						// 		$('#count-text').html(count);
						// 		count--;
						// 	}
						// }, 1000);
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

	$('#profile-toggle').click(function () {
		$('.profile-dropdown').slideToggle('fast');
	});

	$('#logoutBtn').click(function () {
		$('#confirm-modal').fadeIn('fast');
	});

	$('#cancel').click(function () {
		$('#confirm-modal').fadeOut('fast');
	});

	$('#confirm').click(function () {
		window.location.href = 'logout.php';
	});
});
