<?php

require_once './models/dbconnect.php';
require_once './models/entities/Membres.php';

class MembresManager 
{
    public static function getAllMembres()
    {
        $dbh = dbconnect();
        $query = "SELECT * FROM membres";
        $stmt = $dbh->prepare($query); //la requête va envoyer les résultats dans un objet PDO Statement qu'on ne peut pas exploiter tel quel
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_CLASS, 'Membres');
        return $results;
    }

    public static function getMemberInfosByMemberId($id){
        $dbh = dbconnect();
        $query = "SELECT * FROM membres WHERE membres.id = :id";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Membres');
        $result = $stmt->fetch();
        return $result;
    }
}