<?php

session_start();

define('URI', $_SERVER['REQUEST_URI']);

require_once __DIR__ . '/vendor/autoload.php';

$page = $_GET['page'] ?? '';
$pagePath = __DIR__ . '/Resources/Views/' . $page . '.php';

if (file_exists($pagePath)) {
    include $pagePath;
    exit();
}
die('Not Found');

$_SESSION['back'] = $_SERVER['REQUEST_URI'];
