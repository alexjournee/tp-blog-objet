<?php
require_once '../includes/config.php';

$pt = new PostTable();
$p = new Post();

$id = $_GET['id'];
$aff_article = $pt->get($id);
$titre_article = $aff_article->getTitle();
$texte_article = $aff_article->getContent();

if(!empty($_POST['modif'])){
    $p->setID($id);
    $titre = $_POST["titre"];
    $p->setTitle($titre);
    $texte = $_POST["texte"];
    $p->setContent($texte);
    $pt->update($p);
    header("location: index.php");
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Blog</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <nav class="nav">
        <form method="post" action="index.php">
            <button type="submit"> Accueil</button>
        </form>

    </nav>

    <div class="container">
        <form method="post" >
            <p>
                <label for="pseudo">Titre de l'article</label><br />
                <input type="text" name="titre" id="titre"  size="30" maxlength="30" value="<?php if(isset($titre_article)) echo $titre_article ?>" />
            </p>
        <p>
            <label for="ameliorer">Ajouter votre article</label><br />
            <textarea type="text" name="texte" id="texte"  cols="100" rows="10"><?php if(isset($texte_article)) echo $texte_article ?> </textarea>
        </p>
            <input type="submit" name="modif" value="Enregistrer les modifications">
        </form>
</body>
</html>