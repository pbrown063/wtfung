<?php
require_once __DIR__ . '/bootstrap.php';

$account_added = add_new_account();

if ($account_added) {
    $login_successful = file_get_contents(__DIR__ . '/account_created.php');
    echo $login_successful;
}
?>


