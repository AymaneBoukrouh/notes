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
		$('#first-name-validation-feedback').hasClass('valid-feedback') &&
		$('#last-name-validation-feedback').hasClass('valid-feedback') &&
		$('#username-validation-feedback').hasClass('valid-feedback') &&
		$('#email-validation-feedback').hasClass('valid-feedback')
	) {
		$('#save-submit').prop('disabled', false);
	} else {
		$('#save-submit').prop('disabled', true);
	}
}


var current_user;
$.ajax({
	url: 'http://localhost/modules/user/current_user_json.php',
	type: 'POST',
	success: function (user) {
		current_user = user;
	}
});


$('#edit-submit').click(function () {
	['first-name', 'last-name', 'username', 'email'].forEach(function (name) {
		var input = $(`input[name=${name}]`);

		input.prop('disabled', false);
		input.removeAttr('placeholder');
		input.val($(`#${name}-validation-feedback`).html());

		switch (name) {
			case 'first-name': validate(input, true, 'Current first name'); break;
			case 'last-name': validate(input, true, 'Current last name'); break;
			case 'username': validate(input, true, 'Current username'); break;
			case 'email': validate(input, true, 'Current email'); break;
		}
	});

	$(this).prop('hidden', true);
	$('#save-submit').prop('hidden', false);
});


$('input[name="first-name"],input[name="last-name"],input[name="username"],input[name="email"]').keyup(function () {
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
			else if (
				($(this).attr('name') === 'first-name') &&
				val === current_user['first_name']
			) validate(this, true, 'Current first name');

			else if (
				($(this).attr('name') === 'last-name') &&
				val === current_user['last_name']
			) validate(this, true, 'Current last name');

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
			else if (val === current_user['username']) validate(this, true, 'Current username');
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
						update_save_button();
					}
				});
			}

			break;

		case 'email':
			if (val === '') validate(this, false, 'This field is required.');
			else if (!re_email.test(val)) validate(this, false, 'Invalid email.');
			else if (val === current_user['email']) validate(this, true, 'Current email');
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
						update_save_button();
					}
				});
			}

			break;
	}

	update_save_button();
})
