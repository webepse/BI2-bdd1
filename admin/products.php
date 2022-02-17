<?php
    session_start();
    // système de proctection 
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
            <h1>Produits</h1>
            <?php
                if(isset($_GET['add']))
                {
                    if($_GET['add']=="success"){
                        echo "<div class='alert alert-success'>Vous avez bien ajouté un produit</div>";
                    }
                }
                if(isset($_GET['update']))
                {
                    if($_GET['update']=="success"){
                        echo "<div class='alert alert-warning'>Vous avez bien modifié le produit n°".$_GET['id']."</div>";
                    }
                }
                if(isset($_GET['delete']))
                {
                    if($_GET['delete']=="success"){
                        echo "<div class='alert alert-danger'>Vous avez bien supprimé le produit n°".$_GET['id']."</div>";
                    }
                }
            ?>
            <a href="productAdd.php" class="btn btn-primary">Ajouter</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Titre</th>
                        <th>Date</th>
                        <th>Prix</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        // aller chercher la base de données
                        require "../connexion.php";
                        // req à la bdd en mode query car on n'a pas d'inconnue
                        $req = $bdd->query("SELECT * FROM products");
                        // boucle tant que car il y a plusieurs réponse à recup 
                        while($don = $req->fetch())
                        {
                            echo "<tr>";
                                echo "<td>".$don['id']."</td>";
                                echo "<td>".$don['title']."</td>";
                                echo "<td>".$don['date']."</td>";
                                echo "<td>".$don['price']."€</td>";
                                echo "<td>";
                                    echo "<a href='productUpdate.php?id=".$don['id']."' class='btn btn-warning mx-2'>Modifier</a>";
                                    echo "<a href='productDelete.php?id=".$don['id']."' class='btn btn-danger mx-2'>Supprimer</a>";
                                echo "</td>";
                            echo "</tr>";
                        }
                        // fermer la req
                        $req->closeCursor();
                    ?>
                </tbody>
            </table>

        </div>
    </main>



</body>
</html>