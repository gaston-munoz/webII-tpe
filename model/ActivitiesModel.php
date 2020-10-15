<?php
class ActivitiesModel {
    private $db;

    function __construct()  {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=lets_travel;charset=utf8', 'root', ''); 
    }

    function getAllWithCategories() {
        $query = $this->db->prepare("SELECT activity.*, category.name  FROM activity INNER JOIN category ON category.id = activity.categoryId");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    
    function getAll() {
        $query = $this->db->prepare("SELECT * FROM activity");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getOne($id) {
        $query = $this->db->prepare("SELECT * FROM activity WHERE id = ?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    function getActCategory ($id) {
        $query = $this->db->prepare("SELECT activity.*, category.name FROM activity, category WHERE activity.categoryId = category.id AND categoryId = ?");
        $query->execute([$id]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getCategories() {
        $query = $this->db->prepare("SELECT * FROM category");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ); 
    }

    function save($title, $description, $categoryId, $price, $image) {
        $query = $this->db->prepare("INSERT INTO activity (title, description, categoryId, price, image) values (?, ?, ?, ?, ?)");
        $res = $query->execute([ $title, $description, $categoryId, $price, $image ]);
        return $res;
    }

    function remove($id) {
        $query = $this->db->prepare('DELETE FROM activity WHERE id = ?');
        return $query->execute([ $id ]);
    }

    function update($id, $title, $description, $categoryId, $price, $image) {
        $query = $this->db->prepare("UPDATE activity SET title = :title , description =:description, categoryId = :categoryId, price = :price,
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