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

//Connexion à la base MariaDB
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
      $news_title= htmlspecialchars(addslashes(($_POST['news_title'])));
      $news_text=htmlspecialchars(addslashes($_POST['news_text']));
      $news_state=htmlspecialchars(addslashes($_POST['news_state']));
    
      $sql="SELECT MAX(new_number) AS maximum FROM t_news_new;";

      if (!$resultat=$mysqli->query($sql))
      {
       // La requête a echoué
       echo "Error: la requête a échoué \n";
       echo "Query: " . $sql . "\n";
       echo "Errno: " . $mysqli->errno . "\n";
       echo "Error: " . $mysqli->error . "\n";
      }
      else
      {
          $ligne=$resultat->fetch_assoc();
          $lemax=$ligne["maximum"];
          //echo($lemax);
          $incr_new = $lemax + 1;

          // Insérer de nouvelles News dans la Table News
          $insert_news = "INSERT INTO t_news_new VALUES ('".$_SESSION['loggin']."', $incr_new, '".$news_title."', '".$news_text."', CURDATE(), $news_state)";
          $res = $mysqli->query($insert_news);

          if($mysqli->query($insert_news)){
              echo "New record added !";

          }else{

          }
          
      //On peut ensuite incrémenter la variable $lemax pour ajouter
       // une nouvelle actualité

       header("Location:admin_actualites.php");

    }

    //Ferme la base Maria DB
    $mysqli->close();

}

    
?>
<!--  AJOUTER DE NOUVELLES NEWS -->

<?php

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
if(isset($_POST['valider1'])){
      $number=htmlspecialchars(addslashes($_POST['number']));
      $news_title= htmlspecialchars(addslashes(($_POST['news_title'])));
      $news_text=htmlspecialchars(addslashes($_POST['news_text']));
      $news_state=htmlspecialchars(addslashes($_POST['news_state']));

      $modify_news = "UPDATE t_news_new
      SET  new_title = '".$news_title."', new_text = '".$news_text."', new_state = $news_state, new_pubDate = CURDATE(), acc_pseudo = '".$_SESSION['loggin']."'
      WHERE new_number = $number;";

      echo $modify_news;


         

          $res1 = $mysqli->query($modify_news);

          if($res1 == $mysqli->query($modify_news)){
              echo "Record edited !";
              header("Location:admin_actualites.php");
          }

    } 
    
    //Fermeture de la base Maria DB
$mysqli->close();

?>
<!-- MODIFIER DES NEWS -->


<?php

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
if(isset($_POST['valider2'])){
      $news_delete=htmlspecialchars(addslashes($_POST['news_delete']));

    $delete_news = "DELETE FROM t_news_new WHERE new_number = $news_delete"; 
    $res1 = $mysqli->query($delete_news);

    if($res1 == $mysqli->query($delete_news)){
        echo "Record edited !";
        header("Location:admin_actualites.php");

     }
          



}    

//Fermeture de la base Maria DB
$mysqli->close();

?>
<!-- SUPPRIMER DES NEWS -->


