<?php

require_once '../vendor/autoload.php';
require_once '../framework/autoload.php';
require_once "../controllers/MainController.php";
require_once '../controllers/SearchController.php';
require_once '../controllers/BirdsObjectCreateController.php';
require_once '../controllers/AnimalsObjectCreateController.php';
require_once '../controllers/AnimalsObjectController.php';

require_once "../controllers/Controller404.php";
require_once "../controllers/ObjectController.php";


$loader = new \Twig\Loader\FilesystemLoader('../views');
$twig = new \Twig\Environment($loader, ["debug" => true]);
$twig->addExtension(new \Twig\Extension\DebugExtension());

$pdo = new PDO("mysql:host=localhost;dbname=birds;charset=utf8", "root", "");

// // создаем запрос к БД
// $query = $pdo->query("SELECT DISTINCT type FROM space_objects ORDER BY 1");
// // стягиваем данные
// $types = $query->fetchAll();
// // создаем глобальную переменную в $twig, которая будет достпна из любого шаблона
// $twig->addGlobal("types", $types);

$router = new Router($twig, $pdo);
$router->add("/", MainController::class);
$router->add("/space-object/(?P<id>\d+)", ObjectController::class);
$router->add("/search", SearchController::class);
$router->add("/space-object/createbird", BirdsObjectCreateController::class);
$router->add("/space-object/createanimal", AnimalsObjectCreateController::class);
$router->add("/forest-animals/(?P<id>\d+)", AnimalsObjectController::class);

$router->get_or_default(Controller404::class);
