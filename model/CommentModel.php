<?php
require_once('./helper/DbHelper.php');

class CommentModel {
    private $dbHelper;

    function __construct()  {
        $this->dbHelper = new DbHelper();
    }

    function getByActivity ($id) {
        $query = $this->dbHelper->db->prepare("SELECT comment.*, user.name FROM comment INNER JOIN user ON comment.userId = user.id WHERE comment.activityId = ?");
        $query->execute([$id]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function save($userId, $activityId, $comment, $stars) {
        $query = $this->dbHelper->db->prepare("INSERT INTO comment (userId, activityId, comment, stars) values (?, ?, ?, ?)");
        $res = $query->execute([ $userId, $activityId, $comment, $stars ]);
        return $res;
    }

    
    function remove($id) {
        $query = $this->dbHelper->db->prepare('DELETE FROM comment WHERE id = ?');
        return $query->execute([ $id ]);
    }


    // old //


    function getAllWithCategories() {
        $query = $this->dbHelper->db->prepare("SELECT activity.*, category.name  FROM activity INNER JOIN category ON category.id = activity.categoryId");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    
    function getAll() {
        $query = $this->dbHelper->db->prepare("SELECT * FROM activity");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getOne($id) {
        $query = $this->dbHelper->db->prepare("SELECT * FROM activity WHERE id = ?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    function getActCategory ($id) {
        $query = $this->dbHelper->db->prepare("SELECT activity.*, category.name FROM activity, category WHERE activity.categoryId = category.id AND categoryId = ?");
        $query->execute([$id]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getCategories() {
        $query = $this->dbHelper->db->prepare("SELECT * FROM category");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ); 
    }



    function rremove($id) {
        $query = $this->dbHelper->db->prepare('DELETE FROM activity WHERE id = ?');
        return $query->execute([ $id ]);
    }

    function update($id, $title, $description, $categoryId, $price, $image) {
        $query = $this->dbHelper->db->prepare("UPDATE activity SET title = :title , description =:description, categoryId = :categoryId, price = :price,
            image = :image WHERE id = :id");

        $query->bindParam(':title', $title);
        $query->bindParam(':description', $description);
        $query->bindParam(':categoryId', $categoryId);
        $query->bindParam(':price', $price);
        $query->bindParam(':image', $image);
        $query->bindParam(':id', $id);

        return $query->execute();
    }
}
?>