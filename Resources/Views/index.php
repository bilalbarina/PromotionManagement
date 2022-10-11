<?php

namespace Data;

include __DIR__ . '/../../vendor/autoload.php';

if (isset($_POST['title'])) {
    $promotionObject = new Promotion();
    $created = $promotionObject->create($title);
    die('Created');    
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
    <input type="text" placeholder="Title">
    <button type="submit"> Ajouter </button>
</form>
    
</body>
</html>