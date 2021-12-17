<?php

// подключаем пакеты которые установили через composer
require_once '../vendor/autoload.php';

// создаем загрузчик шаблонов, и указываем папку с шаблонами
// \Twig\Loader\FilesystemLoader -- это типа как в C# писать Twig.Loader.FilesystemLoader, 
// только слеш вместо точек
$loader = new \Twig\Loader\FilesystemLoader('../views');

// создаем собственно экземпляр Twig с помощью которого будет рендерить
$twig = new \Twig\Environment($loader);

$url = $_SERVER["REQUEST_URI"];
$title = "";
$template = "";
//image = "";

$context = []; //словарь

if ($url == "/") {
    $title = "Главная";
    $template = "main.twig";
} elseif (preg_match("#/duck#", $url)) {
    $title = "Утошка";
    $template = "base_image.twig";
    $context['image'] = "/img/duck.jpg";
} elseif (preg_match("#/lastochka#", $url)) {    
    $title = "Ласточка";
    $template = "base_image.twig";
    $context['image'] = "/img/lastochka.jpg";
}
$context['title'] = $title;

echo $twig->render($template, $context);