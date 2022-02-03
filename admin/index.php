<?php
    session_start();
    require "../connexion.php";


    if(isset($_POST['login']))
    {
        if(empty($_POST['login']) OR empty($_POST['password']))
        {
            $error="Veuillez remplir correctement le formulaire";
        }else{
            $login = htmlspecialchars($_POST['login']);
            $req = $bdd->prepare("SELECT * FROM member WHERE login=?");
            $req->execute([$login]);
            if($don = $req->fetch())
            {
                if(password_verify($_POST['password'], $don['password']))
                {
                    $_SESSION['login']=$don['login'];
                    header("LOCATION:dashboard.php");
                }else{
                    $error="Votre mot de passe ne correspond à votre login";
                }
            }else{
                $error="Votre login ne correspond pas";
            }
        }
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
                    if(isset($error)){
                        echo "<div class='alert alert-danger mt-3'>".$error."</div>";
                    }
                ?>
            </div>
        </div>
    </div>
    
</body>
</html>