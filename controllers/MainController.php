<?php
require_once "TwigBaseController.php"; // импортим TwigBaseController

class MainController extends TwigBaseController {
    public $template = "main.twig";
    public $title = "Главная";

    public function getContext() : array
    {
       $query = $this->pdo->query("SELECT * FROM space_objects");
       $context['space_objects'] = $query->fetchAll();
       $context['title'] = "Главная";
        return $context;
    }
}