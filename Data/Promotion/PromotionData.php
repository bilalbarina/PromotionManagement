<?php

namespace Data\Promotion;

use Data\Promotion\Promotion;
use mysqli;
use stdClass;

require_once __DIR__ . '/../../vendor/autoload.php';

class PromotionData
{

    public function create($promotion)
    {
        $title = $promotion->getTitle();

        $query = "INSERT INTO promotions (title) VALUES('$title')";
        return mysqli_query(connection(), $query);
    }

    public function update($id, $title)
    {
        $query = "UPDATE promotions SET title = '$title' WHERE id = '$id'";
        return mysqli_query(connection(), $query);
    }

    public function get($id)
    {
        $query = "SELECT * FROM promotions WHERE id = '$id'";
        $assoc = mysqli_fetch_assoc(mysqli_query(connection(), $query));

        $promotion = new Promotion();
        $promotion->id = $assoc['id'];
        $promotion->title = $assoc['title'];
        
        return $promotion;
    }
}
