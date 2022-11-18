<?php
require_once "BaseBirdTwigController.php"; // импортим TwigBaseController

class MainController extends BaseBirdTwigController {
    public $template = "main.twig";
    public $title = "Главная";

    public function getContext() : array
    {
        $context = parent::getContext();
        if (isset($_GET['type'])) {
            $query = $this->pdo->prepare("SELECT * FROM space_objects WHERE type = :type");
            $query->bindValue("type",$_GET['type']);
            $query->execute();
        } else {
            $query = $this->pdo->query("SELECT * FROM space_objects");
        }
        $context['space_objects'] = $query->fetchAll();
       $context['title'] = "Главная";

       $query = $this->pdo->query("SELECT * FROM forest_animals");
       $context['forest_animals'] = $query->fetchAll();
        return $context;
    }
}