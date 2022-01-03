<?php

session_start();

if (isset($_SESSION['user_id'])) exit(header('Location: /templates/notes.php'));

$TITLE = 'Notes';
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
          <input type="password" class="form-control" name="password">
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-auto">
          <input type="submit" class="col btn btn-primary" value="Log In">
        </div>
        <div class="col">
          <span class="col d-flex align-items-center h-100">Don't have an account?&nbsp;<a href="signup.php" style="text-decoration: none">Sign Up</a></span>
        </div>
      </div>
    </form>
<?php require_once('../../includes/footer.php'); ?>