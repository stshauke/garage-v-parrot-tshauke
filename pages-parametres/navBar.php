
<?php
//Démarrer les sessions
//Démarrer la session si elle n'est pas démarrée
if(session_status()===PHP_SESSION_NONE){
    session_start(); 
 }
// Récupération du nom de la page courante pour appliquer la classe 'active' :
  $page_courante = basename($_SERVER['PHP_SELF']);
?>

    <!-- Topbar Start -->
    <div class="container-fluid bg-light p-0">
        <div class="row gx-0 d-none d-lg-flex">
            <div class="col-lg-7 px-5 text-start">
                <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                    <small class="fa fa-map-marker text-primary me-2"></small>
                    <small>2 rue de l'aqueduc, 93100 Montreuil, FRANCE</small>
                </div>
                <div class="h-100 d-inline-flex align-items-center py-3">
                    <small class="far fa-clock text-primary me-2"></small>
                    <small>Lundi - Vendredi : 09:00 - 21:00</small>
                </div>
            </div>
            <div class="col-lg-5 px-5 text-end">
                <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                    <small class="fa fa-phone text-primary me-2"></small>
                    <small>+33 7 49 98 67 XX</small>
                </div>
                <div class="h-100 d-inline-flex align-items-center">
                    <a class="btn btn-sm-square bg-white text-primary me-1" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-sm-square bg-white text-primary me-1" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-sm-square bg-white text-primary me-1" href=""><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-sm-square bg-white text-primary me-0" href=""><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start --> 
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="../index.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
        <img  src="../img/logo.jpg"  class="img-fluid" alt="logo garage-v-parrot">
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
       
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="../index.php" class="nav-item nav-link <?php echo ($page_courante == 'index.php') ? 'active' : ''; ?>">Accueil</a>
                <a href="../pages/service.php" class="nav-item nav-link <?php echo ($page_courante == 'service.php') ? 'active' : ''; ?>">Services</a>
                <a href="../pages/voitures.php" class="nav-item nav-link <?php echo ($page_courante == 'voitures.php') ? 'active' : ''; ?>">Nos voitures</a>
                <a href="../pages/avis.php" class="nav-item nav-link <?php echo ($page_courante == 'avis.php') ? 'active' : ''; ?>">Avis</a>
                <a href="../pages/contact.php" class="nav-item nav-link <?php echo ($page_courante == 'contact.php') ? 'active' : ''; ?>">Contact</a>
            </div>
           <?php
           //Vérification de l'existence et de la non-vacuité (non vide) des variables de session
                if(isset($_SESSION['roleUtilisateur']) && !empty($_SESSION['roleUtilisateur'])
                && isset($_SESSION['nomUtilisateur']) && !empty($_SESSION['nomUtilisateur'])
                ){
                ?>
                <!-- Si les variables session existent et non vides, afficher le lien vers l'administration -->
                <div class="d-flex flex-column align-items-center align-items-stretch">
                        <a href="../pages/espace_administration.php" class="btn btn-primary d-none d-lg-block text-center">
                            <div class="d-flex align-items-center">
                                <i class="fa fa-user-circle-o fa-3x me-3 mt-2"></i>
                                <div><?php echo $_SESSION['nomUtilisateur'];?></div>
                            </div>
                        </a>
                    </div>
                    <a href="../connexion/logout.php" class="btn btn-primary">
                    <i class="fa fa-sign-out fa-4x" aria-hidden="true"></i></a> 
                <?php
                }else{
                ?>
                <!--Si les variables de session n'existent pas ou n'existent pas on doit afficher le lien vers la page de connexion-->
                    <a href="../connexion/login.php" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Espace Pro.<i class="fa fa-arrow-right ms-3"></i></a>
                <?php

                }

            ?>  
        </div>
    </nav>
    <!-- Navbar End -->



 