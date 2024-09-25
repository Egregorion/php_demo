<?php 
require_once('partials/header.php'); 
$roles = getAllRoles();
$interets = getAllInterests();

if(isset($_FILES['photo']) && !empty($_FILES['photo'])){
    //var_dump($_FILES);
    $uploads_dir = 'uploads';
    $tmp_name = $_FILES["photo"]["tmp_name"];
    // basename() peut empêcher les attaques de système de fichiers;
    // la validation/assainissement supplémentaire du nom de fichier peut être approprié
    $name = uniqid(). '-'.basename($_FILES["photo"]["name"]);
    move_uploaded_file($tmp_name, "$uploads_dir/$name");
}

if(isset($_POST) && !empty($_POST)){
    //var_dump($_POST);
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $photo = "$uploads_dir/$name";
    //var_dump($photo);
    $date_naissance = $_POST['date_naissance'];
    $role = $_POST['role'];
    $interets = $_POST['interets'];
    $newUserId = insertNewMembre($nom, $prenom, $photo, $date_naissance, $role);
    if($interets){
        foreach($interets as $interet){
            insertInteretIdForMembreId($newUserId, $interet);
        }
    }
    header('location:index.php');
}

?>

<form action="" method="post" enctype="multipart/form-data">
    <input type="text" placeholder="nom du membre" name="nom">
    <input type="text" placeholder="prenom du membre" name="prenom">
    <input type="file" placeholder="photo du membre" name="photo">
    <input type="date" name="date_naissance"> 
    <select name="role">
        <?php foreach($roles as $role){?>
            <option value="<?= $role['id']?>"><?= $role['nom_role']?></option> 
        <?php } ?>
    </select>
        <?php foreach($interets as $interet) {?>
            <label for="<?= $interet['nom_interet']?>"><?= $interet['nom_interet']?></label>
            <input id="<?= $interet['nom_interet']?>" value="<?= $interet['id']?>" type="checkbox" name="interets[]">
        <?php } ?>
    <input type="submit" value="enregistrer">
</form>


<?php
require_once 'partials/footer.php';
?>