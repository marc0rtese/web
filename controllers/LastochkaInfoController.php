<?php
require_once "LastochkaController.php";

class LastochkaInfoController extends LastochkaController {
    public $template = "lastochka_info.twig";
    public $title = "Описание";

    public function getContext() : array
    {
        $context = parent::getContext(); 
        $context['title'] = $this->title; 
        return $context;
    }

}