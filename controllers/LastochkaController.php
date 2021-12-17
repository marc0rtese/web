<?php
require_once "TwigBaseController.php";

class LastochkaController extends TwigBaseController {
    public $template = "__object.twig";
    public $title = "Ласточка";

    public function getContext() : array
    {
        $context = parent::getContext(); 
        $context['title'] = $this->title; 
        $context['link1'] = "/lastochka/image";
        $context['link2'] = "/lastochka/text";
        return $context;
    }

}