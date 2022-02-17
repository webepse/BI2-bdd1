<?php
     session_start();
     // système de proctection 
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

     // vérif si le formulaire a été envoyé ou non
     if(isset($_POST['title'])){
        // vérifier toutes les valeurs envoyée avant d'insèrer dans la bdd
        // initialisation d'une var error à 0
        $err = 0;
        if(empty($_POST['title']))
        {
            $err=1;
        }else{
            //protection de la valeur
            $title = htmlspecialchars($_POST['title']);
        }

        if(empty($_POST['date']))
        {
            $err=2;
        }else{
            //protection de la valeur
            $date = htmlspecialchars($_POST['date']);
        }

        if(empty($_POST['description']))
        {
            $err=3;
        }else{
            //protection de la valeur
            $description = htmlspecialchars($_POST['description']);
        }

        if(empty($_POST['price']))
        {
            $err=4;
        }else{
            // vérifier si c'est bien un nombre
            if(is_numeric($_POST['price']))
            {
                //protection de la valeur
                $price = htmlspecialchars($_POST['price']);
            }else{
                $err=5;
            }
        }
        // vérifier si le formulaire été bon ou non
        if($err == 0)
        {
            // update dans la base de données
            require "../connexion.php";
        
            $update = $bdd->prepare("UPDATE products SET title=:titre, description=:descri, date=:dat,price=:prix WHERE id=:myid");
            $update->execute([
                ":titre" => $title,
                ":descri" => $description,
                ":dat"=> $date,
                ":prix"=> $price,
                ":myid" => $id
            ]);
            $update->closeCursor();
            // redirection quand c'est fini
            header("LOCATION:products.php?update=success&id=".$id);

        }else{
            // il y a eu au moins une erreur
            header("LOCATION:productUpdate.php?id=".$id."&err=".$err);
        }
     }else{
         // si pas de formulaire envoyé
         header("LOCATION:productUpdate.php?id=".$id); 
     }