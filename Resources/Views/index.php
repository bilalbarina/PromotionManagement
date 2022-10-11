<?php

use BusinessLogic\PromotionBL;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= asset('css/main.css') ?>">
    <title> Promotions Management </title>
</head>

<body>
    <div class="container max-w-xl shadow-md py-24 px-8 mt-10 border">
        <div class="flex flex-row justify-between">
            <button class="py-2 px-6 bg-blue-500 rounded-md text-white">
                Ajouter promotion
            </button>
            <div>
                <input class="py-2 px-4 border border-blue-500 w-48 rounded-md" placeholder="Chercher promotion">
            </div>
        </div>

        <ul id="promotions" class="mt-8 px-2">
            <?php
            $promotionBL = new PromotionBL();
            $promotions = $promotionBL->getAllPromotions();

            foreach ($promotions as $promotion) :
            ?>
                <li class="flex flex-row justify-between">
                    <div class="text-blue-600">
                        <?= $promotion->title ?>
                    </div>
                    <a href="" class="text-red-600"> Suprimer </a>
                    <a href="" class="text-green-600"> Modifier </a>
                </li>
            <?php endforeach ?>
        </ul>
    </div>
</body>

</html>