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
            <h1>Modifier le produit: <?= $don['title'] ?></h1>
            <form action="treatmentUpdateProduct.php?id=<?= $don['id'] ?>" method="POST">
                <div class="my-3">
                    <label for="title">Titre</label>
                    <input type="text" id="title" name="title" value="<?= $don['title'] ?>" class="form-control">
                </div>
                <div class="my-3">
                    <label for="date">Date</label>
                    <input type="date" name="date" id="date" value="<?= $don['date'] ?>" class="form-control">
                </div>
                <div class="my-3">
                    <label for="descri">Description</label>
                    <textarea name="description" id="descri" class="form-control"><?= $don['description'] ?></textarea>
                </div>
                <div class="my-3">
                    <label for="price">Prix</label>
                    <input type="number" step="0.01" id="price" name="price" value="<?= $don['price'] ?>" class="form-control">
                </div>
                <div class="my-3">
                    <input type="submit" value="Modifier" class="btn btn-warning">
                </div>
            </form>
            <?php 
                if(isset($_GET['err'])){
                    echo "<div class='alert alert-danger'>Un problème est survenu</div>";
                }
            ?>
        </div>
    </main>
</body>
</html>