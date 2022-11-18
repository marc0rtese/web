<?php

require_once "TwigBaseController.php";

class BaseAnimalTwigController extends TwigBaseController {
    public function getContext(): array
    {
        $context = parent::getContext();
        
        return $context;
    }
}