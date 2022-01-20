<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Website Store</h1>
    <?php 
        require "connexion.php";
        $req = $bdd->query("SELECT * FROM products");
        // $don = $req->fetch();
        // // var_dump($don);
        // echo $don['title'];
        while($don = $req->fetch())
        {
            echo "<a href='product.php?id=".$don['id']."'>".$don['title']."</a><br>";
        }
        $req->closeCursor();
    ?>
    <div>
        <a href="search.php">Rechercher</a>
    </div>

</body>
</html>