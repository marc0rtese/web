<?php
require_once "TwigBaseController.php";

class ImageController extends TwigBaseController {
    public $template = "base_image.twig";
    public function getContext(): array
    {
        $context = parent::getContext();

        $query = $this->pdo->prepare("SELECT info, id, title, image FROM space_objects WHERE id= :my_id");
        $query->bindValue("my_id", $this->params['id']);
        $query->execute();
        $data = $query->fetch();
        $context['title'] = "Картинка";
        $context['info'] = $data['info'];
        $context['id'] = $data['id'];
        $context['name'] = $data['title'];
        $context['image'] = $data['image'];
        $query1 = $this->pdo->query("SELECT * FROM space_objects");
        $context['space_objects'] = $query1->fetchAll();
        return $context;
    }
}