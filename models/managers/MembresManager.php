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
}