<?php

require_once '../includes/config.php';

$pt = new PostTable();

$id = $_GET['id'];
$aff_article = $pt->get($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Blog</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

    <div class="container">
        <h1 class="text-center">Blog Ouais</h1>
        <a href="index.php" class="btn btn-primary"> Accueil </a>
                <div class="col-md-4">
                    <h2><?= $aff_article->getTitle() ?></h2>
                    <p><?= $aff_article->getContent() ?></p>
                </div>
    </div>
</body>
</html>
