<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/modules/auth/login_required.php');

$current_user = require($_SERVER['DOCUMENT_ROOT'].'/modules/user/current_user.php');

$title = 'Profile - '.$current_user['first_name'].' '.$current_user['last_name'];
require_once($_SERVER['DOCUMENT_ROOT'].'/includes/header.php');

?>
    <div class="text-center mb-3"><h3>Profile</h3></div>
    <form action="/modules/user/edit_profile.php" method="POST">
      <?php if(isset($_SESSION['flash_message'])): ?>
      <div class="alert alert-<?= $_SESSION['flash_message']['status'] ?>"><?= $_SESSION['flash_message']['message']; ?></div>
      <?php unset($_SESSION['flash_message']); endif; ?>
      <div class="row d-flex align-items-center mb-3">
        <label class="col-auto col-form-label w-25" for="first-name">First Name</label>
        <div class="col">
          <div class="form-floating mx-0">
            <input type="text" class="form-control" name="first-name" placeholder="" disabled>
            <label for="first-name" id="first-name-validation-feedback"><?= $current_user['first_name']; ?></label>
          </div>
        </div>
      </div>
      <div class="row d-flex align-items-center mb-3">
        <label class="col-auto col-form-label w-25" for="last-name">Last Name</label>
        <div class="col">
          <div class="form-floating mx-0">
            <input type="text" class="form-control" name="last-name" placeholder="" disabled>
            <label for="last-name" id="last-name-validation-feedback"><?= $current_user['last_name']; ?></label>
          </div>
        </div>
      </div>
      <div class="row d-flex align-items-center mb-3">
        <label class="col-auto col-form-label w-25" for="username-">Username</label>
        <div class="col">
          <div class="form-floating mx-0">
            <input type="text" class="form-control" name="username" placeholder="" disabled>
            <label for="username" id="username-validation-feedback"><?= $current_user['username']; ?></label>
          </div>
        </div>
      </div>
      <div class="row d-flex align-items-center mb-3">
        <label class="col-auto col-form-label w-25" for="email">Email</label>
        <div class="col">
          <div class="form-floating mx-0">
            <input type="text" class="form-control" name="email" placeholder="" disabled>
            <label for="email" id="email-validation-feedback"><?= $current_user['email']; ?></label>
          </div>
        </div>
      </div>
      <div class="row mb-3">
        <input type="button" class="col-auto btn btn-primary w-25" value="Edit" id="edit-submit">
        <input type="submit" class="col-auto btn btn-primary w-25" value="Save" id="save-submit" hidden>
        <span class="col d-flex align-items-center mx-2"><a href="change_password.php" style="text-decoration: none;">Change Password</a></span>
      </div>
    </form>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/includes/footer.php'); ?>