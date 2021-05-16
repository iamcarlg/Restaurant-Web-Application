<?php

        /* Vérification ci-dessous à faire sur toutes les pages dont l'accès est
        autorisé à un utilisateur connecté. */
        session_start();
        
        if(!isset($_SESSION['loggin']) && !isset($_SESSION['statut']))
        {
        //Si la session n'est pas ouverte, redirection vers à la page session.php

        header("Location:session.php");    
        exit();


        }else{
        // Redirection à la page session.php
        header("Location:session.php");
           
        session_destroy();
        //Destruction de la session

        // libération des variables globales associées à la session
        unset($_SESSION['loggin']);
        unset($_SESSION['statut']);
        
        }

?>