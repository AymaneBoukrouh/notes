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