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
    <div class="nav_cont">
        <ul>
            <li>
                <img class="logo" src="../resources/WTF_white.png" alt="WTF">
            </li>
        </ul>
    </div>
</nav>
<div class="container">
    <form method="POST" action="#">
        <ul class="flex-outer">
            <li>
                <input type="email" id="email" placeholder="Email Address" required>
            </li>
            <li>
                <input type="password" id="password" placeholder="Password" required>
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
