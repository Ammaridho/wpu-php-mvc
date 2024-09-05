<?php

$url = $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['HTTP_HOST'] . '/wpu-mvc/public';
define('BASEURL', $url);


// DB
define('DB_HOST', $_SERVER['HTTP_HOST']);
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'wpuphpmvc');
