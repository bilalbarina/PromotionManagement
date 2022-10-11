<?php

namespace Data;

require __DIR__ . '/../../vendor/autoload.php';

$promotionObject = new Promotion();
$created = $promotionObject->create('test');

if ($created) {
    echo 'Promotion created';
} else {
    echo 'Promotion not created';
}
