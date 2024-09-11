<?php 

require_once('partials/header.php'); 

if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = $_GET['id'];
    $membre = getMemberInfosByMemberId($id);
    //var_dump($membre);
}else {
    header('location:404.php');
}
?>

    <h1><?php echo $membre['nom'] . ' ' . $membre['prenom'] ?></h1>


<?php require_once('partials/footer.php') ?>
