function validate (element, valid, message) {
	var name = $(element).attr('name');
	var feedback_id = '#' + name + '-validation-feedback';

	if (valid) {
		$(element).removeClass('is-invalid');
		$(element).addClass('is-valid');
		$(feedback_id).removeClass('invalid-feedback');
		$(feedback_id).addClass('valid-feedback');
	} else {
		$(element).removeClass('is-valid');
		$(element).addClass('is-invalid');
		$(feedback_id).removeClass('valid-feedback');
		$(feedback_id).addClass('invalid-feedback');
	}

	$(element).parent().parent().removeClass('mb-4');
	$(feedback_id).html(message);
	$(feedback_id).show();
}


function update_signup_button () {
	if (
		$('#first-name-validation-feedback').hasClass('valid-feedback') &&
		$('#last-name-validation-feedback').hasClass('valid-feedback') &&
		$('#username-validation-feedback').hasClass('valid-feedback') &&
		$('#email-validation-feedback').hasClass('valid-feedback') &&
		$('#password-validation-feedback').hasClass('valid-feedback') &&
		$('#confirm-password-validation-feedback').hasClass('valid-feedback')
	) {
		$('#signup-submit').prop('disabled', false);
	} else {
		$('#signup-submit').prop('disabled', true);
	}
}


$('#toggle-password').click(function () {
	if ($(this).hasClass('bi-eye-fill')) {
		$(this).removeClass('bi-eye-fill');
		$(this).addClass('bi-eye-slash-fill');
		$('input[name="password"]').attr('type', 'password');
	} else {
		$(this).removeClass('bi-eye-slash-fill');
		$(this).addClass('bi-eye-fill');
		$('input[name="password"]').attr('type', 'text');
	}
})


$('input[name="first-name"],input[name="last-name"],input[name="username"],input[name="email"],input[name="password"],input[name="confirm-password"]').keyup(function () {
	var re_name = /^[a-zA-Z ]+$/;
	var re_username = /^[a-zA-Z0-9_]+$/;
	var re_email = /^[a-zA-Z0-9_\-\.]+@([a-zA-Z0-9_\-]+\.)+[a-zA-Z0-9_\-]{2,4}$/;
	var re_length_2_32 = /^.{2,32}$/;
	var re_length_2_16 = /^.{2,16}$/;
	var re_length_8_64 = /^.{8,64}$/;

	var val = $(this).val();
	switch ($(this).attr('name')) {
		case 'first-name':
		case 'last-name':
			if (val === '') validate(this, false, 'This field is required.');
			else if (!re_name.test(val)) validate(this, false, 'Can only contain letters or spaces.');
			else if (!re_length_2_32.test(val)) validate(this, false, 'Must be between 2 and 32 characters.');
			else {
				if ($(this).attr('name') == 'first-name') validate(this, true, 'Valid first name.');
				else validate(this, true, 'Valid last name.');
			}

			$(this).val(val.replace(/^ +/g, ''));
			$(this).val(val.replaceAll(/ +/g, ' '));
			if (val === '') validate(this, false, 'This field is required.');

			break;

		case 'username':
			if (val === '') validate(this, false, 'This field is required.');
			else if (!re_username.test(val)) validate(this, false, 'Can only contain letters, numbers, or underscores.');
			else if (!re_length_2_16.test(val)) validate(this, false, 'Must be between 2 and 16 characters.');
			else {
				username_input = $(this);
				$.ajax({
					url: 'http://localhost/modules/user/check_taken_json.php',
					type: 'POST',
					data: {
						type: 'username',
						value: val
					},
					success: function (taken) {
						if (!taken) validate(username_input, true, 'Valid username.');
						else validate(username_input, false, 'This username is taken.');
						update_signup_button();
					}
				});
			}

			break;

		case 'email':
			if (val === '') validate(this, false, 'This field is required.');
			else if (!re_email.test(val)) validate(this, false, 'Invalid email.');
			else {
				email_input = $(this);
				$.ajax({
					url: 'http://localhost/modules/user/check_taken_json.php',
					type: 'POST',
					data: {
						type: 'email',
						value: val
					},
					success: function (taken) {
						if (!taken) validate(email_input, true, 'Valid email.');
						else validate(email_input, false, 'An account with this email already exists.');
						update_signup_button();
					}
				});
			}

			break;

		case 'password':
			if (val === '') validate(this, false, 'This field is required.');
			else if (!re_length_8_64.test(val)) validate(this, false, 'Must be between 8 and 64 characters.');
			else validate(this, true, 'Valid password.');

			var confirm_password_input = $('input[name="confirm-password"]');
			var confirm_password_val = confirm_password_input.val();
			if (confirm_password_val === '') validate(confirm_password_input, false, 'This field is required.');
			else if (!re_length_8_64.test(confirm_password_val)) validate(confirm_password_input, false, 'Must be between 8 and 64 characters.');
			else if (confirm_password_val != val) validate(confirm_password_input, false, 'Passwords do not match.');
			else validate(confirm_password_input, true, 'Passwords match.');
			break;

		case 'confirm-password':
			var password = $('input[name="password"]').val();
			if (val === '') validate(this, false, 'This field is required.');
			else if (!re_length_8_64.test(val)) validate(this, false, 'Must be between 8 and 64 characters.');
			else if (val != password) validate(this, false, 'Passwords do not match.');
			else validate(this, true, 'Passwords match.');
			break;
	}

	update_signup_button();
})
