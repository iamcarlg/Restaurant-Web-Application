<!DOCTYPE html>
<html lang="en">

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

   //echo ("Connexion BDD réussie !");
   

   //echo "Table Actualité";

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
 
<body class="main-layout Recipes_page">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="images/loading.gif" alt="" /></div>
    </div>

    <div class="wrapper">
    <!-- end loader -->

     <div class="sidebar">
            <!-- Sidebar  -->
            <nav id="sidebar">

                <div id="dismiss">
                    <i class="fa fa-arrow-left"></i>
                </div>

                <ul class="list-unstyled components">

                    <li >
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="about.php">About</a>
                    </li>
                    <li> <a href="selection.php">Selection</a></li>
                    <li>
                        <a href="blog.php">News</a>
                    </li>
                    <li>
                        <a href="contact.php">Contact Us</a>
                    </li>
                </ul>

            </nav>
        </div>

    
    <div id="content">
    <!-- header -->
    <header>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="full">
                        <a class="logo" style = "margin-left:100px;"href="index.php"><img src="images/title.png" alt="#" /></a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="full">
                        <div class="right_header_info">

                        <?php

$table_presentation = "SELECT * FROM t_presentation_pre;";
//Affichage de la requete préparée

//echo ($table_presentation);

$result2 = $mysqli->query($table_presentation);

if($result2 == false)
{
    echo "Error : La requete a échoué  \n";
    echo "Errno : " .$mysqli->errno. "\n";
    echo "Error : " .$mysqli->error. "\n";
    exit();

}else{
    echo "<br />";

    $presentation = $result2->fetch_assoc();
    

}

//Fermeture de la base Maria DB
$mysqli->close();

?>

                            <ul>
                                <li class="dinone"><?php echo ($presentation['pre_welcomeText']);?><img style="margin-right: 15px;margin-left: 15px;" src="images/phone_icon.png" alt="#"><a href="#">+33-<?php echo ($presentation['pre_phoneNumber']);?></a></li>
                                <li class="dinone"><img style="margin-right: 15px;" src="images/mail_icon.png" alt="#"><a href="#"><?php echo ($presentation['pre_mail']);?></a></li>
                                <li class="dinone"><img style="margin-right: 15px;height: 21px;position: relative;top: -2px;" src="images/location_icon.png" alt="#"><a href="#"><?php echo ($presentation['pre_address']);?></a></li>
                                <li class="button_user"><a class="button active" href="session.php">Login</a><a class="button" href="inscription.php">Register</a></li>
                                <li><img style="margin-right: 15px;" src="images/search_icon.png" alt="#"></li>
                                <li>
                                    <button type="button" id="sidebarCollapse">
                                        <img src="images/menu_icon.png" alt="#">
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- end header -->
    <div class="overlay"></div>
    <!-- Javascript files-->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/custom.js"></script>
     <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    
     <script src="js/jquery-3.0.0.min.js"></script>
   <script type="text/javascript">
        $(document).ready(function() {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#dismiss, .overlay').on('click', function() {
                $('#sidebar').removeClass('active');
                $('.overlay').removeClass('active');
            });

            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').addClass('active');
                $('.overlay').addClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
    </script>

<script>
         $(document).ready(function() {
           var owl = $('.owl-carousel');
           owl.owlCarousel({
             margin: 10,
             nav: true,
             loop: true,
             responsive: {
               0: {
                 items: 1
               },
               600: {
                 items: 2
               },
               1000: {
                 items: 5
               }
             }
           })
         })
      </script>

<br><br><br><br><br><br>
<?php



$mysqli = new mysqli('localhost','zrugeroca','info1234','zfl2-zrugeroca');
//Connexion à la base de donnée Maria DB

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
$selection = "SELECT * FROM t_selection_sel";
$result = $mysqli->query($selection);

if ($result == false) //Erreur lors de l’exécution de la requête
{ // La requête a echoué
 echo "Error: La requête a echoué \n";
 echo "Errno: " . $mysqli->errno . "\n";
 echo "Error: " . $mysqli->error . "\n";
 exit();

}else{ // La requete a réussi

    echo "<center><h1 style = 'font-size:50px;font-weight:bolder;'>  SELECTION  </center></h1>";

    echo "<center>";


echo ("<table border='1' cellpadding=6>");

echo "<tr>";

    echo "<th>";  
    echo "TITLE";
    echo "</th>";
    

    echo "<th>";  
    echo "INTRODUCTION"; 
    echo "</th>";
    
    echo "<th>";  
    echo "PSEUDO"; 
    echo "</th>";

    echo "<th>";  
    echo "LINKS"; 
    echo "</th>";

echo "</tr>";

//AFFICHAGE DE TOUTES LES SELECTIONS
while($sel = $result->fetch_assoc()){

    echo "<tr>";

    echo ("<td>");  
    echo ($sel['sel_title']); 
    echo ("</td>");

    echo ("<td>");
    echo ($sel['sel_introText']); 
    echo ("</td>");

    echo ("<td>");
    echo ($sel['acc_pseudo']); 
    echo ("</td>");

    echo ("<td>");

    //REQUETE POUR AFFICHER LE SEL_ID = 1 ET EL_ID = 1
    $first_el = "SELECT el_number FROM t_liaison_li  WHERE sel_number = " .$sel['sel_number']. " AND el_number >0 LIMIT 1;";
    $result2 = $mysqli->query($first_el);
    $elt = $result2->fetch_assoc();

    echo ("<a href = './affichageselection.php?sel_id=".$sel['sel_number']."&elt_id=".$elt['el_number']."' style = \'color:blue;\' >See more !</a>");
    
    echo ("</td>");

    echo "</tr>";

}

echo ("</table>");

echo "</center>";
    
//Ferme la connexion avec la base MariaDB
$mysqli->close();

}

?>

</body>


</html>