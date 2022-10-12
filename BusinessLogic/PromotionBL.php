<?php

namespace BusinessLogic;

require __DIR__ . '/../vendor/autoload.php';

use Data\Promotion as PromotionData;

class PromotionBL
{
    protected $promotionData;

    public function __construct()
    {
        $this->promotionData = new PromotionData();
    }

    public function getAllPromotions()
    {
        $promotions = $this->promotionData->all();

        return $promotions;
    }

    public function getPromotion($id)
    {
        if ($id <= 0) {
            return null;
        }

        $res = $this->promotionData->get($id);

        // $promotion = new stdClass();
        // $promotion->id = $assoc['id'];
        // $promotion->title = $assoc['title'];
        // $promotion->created_at = $assoc['created_at'];
        // return $promotion;

        return (object) mysqli_fetch_assoc($res);
    }

    public function createPromotion($title)
    {
        if (empty($title)) {
            die('Title is required to create new promotion.');
        }

        $created = $this->promotionData->create($title);

        if ($created) {
            return true;
        }

        return false;
    }

    public function updatePromotion($id, $title)
    {
        if ($id <= 0) {
            return false;
        }

        $this->promotionData->update($id, $title);
        return true;
    }

    public function deletePromotion($id)
    {
        if ($id <= 0) {
            return false;
        }

        $this->promotionData->delete($id);
        return true;
    }

    public function searchByTitle($title)
    {
        $results = [];
        $res = $this->promotionData->searchByTitle($title);
        while ($promotion = mysqli_fetch_assoc($res)) {
            $results[] = $promotion;
        }
        return $results;
    }
}
