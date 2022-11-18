<?php
class BirdsObjectDeleteController extends BaseController {
    public function post(array $context)
    {
        $id = $_POST['id']; // взяли id

        $sql =<<<EOL
DELETE FROM space_objects WHERE id = :id
EOL; // сформировали запрос
        
        // выполнили
        $query = $this->pdo->prepare($sql);
        $query->bindValue(":id", $id);
        $query->execute();

        header("Location: /");
        exit;
    }
}