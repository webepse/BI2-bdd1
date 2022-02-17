<?php
    session_start();
    // système de protection 
    if(!isset($_SESSION['login']))
    {
        header("LOCATION:index.php");
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
            <h1>Ajouter un produit</h1>
            <form action="treatmentAddProduct.php" method="POST">
                <div class="my-3">
                    <label for="title">Titre</label>
                    <input type="text" id="title" name="title" value="" class="form-control">
                </div>
                <div class="my-3">
                    <label for="date">Date</label>
                    <input type="date" name="date" id="date" value="" class="form-control">
                </div>
                <div class="my-3">
                    <label for="descri">Description</label>
                    <textarea name="description" id="descri" class="form-control"></textarea>
                </div>
                <div class="my-3">
                    <label for="price">Prix</label>
                    <input type="number" step="0.01" id="price" name="price" value="" class="form-control">
                </div>
                <div class="my-3">
                    <input type="submit" value="Enregistrer" class="btn btn-success">
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