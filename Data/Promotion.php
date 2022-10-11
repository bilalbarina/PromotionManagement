<?php

namespace Data;

require_once __DIR__ . '/../vendor/autoload.php';

class Promotion {

    public function create($title)
    {
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

        // $promotion = new stdClass();
        // $promotion->id = $assoc['id'];
        // $promotion->title = $assoc['title'];
        // $promotion->created_at = $assoc['created_at'];
        // return $promotion;

        return (object) $assoc;
    }
}