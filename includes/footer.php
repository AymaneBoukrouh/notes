  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="/assets/main.js"></script>
  <?php if (basename($_SERVER['PHP_SELF']) === 'signup.php'): ?>
  <script src="/assets/js/signup.js"></script>
  <?php endif; ?>
  <?php if (basename($_SERVER['PHP_SELF']) === 'profile.php'): ?>
  <script src="/assets/js/profile.js"></script>
  <?php endif; ?>
</body>
</html>