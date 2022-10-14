<?php

namespace BusinessLogic;

require_once __DIR__ . '/../vendor/autoload.php';

use Data\Promotion\Promotion;
use Data\Promotion\PromotionData;

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

        return $this->promotionData->get($id);
        
    }

    public function createPromotion($title)
    {
        if (empty($title)) {
            die('Title is required to create new promotion.');
        }

        $promotion = new Promotion();

        $promotion->setTitle($title);

        $created = $this->promotionData->create($promotion);

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

        $promotion = new Promotion();

        $promotion->setId($id);
        $promotion->setTitle($title);

        $this->promotionData->update($promotion);
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
        $results = $this->promotionData->searchByTitle($title);
        
        return $results;
    }
}
