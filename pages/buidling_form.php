<?php
/**
 * Created by PhpStorm.
 * User: Kelsy
 * Date: 2018-03-27
 * Time: 1:05 PM
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Building</title>

    <link rel="stylesheet" type="text/css" href="./CSS/form_style.css">
    <link rel="stylesheet" type="text/css" href="./CSS/main_style.css">

</head>
<body>
<?php include 'header.php'; ?>
<div class="container">
    <form method="POST" action="">
        <ul class="flex-outer">
            <li>
                <input type='text' name='build_id' placeholder='Building Name'>
            </li>
            <li>
                <button type='submit'>Add Building</button>
            </li>
        </ul>
    </form>
</div>
</body>
</html>