<?php
require_once '../includes/config.php';

$nom = false;
$mdp = false;

$ut = new UserTable();
$u = new User();

if (isset($_POST['name']) && isset($_POST['password'])) {
    $u->setName($_POST['name']);
    $u->setPassword($_POST['password']);  
    if ( $ut->user_exist($u)==1) {
    $_SESSION['name']=$u->getName();
    header("location: index.php");
    }
    else{
        echo "Erreur lors de la connexion";
    }  
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Blog</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
    <body>
        <div class="container">
        <h1>Se connecter</h1>
            <div class="row">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="title">Nom</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label for="title">Mot de passe </label>
                        <input type="password" class="form-control" name="password"></textarea>
                    </div>
                    <input type="submit" class="btn btn-primary">
                </form>
            </div>
        </div>
    </body>
</html>
