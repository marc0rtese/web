<?php
require_once "TwigBaseController.php"; // импортим TwigBaseController

class DuckController extends TwigBaseController {
    public $template = "__object.twig";
    public $title = "Утошка";

    public function getContext() : array
    {
        $context = parent::getContext(); // вызываем родительский метод
        $context['title'] = $this->title; // добавляем title в контекст
        $context['link1'] = "/duck/image";
        $context['link2'] = "/duck/text";
        return $context;
    }

}