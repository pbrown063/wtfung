<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Substrate</title>

    <link rel="stylesheet" type="text/css" href="./CSS/form_style.css">
    <link rel="stylesheet" type="text/css" href="./CSS/main_style.css">

</head>
<body>
<?php include 'header.php'; ?>
<div class="container">
    <form method="POST" action="substrate.php" id="substrate_form">
        <ul class="flex-outer">
            <li>
                <input type='text' name='substrate' placeholder='Substrate Type' required>
            </li>
            <li>
                <textarea name='notes' rows='5' cols='20' placeholder='Substrate Notes'></textarea>
            </li>
            <li>
                <button type='submit' name='submit' value='submit' form='substrate_form'>Add Substrate</button>
            </li>
        </ul>
    </form>
</div>
</body>
</html>