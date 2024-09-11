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
    $stmt = $dbh->prepare($query); //la requête va envoyer les résultats dans un objet PDO Statement qu'on ne peut pas exploiter tel quel
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

function getMemberInfosByMemberId($id){
    $dbh = dbconnect();
    $query = "SELECT * FROM membres WHERE membres.id = :id";
    $stmt = $dbh->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function getRoleNameByRoleId($id){
    $dbh = dbconnect();
    $query = "SELECT nom_role FROM role WHERE id= :id";
    $stmt = $dbh->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function getMemberInterestNameByMemberId($membreid){
    $dbh = dbconnect();
    $query = "SELECT nom_interet FROM interets JOIN membre_interet ON interets.id = membre_interet.interet_id WHERE membre_interet.membre_id = :membreid ";

    /*$query = "SELECT nom_interet FROM membres JOIN membre_interet ON membres.id = membre_interet.membre_id JOIN interets ON membre_interet.interet_id = interets.id WHERE membres.id=$memberid"*/

    $stmt = $dbh->prepare($query);
    $stmt->bindParam(':membreid', $membreid );
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;

}

function insertRoleIntoDatabase($name) {
   $dbh = dbconnect();
   $query = "INSERT INTO role (nom_role) VALUES (:name)";
   $stmt = $dbh->prepare($query);
   $stmt->bindParam(':name', $name);
   $stmt->execute();
}
