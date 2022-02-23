<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/modules/auth/login_required.php');

$title = 'Change Password';
require_once($_SERVER['DOCUMENT_ROOT'].'/includes/header.php');

?>
    <div class="text-center mb-3"><h3>Change Password</h3></div>
    <form action="/modules/user/change_password.php" method="POST">
      <?php if(isset($_SESSION['flash_message'])): ?>
      <div class="alert alert-<?= $_SESSION['flash_message']['status'] ?>"><?= $_SESSION['flash_message']['message']; ?></div>
      <?php unset($_SESSION['flash_message']); endif; ?>
      <div class="row d-flex align-items-center mb-3">
        <label class="col-auto col-form-label w-25" for="current-password">Current Password</label>
        <div class="col">
          <div class="row g-0">
            <div class="col form-floating mx-0">
              <input type="password" class="form-control is-invalid no-border-right-radius" name="current-password" placeholder="">
              <label for="current-password" class="invalid-feedback" id="current-password-validation-feedback">This field is required</label>
            </div>
            <span class="col-auto input-group-text no-border-left-radius border border-5"><i class="bi-eye-slash-fill" id="toggle-current-password"></i></span>
          </div>
        </div>
      </div>
      <div class="row d-flex align-items-center mb-3">
        <label class="col-auto col-form-label w-25" for="new-password">New Password</label>
        <div class="col">
          <div class="row g-0">
            <div class="col form-floating mx-0">
              <input type="password" class="form-control is-invalid no-border-right-radius" name="new-password" placeholder="">
              <label for="new-password" class="invalid-feedback" id="new-password-validation-feedback">This field is required</label>
            </div>
            <span class="col-auto input-group-text no-border-left-radius border border-5"><i class="bi-eye-slash-fill" id="toggle-new-password"></i></span>
          </div>
        </div>
      </div>
      <div class="row d-flex align-items-center mb-3">
        <label class="col-auto col-form-label w-25" for="confirm-password">Confirm Password</label>
        <div class="col">
          <div class="form-floating mx-0">
            <input type="password" class="form-control is-invalid" name="confirm-password" placeholder="">
            <label for="confirm-password" class="invalid-feedback" id="confirm-password-validation-feedback">This field is required</label>
          </div>
        </div>
      </div>
      <div class="row mb-3">
        <input type="submit" class="col-auto btn btn-primary w-25" value="Save" id="save-submit" disabled>
        <span class="col d-flex align-items-center mx-2"><a href="profile.php" style="text-decoration: none;">Cancel</a></span>
      </div>
    </form>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/includes/footer.php'); ?>