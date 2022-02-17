<?php
    session_start();
    // système de protection 
    if(!isset($_SESSION['login']))
    {
        header("LOCATION:index.php");
    }

    // tester la présence du GET id
    if(isset($_GET['id'])){
        $id = htmlspecialchars($_GET['id']);
    }else{
        header("LOCATION:products.php");
    }

    // aller demander à la base de données les info de l'id demandé
    require "../connexion.php";
    $req = $bdd->prepare("SELECT * FROM products WHERE id=?");
    $req->execute([$id]);
    // tester si j'ai l'id dans ma bdd
    if(!$don = $req->fetch()){
        $req->closeCursor();
        header("LOCATION:products.php");
    }
    $req->closeCursor();

    // si le get delete est dans l'url, je vais supprimer l'entrée de la base de données
    if(isset($_GET['delete'])){
        $del = $bdd->prepare("DELETE FROM products WHERE id=?");
        $del->execute([$id]);
        $del->closeCursor();
        header("LOCATION:products.php?delete=success&id=".$id);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <?php include("partials/header.php") ?>
    <main>
        <div class="container">
            <h1>Supprimer le produit: <?= $don['title'] ?></h1>
            <h3>Description</h3>
            <div>
                <?= nl2br($don['description']) ?>
            </div>
            <h3>Voulez-vous supprimer le produit</h3>
            <a href="productDelete.php?delete=ok&id=<?= $don['id'] ?>" class="btn btn-danger m-3">oui</a>
            <a href="products.php" class="btn btn-secondary m-3">non</a>
        </div>
    </main>
</body>
</html>