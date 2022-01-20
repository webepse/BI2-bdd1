<?php
    if(!isset($_GET['id']))
    {
        header("LOCATION:index.php");
    }

    require "connexion.php";
    
    $id=htmlspecialchars($_GET['id']);

    $req = $bdd->prepare("SELECT title,description,DATE_FORMAT(date,'%d / %m / %Y') AS mydate,price FROM products WHERE id=?");
    $req->execute([$id]);
    if(!$don = $req->fetch())
    {
        $req->closeCursor();
        header("LOCATION:404.php");
    }
    $req->closeCursor();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Product: <?php echo $don['title']; ?></h2>
    <div>
        <?= nl2br($don['description']); ?>
    </div>
    <div>
        <?= $don['mydate']; ?>
    </div>
    <div>
        <?= $don['price']; ?>€
    </div>
    <div>
        <a href="index.php">retour</a>
    </div>
</body>
</html>