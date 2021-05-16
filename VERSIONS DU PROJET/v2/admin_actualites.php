<!DOCTYPE html>
<html lang="en">

<?php
/* Vérification ci-dessous à faire sur toutes les pages dont l'accès est
autorisé à un utilisateur connecté. */
session_start();
if(!isset($_SESSION['loggin']) && !isset($_SESSION['statut']))
{
 //Si la session n'est pas ouverte, redirection vers la page du formulaire
 header("Location:session.php");
 // destruction de la session
 exit();


}
?>


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

        <h1 style = 'font-size:50px;font-weight:bolder;'><center>ADMIN DASHBOARD</center></h1>

<!--//MENU DE NAVIGATION-->

<form method = "POST" action = "compte_action.php">
<div class="topnav">

  <a href="admin_accueil.php">Home & Profils</a>
  <a class="active" href="admin_actualites.php">Manage news</a>
  <a href="admin_selection.php">Manage selections/elements</a>
  <a href="#links">Manage links</a>
  <a name = "logout" style = "margin-left:300px;" href = 'deconnexion.php' >Log Out</a>

</form>

</div>

<h3><?php 
// Récupération des données du compte entrées dans la session
$profile = "SELECT * FROM t_userprofile_usr WHERE acc_pseudo = '".$_SESSION['loggin']."' AND usr_statut = '".$_SESSION['statut']."';";
$res_profile = $mysqli->query($profile);
$res_profile = $res_profile->fetch_assoc();

echo ("Welcome, " .$res_profile['acc_pseudo']);?></h3>

<h1><center>List of all the news </center></h1>


<?php

    $table_actualite = "SELECT * FROM t_news_new";
    $result1 = $mysqli->query($table_actualite);
    
    echo '<center>';


    echo ("<table border='1' width=1200 cellpadding=6>");

    echo "<tr>";
    
        echo "<th>";  
        echo "NEWS NUMBER"; 
        echo "</th>";
        
        echo "<th>";  
        echo "NEWS TITLE"; 
        echo "</th>";
    
        echo "<th>";  
        echo "NEWS CONTENT"; 
        echo "</th>";
    
        echo "<th>";  
        echo "NEWS PUBLICATION DATE"; 
        echo "</th>";
    
        echo "<th>";  
        echo "PSEUDO"; 
        echo "</th>";

        echo "<th>";  
        echo "NEWS STATE"; 
        echo "</th>";
    
    echo "</tr>";

    // AFFICHAGE DE TOUTES LES NEWS
    while($actualite = $result1->fetch_assoc()){



echo "<tr>";

    echo ("<td>");  
    echo ($actualite['new_number']); 
    echo ("</td>");

    echo ("<td>");
    echo ($actualite['new_title']); 
    echo ("</td>");

    echo ("<td>");
    echo ($actualite['new_text']);
    echo ("</td>");

    echo ("<td>");
    echo ($actualite['new_pubDate']); 
    echo ("</td>");

    echo ("<td>");
    echo ($actualite['acc_pseudo']); 
    echo ("</td>");

    echo ("<td>");
    echo ($actualite['new_state']); 
    echo ("</td>");

echo ("</tr>");
        
    
    }
    
    echo '</table>';

    
?>    
<br><br>

<div class = "division">
            <div>
                
            <!-- AJOUTER DES INFORMATIONS SUR LES NEWS -->
            <form method = "POST" action = "admin_actualites_action.php">
            <h2>Add some news : </h2><br>

              <label>Enter the News Title : </label>
              <input type = "text" name = "news_title" required = "required"><br>

              <label>Enter the News Content : </label>
              <textarea name = "news_text" required = "required"> 
              </textarea><br>

              <label>Choose the News state : </label>
              <select name="news_state">
                    <option value=1>1</option>
                    <option value=0 selected>0</option>
              </select>

              <p><input type="submit" value="Add the news" name ="valider"></p>

            </form>
            </div>

            <div>

<?php 

      $table_actualite = "SELECT * FROM t_news_new";
      $result1 = $mysqli->query($table_actualite);


?>
                <!-- MODIFIER DES INFORMATIONS SUR LES NEWS -->
            <form method = "POST" action = "admin_actualites_action.php">
            <h2>Modify some news : </h2><br>

             <label>Choose the News Number : </label>
             <?php 
             echo '<select name="number">';

                  while($actualite = $result1->fetch_assoc()){

                    echo '<option name="number">';
                    echo ($actualite['new_number']);
                    echo '</option>';
                  }      
                   
                      
              echo '</select>';

              ?>
              <br>
              <label>Enter the News Title : </label>
              <input type = "text" name = "news_title" required = "required"><br>

              <label>Enter the News Content : </label>
              <textarea name = "news_text" required = "required"> 
              </textarea><br>

              <label>Choose the News state : </label>
              <select name="news_state">
                    <option value=1>1</option>
                    <option value=0 selected>0</option>
              </select>

              <p><input type="submit" value="Modify the news" name ="valider1"></p>

            </form>

            </div>

            <div>
                <!-- SUPPRIMER DES NEWS -->
            <form method = "POST" action = "admin_actualites_action.php">
            <h2>Delete of a news : </h2><br>

             <label>Choose the News Number : </label>

              <?php 

              $table_actualite = "SELECT * FROM t_news_new";
              $result1 = $mysqli->query($table_actualite);

             echo '<select name="news_delete">';

                  while($actualite = $result1->fetch_assoc()){

                    echo '<option name="news_delete">';
                    echo ($actualite['new_number']);
                    echo '</option>';
                  }      
                   
                      
              echo '</select>';

              ?>
              </select>

              <p><input type="submit" value="Delete the news" name ="valider2"></p>

            </form>

            </div>
</div>

<?php echo '</center>';

//Fermeture de la base Maria DB
$mysqli->close();

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

.topnav a #logout{
    float:right;
}
.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}


.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: red;
  color: white;
}
th{
    color:red;
    font-weight:bolder;

}
}
</style>

</body>

<div class="copyright">
                <div class="container">
                    <p>© 2021 All Rights Reserved. Design by<a href="https://html.design/"> Gauss Tech Inc.</a></p>
                </div>
</div>

</html>