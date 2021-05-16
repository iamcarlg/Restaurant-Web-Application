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

?>

                            <ul>
                                <li class="dinone"><?php echo ($presentation['pre_welcomeText']);?><img style="margin-right: 15px;margin-left: 15px;" src="images/phone_icon.png" alt="#"><a href="#">+33-<?php echo ($presentation['pre_phoneNumber']);?></a></li>
                                <li class="dinone"><img style="margin-right: 15px;" src="images/mail_icon.png" alt="#"><a href="#"><?php echo ($presentation['pre_mail']);?></a></li>
                                <li class="dinone"><img style="margin-right: 15px;height: 21px;position: relative;top: -2px;" src="images/location_icon.png" alt="#"><a href="#"><?php echo ($presentation['pre_address']);?></a></li>
                                <li class="button_user"><a class="button active" href="login.php">Login</a><a class="button" href="inscription.php">Register</a></li>
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



if (isset($_GET['sel_id']) AND isset($_GET['elt_id']))
{
	#echo ("Valeur de elt_id : ");
    #echo ($_GET['elt_id']);

    $sid = $_GET['sel_id'];
    $eid = $_GET['elt_id'];

    $req = "SELECT * FROM t_selection_sel";
    $result = $mysqli->query($req);
    $sel = $result->fetch_assoc();
    //Récupération des sélections de la Table Sélection

    $req1 = "SELECT * FROM t_element_el JOIN t_liaison_li USING (el_number) WHERE sel_number = ".$sid." AND el_number = ".$eid." ";
    $result1 = $mysqli->query($req1);
    $el = $result1->fetch_assoc();
    //Récupération des éléments de la séléction 

    echo "<center><h1 style = 'font-size:40px;font-weight:bolder;'>  SELECTION  </center></h1><br><br>";

    echo ('<center style = "font-weight:bolder; font-size:40px; "> The Selection : ' .$sel['sel_title']. '</center>');

    echo '<br><br>';

    echo ('<center style = "font-weight:bolder; font-size:20px; ">'.$eid. ') ' . $el['el_title']. '</center><br>');

    echo ("<center><img width='200' src='./images/". $el['el_image'] ."'></center>");

    echo "<center>";

    //REQUETES POUR RECUPERER LES ELEMENTS PRECEDENTS D'UNE SELECTION
    $req2 = "SELECT el_number
    FROM t_liaison_li
    WHERE el_number < $eid
    AND sel_number = $sid
    ORDER BY el_number DESC
    LIMIT 1;";

    /* Requete donnant l'ID de l'élément précèdent connaissant l'ID de l'élement actuel choisi
    dans une sélection d'ID connu*/

    $result2 = $mysqli->query($req2);
    $prec = $result2->fetch_assoc();


    //REQUETES POUR RECUPERER LES ELEMENTS SUIVANTS D'UNE SELECTION
    $req3 = "SELECT *
    FROM t_liaison_li
    WHERE el_number > ".$eid." AND sel_number = $sid ORDER BY el_number ASC LIMIT 1";
    /* Requete donnant l'ID de l'élément suivant connaissant l'ID de l'élement actuel choisi
    dans une sélection d'ID connu*/

    $result3 = $mysqli->query($req3);
    $suiv = $result3->fetch_assoc();

    if($result2->num_rows && $result3->num_rows){

        echo ("<a href = './affichagesel.php?sel_id=".$sel['sel_number']."&elt_id=".$prec['el_number']."' style = \'color:blue; padding-right:100px;\' > << Previous</a>");
        echo ("<a href = './affichagesel.php?sel_id=".$sel['sel_number']."&elt_id=".$suiv['el_number']."' style = \'color:blue;\' >Next >> </a>");

        exit();
        
    }else if($result2->num_rows){
        echo ("<a href = './affichagesel.php?sel_id=".$sel['sel_number']."&elt_id=".$prec['el_number']."' style = \'color:blue; padding-right:100px;\' > << Previous</a>");
        exit();
        
    }
    else if($result3->num_rows){
        echo ("<a href = './affichagesel.php?sel_id=".$sel['sel_number']."&elt_id=".$suiv['el_number']."' style = \'color:blue;\' >Next >> </a>");
        exit();
        
    }

    echo "</center>";


}
else // Il manque des paramètres, on avertit le visiteur
{
	echo 'There are some lacking parameters !';
}

?>