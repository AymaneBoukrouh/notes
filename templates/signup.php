<?php

session_start();

if (isset($_SESSION['user_id']))
  exit(header('Location: /templates/profile.php?id='.$_SESSION['user_id']));

$TITLE = 'Notes';
require_once('../includes/header.php');

?>
    <div class="text-center mb-3"><h3>Sign Up</h3></div>
    <form action="../modules/signup_module.php" method="POST">
      <div class="row mb-3">
        <div class="col">
          <label class="form-label mb-0" for="first-name">First Name</label>
          <div class="invalid-feedback d-block" id="first-name-validation-feedback">
            This field is required.
          </div>
          <input type="text" class="form-control" name="first-name">
        </div>
        <div class="col">
          <label class="form-label mb-0" for="last-name">Last Name</label>
          <div class="invalid-feedback d-block" id="last-name-validation-feedback">
            This field is required.
          </div>
          <input type="text" class="form-control" name="last-name">
        </div>
      </div>
      <div class="row mb-3">
        <div class="col">
          <label class="form-label mb-0" for="username">Username</label>
          <div class="invalid-feedback d-block" id="username-validation-feedback">
            This field is required.
          </div>
          <input type="text" class="form-control" name="username">
        </div>
        <div class="col">
          <label class="form-label mb-0" for="email">Email</label>
          <div class="invalid-feedback d-block" id="email-validation-feedback">
            This field is required.
          </div>
          <input type="text" class="form-control" name="email">
        </div>
      </div>
      <div class="row mb-3">
        <div class="col">
          <label class="form-label mb-0" for="password">Password</label>
          <div class="invalid-feedback d-block" id="password-validation-feedback">
            This field is required.
          </div>
          <input type="password" class="form-control" name="password">
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
          <input type="submit" class="btn btn-primary" value="Sign Up" id="signup-submit" disabled>
        </div>
        <div class="col">
          <span class="d-flex align-items-center h-100">Already have an account?&nbsp;<a href="login.php" style="text-decoration: none">Log In</a></span>
        </div>
      </div>
    </form>
<?php require_once('../includes/footer.php'); ?>