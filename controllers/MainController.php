<?php
require_once "TwigBaseController.php"; // импортим TwigBaseController

class MainController extends TwigBaseController {
    public $template = "main.twig";
    public $title = "Главная";
    public $duckmenu = [
        [
            "title" => "Картинка",
            "url" => "/duck/image",
        ],
        [
            "title" => "Описание",
            "url" => "/duck/text",
        ]
    ];
    public $lastochkamenu = [
        [
            "title" => "Картинка",
            "url" => "/lastochka/image",
        ],
        [
            "title" => "Описание",
            "url" => "/lastochka/text",
        ]
    ];
    

    public function getContext() : array
    {
       // $context = parent::getContext();
       // $context['title'] = $this->title;
       // $context['duckmenu'] = $this->duckmenu;
       // $context['lastochkamenu'] = $this->lastochkamenu;
       $query = $this->pdo->query("SELECT * FROM space_objects");
       $context['space_objects'] = $query->fetchAll();
        return $context;
    }
}