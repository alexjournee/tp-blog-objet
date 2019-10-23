<?php

require_once '../includes/config.php';

$pt = new PostTable();

if (isset($_POST['title']) && isset($_POST['content'])) {
    $post = new Post();
    $post->setTitle($_POST['title']);
    $post->setContent($_POST['content']);
    $pt->create($post);
}

$posts = $pt->all();
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Blog</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <a href="inscrire.php" class="btn btn-primary"> S'inscrire </a>
        <a href="connexion.php" class="btn btn-primary"> Connexion </a>
        <h1 class="text-center">Blog</h1>
        <p class="text-right">Connecté en tant que : </p>
        <div class="row">
            <?php foreach($posts as $post): ?>
                <div class="col-md-4">
                    <h2><?= $post['title'] ?></h2>
                    <p><?= $post['content'] ?></p>
                    <a href="article.php?id=<?= $post['id']?>" class="btn btn-primary"> Lire </a>
                    <a href="modif_article.php?id=<?= $post['id']?>" class="btn btn-primary"> Modifier </a>
                    <form method="POST" action="../includes/actions/action_supprimer.php">
                        <input type="hidden" name="id" value="<?= $post['id'] ?>">
                        <input type="submit" name="supp" value="Supprimer l'article">
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
        <h1>Add a Post</h1>
        <div class="row">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title">
                </div>
                <div class="form-group">
                    <label for="title">Content</label>
                    <textarea class="form-control" name="content"></textarea>
                </div>
                <input type="submit" class="btn btn-primary">
            </form>
        </div>
    </div>
</body>
</html>
