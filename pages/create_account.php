<?php
require_once __DIR__ . '/bootstrap.php';

if(!is_admin()){
	header('Location: home.php');
}

$account_added = add_new_account();

if ($account_added) {
  $_SESSION['message']='account created!';
  header('Location: account_form.php');
} 
else {
  $_Session['message']='Account already exists';
  header('Location: account_form.php');
}
