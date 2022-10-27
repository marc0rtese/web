<?php

class ObjectController extends TwigBaseController {
    public $template = "__object.twig";
    public function getContext(): array
    {
        $context = parent::getContext();

        $query = $this->pdo->prepare("SELECT info, id, title FROM space_objects WHERE id= :my_id");
        $query->bindValue("my_id", $this->params['id']);
        $query->execute();
        $data = $query->fetch();
        $context['title'] = $data['title'];
        $context['info'] = $data['info'];
        $context['id'] = $data['id'];
        $query1 = $this->pdo->query("SELECT * FROM space_objects");
        $context['space_objects'] = $query1->fetchAll();


        return $context;
    }
}