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

if ($url == "/") {
    // это убираем require "../views/main.html";
    
    echo $twig->render("main.html");
} elseif (preg_match("#/duck#", $url)) {
    // и это тоже require "../views/mermaid.html";
    
    echo $twig->render("duck.html");
} elseif (preg_match("#/lastochka#", $url)) {
    // и вот это require "../views/uranus.html";
    
    echo $twig->render("lastochka.html");
}
