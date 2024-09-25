<?php 
require_once('partials/header.php'); 

$interets = getAllInterests();
$roles = getAllRoles();


if(isset($_GET['id'])&&!empty($_GET['id'])){
    $id = $_GET['id'];
  
    $membre = getMemberInfosByMemberId($id);
    $picture = $membre['picture'];
    $membre_interets = getMemberInterestsByMemberId($id);
    $array_membre_interet = [];
    foreach($membre_interets as $interet){
        array_push($array_membre_interet, $interet['interet_id']);
    }
    var_dump($array_membre_interet);
}

if(isset($_FILES['photo']['name']) && !empty($_FILES['photo']['name'])){
    //var_dump($_FILES);
    $uploads_dir = 'uploads';
    $tmp_name = $_FILES["photo"]["tmp_name"];
    // basename() peut empêcher les attaques de système de fichiers;
    // la validation/assainissement supplémentaire du nom de fichier peut être approprié
    $name = uniqid(). '-'.basename($_FILES["photo"]["name"]);
    move_uploaded_file($tmp_name, "$uploads_dir/$name");
    $picture = $name;
}

if(isset($_POST)&&!empty($_POST)){
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $photo = $picture;
    $date_naissance = $_POST['date_naissance'];
    $role = $_POST['role'];
    $interets = $_POST['interets'];
    //var_dump($nom, $prenom, $photo, $date_naissance, $interets );
    updateMembreByMembreId($id, $nom, $prenom, $photo, $date_naissance, $role);
    deleteInterestsByMembreId($id);
    if($interets){
        foreach($interets as $interet){
            insertInteretIdForMembreId($id, $interet);
        }
    }
    header('location:index.php');
}
?>

<form action="" method="post" enctype="multipart/form-data">
    <input type="text" placeholder="nom du membre" name="nom" value="<?= $membre['nom']?>">
    <input type="text" placeholder="prenom du membre" name="prenom" value="<?= $membre['prenom']?>">
    <input type="file" placeholder="photo du membre" name="photo">
    <input type="date" name="date_naissance" value="<?= $membre['date_de_naissance']?>"> 
    <select name="role">
        <?php foreach($roles as $role){?>
            <?php if($role['id'] !== $membre['role_id']){ ?>
                <option value="<?= $role['id']?>"><?= $role['nom_role']?></option> 
            <?php } else { ?>
                <option selected value="<?= $role['id']?>"><?= $role['nom_role']?></option> 
            <?php } ?>
            
        <?php } ?>
    </select>
        <?php foreach($interets as $interet) {?>
            
            <?php if(in_array($interet['id'], $array_membre_interet)){ ?>
                <label for="<?= $interet['nom_interet']?>"><?= $interet['nom_interet']?></label>
                <input checked id="<?= $interet['nom_interet']?>" value="<?= $interet['id']?>" type="checkbox" name="interets[]">
            <?php } else {?>
                <label for="<?= $interet['nom_interet']?>"><?= $interet['nom_interet']?></label>
                <input id="<?= $interet['nom_interet']?>" value="<?= $interet['id']?>" type="checkbox" name="interets[]">
            <?php } ?>
        <?php } ?>
    <input type="submit" value="enregistrer">
</form>

<?php
require_once 'partials/footer.php';
?>