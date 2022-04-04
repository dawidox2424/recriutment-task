<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class GrafittiRepository extends Repository
{
    public function getGrafittiByProperty($id_property) {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM grafitti WHERE id_property = :id_property
        ');
        $stmt->bindParam(':id_property', $id_property, PDO::PARAM_STR);
        $stmt->execute();

        $allGrafitties = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($allGrafitties == false) {
            return null;
        }
        return $allGrafitties;
    }

    public function addGrafitti(Grafitti $grafitti){
        $stmt = $this->database->connect()->prepare('
            INSERT INTO grafitti (notifierEmail, id_property, location, photo, findingDate, type, remarks)
            VALUES (?, ?, ?, ?, ?, ?, ?)
        ');

        $stmt->execute([
            $grafitti->getNotifierEmail(),
            $grafitti->getIdProperty(),
            $grafitti->getLocation(),
            $grafitti->getPhoto(),
            $grafitti->getFindingDate(),
            $grafitti->getType(),
            $grafitti->getRemarks()
        ]);
    }
}