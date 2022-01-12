<?php

$current_user = $query = require($_SERVER['DOCUMENT_ROOT'].'/modules/user/current_user.php');

if ($current_user) exit(header('Location: /templates/notes.php'));

$title = 'Log In';
require_once($_SERVER['DOCUMENT_ROOT'].'/includes/header.php');

?>
    <div class="text-center mb-3"><h3>Log In</h3></div>
    <form action="/modules/auth/login.php" method="POST">
      <?php if(isset($_SESSION['flash_message'])): ?>
      <div class="alert alert-<?= $_SESSION['flash_message']['status'] ?>"><?= $_SESSION['flash_message']['message']; ?></div>
      <?php unset($_SESSION['flash_message']); endif; ?>
      <div class="row mb-3">
        <div class="col">
          <label class="form-label" for="username-or-email">Username or Email</label>
          <input type="text" class="form-control" name="username-or-email">
        </div>
        <div class="col">
          <label class="form-label" for="password">Password</label>
          <div class="input-group">
            <input type="password" class="form-control" name="password">
            <span class="input-group-text"><i class="bi-eye-slash-fill" id="toggle-password"></i></span>
          </div>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-auto">
          <input type="submit" class="col btn btn-primary" value="Log In">
        </div>
        <div class="col">
          <span class="col d-flex align-items-center h-100">Don't have an account?&nbsp;<a href="signup.php" style="text-decoration: none;">Sign Up</a></span>
        </div>
      </div>
      <a href="reset_password_request.php" style="text-decoration: none;"><small>Forgot password?</small></a>
    </form>
<?php require_once('../../includes/footer.php'); ?>