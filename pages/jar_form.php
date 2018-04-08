<?php
  require_once __DIR__ . '/bootstrap.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Jarring</title>

    <link rel="stylesheet" type="text/css" href="./CSS/form_style.css">
    <link rel="stylesheet" type="text/css" href="./CSS/main_style.css">

</head>
<body>
<?php include 'header.php'; ?>
<div class="container">
    <form method="POST" action="">
        <ul class="flex-outer">
            <li>
              <?php display_strains(); ?>
            </li>
            <li>
                <input type='text' name='generation' placeholder='Jar Generation' required>
            </li>
            <li>
                <input type="number" name="jar_count" min="1" placeholder="Number of Jars" required>
            <li>
                <?php display_substrate(); ?>
            </li>
            <li>
              <input type="date" name="date" value="<?php current_date(); ?>" placeholder="yyyy-mm-d">
            </li>
            <li>
                <button type='submit'>Pickle Jar?</button>
            </li>
        </ul>
    </form>
</div>
</body>
</html>
