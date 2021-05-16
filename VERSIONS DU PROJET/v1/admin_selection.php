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
  <a href="admin_actualites.php">Manage news</a>
  <a class="active" href="admin_selection.php">Manage selections/elements</a>
  <a href="#links">Manage links</a>
  <a name = "logout" style = "margin-left:300px;" href = 'session.php' >Log Out</a>

</form>

</div>

<h3><?php 
// Récupération des données du compte entrées dans la session
$profile = "SELECT * FROM t_userprofile_usr WHERE acc_pseudo = '".$_SESSION['loggin']."' AND usr_statut = '".$_SESSION['statut']."';";
$res_profile = $mysqli->query($profile);
$res_profile = $res_profile->fetch_assoc();

echo ("Welcome, " .$res_profile['acc_pseudo']);?></h3>

<h1><center>List of all the selections and their respective selections </center></h1>

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
    

    // Affichage de toutes les sélections
    $selection = "SELECT acc_pseudo, sel_number, sel_title, el_number, el_title, link_number, link_title, el_state FROM t_selection_sel
    LEFT OUTER JOIN t_liaison_li USING (sel_number)
    LEFT OUTER JOIN t_element_el USING (el_number)
    LEFT OUTER JOIN t_link_link USING (el_number)
    ";
    $result = $mysqli->query($selection);

    echo ("<table border='1' cellpadding=6>");

echo "<tr>";

    echo "<th>";  
    echo "SELECTION NUMBER";
    echo "</th>";
    

    echo "<th>";  
    echo "SELECTION TITLE"; 
    echo "</th>";
    
    echo "<th>";  
    echo "ELEMENT NUMBER"; 
    echo "</th>";

    echo "<th>";  
    echo "ELEMENT TITLE"; 
    echo "</th>";

    echo "<th>";  
    echo "LINK NUMBER"; 
    echo "</th>";

    echo "<th>";  
    echo "LINK TITLE"; 
    echo "</th>";

    echo "<th>";  
    echo "PSEUDO"; 
    echo "</th>";

    echo "<th>";  
    echo "ELEMENT STATE"; 
    echo "</th>";


echo "</tr>";


while($sel = $result->fetch_assoc()){

    echo "<tr>";

    echo ("<td>");  
    echo ($sel['sel_number']); 
    echo ("</td>");

    echo ("<td>");
    echo ($sel['sel_title']); 
    echo ("</td>");

    echo ("<td>");
    echo ($sel['el_number']); 
    echo ("</td>");

    echo ("<td>");
    echo ($sel['el_title']); 
    echo ("</td>");

    echo ("<td>");
    echo ($sel['link_number']); 
    echo ("</td>");

    echo ("<td>");
    echo ($sel['link_title']); 
    echo ("</td>");

    echo ("<td>");
    echo ($sel['acc_pseudo']); 
    echo ("</td>");

    echo ("<td>");
    echo ($sel['el_state']); 

    echo ("</td>");
    /*echo ("<td>");

    $first_el = "SELECT el_number FROM t_liaison_li  WHERE sel_number = " .$sel['sel_number']. " AND el_number >0 LIMIT 1;";
    $result2 = $mysqli->query($first_el);
    $elt = $result2->fetch_assoc();

    echo ("<a href = './affichageselection.php?sel_id=".$sel['sel_number']."&elt_id=".$elt['el_number']."' style = \'color:blue;\' >See more !</a>");
    
    echo ("</td>");

    echo "</tr>";*/

}

?>

<form  method = 'POST' action = 'admin_selection_action.php' >

<label>Choose a Selection Number : </label>
<!--input type="text" style="width:300;" name="pseudo" placeholder="Pseudo" required="required">-->

    <?php 
/*
$all_profiles = "SELECT usr_lastName, usr_firstName, usr_mail, usr_validity, usr_statut, usr_creationDate, acc_pseudo, acc_mdp FROM t_userprofile_usr
JOIN t_useraccount_acc USING(acc_pseudo) 
WHERE usr_statut = 'R'
";
$all_profiles_rech = $mysqli->query($all_profiles);

    while($prof = $all_profiles_rech->fetch_assoc()){
      echo '<option name = "pseudo" required = "required">';
      echo ($prof['acc_pseudo']. '<br>');
      echo '</option>';

    }*/
    ?> 
<select name="sel_choice">

    <?php

    $sql_sel = "SELECT * FROM t_selection_sel";
    $res_sql = $mysqli->query($sql_sel);

     while($sel = $res_sql->fetch_assoc()){

        echo '<option>';

        echo $sel['sel_number'];

        echo '</option>';
     }
    
    ?>
</select>

<br>

<label>Choose an Element Number  : </label>

<select name="el_choice">
    <?php 

$sql_el = "SELECT * FROM t_element_el";
$res_sql1 = $mysqli->query($sql_el);

 while($el = $res_sql1->fetch_assoc()){

    echo '<option>';

    echo $el['el_number'];

    echo '</option>';
 }

    ?>
</select>

<p><input type="submit" value="Delete" name ="valider"></p>

</form>
<br><br>

<style>

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
span{
    color:black;
    font-weight:bolder;

}
}
</style>

</body>
</html>