<?php
require_once '../includes/config.php';

$nom = false;
$mdp = false;

$ut = new UserTable();

if (isset($_POST['name']) && isset($_POST['password'])) {
    if($_POST['name'] == $ut->name()){
        $nom = true;
    }
    if($_POST['password'] == $ut->password()){
        $mdp = true;
    }
    if($nom==true && $mdp==true){
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
