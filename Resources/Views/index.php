<?php

include __DIR__ . '/../../vendor/autoload.php';

use Data\Promotion\Promotion;
use Data\Promotion\PromotionData;

if (isset($_POST['title'])) {
    $title = $_POST['title'];

    $promotionData = new PromotionData();

    $promotion = new Promotion();
    $promotion->setTitle($title);

    $created = $promotionData->create($promotion);
    die('Created,' . $created);    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Ajouter </title>
</head>
<body>

<form action="" method="post">
    <input type="text" placeholder="Title" name="title">
    <button type="submit"> Ajouter </button>
</form>
    
</body>
</html>