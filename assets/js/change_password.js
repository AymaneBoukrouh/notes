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


function update_save_button () {
	if (
		$('#current-password-validation-feedback').hasClass('valid-feedback') &&
		$('#new-password-validation-feedback').hasClass('valid-feedback') &&
		$('#confirm-password-validation-feedback').hasClass('valid-feedback')
	) {
		$('#save-submit').prop('disabled', false);
	} else {
		$('#save-submit').prop('disabled', true);
	}
}


$('#toggle-current-password,#toggle-new-password').click(function () {
	if ($(this).hasClass('bi-eye-fill')) {
		$(this).removeClass('bi-eye-fill');
		$(this).addClass('bi-eye-slash-fill');
		if ($(this).attr('id') === 'toggle-current-password')
			$('input[name="current-password"]').attr('type', 'password');
		else $('input[name="new-password"]').attr('type', 'password');
	} else {
		$(this).removeClass('bi-eye-slash-fill');
		$(this).addClass('bi-eye-fill');
		if ($(this).attr('id') === 'toggle-current-password')
			$('input[name="current-password"]').attr('type', 'text');
		else $('input[name="new-password"]').attr('type', 'text');
	}
})


$('input[name="current-password"],input[name="new-password"],input[name="confirm-password"]').keyup(function () {
	var re_length_8_64 = /^.{8,64}$/;

	var val = $(this).val();
	switch ($(this).attr('name')) {
        case 'current-password':
        	$(this).removeClass('input-info');
        	$('#current-password-validation-feedback').removeClass('text-info');
			if (val === '') validate(this, false, 'This field is required.');
			else if (!re_length_8_64.test(val)) validate(this, false, 'Must be between 8 and 64 characters.');
			else {
				validate(this, true, 'Valid password.');
				$(this).addClass('input-info');
				$('#current-password-validation-feedback').addClass('text-info');
			}

			break;

    	case 'new-password':
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
			var password = $('input[name="new-password"]').val();
			if (val === '') validate(this, false, 'This field is required.');
			else if (!re_length_8_64.test(val)) validate(this, false, 'Must be between 8 and 64 characters.');
			else if (val != password) validate(this, false, 'Passwords do not match.');
			else validate(this, true, 'Passwords match.');
			break;
	}

	update_save_button();
})
