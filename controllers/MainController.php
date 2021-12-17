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
        $context = parent::getContext(); // вызываем родительский метод
        $context['title'] = $this->title; // добавляем title в контекст
        $context['duckmenu'] = $this->duckmenu;
        $context['lastochkamenu'] = $this->lastochkamenu;
        return $context;
    }
}