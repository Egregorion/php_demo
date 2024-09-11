<?php 
require_once('partials/header.php'); 
$membres = getAllMembers();
?>

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

<?php require_once('partials/footer.php') ?>