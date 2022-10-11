<?php

namespace Data;

use stdClass;

require __DIR__ . '/../vendor/autoload.php';

class Promotion {

    public function all()
    {
        $query = "SELECT * FROM promotions";
        $res = mysqli_query(connection(), $query);
        
        foreach (mysqli_fetch_assoc($res) as $promotionAssoc) {
            $promotion = new stdClass();
            $promotion->id = $promotionAssoc['id'];
            $promotion->title = $promotionAssoc['title'];
            $promotion->created_at = $promotionAssoc['created_at'];
            $promotions[] = $promotion;
        }
        
        var_dump($promotions);
        die();
        return $promotions;
    }

    // Create new promotion
    public function create($title)
    {
        $query = "INSERT INTO promotions (title) VALUES('$title')";
        return mysqli_query(connection(), $query);
    }

    // Update existing promotion
    public function update($id, $title) 
    {
        $query = "UPDATE promotions SET title = '$title' WHERE id = '$id'";
        return mysqli_query(connection(), $query);
    }

    // Get promotion as an object
    public function get($id)
    {
        $query = "SELECT * FROM promotions WHERE id = '$id'";
        $assoc = mysqli_fetch_assoc(mysqli_query(connection(), $query));

        // $promotion = new stdClass();
        // $promotion->id = $assoc['id'];
        // $promotion->title = $assoc['title'];
        // $promotion->created_at = $assoc['created_at'];
        // return $promotion;

        return (object) $assoc;
    }

    // Delete a promotion
    public function delete($id)
    {
        $query = "DELETE FROM promotions WHERE id = '$id'";
        return mysqli_query(connection(), $query);
    }
}