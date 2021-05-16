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
                        <a href="about.html">About</a>
                    </li>
                    <li> <a href="selection.php">Selection</a></li>
                    <li>
                        <a href="blog.php">News</a>
                    </li>
                    <li>
                        <a href="contact.html">Contact Us</a>
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
    
    <div class="yellow_bg">
   <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="title">
                     <h2>Our Recipes</h2>
                    
                  </div>
               </div>
            </div>
          </div>
</div>
     <!-- section -->
     <section class="resip_section">
        <div class="container">
            <div class="row">
         <div class="col-md-12">
       <div class="ourheading">
    <h2>Our Recipes</h2>
  </div>
</div>    
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="owl-carousel owl-theme">

                <div class="item">
                    <div class="product_blog_img">
                        <img src="images/buffalo.jpg" alt="#" />
                    </div>
                    <div class="product_blog_cont">
                        <h3>Buffalo</h3>
                        <h4><span class="theme_color">€</span>10</h4>
                    </div>
                </div>
                <div class="item">
                    <div class="product_blog_img">
                        <img src="images/calzone.jpg" alt="#" />
                    </div>
                    <div class="product_blog_cont">
                        <h3>Calzone</h3>
                        <h4><span class="theme_color">€</span>20</h4>
                    </div>
                </div>
                <div class="item">
                    <div class="product_blog_img">
                        <img src="images/chicken-bbq.jpg" alt="#" />
                    </div>
                    <div class="product_blog_cont">
                        <h3>Chicken BBQ</h3>
                        <h4><span class="theme_color">€</span>30</h4>
                    </div>
                </div>
                <div class="item">
                    <div class="product_blog_img">
                        <img src="images/chicken-cheese.jpg" alt="#" />
                    </div>
                    <div class="product_blog_cont">
                        <h3>Chicken Cheese</h3>
                        <h4><span class="theme_color">€</span>40</h4>
                    </div>
                </div>
                <div class="item">
                    <div class="product_blog_img">
                        <img src="images/chorizo.jpg" alt="#" />
                    </div>
                    <div class="product_blog_cont">
                        <h3>Chorizo</h3>
                        <h4><span class="theme_color">€</span>50</h4>
                    </div>
                </div>
                <div class="item">
                    <div class="product_blog_img">
                        <img src="images/delicatessen.jpg" alt="#" />
                    </div>
                    <div class="product_blog_cont">
                        <h3>Delicatessen</h3>
                        <h4><span class="theme_color">€</span>10</h4>
                    </div>
                </div>
                <div class="item">
                    <div class="product_blog_img">
                        <img src="images/hot-fever.jpg" alt="#" />
                    </div>
                    <div class="product_blog_cont">
                        <h3>Hot Fever</h3>
                        <h4><span class="theme_color">€</span>20</h4>
                    </div>
                </div>
                <div class="item">
                    <div class="product_blog_img">
                        <img src="images/merguez.jpg" alt="#" />
                    </div>
                    <div class="product_blog_cont">
                        <h3>Merguez</h3>
                        <h4><span class="theme_color">€</span>30</h4>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
</div>
</section>


    <!-- footer -->
    <fooetr>
        <div class="footer">
            <div class="container-fluid">
                <div class="row">
                  <div class=" col-md-12">
                    <h2>Request  A<strong class="white"> Call  Back</strong></h2>
                  </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                      
                        <form class="main_form">
                            <div class="row">
                             
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <input class="form-control" placeholder="Name" type="text" name="Name">
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <input class="form-control" placeholder="Email" type="text" name="Email">
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <input class="form-control" placeholder="Phone" type="text" name="Phone">
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <textarea class="textarea" placeholder="Message" type="text" name="Message"></textarea>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <button class="send">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="img-box">
                            <figure><img src="images/img.jpg" alt="img" /></figure>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="footer_logo">
                          <a href="index.php"><img src="images/title.png" alt="logo" /></a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <ul class="lik">
                            <li > <a href="index.php">Home</a></li>
                            <li> <a href="about.php">About</a></li>
                            <li class="active"> <a href="recipe.php">Recipe</a></li>
                            <li> <a href="blog.php">News</a></li>
                            <li> <a href="contact.php">Contact us</a></li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <div class="new">
                            <h3>Newsletter</h3>
                            <form class="newtetter">
                                <input class="tetter" placeholder="Your email" type="text" name="Your email">
                                <button class="submit">Subscribe</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <div class="container">
                    <p>© 2021 All Rights Reserved. Design by<a href="https://html.design/"> Gauss Tech Inc.</a></p>
                </div>
            </div>
        </div>
    </fooetr>
    <!-- end footer -->

    </div>
    </div>
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

</body>

</html>