<?php
  require_once __DIR__ . '/bootstrap.php';
  $date = date("Y-m-j");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inoculation</title>

    <link rel="stylesheet" type="text/css" href="./CSS/form_style.css">
    <link rel="stylesheet" type="text/css" href="./CSS/main_style.css">

</head>
<body>
<?php include 'header.php'; ?>
<div class="container">
    <form method="POST" action="">
        <ul class="flex-outer">
                <!--User shown in header-->
            <li>
                <input type="hidden" name="user" value="user"> <!--fill in value with correct user function-->
            </li>
            <li>
                <!--Batch ID drop down-->

            </li>
            <li>
                <?php display_substrate(); ?>
            </li>
            <li>
                <input type="number" name="num_bags" min ="1" placeholder="Number of Bags" required>
            </li>
            <li>
                <input type="date" name="date" value="<?php echo $date ?>" placeholder="yyyy-mm-d">
            </li>
            <li>
                <?php display_account(); ?>
            </li>
            <li>
                <textarea name='notes' rows='5' cols='20' placeholder='Notes'></textarea> <!--To be added to bags table-->
            </li>
            <li>
                <button type='submit'>Submit</button>
            </li>
        </ul>
    </form>
</div>
</body>
</html>