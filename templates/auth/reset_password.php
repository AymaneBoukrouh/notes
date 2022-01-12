<?php

$current_user = $query = require($_SERVER['DOCUMENT_ROOT'].'/modules/user/current_user.php');

if ($current_user) exit(header('Location: /templates/notes.php'));

require_once($_SERVER['DOCUMENT_ROOT'].'/modules/auth/reset_password.php');

$title = 'Reset Password';
require_once($_SERVER['DOCUMENT_ROOT'].'/includes/header.php');

?>
    <div class="text-center mb-3"><h3>Reset Password</h3></div>
    <form action="/modules/auth/reset_password.php?email=<?= $_GET['email'] ?>&token=<?= $_GET['token'] ?>" method="POST">
      <?php if(isset($_SESSION['flash_message'])): ?>
      <div class="alert alert-<?= $_SESSION['flash_message']['status'] ?>"><?= $_SESSION['flash_message']['message']; ?></div>
      <?php unset($_SESSION['flash_message']); endif; ?>
      <div class="row mb-3">
        <div class="col">
          <label class="form-label mb-0" for="new-password">New Password</label>
          <div class="invalid-feedback d-block" id="new-password-validation-feedback">
            This field is required.
          </div>
          <div class="input-group">
            <input type="password" class="form-control" name="new-password">
            <span class="input-group-text"><i class="bi-eye-slash-fill" id="toggle-new-password"></i></span>
          </div>
        </div>
        <div class="col">
          <label class="form-label mb-0" for="confirm-password">Confirm Password</label>
          <div class="invalid-feedback d-block" id="confirm-password-validation-feedback">
            This field is required.
          </div>
          <input type="password" class="form-control" name="confirm-password">
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-auto">
          <input type="submit" name="submit" id="reset-password-submit" class="col btn btn-primary" value="Reset Password" disabled>
        </div>
      </div>
    </form>
<?php require_once('../../includes/footer.php'); ?>