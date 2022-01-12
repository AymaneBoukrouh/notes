  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <?php switch (basename($_SERVER['PHP_SELF'])):
  ?><?php case 'login.php': ?><script src="/assets/js/login.js"></script><?php break;?>
    <?php case 'signup.php': ?><script src="/assets/js/signup.js"></script><?php break; ?>
    <?php case 'profile.php': ?><script src="/assets/js/profile.js"></script><?php break; ?>
    <?php case 'change_password.php': ?><script src="/assets/js/change_password.js"></script><?php break; ?>
    <?php case 'reset_password.php': ?><script src="/assets/js/reset_password.js"></script><?php break; ?>
  <?php endswitch; ?>
</body>
</html>