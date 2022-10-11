<?php

require __DIR__ . '/vendor/autoload.php';

$page = $_GET['page'] ?? 'index';
$pagePath = __DIR__ . '/Resources/Views/' . $page . '.php';

if (file_exists($pagePath)) {
    include $pagePath;
    die();
}

throw new Error('404 Not Found');