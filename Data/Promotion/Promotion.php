<?php

namespace Data\Promotion;

require_once __DIR__ . '/../../vendor/autoload.php';

class Promotion {

    private $id;
    private $title;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }
    
}