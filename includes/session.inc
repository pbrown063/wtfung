<?php

  $_COOKIE['site_root'] = $FUNG_ROOT;
  if (!isset($_COOKIE['site_root'])) {
    setcookie('site_root', $FUNG_ROOT, time() + ( 24 * 60 * 60 ));
  }
?>

