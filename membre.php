<?php 

require_once 'functions.php'; 

if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = $_GET['id'];
    $membre = getMemberInfosByMemberId($id);
    //var_dump($membre);
}else {
    header('location:404.php');
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $membre['prenom'] ?></title>
</head>
<body>
    <h1><?php echo $membre['nom'] . ' ' . $membre['prenom'] ?></h1>
</body>
</html>