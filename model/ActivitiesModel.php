<?php
class ActivitiesModel {
    private $db;

    function __construct()  {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=lets_travel;charset=utf8', 'root', '');
        echo 'db conecteds';
    }

    function getAll() {
        $query = $this->db->prepare("SELECT * FROM activities");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

}