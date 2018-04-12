<?php

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
    <form method="POST" action="building.php" id="building">
        <ul class="flex-outer">
            <li>
                <input type='text' name='id' placeholder='Building Name' required>
            </li>
            <li>
                <button type='submit' name="submit" form="building" value="submit">Add Building</button>
            </li>
        </ul>
    </form>
</div>
</body>
</html>