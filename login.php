<?php require_once 'partials/header.php' ;

if(isset($_POST) && !empty($_POST)){
    $email = $_POST['email'];
    $password = $_POST['password'];
    //$hashed_password = password_hash($password, PASSWORD_BCRYPT);
    $user = isUser($email);
    if($user){
        $registered_password = $user['password'];
        $isCredentialsOK = password_verify($password, $registered_password);
        if($isCredentialsOK){
            session_start();
            $_SESSION['user'] = [
                'id'=>$user['id'],
                'email'=>$user['email']
            ];
            header('location:index.php');
        }else{
            echo 'mauvais mot de passe';
        }
    }else{
        echo 'mauvais identifiants';
    }
}

?>

<h1>Se connecter</h1>

<form action="" method="post">

    <input type="email" name="email" placeholder="votre email">
    <input type="password" name="password" placeholder="mot de passe">
    <input type="submit" value="Se connecter">

</form>

<?php require_once 'partials/footer.php' ?>