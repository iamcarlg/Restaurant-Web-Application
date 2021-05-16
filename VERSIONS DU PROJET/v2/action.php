<!DOCTYPE html>

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
    
    $validity = "D";
    $statut = "R";

    //Exécution de la requête d'ajout d'un compte Profil dans la table des comptes
    $sql3="INSERT INTO t_userprofile_usr VALUES('" .$id. "','" .$last_name. "', '" .$first_name. "' , '" .$mail. "' , '" .$validity. "' , '" .$statut. "' , CURDATE());";
                
    //Exécution de la requête d'ajout d'un compte dans la table des comptes
    $result1 = $mysqli->query($sql1);

    //Suppression du PSEUDO dans une table COMPTE
 
            //TEST 1 : Vérification de l'existence du Pseudo et de l'adresse mail dans la table

            if ($result1 == false) //Erreur lors de l’exécution de la requête
            {

                echo "<br>The pseudo already exist !";
                header("refresh:3;url=inscription.php");//Redirection automatique dans 3 secondes à la page inscription

                //$resultd = $mysqli->query($supp);

                exit();
            
            }

                

                //Exécution de la requête d'insertion des informations entrées
                $result3 = $mysqli->query($sql3);
                
             
                if ($result3 == false) //Erreur lors de l’exécution de la requête
            {

                // La requête a echoué !
                echo "Error: La requête a échoué \n";
                echo "Query: " . $sql3 . "\n";
                echo "Errno: " . $mysqli->errno . "\n";
                echo "Error: " . $mysqli->error . "\n";
                
                $supp="DELETE FROM t_useraccount_acc WHERE acc_pseudo = '".$id."';";

                echo $supp;

                $resultd = $mysqli->query($supp);

                exit();
            
            }else{ //Toutes les vérifications faites sont conformes : Message de félicitations


                echo '<form method = "POST" action = "compte_action.php">';
                            echo '<div class="topnav">';
                                   echo '<a class="active" href="admin_accueil.php">';echo 'Home & Profils'; echo '</a>';
                echo '</form>'; echo '<br><br>';

?>

<!DOCTYPE html>
<html lang="en">

<?php

// Connexion avec la base MariaDB
$mysqli = new mysqli('localhost','zrugeroca','info1234','zfl2-zrugeroca');

if ($mysqli->connect_errno)
{
 // Affichage d'un message d'erreur
 echo "Error: Problème de connexion à la BDD \n";
 echo "Errno: " . $mysqli->connect_errno . "\n";
 echo "Error: " . $mysqli->connect_error . "\n";
 // Arrêt du chargement de la page
 exit();
}

// Instructions PHP à ajouter pour l'encodage utf8 du jeu de caractères
if (!$mysqli->set_charset("utf8")) {
    printf("Pb de chargement du jeu de car. utf8 : %s\n", $mysqli->error);
    exit();
   }

?>

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>El Maestro</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- owl css -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- responsive-->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- awesome fontfamily -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>

<!-- body -->
<body>

        <div class="container-fluid" style = "background:black; height:22vh;">
            <div class="row">
                <div class="col-md-3">
                    <div class="full">
                        <a class="logo" style = "margin-left:100px;"href="index.php"><img src="images/title.png" alt="#" /></a>
                    </div>
                </div>
            </div>
        </div>

        <?php

                echo '<h3>'; echo ("Welcome, " .$id); echo '</h3>';

                echo "<p>"; 
                echo '<strong>'; echo 'Last Name : '; echo '</strong>'; 
                echo $last_name; 
                
                echo "</p>";

                echo "<p>"; 
                echo '<strong>'; echo 'First Name : '; echo '</strong>'; 
                echo $first_name; 
                
                echo "</p>";

                echo "<p>"; 
                echo '<strong>'; echo 'Your Mail Address : '; echo '</strong>'; 
                echo $mail; 

                echo "</p>";




                /*echo "<br />";
            
                echo ("Congratulations, you are registered on Maestro!<br>");
                echo ("Here is your registration summary information <br>");
                
                echo "Your Pseudo : " . $id . "<br>";
                echo "Your Last Name : " . $last_name . "<br>";
                echo "Your First Name : " . $first_name . "<br>";
                echo "Your Mail Address : " . $mail . "<br>";
            
                echo "Your Password : " . $mdp . "<br>";*/
    
                echo ("<a href = 'inscription.php'><br> Back to the Registration Form pending to be validated by the Admin! </a>");
    
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

<style>

.division{
  display:flex;
  justify-content:space-around;


}
.topnav {
  background-color: #333;
  overflow: hidden;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 5px 5px;
  text-decoration: none;
  font-size: 17px;
}

strong{
    color:red;
    font-weight:bolder;

}
}
</style>

</body>
    </html>