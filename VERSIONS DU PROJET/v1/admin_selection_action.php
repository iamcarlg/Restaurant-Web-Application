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
      $sel_id= htmlspecialchars(addslashes(($_POST['sel_choice'])));
      $elt_id=htmlspecialchars(addslashes($_POST['el_choice']));
    
    // Changement de Validité du Responsable en Activé ou Désactivé
    $sql_delete = "DELETE FROM  t_liaison_li 
    WHERE sel_number = '$sel_id' 
    AND el_number = '$elt_id';";

    $res_sql_delete = $mysqli->query($sql_delete);
    header("Location:admin_selection.php");
}

if (isset($_POST["logout"])) {
    header("Location:session.php");
}

?>