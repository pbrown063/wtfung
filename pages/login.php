<?php require_once __DIR__ . '/bootstrap.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WTF Login</title>
    <base href="159.89.126.149/wtfung">
    <link rel="stylesheet" type="text/css" href="/pages/CSS/form_style.css">
    <link rel="stylesheet" type="text/css" href="/pages/CSS/main_style.css">
<body>
<nav>
    <div class="nav_cont">
        <ul>
            <li>
                <a id="logo" href="#"><img src="../resources/WTF_white.png" alt="WTF"></a>
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
<?php echo __DIR__ . '/CSS/form_style.css'; ?>