<?php
require_once __DIR__ . '/bootstrap.php';

if(!is_admin()){
	header('Location: home.php');
}

$account_added = add_new_account();

if ($account_added) {
  header('Location: account_form.php');
} 
else {
  header('Location: account_form.php');
}
