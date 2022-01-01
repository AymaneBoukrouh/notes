<?php

$TITLE = 'Notes';
require_once('../includes/header.php');

?>
    <div class="text-center mb-3"><h3>Sign Up</h3></div>
    <form action="" method="POST">
      <div class="row mb-3">
        <div class="col">
          <label class="form-label" for="first-name">First Name</label>
          <input type="text" class="form-control" name="first-name">
        </div>
        <div class="col">
          <label class="form-label" for="last-name">Last Name</label>
          <input type="password" class="form-control" name="last-name">
        </div>
      </div>
      <div class="row mb-3">
        <div class="col">
          <label class="form-label" for="username">Username</label>
          <input type="text" class="form-control" name="username">
        </div>
        <div class="col">
          <label class="form-label" for="email">Email</label>
          <input type="password" class="form-control" name="email">
        </div>
      </div>
      <div class="row mb-3">
        <div class="col">
          <label class="form-label" for="password">Password</label>
          <input type="text" class="form-control" name="password">
        </div>
        <div class="col">
          <label class="form-label" for="confirm-password">Confirm Password</label>
          <input type="password" class="form-control" name="confirm-password">
        </div>
      </div>
      <div class="mb-3">
        <input type="submit" class="btn btn-primary" value="Sign Up">
        <span class="mx-2">Already have an account? <a href="login.php" style="text-decoration: none">Log In</a></span>
      </div>
    </form>
<?php require_once('../includes/footer.php'); ?>