<?php
require_once '../includes/config.php';

$ut = new UserTable();

if (isset($_POST['name']) && isset($_POST['password'])) {
    $us = new User();
    $us->setName($_POST['name']);
    $us->setPassword($_POST['password']);
    $ut->create_user($us);
    header("location: index.php");
}

$users = $ut->all();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Blog</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
    <body>
        <div class="container">
        <h1>S'inscrire</h1>
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
