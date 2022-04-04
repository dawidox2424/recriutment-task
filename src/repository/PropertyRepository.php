<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class PropertyRepository extends Repository{
    public function getPropertyById($id_property) {
        $stmt = $this->database->connect()->prepare('
            SELECT name,street,number FROM properties WHERE id = :id_property
        ');
        $stmt->bindParam(':id_property', $id_property, PDO::PARAM_STR);
        $stmt->execute();

        $property = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($property == false) {
            return null;
        }
        return $property;
    }

    public function getAllProperties(){
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM properties
        ');
        $stmt->execute();
        $allProperties = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($allProperties == false) {
            return null;
        }
        return $allProperties;
    }
}