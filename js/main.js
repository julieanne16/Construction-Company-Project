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

	// Login
	$('#login').submit(function (event) {
		event.preventDefault();

		let email = $('#email').val();
		let password = $('#password').val();

		// if empty email
		if (!$('#email').val()) ifEmpty('#email');

		// if empty password
		if (password == '') {
			classValidation('#password', 'This field is required');
		}

		// if empty both
		if (email === '' || password === '') {
			$('.invalid-form').html('Please fill up the required fields!').show();
		}

		let invalidCount = $('.invalid-feedback:visible').length;

		if (invalidCount > 0) {
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
						$('.invalid-form').html(response.message).show();
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

	function ifEmpty(id) {
		$(id).siblings('.invalid-feedback').html('This field is required').show();
		$(id).addClass('is-invalid');
	}

	$('#register').submit(function (event) {
		event.preventDefault();

		// if form fields are empty
		if (!$('#fname').val()) ifEmpty('#fname');
		if (!$('#lname').val()) ifEmpty('#lname');
		if (!$('#email').val()) ifEmpty('#email');
		if (!$('#password').val()) ifEmpty('#password');

		// if terms is not checked
		if (!$('#terms').is(':checked')) {
			$('.terms .invalid-feedback ').html('Please agree.').show();
		}

		let invalidCount = $('.invalid-feedback:visible').length;

		if (invalidCount > 0) {
			return false;
		} else {
			$.ajax({});
		}
	});
});
