<?php
require_once "LastochkaController.php";

class LastochkaImageController extends LastochkaController {
    public $template = "base_image.twig";
    public $title = "Картинка";

    public function getContext() : array
    {
        $context = parent::getContext(); 
        $context['title'] = $this->title; 
        $context['image'] = "/img/lastochka.jpg";
        return $context;
    }

}