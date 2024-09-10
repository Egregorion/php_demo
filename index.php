<?php require_once('functions.php'); //le serveur va aller chercher le contenu du fichier et l'inclure à cet endroit 
$membres = getAllMembers();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La promo DWWM RODEZ 2024</title>
</head>
<body>
    <h1>DWWM RODEZ 2024, la GOAT</h1>
    <?php foreach($membres as $membre){ 
        $role = getRoleNameByRoleId($membre['role_id']); 
        $interests = getMemberInterestNameByMemberId($membre['id']);
        ?>
        <div>
            <h2><?php echo $membre['nom'] . ' ' . $membre['prenom']?></h2>
            <h3><?php echo $role['nom_role'] ?></h3>
            <small><?php echo $membre['date_de_naissance']?></small>
            <?php foreach($interests as $interest){ ?>
                <p><?php echo $interest['nom_interet'] ?></p>
            <?php } ?>
            <a href="membre.php?id=<?php echo $membre['id'] ?>">user details</a>
        </div>
    <?php } ?>
</body>
</html>