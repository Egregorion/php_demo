<?php 
require_once 'partials/header.php';

if(isset($_POST['role'])&& !empty($_POST['role'])){
    $role = $_POST['role'];
    insertRoleIntoDatabase($role);
}
?>


<form action="" method="post">
    <input type="text" placeholder="nom de rôle" name="role">
    <input type="submit" value="enregistrer">
</form>

<?php
require_once 'partials/footer.php';
?>