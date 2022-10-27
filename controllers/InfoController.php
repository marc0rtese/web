<?php
require_once "TwigBaseController.php";

class InfoController extends TwigBaseController {
    public $template = "base_info.twig";

    public function getContext(): array
    {
        $context = parent::getContext();

        $query = $this->pdo->prepare("SELECT id, title, info FROM space_objects WHERE id= :my_id");
        $query->bindValue("my_id", $this->params['id']);
        $query->execute();
        $data = $query->fetch();
        $context['title'] = "Описание";
        $context['info'] = $data['info'];
        $context['id'] = $data['id'];
        $query1 = $this->pdo->query("SELECT * FROM space_objects");
        $context['space_objects'] = $query1->fetchAll();
        return $context;
    }
}