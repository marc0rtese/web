<?php

require_once "BaseAnimalTwigController.php";

class AnimalsObjectController extends BaseAnimalTwigController {
    public $template = "animal_object.twig";
    public function getContext(): array
    {
        $context = parent::getContext();
        if (isset($_GET['show'])) {
            if ($_GET['show'] == "image") {
               
        $query = $this->pdo->prepare("SELECT info, id, title, image FROM forest_animals WHERE id= :my_id");
        $query->bindValue("my_id", $this->params['id']);
        $query->execute();
        $data = $query->fetch();
        $context['title'] = "Картинка";
        $context['id'] = $data['id'];
        $context['image'] = $data['image'];
            }
            elseif ($_GET['show'] == "info")
            {
                $query = $this->pdo->prepare("SELECT info, id, title, image FROM forest_animals WHERE id= :my_id");
                $query->bindValue("my_id", $this->params['id']);
                $query->execute();
                $data = $query->fetch();
                $context['title'] = "Описание";
                $context['id'] = $data['id'];
                $context['info'] = $data['info'];
            }
        }
        $query = $this->pdo->prepare("SELECT info, id, title FROM forest_animals WHERE id= :my_id");
        $query->bindValue("my_id", $this->params['id']);
        $query->execute();
        $data = $query->fetch();
        $context['title'] = $data['title'];
        $context['id'] = $data['id'];


        return $context;
    }
}