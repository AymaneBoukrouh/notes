<?php

$current_user = $query = require($_SERVER['DOCUMENT_ROOT'].'/modules/user/current_user.php');

if ($current_user) exit(header('Location: /templates/notes.php'));

$title = 'Reset Password';
require_once($_SERVER['DOCUMENT_ROOT'].'/includes/header.php');

?>
    <div class="text-center mb-3"><h3>Reset Password</h3></div>
    <form action="/modules/auth/reset_password_request.php" method="POST">
      <?php if(isset($_SESSION['flash_message'])): ?>
      <div class="alert alert-<?= $_SESSION['flash_message']['status'] ?>"><?= $_SESSION['flash_message']['message']; ?></div>
      <?php unset($_SESSION['flash_message']); endif; ?>
      <div class="mb-3">
        <label class="form-label" for="username-or-email">Username or Email</label>
        <input type="text" class="form-control" name="username-or-email">
      </div>
      <div class="row mb-3">
        <div class="col-auto">
          <input type="submit" class="col btn btn-primary" value="Reset Password">
        </div>
        <div class="col">
          <span class="col d-flex align-items-center h-100">Go back to&nbsp;<a href="login.php" style="text-decoration: none;">Log In</a></span>
        </div>
      </div>
    </form>
<?php require_once('../../includes/footer.php'); ?>