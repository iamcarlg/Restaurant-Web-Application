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

 session_destroy();
// libération des variables globales associées à la session
unset($_SESSION['loggin']);
//Destruction de la session

 exit();


}
?>


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

        <h1 style = 'font-size:50px;font-weight:bolder;'><center>ADMIN DASHBOARD</center></h1>

        <?php 

    echo "<center>";

    $mysqli = new mysqli('localhost','zrugeroca','info1234','zfl2-zrugeroca');
    //Connexion à la base de donnée Maria DB

    if ($mysqli->connect_errno) {
        // Affichage d'un message d'erreur
        echo "Error: Problème de connexion à la BDD \n";
        // Arrêt du chargement de la page
        exit();
    }
    
    // Récupération des données du compte entrées dans la session
    $profile = "SELECT * FROM t_userprofile_usr WHERE acc_pseudo = '".$_SESSION['loggin']."' AND usr_statut = '".$_SESSION['statut']."';";
    $res_profile = $mysqli->query($profile);
    $res_profile = $res_profile->fetch_assoc();

    //Le nombre total de comptes dans la base qui sont en statut Responsable
    $all_accounts = "SELECT count(*) AS number FROM t_userprofile_usr";
    $res_all_account = $mysqli->query($all_accounts);
    $res_all_account = $res_all_account->fetch_assoc();
    
?>
<!--//MENU DE NAVIGATION-->

<form method = "POST" action = "compte_action.php">
<div class="topnav">

  <a class="active" href="admin_accueil.php">Home & Profils</a>
  <a href="admin_actualites.php">Manage news</a>
  <a href="admin_selection.php">Manage selections/elements</a>
  <a href="#links">Manage links</a>
  <a name = "logout" style = "margin-left:300px;" href = 'deconnexion.php' >Log Out</a>

</form>

</div>

<br>


<h3><?php echo ("Welcome, " .$res_profile['acc_pseudo']);?></h3>

<?php
//AFFICHAGE DES INFORMATIONS DE LA PERSONNE CONNECTEE
echo "<p>"; 
  echo '<strong>'; echo 'Last Name : '; echo '</strong>'; 
  echo $res_profile['usr_lastName']; 
  
echo "</p>";

echo "<p>"; 
  echo '<strong>'; echo 'First Name : '; echo '</strong>'; 
  echo $res_profile['usr_firstName']; 
  
echo "</p>";

echo "<p>"; 
  echo '<strong>'; echo 'Date of Creation : '; echo '</strong>'; 
  echo $res_profile['usr_creationDate']; 
  
echo "</p>";

echo "<p>"; 
  echo '<strong>'; echo 'Profile Validity  : '; echo '</strong>'; 
  echo $res_profile['usr_validity']; 
  
echo "</p>";

echo "<p>"; 
  echo '<strong>'; echo 'Profile Statut : '; echo '</strong>'; 
  echo $res_profile['usr_statut']; 
  
echo "</p>";

?>
<div>
     

</div>

<br>

<?php

//SI LE STATUT EST ADMIN, AFFICHAGE DE TOUS LES PROFILS
if($res_profile['usr_statut'] == 'A'){

          echo "<h1>"; echo "List of all the profils Statut pending to be Activated/Deactivated : "; echo "</h1>";

          echo "<p style = 'float:fleft;'>";

                echo "<strong>"; 
                echo "Number of Profils/accounts : ";
                echo "</strong>"; echo $res_all_account['number']; 

          echo "</p><br>";

          echo ("<table border='1' cellpadding=6>");

              echo "<th>";  
              echo "Pseudo"; 
              echo "</th>";

              echo "<th>";  
              echo "First Name"; 
              echo "</th>";

              echo "<th>";  
              echo "Last Name";
              echo "</th>";
              
              echo "<th>";  
              echo "Mail Address"; 
              echo "</th>";

              echo "<th>";  
              echo "Validity"; 
              echo "</th>";

              echo "<th>";  
              echo "Statut"; 
              echo "</th>";

              echo "<th>";  
              echo "Creation Date"; 
              echo "</th>";

              echo "<th>";  
              echo "Encrypted Password"; 
              echo "</th>";

          echo "</tr>";

          //Recupération de tous les comptes dont le statut est R ou A étant Admin
          $all_profiles = "SELECT usr_lastName, usr_firstName, usr_mail, usr_validity, usr_statut, usr_creationDate, acc_pseudo, acc_mdp FROM t_userprofile_usr
          JOIN t_useraccount_acc USING(acc_pseudo)
          ";

          $all_profiles_rech = $mysqli->query($all_profiles);

          if($result = $mysqli->query($all_profiles)){
            $prof = $result->num_rows;
            $prof= $result->fetch_assoc();

            while($prof = $result->fetch_assoc()){

                echo "<tr>";

                echo "<td>";  
                echo ($prof['acc_pseudo']);
                echo "</td>";

                echo "<td>";  
                echo ($prof['usr_firstName']);
                echo "</td>";
            
                echo "<td>";  
                echo ($prof['usr_lastName']);
                echo "</td>";
                
                echo "<td>";  
                echo ($prof['usr_mail']);
                echo "</td>";
            
                echo "<td>";  
                echo ($prof['usr_validity']);
                echo "</td>";
            
                echo "<td>";  
                echo ($prof['usr_statut']);
                echo "</td>";
            
                echo "<td>";  
                echo ($prof['usr_creationDate']);
                echo "</td>";
            
                echo "<td>";  
                echo ($prof['acc_mdp']);
                echo "</td>";

                echo "</tr>";
            }

          }
          echo "</table>";
}

?>
<br>

    <?php 

        // Récupération des données du compte entrées dans la session
        $profile = "SELECT * FROM t_userprofile_usr WHERE acc_pseudo = '".$_SESSION['loggin']."' AND usr_statut = '".$_SESSION['statut']."';";
        $res_profile = $mysqli->query($profile);
        $res_profile = $res_profile->fetch_assoc();

    if($res_profile['usr_statut'] == 'A'){

    echo "<div class = 'division'>";

          echo "<div>";
           
          echo "<form  method = 'POST' action = 'compte_action.php' >";

          echo "<label>Select a Pseudo : </label>";

          echo '<select name = "pseudo">';

              while($prof = $all_profiles_rech->fetch_assoc()){
                echo '<option name = "pseudo">';
                echo ($prof['acc_pseudo']. '<br>');
                echo '</option>';

              }
          echo '</select>';

              
          echo '<select name="choices">';
              echo '<option value="A">';
                   echo 'Activate';
              echo '</option>';

              echo '<option value="D" selected>';
                    echo 'Deactivate';
              echo '</option>';

          echo '</select>';
          echo '<p><input class = "button_user" type="submit" value="Submit" name ="valider">'; echo '</p>';

          echo "</form>";
          echo "</div>";

    echo "</div>";
    
    }


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
strong, th{
    color:red;
    font-weight:bolder;

}
}
</style>
<br><br>

</body>

<div class="copyright">
                <div class="container">
                    <p>© 2021 All Rights Reserved. Design by<a href="https://html.design/"> Gauss Tech Inc.</a></p>
                </div>
</div>

</html>

