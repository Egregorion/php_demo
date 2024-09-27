<?php 
require_once 'models/managers/MembresManager.php';

$membres = MembresManager::getAllMembres();
//(isset($_SESSION['user']) && !empty($_SESSION['user'])) ? $user =  $_SESSION['user']['email'] : $user = "invité"; 
if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
    $user = $_SESSION['user']['email'];
}else{
    $user = "invité";
}

require_once 'vues/indexVue.php';

?>
  

