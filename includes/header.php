<?php $current_user = require($_SERVER['DOCUMENT_ROOT'].'/modules/user/current_user.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $title ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="/assets/css/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>
<body>
  <header><a href="https://www.github.com/AymaneBoukrouh/PHP-Notes/" class="github-link"><i class="bi-github"></i></a></header>
  <div class="main-container position-relative">
    <?php if (!in_array(basename($_SERVER['PHP_SELF']), ['login.php', 'signup.php'])): ?>
    <div class="dropdown">
      <a class="user-menu-link" href="#" role="button" id="user-dropdown-menu" data-bs-toggle="dropdown" data-bs-offset="0,10" aria-expanded="false">
        <i class="user-menu-icon bi-person-circle"></i>
      </a>
      <span class="user-menu-name"><?= $current_user['first_name'].' '.$current_user['last_name']; ?></span>
      <ul class="dropdown-menu" aria-labelledby="user-dropdown-menu">
        <li><a class="dropdown-item" href="/templates/profile.php">Profile</a></li>
        <li><a class="dropdown-item" href="/templates/notes.php">Notes</a></li>
        <li><a class="dropdown-item" href="/templates/add_note.php">Add Note</a></li>
        <li><a class="dropdown-item text-danger logout-button" href="/modules/auth/logout.php">Log Out</a></li>
      </ul>
    </div>
    <?php endif; ?>