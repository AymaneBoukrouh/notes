<?php

$TITLE = 'Notes';
require_once('../includes/header.php');

?>
    <div class="text-center mb-3"><h3>Log In</h3></div>
    <form action="" method="POST">
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
      <div class="mb-3">
        <input type="submit" class="btn btn-primary" value="Log In">
        <span class="mx-2">Don't have an account? <a href="signup.php" style="text-decoration: none">Sign Up</a></span>
      </div>
    </form>
<?php require_once('../includes/footer.php'); ?>