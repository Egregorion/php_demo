<?php 
require_once('partials/header.php'); 
?>

<p>Bienvenu <?php echo $user ?></p>
<h1>DWWM RODEZ 2024, la GOAT</h1>
<?php foreach($membres as $membre){ 
    $role = getRoleNameByRoleId($membre->getRole_id()); 
    $interests = getMemberInterestsByMemberId($membre->getId());
    ?>
    <div>
        <h2><?php echo $membre->getNom() . ' ' . $membre->getPrenom() ?></h2>
        <h3><?php echo $role['nom_role'] ?></h3>
        <small><?php echo $membre->getDate_de_naissance()?></small>
        <?php foreach($interests as $interest){ ?>
            <p><?php echo $interest['nom_interet'] ?></p>
        <?php } ?>
        <a href="membre.php?id=<?php echo $membre->getId() ?>">user details</a>
    </div>
<?php } ?>

<?php require_once('partials/footer.php') ?>