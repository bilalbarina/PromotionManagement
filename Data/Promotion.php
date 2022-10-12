<?php

namespace Data;

require __DIR__ . '/../vendor/autoload.php';

class Promotion {

    // Get all promotions as an object
    public function all()
    {
        $promotions = [];
        $query = "SELECT * FROM promotions";
        $res = mysqli_query(connection(), $query);
        
        while ($promotionAssoc = mysqli_fetch_assoc($res)) {
            $promotions[] = (object) $promotionAssoc;
        }

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
        return mysqli_query(connection(), $query);
    }

    // Search for a promotion
    public function searchByTitle($title)
    {
        $query = "SELECT * FROM promotions WHERE title LIKE '%$title%'";
        return mysqli_query(connection(), $query);
    }

    // Delete a promotion
    public function delete($id)
    {
        $query = "DELETE FROM promotions WHERE id = '$id'";
        return mysqli_query(connection(), $query);
    }
}