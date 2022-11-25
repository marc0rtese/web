<?php
class BirdsObjectEditController extends BaseBirdTwigController {
public $template = "birds_object_create.twig";
public $i = 0;

public function get(array $context) 
{
    $id = $this->params['id'];

   $sql = <<<EOL
    SELECT * FROM space_objects WHERE id = :id
    EOL;
    $query = $this->pdo->prepare($sql);
    $query = $this->pdo->prepare("SELECT * FROM space_objects WHERE id = :id");
    $query->bindValue("id", $id);// echo($id);
    $query->execute();

    $data = $query->fetch();
    $context['object'] = $data;
    parent::get($context);

}

public function post(array $context)
{
    $title = $_POST['title'];
    $type = $_POST['type'];
    $info = $_POST['info'];
    $id = $_POST['id'];
    
    $tmp_name = $_FILES['image']['tmp_name'];
    $name =  $_FILES['image']['name'];
    if ($name!='')
    {
        move_uploaded_file($tmp_name, "../public/media/$name");
        $image_url = "/media/$name";
    }
    else
    {
        $image_url = $_POST['image'];
    }
    $sql = <<<EOL
    UPDATE space_objects SET title= :title, image= :image, info= :info, type= :type WHERE id= :id
    EOL;
    $query = $this->pdo->prepare($sql);
    $query->bindValue("title", $title);
    $query->bindValue("type", $type);
    $query->bindValue("info", $info);
    $query->bindValue("image", $image_url);
    $query->bindValue("id", $id);
    $query->execute();

    $context['message'] = 'Вы успешно изменили объект';
    $this->get($context);
    
}
}