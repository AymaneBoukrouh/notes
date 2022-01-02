<?php

require_once('../modules/get_user_module.php');

$TITLE = 'Notes';
require_once('../includes/header.php');

?>
    <div class="text-center mb-3"><h3><?= $user['first_name'].' '.$user['last_name']; ?></h3></div>
    <form action="../modules/edit_profile_module.php" method="POST">
      <div class="row mb-3">
        <label class="col-auto col-form-label w-25" for="first-name">First Name</label>
        <input type="text" class="col form-control" name="first-name" value="<?= $user['first_name']; ?>" disabled>
      </div>
      <div class="row mb-3">
        <label class="col-auto col-form-label w-25" for="last-name">Last Name</label>
        <input type="text" class="col form-control" name="last-name" value="<?= $user['last_name']; ?>" disabled>
      </div>
      <div class="row mb-3">
        <label class="col-auto col-form-label w-25" for="username-">Username</label>
        <input type="text" class="col form-control" name="username" value="<?= $user['username']; ?>" disabled>
      </div>
      <div class="row mb-3">
        <label class="col-auto col-form-label w-25" for="email">Email</label>
        <input type="text" class="col form-control" name="email" value="<?= $user['email']; ?>" disabled>
      </div>
      <div class="row mb-3">
        <input type="submit" class="col-auto btn btn-primary w-25" value="Edit">
        <span class="col d-flex align-items-center mx-2"><a href="change_password.php" style="text-decoration: none;">Change Password</a></span>
      </div>
    </form>
<?php require_once('../includes/footer.php'); ?>