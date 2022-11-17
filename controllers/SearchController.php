<?php
require_once "BaseBirdTwigController.php";

class SearchController extends BaseBirdTwigController {
    public $template = "search.twig";

    public function getContext(): array
    {
        $context = parent::getContext();

        $type = isset($_GET['type']) ? $_GET['type'] : '';
        $title = isset($_GET['title']) ? $_GET['title'] : '';
        $text = isset($_GET['text']) ? $_GET['text'] : '';
        $i = 0;
        if ($type == '') {
            $sql = <<<EOL
            SELECT id, title
            FROM space_objects
            WHERE (:title = '' OR title like CONCAT('%', :title, '%'))
                AND (:text = '' OR info like CONCAT('%', :text, '%'))
            EOL;
        }
        else {
            $sql = <<<EOL
            SELECT id, title
            FROM space_objects
            WHERE (:title = '' OR title like CONCAT('%', :title, '%'))
                AND (type = :type)
                AND (:text = '' OR info like CONCAT('%', :text, '%'))
        EOL;
        }
        
        $query = $this->pdo->prepare($sql);
        $query->bindValue("title", $title);
        $query->bindValue("type", $type);
        $query->bindValue("text", $text);
        $query->execute();
        $context['objects'] = $query->fetchAll();

        return $context;
    }
}