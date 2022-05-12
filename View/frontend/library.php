<?php
	include 'C:/xampp/htdocs/bib_ryh/Controller/categorieC.php';
    $categorie=null;
	$categorieC=new categorieC();
	$listecategorie=$categorieC->affichercategorie(); 
    $livre=null;
	$livreC=new livreC();
	$listelivre=$livreC->afficherlivre(); 



?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="DJoz Template">
    <meta name="keywords" content="DJoz, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>The Controller</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/barfiller.css" type="text/css">
    <link rel="stylesheet" href="css/nowfont.css" type="text/css">
    <link rel="stylesheet" href="css/rockville.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header header--normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-2">
                    <div class="header__logo">
                        <a href="./index.html"><img src="img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-10 col-md-10">
                    <div class="header__nav">
                        <nav class="header__menu mobile-menu">
                            <ul>
                                <li><a href="./index.html">Home</a></li>
                                <li class="active"><a href="./library.html">Library</a></li>
                                <li><a href="./cinema.html">Cinema</a></li>
                                <li><a href="./events.html">Events</a></li>
                                <li><a href="./orders.html">Orders</a></li>
                                <li><a href="./complaints.html">Complaints</a>
                                </li>
                                <li><a href="./contact.html">Contact</a></li>
                            </ul>
                        </nav>
                        <div class="header__right__social">
                            <a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a>
                            <a href="https://twitter.com/"><i class="fa fa-twitter"></i></a>
                            <a href="https://www.instagram.com/"><i class="fa fa-instagram"></i></a>
                            <a href="https://www.canva.com/design/DAE6x9Ra-E0/1JhAjvXj_m19Hf2s4UGNWg/edit/"><i class="fa fa-dribbble"></i></a>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="#"><i class="fa fa-home"></i> Home</a>
                        <span>Library</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->
    <!-- Discography Section Begin -->
   

    <!-- Event Section Begin -->
    <section class="event spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                <div class="section-title">
                        <h1>CATEGORIES<h1>
                        <h2>CATEGORIES</h2>
                        
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="event__slider owl-carousel">
                <?php
foreach($listecategorie as $categorie){
?> 
                    <div class="col-lg-4">
                        <div class="event__item">
                            <div class="event__item__pic" >
                            <form action="filtre.php" method="post">
                            <input type="hidden" name="id_categorie"  value="<?php echo $categorie['id_categorie'] ?>">
                                <div class="tag-date">
                                    <span><?php echo $categorie['nom_categorie']; ?></a></span>
                                </div>
                                <button style="color: transparent; background-color: transparent; border-color: transparent; " type="submit"> <?php echo'<img src="../backend/assets/img/categorie/'.$categorie['image_categorie'].'"width="100;" height="350" alt="Image">'  ?>
                                </button>
                            </div>
                            <div class="event__item__text">
                                <h4>READ BOOKS</h4>
                            </div>
                            </form>
                        </div>
                    </div>
                    <?php
}
?>
                   
                </div>

            </div>
        </div>
        </section>
    <section class="discography spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title center-title">
                        <h2>THE BOOKS</h2>
                        <h1>THE BOOKS</h1>
                    </div>
                </div>
            </div>
            <?php
                                            $bdd= new PDO('mysql:host=localhost;dbname=ctrl;charset=utf8','root','');
                                            $userParPage =2;
                                            $userTotalReq=$bdd->query('SELECT id_livre FROM livre');
                                            $userTotal=$userTotalReq->rowCount();
                                            $pagesTotales=ceil($userTotal/$userParPage);
                                            if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page']<= $pagesTotales){
                                            $_GET['page']=intval($_GET['page']);
                                            $pageCourante=$_GET['page'];
                                            }else{
                                                $pageCourante=1;
                                            }
                                            
                                            $depart=($pageCourante-1)*$userParPage;
                                            
                                            ?>
            <div class="row">
            <?php
            $listelivre=$bdd->query('SELECT * FROM livre ORDER BY titre_livre ASC LIMIT '.$depart.','.$userParPage);
            foreach($listelivre as $livre){
            ?> 

                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="discography__item">
                        <div class="discography__item__pic">
                        <?php echo'<img src="../backend/assets/img/'.$livre['image_livre'].'"width="100;" height="400" alt="Image">'  ?>
                        </div>
                        <div class="discography__item__text">
                            <h2><?php echo $livre['titre_livre'] ?></h2>
                        </div>
                        <div class="discography__item__text">
                            <h4><?php echo $livre['description_livre'] ?></h4>
                        </div>
                    </div>                    
                    <p class="button text-center"><a href="../backend/assets/livrePDF/<?php echo $livre['pdf_livre']; ?>" class="btn btn-tertiary px-4 py-3">Lire</a></p>
                    <?php echo'<audio controls> <source src="../backend/assets/music-files/'.$livre['audio_livre'].'"> type="audio/mpeg"></audio>'  ?>
                    </div>
                    <div class="discography__item__pic">
                    <?php echo'<img src="../backend/assets/img/qrcodes/'.$livre['QR_code'].'"width="100;" height="100" alt="Image">'  ?>
                    </div>
                  
                <?php
}
?>
                <
                        <?php
                     
                        ?>
                    <
            </div>
        </div>
    </section>
    
<center>
        <div id="pagination" class="pagination__links">
                                                    <?php 
        for($i=1;$i<=$pagesTotales;$i++){
            if($i == $pageCourante){
            echo $i.' ';
            }else{
            echo '<a href="library.php?page='.$i.'">'.$i.'</a> ';
        }
    }

        ?>
                </div>
                </center>
    <!-- Discography Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer footer--normal spad set-bg" data-setbg="img/footer-bg.png">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footer__address">
                        <ul>
                            <li>
                                <i class="fa fa-phone"></i>
                                <p>Phone</p>
                                <h6>58-519-140</h6>
                            </li>
                            <li>
                                <i class="fa fa-envelope"></i>
                                <p>Email</p>
                                <h6>thecontroller@esprit.tn</h6>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 offset-lg-1 col-md-6">
                    <div class="footer__social">
                        <h2>The Controller</h2>
                        <div class="footer__social__links">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-dribbble"></i></a>
                            
                        </div>
                        <script type="text/javascript">
                        function googleTranslateElementInit() {
                        new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
                        }
                        </script>

                    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script></li>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1 col-md-6">
                    <div class="footer__newslatter">
                        <h4>Traduction here</h4>
                        <ul class="submenu">
                                                    <li id="google_translate_element"></li>
                                                   
                                                </ul>
                        <!--<form action="#">
                            <input type="text" placeholder="Email">
                            <button type="submit"><i class="fa fa-send-o"></i></button>
                        </form> -->
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/jquery.barfiller.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>

    <!-- Music Plugin -->
    <script src="js/jquery.jplayer.min.js"></script>
    <script src="js/jplayerInit.js"></script>
</body>

</html>