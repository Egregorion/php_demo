<?php 

require_once './models/managers/MembresManager.php';

if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = $_GET['id'];
    $membre = MembresManager::getMemberInfosByMemberId($id);
    //var_dump($membre);
}else {
    header('location:404.php');
}

require_once './vues/membreVue.php';


  
