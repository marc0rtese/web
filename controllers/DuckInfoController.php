<?php

use DuckController as GlobalDuckController;
require_once "DuckController.php"; // импортим TwigBaseController

class DuckInfoController extends DuckController {
    public $template = "duck_info.twig";
    public $title = "Описание";

    public function getContext() : array
    {
        $context = parent::getContext(); // вызываем родительский метод
        $context['title'] = $this->title; // добавляем title в контекст
        return $context;
    }

}