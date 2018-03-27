<?php
/**
 * Created by PhpStorm.
 * User: Kelsy
 * Date: 2018-03-27
 * Time: 1:05 PM
 */
//file containing functions
require_once $_SERVER['DOCUMENT_ROOT'] . './includes/bootstrap.inc';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add a Strain</title>

    <link rel="stylesheet" type="text/css" href="./CSS/form_style.css">
    <link rel="stylesheet" type="text/css" href="./CSS/main_style.css">

</head>
<body>
<?php include 'header.php'; ?>
<div class="container">
    <form method="POST" action="">
        <ul class="flex-outer">
            <li>
                <input type='text' name='code' placeholder='Input strain code'>
            </li>
            <li>
                <input type='text' name='scientific' placeholder='Input scientific name'>
            </li>
            <li>
                <input type='text' name='common' placeholder='Input common name'>
            </li>
            <li>
                <input type='text' name='abbreviation' placeholder='Input abbreviation'>
            </li>
            <li>
                <textarea rows='4' cols='50' name='notes' form='strain_form' placeholder='Enter notes here'>
            </li>
            <li>
                <button type="submit">Create Strain</button>
            </li>
        </ul>
    </form>
</div>
</body>
</html>