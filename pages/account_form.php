<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Create Account</title>

  <link rel="stylesheet" type="text/css" href="./CSS/form_style.css">
  <link rel="stylesheet" type="text/css" href="./CSS/main_style.css">

</head>
<body>
<?php include 'header.php'; ?>
<div class="container">
  <form method="POST" action="create_account.php" id='account_form'>
    <ul class="flex-outer">
      <li>
        <input type="text" id="first-name" placeholder="First Name" name="Fname" maxlength="30" required>
      </li>
      <li>
        <input type="text" id="last-name" placeholder="Last Name" name="Lname" maxlength="30" required>
      </li>
      <li>
        <input type="email" id="email" placeholder="Email Address" name="email" maxlength="50"  required>
      </li>
      <li>
        <input type="password" id="password" placeholder="Password" name="pswrd" maxlength="50"  required>
      </li>
      <li>
        <button type="submit" form='account_form'>Create Account</button>
      </li>
    </ul>
  </form>
</div>
</body>
</html>
