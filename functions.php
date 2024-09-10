<?php 

function dbconnect() {
    try{
        $dbh = new PDO('mysql:host=localhost;dbname=dwwm_rodez', 'root', '');
        return $dbh;
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}


function getAllMembers(){
    $dbh = dbconnect();
    $query = "SELECT * FROM membres";
    $stmt = $dbh->query($query); //la requête va envoyer les résultats dans un objet PDO Statement qu'on ne peut pas exploiter tel quel
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

function getMemberInfosByMemberId($id){
    $dbh = dbconnect();
    $query = "SELECT * FROM membres WHERE membres.id = $id";
    $stmt = $dbh->query($query);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function getRoleNameByRoleId($id){
    $dbh = dbconnect();
    $query = "SELECT nom_role FROM role WHERE id=$id";
    $stmt = $dbh->query($query);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function getMemberInterestNameByMemberId($membreid){
    $dbh = dbconnect();
    $query = "SELECT nom_interet FROM interets JOIN membre_interet ON interets.id = membre_interet.interet_id WHERE membre_interet.membre_id = $membreid";

    /*$query = "SELECT nom_interet FROM membres JOIN membre_interet ON membres.id = membre_interet.membre_id JOIN interets ON membre_interet.interet_id = interets.id WHERE membres.id=$memberid"*/

    $stmt = $dbh->query($query);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;

}
