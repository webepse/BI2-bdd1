<?php
    session_start();
    // importer la connexion à la base de données
    require "../connexion.php";

    // vérifier si je suis déjà en session
    if(isset($_SESSION['login']))
    {
        // redirection
        header("LOCATION:dashboard.php");
    }


    // si mon formulaire à été envoyé
    if(isset($_POST['login']))
    {
        // si mon formulaire n'a pas été envoyé vide
        if(empty($_POST['login']) OR empty($_POST['password']))
        {   // création d'une variable erreur
            $error="Veuillez remplir correctement le formulaire";
        }else{
            // protection de la donnée
            $login = htmlspecialchars($_POST['login']);
            // req avec une inconnue 
            $req = $bdd->prepare("SELECT * FROM member WHERE login=?");
            $req->execute([$login]); // execution de la req
            if($don = $req->fetch()) // vérifier s'il y a une correspondance
            {
                // vérif si le mot de passe correspond à celui dans la base de données (crypté)
                if(password_verify($_POST['password'], $don['password']))
                {
                    // création d'une variable de session
                    $_SESSION['login']=$don['login'];
                    // fermer la req car il y a une redirection juste après 
                    $req->closeCursor();
                    // redirection vers le dashboard
                    header("LOCATION:dashboard.php");
                }else{
                    // création d'une variable erreur 
                    $error="Votre mot de passe ne correspond à votre login";
                }
            }else{ // il n'y a pas de correspondance
                $error="Votre login ne correspond pas";
            }
            // fermer la req 
            $req->closeCursor();
        }
    }

    // vérification si dans l'url il y a une variable GET deco
    if(isset($_GET['deco']))
    {
        // destruction de la session
        session_destroy();
        header("LOCATION:index.php"); // rechargement de la page pour vider le cache
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
    <div class="container-fluid">
        <div class="row">
            <div class="col-6 offset-3">
            <h1>Administration</h1>
                <form action="index.php" method="POST">
                    <div class="form-group mt-3">
                        <input type="text" id="login" name="login" placeholder="Votre login" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <input type="password" name="password" id="password" placeholder="Votre mot de passe" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <input type="submit" class="btn btn-primary" value="Connexion">
                    </div>
                </form>
                <?php
                // s'il y a une variable error qui existe 
                    if(isset($error)){
                        echo "<div class='alert alert-danger mt-3'>".$error."</div>";
                    }
                ?>
            </div>
        </div>
    </div>
    
</body>
</html>