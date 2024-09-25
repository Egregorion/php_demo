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

function getMemberInterestsByMemberId($membreid){
    $dbh = dbconnect();
    $query = "SELECT * FROM interets JOIN membre_interet ON interets.id = membre_interet.interet_id WHERE membre_interet.membre_id = :membreid ";

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

function isUser($email) {
    $dbh = dbconnect();
    $query= "SELECT * FROM users WHERE email = :email";
    $stmt = $dbh->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute(); 
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function getAllInterests(){
    $dbh = dbconnect();
    $query= "SELECT * FROM interets";
    $stmt = $dbh->prepare($query);
    $stmt->execute(); 
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

function getAllRoles(){
    $dbh = dbconnect();
    $query= "SELECT * FROM role";
    $stmt = $dbh->prepare($query);
    $stmt->execute(); 
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

function insertNewMembre($nom, $prenom, $photo, $naissance, $role_id){
    $dbh = dbconnect();
    $query= "INSERT INTO membres (nom, prenom, picture, date_de_naissance, role_id) VALUES (:nom, :prenom, :photo, :naissance, :role_id)";
    $stmt = $dbh->prepare($query);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':photo', $photo);
    $stmt->bindParam(':naissance', $naissance);
    $stmt->bindParam(':role_id', $role_id);
    $stmt->execute();
    $lastId = $dbh->lastInsertId();
    return $lastId;
}

function insertInteretIdForMembreId($membre_id, $interet_id){
    $dbh = dbconnect();
    $query = "INSERT INTO membre_interet (membre_id, interet_id) VALUES (:membre_id, :interet_id)";
    $stmt = $dbh->prepare($query);
    $stmt->bindParam(':membre_id', $membre_id);
    $stmt->bindParam(':interet_id', $interet_id);
    $stmt->execute();
}

function updateMembreByMembreId($id, $nom, $prenom, $photo, $naissance, $role_id){
    $dbh = dbconnect();
    $query= "UPDATE membres SET nom = :nom, prenom = :prenom, picture = :photo, date_de_naissance = :naissance, role_id = :role_id WHERE membres.id = :id";
    $stmt = $dbh->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':photo', $photo);
    $stmt->bindParam(':naissance', $naissance);
    $stmt->bindParam(':role_id', $role_id);
    $stmt->execute();
}

function deleteInterestsByMembreId($id) {
    $dbh = dbconnect();
    $query = "DELETE FROM membre_interet WHERE membre_id = :id";
    $stmt = $dbh->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}

// function updateMembreInteretsByMembreId($id){

// }