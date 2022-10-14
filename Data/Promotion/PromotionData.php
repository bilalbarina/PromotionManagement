<?php

namespace Data\Promotion;

use Data\Promotion\Promotion;

require_once __DIR__ . '/../../vendor/autoload.php';

class PromotionData
{
    public function all()
    {
        $query = "SELECT * FROM promotions";
        $res = mysqli_query(connection(), $query);   

        return $this->promotions($res);
    }

    public function create($promotion)
    {
        $title = $promotion->getTitle();

        $query = "INSERT INTO promotions (title) VALUES('$title')";
        return mysqli_query(connection(), $query);
    }

    public function update($promotion)
    {
        $id = $promotion->getId();
        $title = $promotion->getTitle();

        $query = "UPDATE promotions SET title = '$title' WHERE id = '$id'";
        return mysqli_query(connection(), $query);
    }

    public function get($id)
    {
        $query = "SELECT * FROM promotions WHERE id = '$id'";
        $assoc = mysqli_fetch_assoc(mysqli_query(connection(), $query));

        if ($assoc) {
            $promotion = new Promotion();
            $promotion->setId($assoc['id']);
            $promotion->setTitle($assoc['title']);
            
            return $promotion;
        }
        
        return null;
    }

    public function searchByTitle($title)
    {
        $promotions = [];

        $query = "SELECT * FROM promotions WHERE title LIKE '%$title%'";
        $res = mysqli_query(connection(), $query);

        while ($promotion = mysqli_fetch_assoc($res))
        {
            $promotions[] = $promotion;
        }

        return $promotions;
    }

    // Delete a promotion
    public function delete($id)
    {
        $query = "DELETE FROM promotions WHERE id = '$id'";
        return mysqli_query(connection(), $query);
    }

    private function promotions($res)
    {
        $promotions = [];

        while ($promotionAssoc = mysqli_fetch_assoc($res)) {
            $promotion = new Promotion();
            
            $promotion->setId($promotionAssoc['id']);
            $promotion->setTitle($promotionAssoc['title']);

            $promotions[] = $promotion;
        }

        return $promotions;
    }
}