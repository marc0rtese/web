<?php

use DuckController as GlobalDuckController;

require_once "DuckController.php"; // импортим TwigBaseController

class DuckImageController extends DuckController {
    public $template = "base_image.twig";
    public $title = "Картинка";

    public function getContext() : array
    {
        $context = parent::getContext(); // вызываем родительский метод
        $context['title'] = $this->title; // добавляем title в контекст
        $context['image'] = "/img/duck.jpg";
        return $context;
    }

}