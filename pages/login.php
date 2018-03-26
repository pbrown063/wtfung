<?php require_once __DIR__ . '/bootstrap.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>WTF Login</title>
  <link rel="stylesheet" type="text/css" href="CSS/form_style.css">
  <link rel="stylesheet" type="text/css" href="CSS/main_style.css">
<body>
<nav>
  <img class="logo" src="../resources/WTF_white.png" alt="WTF">
</nav>
<div class="container">
  <form method="POST" action="authenticate.php">
    <ul class="flex-outer">
      <li>
        <input type="email" id="email" placeholder="Email Address" name="email" required>
      </li>
      <li>
        <input type="password" id="password" placeholder="Password" name="password" required>
      </li>
      <li>
        <button type="submit"> Log in</button>
      </li>
    </ul>
  </form>
</div>
</body>
<footer>

</footer>
</html>
