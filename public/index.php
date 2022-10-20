<?php

// подключаем пакеты которые установили через composer
require_once '../vendor/autoload.php';
require_once "../controllers/MainController.php";
require_once "../controllers/DuckController.php";
require_once "../controllers/DuckImageController.php";
require_once "../controllers/DuckInfoController.php";
require_once "../controllers/LastochkaController.php";
require_once "../controllers/LastochkaImageController.php";
require_once "../controllers/LastochkaInfoController.php";
require_once "../controllers/Controller404.php";

$loader = new \Twig\Loader\FilesystemLoader('../views');

// создаем собственно экземпляр Twig с помощью которого будет рендерить
$twig = new \Twig\Environment($loader, ["debug" => true]);
$twig->addExtension(new \Twig\Extension\DebugExtension());

$url = $_SERVER["REQUEST_URI"];
$title = "";
$template = "";
$uri = "";
//image = "";

$context = []; //словарь
$controller = new Controller404($twig);

$pdo = new PDO("mysql:host=localhost;dbname=birds;charset=utf8", "root", "");


if ($url == "/") {
    $controller = new MainController($twig);
} elseif (preg_match("#/duck#", $url)) {
    $controller = new DuckController($twig);
    if (preg_match("#^/duck/image#", $url)) {
        $controller = new DuckImageController($twig);
    } elseif (preg_match("#/duck/text#", $url)) {
        $controller = new DuckInfoController($twig);
    }

} elseif (preg_match("#/lastochka#", $url)) {    
    $controller = new LastochkaController($twig);
    if (preg_match("#^/lastochka/image#", $url)) {
        $controller = new LastochkaImageController($twig);
    } elseif (preg_match("#/lastochka/text#", $url)) {
        $controller = new LastochkaInfoController($twig);
    }
}


if ($controller) {
    $controller->setPDO($pdo);
    $controller->get();
}