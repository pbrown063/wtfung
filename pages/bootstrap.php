<?php

function bootstrap($site_name) {
    $cwd = getcwd();
    $root_path = substr($cwd, 0, strpos($cwd, $site_name) + strlen($site_name));
    $bootstrap = $root_path . '/includes/bootstrap.inc';
    return $bootstrap;
}

$headers = getallheaders();
require_once bootstrap('wtfung');