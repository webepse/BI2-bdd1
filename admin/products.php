<?php
    session_start();
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
        <div class="container-fluid">
            <h1>Produits</h1>
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
                        require "../connexion.php";
                        $req = $bdd->query("SELECT * FROM products");
                        while($don = $req->fetch())
                        {
                            echo "<tr>";
                                echo "<td>".$don['id']."</td>";
                                echo "<td>".$don['title']."</td>";
                                echo "<td>".$don['date']."</td>";
                                echo "<td>".$don['price']."€</td>";
                                echo "<td>";
                                    echo "<a href='productUpdate.php' class='btn btn-warning mx-2'>Modifier</a>";
                                    echo "<a href='productDelete.php' class='btn btn-danger mx-2'>Supprimer</a>";
                                echo "</td>";
                            echo "</tr>";
                        }
                        $req->closeCursor();
                    ?>
                </tbody>
            </table>

        </div>
    </main>



</body>
</html>