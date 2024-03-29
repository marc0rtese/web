<?php
require_once "BaseBirdTwigController.php";

class Controller404 extends BaseBirdTwigController {
    public $template = "404.twig"; 
    public $title = "Страница не найдена";
    public function get(array $context)
    {
        http_response_code(404); // с помощью http_response_code устанавливаем код возврата 404
        parent::get($context); // вызываем базовый метод get(), который собственно уже отрендерит страницу
    }
}