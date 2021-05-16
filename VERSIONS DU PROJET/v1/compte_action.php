<?php

/* Vérification ci-dessous à faire sur toutes les pages dont l'accès est
autorisé à un utilisateur connecté. */
session_start();
if(!isset($_SESSION['loggin']) && !isset($_SESSION['statut']))
{
 //Si la session n'est pas ouverte, redirection vers la page du formulaire
  header("Location:session.php");
 
 exit();


}

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

if(isset($_POST['valider'])){
      $pseudo= htmlspecialchars(addslashes(($_POST['pseudo'])));
      $validity=htmlspecialchars(addslashes($_POST['choices']));
    
    // Changement de Validité du Responsable en Activé ou Désactivé
    $sql_validity = "UPDATE t_userprofile_usr 
    SET usr_validity = '$validity' 
    WHERE acc_pseudo = '$pseudo';";

    $res_sql_validity = $mysqli->query($sql_validity);
    header("Location:admin_accueil.php");
}

?>