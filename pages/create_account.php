<?php
require_once __DIR__ . '/bootstrap.php';

if(is_admin()){

	$account_added = add_new_account();

	if ($account_added) {
  		$login_successful = file_get_contents(__DIR__ . '/account_form.php');
  		echo $login_successful;
	}else {
  header('Location: account_form.php');
	}
}else{
 header('Location: login.php');
}
