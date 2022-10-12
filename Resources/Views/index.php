<?php

use BusinessLogic\PromotionBL;

$error = null;
$promotionBL = new PromotionBL();

if (isset($_POST['create'])) {
    if (empty($_POST['title'])) {
        $error = 'Title is required';
    }

    if (!$error) {
        $title = $_POST['title'];

        $promotionBL->createPromotion(
            title: $title
        );

        header('location: ' . URI);
        exit();
    }
}

if (isset($_POST['edit'])) {
    if (empty($_POST['title'])) {
        $error = 'Title is required';
    } elseif (empty($_POST['id'])) {
        $error = 'ID is required';
    }

    if (!$error) {
        $title = $_POST['title'];
        $id = $_POST['id'];

        $updated = $promotionBL->updatePromotion(
            $id, $title
        );

        if ($updated) {
            header('location: ' . URI);
            exit();
        }

        $error = 'Error occurred.';
    }
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $deleted = $promotionBL->deletePromotion($id);

    if ($deleted) {
        header('location: /?' . http_build_query(['page' => $_GET['page']]));
        exit();
    }

    $error = 'Invalid ID';
}

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
        <div class="bg-red-600 py-4 w-full text-center text-xs font-semibold mb-4 rounded-md text-white <?= !is_null($error) ?: 'hidden' ?>">
            <?= $error ?? '' ?>
        </div>
        <div id="index">
            <div class="flex flex-row justify-between">
                <button class="py-2 px-6 bg-blue-500 rounded-md text-white" id="ajouter-button">
                    Ajouter promotion
                </button>
                <div>
                    <input class="py-2 px-4 border border-blue-500 w-48 rounded-md" placeholder="Chercher promotion">
                </div>
            </div>

            <ul id="promotions" class="mt-12 px-2 space-y-2">
                <?php
                $promotions = $promotionBL->getAllPromotions();

                foreach ($promotions as $promotion) :
                ?>
                    <li >
                        <div class="flex flex-row justify-between" id="promo-<?= $promotion->id ?>">
                            <div class="text-blue-600 w-16 whitespace-nowrap">
                                <?= $promotion->title ?>
                            </div>
                            <a href="<?= URI . '&delete=' . $promotion->id ?>" class="text-red-600"> Suprimer </a>
                            <button href="" class="text-green-600" onclick="editPromo('<?= $promotion->id ?>')"> Modifier </button>
                        </div>
                        <div class="hidden" id="edit-form-<?= $promotion->id ?>">
                            <form action="<?= URI ?>" method="post" class="flex flex-row justify-between">
                            <input class="py-1 px-2 border border-blue-700 rounded-md" value="<?= $promotion->id ?>" name="id" type="hidden">
                                <input class="py-1 px-2 border border-blue-700 rounded-md" value="<?= $promotion->title ?>" name="title">
                                <button type="submit" class="py-2 px-6 bg-blue-500 rounded-md text-white text-xs uppercase font-semibold" name="edit">
                                    Modifier
                                </button>
                            </form>

                        </div>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>
        <div id="ajouter-form" class="hidden">
            <div class="flex flex-col justify-center items-center">
                <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post" class="space-y-4">
                    <div>
                        <input class="py-2 px-4 border border-blue-500 w-48 rounded-md" placeholder="Nom de la promotion" name="title">
                    </div>
                    <div>
                        <button type="submit" class="py-3 px-6 bg-blue-500 rounded-md text-white w-full text-xs uppercase font-semibold" name="create">
                            Ajouter promotion
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script src="<?= asset('js/main.js') ?>"></script>
</body>

</html>