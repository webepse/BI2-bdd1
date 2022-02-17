<?php
     session_start();
     // système de proctection 
     if(!isset($_SESSION['login']))
     {
         header("LOCATION:index.php");
     }
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
            // insertion dans la base de données
            require "../connexion.php";
            // $insert = $bdd->prepare("INSERT INTO products(title,description,date,price) VALUES(?,?,?,?)")
            $insert = $bdd->prepare("INSERT INTO products(title,description,date,price) VALUES(:titre,:descri,:dat,:prix)");
            $insert->execute([
                ":titre" => $title,
                ":descri" => $description,
                ":dat"=> $date,
                ":prix"=> $price
            ]);
            $insert->closeCursor();
            // redirection quand c'est fini
            header("LOCATION:products.php?add=success");

        }else{
            // il y a eu au moins une erreur
            header("LOCATION:productAdd.php?err=".$err);
        }
     }else{
         // si pas de formulaire envoyé
         header("LOCATION:productAdd.php"); 
     }