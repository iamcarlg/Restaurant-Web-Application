<?php

//Ouverture d'une session
session_start();
/*Affectation dans des variables du pseudo/mot de passe s'ils existent,
affichage d'un message sinon*/

// Vérification de la complétude des champs du formulaire
if(!empty($_POST["pseudo"]) && !empty($_POST["mdp"])){

    $id= htmlspecialchars(addslashes(($_POST["pseudo"])));
    $mdp=addslashes(htmlspecialchars($_POST['mdp']));
    //Récupération des valeurs du Formulaire Login

    $mysqli = new mysqli('localhost','zrugeroca','info1234','zfl2-zrugeroca');
    //Connexion à la base de donnée Maria DB

    if ($mysqli->connect_errno) {
        // Affichage d'un message d'erreur
        echo "Error: Problème de connexion à la BDD \n";
        // Arrêt du chargement de la page
        exit();
    }

    //$rech_cmpt="SELECT acc_pseudo, acc_mdp  FROM t_useraccount_acc WHERE acc_pseudo='" . $id . "' AND acc_mdp=MD5('" . $mdp . "');";
    //echo ($rech_cmpt);

    $rech_cmpt = "SELECT acc_pseudo, acc_mdp, usr_validity, usr_statut FROM t_userprofile_usr JOIN t_useraccount_acc USING (acc_pseudo)
    WHERE acc_pseudo = '".$id."' 
    AND usr_validity = 'A'
    AND acc_mdp = MD5('".$mdp."');";

    /* Exécution de la requête pour vérifier si le compte (=pseudo+mdp) existe !*/
    $res_rech_cmpt = $mysqli->query($rech_cmpt);
    //echo $res_rech_cmpt;

    if ($res_rech_cmpt==false) {
        // La requête a echoué
        echo "Error: Problème d'accès à la base \n";
        exit();
    }

    else {

        echo "Connexion à la base réussie !<br>";

        $rows = $res_rech_cmpt->num_rows;
        $ligne = $res_rech_cmpt->fetch_assoc();

        if($rows == 1 && $ligne['usr_validity'] == "A"){


            echo ('Pseudo : ' .$ligne['acc_pseudo']. '<br>');
            echo ('Mot de passe : ' .$ligne['acc_mdp']. '<br>');
            echo ('Validity : ' .$ligne['usr_validity']. '<br>');
    
            echo "<br>";
        
            $rows = $res_rech_cmpt->num_rows;
            echo ("Le nombre de lignes : " .$rows);
            echo "<br>";

            //Mise à jour des données de la session
            $statut=$ligne['usr_statut'];

            $_SESSION['loggin']=$id;
            $_SESSION['statut']=$statut;


            header("Location:admin_accueil.php");
            //header("refresh:5;url=admin_accueil.php");//Redirection automatique dans 5 secondes à la page inscription
        }
        else{

            echo "Incorrect Password or Pseudo ! <br> Please Try again !";
            header("refresh:3;url=session.php");//Redirection automatique dans 3 secondes à la page inscription


        }
            
       
    


    $mysqli->close();
//Fermeture de la base Maria DB

}
}else{
    echo "<a href = 'session.php'><br>Please Fill all the empty fields of the Login Form !</a>";
    header("refresh:3;url=session.php");//Redirection automatique dans 3 secondes à la page inscription
    exit();
}




?>