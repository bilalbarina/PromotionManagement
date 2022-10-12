<?php

namespace BusinessLogic;

require __DIR__ . '/../vendor/autoload.php';

use Data\Promotion as PromotionData;
use Error;

class PromotionBL {
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
        if ($id <= 0){
            return null;
        }

        $promotion = $this->promotionData->get($id);

        return $promotion;
    }

    public function createPromotion($title)
    {
        if (empty($title)) {
            throw new Error('Title is required');
        }

        $created = $this->promotionData->create($title);

        if ($created) {
            return true;
        }

        return false;
    }

    public function updatePromotion($id, $title)
    {
        if ($id <= 0){
            return false;
        }

        $this->promotionData->update($id, $title);
        return true;
    }

    public function deletePromotion($id)
    {
        if ($id <= 0){
            return false;
        }

        $this->promotionData->delete($id);
        return true;
    }
}