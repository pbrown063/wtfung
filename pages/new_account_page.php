<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Account</title>
    <link rel="stylesheet" type="text/css" href="CSS/form_style.css">
    <link rel="stylesheet" type="text/css" href="CSS/main_style.css">
</head>
<body>
<?php include 'header.php'; ?>
<div class="container">
    <form method="POST" action="create_account.php">
        <ul class="flex-outer">
            <li>
                <input type="text" id="first-name" placeholder="First Name" name="Fname" required>
            </li>
            <li>
                <input type="text" id="last-name" placeholder="Last Name" name="Lname" required>
            </li>
            <li>
                <input type="email" id="email" placeholder="Email Address" name="email" required>
            </li>
            <li>
                <input type="password" id="password" placeholder="Password" name="pswrd" required>
            </li>
            <li>
                <button type="submit">Create Account</button>
            </li>
        </ul>
    </form>
</div>
</body>
</html>
