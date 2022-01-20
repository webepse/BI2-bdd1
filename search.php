<?php
    if(isset($_GET['search']))
    {
        $search=htmlspecialchars($_GET['search']);
    }else{
        $search="";
    }

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
    <h1>Search Page</h1>
    <form action="search.php" method="GET">
        <div>
            <input type="text" name="search" id="search" value="<?= $search ?>">
            <input type="submit" value="Rechercher">
        </div>
    </form>   

    <?php 
        if(!empty($search))
        {
            echo "<h3>Résultat pour la recherche</h3>";
            require "connexion.php";
            $req = $bdd->prepare("SELECT * FROM products WHERE title LIKE :inco OR description LIKE :inco");
            $req->execute([
                ":inco"=>"%".$search."%"
            ]);
            $total = $req->rowCount();
            if($total==0){
                echo "aucun résultat";
            }else{
                while($don = $req->fetch())
                {
                    echo "<div><a href='product.php?id=".$don['id']."'>".$don['title']."</a></div>";
                }
            }
            $req->closeCursor();
        }
    ?>
    
    
</body>
</html>