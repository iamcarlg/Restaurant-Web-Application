<!DOCTYPE html>
<html>
    <head></head>
    <meta charset = "UTF-8">

</head>

<body>

<?php

// Vérification de la complétude des champs du formulaire
if(!empty($_POST["pseudo"]) && !empty($_POST["LName"]) && !empty($_POST["FName"]) && !empty($_POST["mail"]) && !empty($_POST["mdp"]) && !empty($_POST["conf_mdp"])){
  
        $id = htmlspecialchars(addslashes(($_POST["pseudo"])));
        $last_name = htmlspecialchars(addslashes(($_POST["LName"])));
        $first_name = htmlspecialchars(addslashes(($_POST["FName"])));
        $mail = htmlspecialchars(addslashes(($_POST["mail"])));
        $mdp=addslashes(htmlspecialchars(md5($_POST['mdp'])));
        $conf_mdp=addslashes(htmlspecialchars(md5($_POST['conf_mdp'])));
    
        $mysqli = new mysqli('localhost','zrugeroca','info1234','zfl2-zrugeroca');
        //Connexion à la base de donnée Maria DB

    //TEST 2 : Vérification de l'authenticité des 2 mots de passe
    if(strcmp($mdp, $conf_mdp) == 0){

        if ($mysqli->connect_errno){
            // Affichage d'un message d'erreur
            echo "Error: Problème de connexion à la BDD \n";
            echo "Errno: " . $mysqli->connect_errno . "\n";
       
            echo "Error: " . $mysqli->connect_error . "\n";
            // Arrêt du chargement de la page
            exit();
       
           }

        // Instructions PHP à ajouter pour l'encodage utf8 du jeu de caractères
     if (!$mysqli->set_charset("utf8")){
        printf("Pb de chargement du jeu de car. utf8 : %s\n", $mysqli->error);
        exit();
    
    }

    //Insertion des valeurs dans la table COMPTE
    $sql1="INSERT INTO t_useraccount_acc VALUES('" .$id. "','" .$mdp. "');";
    
    //Exécution de la requête d'ajout d'un compte dans la table des comptes
    $result1 = $mysqli->query($sql1);

            //TEST 1 : Vérification de l'existence du Pseudo et de l'adresse mail dans la table

            if ($result1 == false) //Erreur lors de l’exécution de la requête
            {

                echo "<br>The pseudo already exist !";
                header("refresh:3;url=inscription.php");//Redirection automatique dans 3 secondes à la page inscription

                exit();
            
            }

            else//La requête a réussi !
            {
                $validity = "D";
                $statut = "R";
                $date = date("d/m/y");

                //Exécution de la requête d'ajout d'un compte Profil dans la table des comptes
                $sql3="INSERT INTO t_userprofile_usr VALUES('" .$id. "','" .$last_name. "', '" .$first_name. "' , '" .$mail. "' , '" .$validity. "' , '" .$statut. "' , '" .$date. "');";
                
                //Vérification de la présence d'un MAIL dans la table Profil
                $req2 = "SELECT * FROM t_userprofile_usr WHERE usr_mail='" . $mail ."';";
                
                //Suppression du PSEUDO dans une table COMPTE
                $supp="DELETE FROM t_useraccount_usr where acc_pseudo = '" .$id. "';";
                //Exécution de la requête de vérification d'un compte Profil dans la table des comptes
                

                /*$result2 = $mysqli->query($req2);

                if($result2 == true){// Si le résultat est vrai, un message d'existence de mail apparait !
                    //Suppression du PSEUDO dans une table COMPTE

                    echo 'The mail address already exist !';
                    header("refresh:3;url=inscription.php");//Redirection automatique dans 3 secondes à la page inscription
                    $resultd = $mysqli->query($supp);

                    exit();

                }*/

                //Exécution de la requête d'insertion des informations entrées
                $result3 = $mysqli->query($sql3);
                
                
                if ($result3 == false) //Erreur lors de l’exécution de la requête
            {

                // La requête a echoué !
                echo "Error: La requête a échoué \n";
                echo "Query: " . $sql1 . "\n";
                echo "Query: " . $sql2 . "\n";
                echo "Errno: " . $mysqli->errno . "\n";
                echo "Error: " . $mysqli->error . "\n";

                $resultd = $mysqli->query($supp);

                exit();
            
            }else{ //Toutes les vérifications faites sont conformes : Message de félicitations


                echo "<br />";
            
                echo ("Congratulations, you are registered on Maestro!<br>");
                echo ("Here is your registration summary information <br>");
                
                echo "Your Pseudo : " . $id . "<br>";
                echo "Your Last Name : " . $last_name . "<br>";
                echo "Your First Name : " . $first_name . "<br>";
                echo "Your Mail Address : " . $mail . "<br>";
            
                echo "Your Password : " . $mdp . "<br>";
    
                echo ("<a href = 'inscription.php'><br> Back to the Registration Form ! </a>");
    
            }
        }
        
        }
        else{
            echo ("The passwords do not match ! ");
            header("refresh:3;url=inscription.php");//Redirection automatique dans 3 secondes à la page inscription
            exit();
        }
    
    }

else{

    echo "<a href = 'inscription.php'><br>Please Fill all the empty fields of the Registration Form !</a>";

}
?>



</body>
    </html>