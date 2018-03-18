<?php
require_once __DIR__ . '/bootstrap.php';

$employee_added = add_new_employee();

if ($employee_added) {
    $login_successful = file_get_contents(__DIR__ . '/account_created.php');
    echo $login_successful;
}
?>


