<?php

use BusinessLogic\PromotionBL;

// Set content-type to JSON
header('Content-Type: application/json');

if (
    isset($_GET['title'])
    && !empty($_GET['title'])
) {
    $promotionBL = new PromotionBL();
    $results = $promotionBL->searchByTitle($_GET['title']);

    // Encode assoc array to JSON and echo
    $json = json_encode([
        'success' => true,
        'results' => $results
    ]);

    die($json);
}

echo json_encode([
    'success' => false,
    'error' => 'Title is required'
]);
