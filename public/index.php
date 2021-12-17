<?php

// подключаем пакеты которые установили через composer
require_once '../vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('../views');

// создаем собственно экземпляр Twig с помощью которого будет рендерить
$twig = new \Twig\Environment($loader);

$url = $_SERVER["REQUEST_URI"];
$title = "";
$template = "";
//image = "";

$context = []; //словарь
$duckmenu = [
    [
        "title" => "Картинка",
        "url" => "/duck/image",
    ],
    [
        "title" => "Описание",
        "url" => "/duck/text",
    ]
];
$lastochkamenu = [
    [
        "title" => "Картинка",
        "url" => "/lastochka/image",
    ],
    [
        "title" => "Описание",
        "url" => "/lastochka/text",
    ]
];

if ($url == "/") {
    $title = "Главная";
    $template = "main.twig";
} elseif (preg_match("#/duck#", $url)) {
    $title = "Утошка";
    $template = "__object.twig";
    $context['link1'] = "/duck/image";
    $context['link2'] = "/duck/text";
    
    if (preg_match("#^/duck/image#", $url)) {
        $template = "base_image.twig";
        $context['image'] = "/img/duck.jpg";
        $title = "Картинка";
    } elseif (preg_match("#/duck/text#", $url)) {
        $template = "duck_info.twig";
        $title = "Описание";
    }

} elseif (preg_match("#/lastochka#", $url)) {    
    $title = "Ласточка";
    $template = "__object.twig";
    $context['link1'] = "/lastochka/image";
    $context['link2'] = "/lastochka/text";
    if (preg_match("#^/lastochka/image#", $url)) {
        $template = "base_image.twig";
        $context['image'] = "/img/lastochka.jpg";
        $title = "Картинка";
    } elseif (preg_match("#/lastochka/text#", $url)) {
        $template = "lastochka_info.twig";
        $title = "Описание";
    }
}
$context['title'] = $title;
$context['duckmenu'] = $duckmenu;
$context['lastochkamenu'] = $lastochkamenu;

echo $twig->render($template, $context);