<?php
require __DIR__ . '/../../vendor/autoload.php';


use Data\Promotion;

$promotion = new Promotion();
$create = $promotion->create('Test');

var_dump($create);