<?php
require_once 'BaseAnimalTwigController.php';

class AnimalsObjectCreateController extends BaseAnimalTwigController {
    public $template = "animals_object_create.twig";

    public function get(array $context)
    {
        parent::get($context);
    }

    public function post(array $context) {
        $title = $_POST['title'];
        $info = $_POST['info'];

        $tmp_name = $_FILES['image']['tmp_name'];
        $name =  $_FILES['image']['name'];
        if ($name!='')
        {
            move_uploaded_file($tmp_name, "../public/media/$name");
            $image_url = "/media/$name";
        }
        else
        {
            $context['message1'] = 'Вы не выбрали картинку';
            $this->get($context);
            return;
        }

        $sql = <<<EOL
        INSERT INTO forest_animals(title, info, image)
        VALUES(:title, :info, :image_url)
        EOL;

        $query = $this->pdo->prepare($sql);
        $query->bindValue("title", $title);
        $query->bindValue("info", $info);
        $query->bindValue("image_url", $image_url);
        
        $query->execute();

        $context['message'] = 'Вы успешно создали животное';
        $context['id'] = $this->pdo->lastInsertId();
        $this->get($context);
    }
}