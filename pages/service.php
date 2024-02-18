<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" rel="stylesheet">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>




<?php
require_once '../pages-parametres/header.php';


//Démarrer la session si elle n'est pas démarrée
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<style>
    .breadcrumb {
        background-color: transparent;
    }
</style>



<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 p-0" style="background-image: url(img/carousel-bg-2.jpg);">
    <div class="container-fluid page-header-inner py-5">
        <div class="container text-center">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Services</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="../index.php">Accueil</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Services</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Service Start -->
<div class="container-xxl service py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="text-primary text-uppercase">// Nos Services //</h6>
            <h1 class="mb-5">Découvrez nos services</h1>
        </div>
        <div class="row g-4 wow fadeInUp ml-5" data-wow-delay="0.3s" style="justify-content: center;">
            <?php
            require_once 'charger_service.php';
            ?>




            <section class="pt-5 pb-5" style="border-radius: 1rem;box-shadow: 0px 1rem 0.5rem rgba(216, 19, 36, 0.5);">
                <div class="container">
                    <div class="row">
                        <div class="col-6">
                            <h3 class="mb-3">Nos Services </h3>
                        </div>
                        <div class="col-6 text-right">
                            <a class="btn btn-primary mb-3 mr-1" href="#nos_services" role="button" data-slide="prev">
                                <i class="fa fa-arrow-left"></i>
                            </a>
                            <a class="btn btn-primary mb-3 " href="#nos_services" role="button" data-slide="next">
                                <i class="fa fa-arrow-right"></i>
                            </a>
                        </div>

                        <div class="col-12">
                            <div id="nos_services" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <?php
                                    // Déclarer une variable pour l'utiliser au niveau des cards (multiple de 3)
                                    $rowCount = 0;

                                    // Parcourir les lignes récupérées de la base de données
                                    foreach ($row as $service) {
                                        // Tester si le nombre des enregistrements est divisible par 3 pour l'adapter au nombre des
                                        // card au niveau du carousel
                                        if ($rowCount % 3 == 0) {
                                            // Si c'est la première vague de trois cartes, on applique la classe active à cette vague (3 cartes)
                                            $activeClass = ($rowCount == 0) ? 'active' : '';
                                            // Afficher l'élément du carousel
                                            echo '<div class="carousel-item ' . $activeClass . '"><div class="row">';
                                        }
                                    ?>
                                        <div class="col-md-4 mb-3">
                                            <div class="card border-danger" style="max-height: 800px;min-height: 800px; overflow: hidden;border-radius:6px;">
                                                <!-- Afficher l'image du service -->
                                                <img class="img-fluid" alt="100%x280" src="../img/<?php echo $service['image_service']; ?>">
                                                <div class="card-body">
                                                    <!-- Afficher les noms du service -->
                                                    <h4 class="card-title"><?php echo $service['nom_service']; ?></h4>
                                                    <!-- Afficher la description du service avec points de suspension -->
                                                    <p class="card-text" style="overflow: hidden; text-overflow: ellipsis;"><?php echo $service['description_service']; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                        if ($rowCount % 3 == 2 || $rowCount == count($row) - 1) {
                                            echo '</div></div>';
                                        }
                                        $rowCount++;
                                    }
                                    ?>
                                </div>

                                <!-- Add carousel controls here if needed -->
                            </div>

                        </div>
                    </div>
            </section>


            <!-------Ajout------->
            <!-- Masquer la section ajout de service pour tous les utilisateurs sauf Administrateur -->
            <?php if (isset($_SESSION['roleUtilisateur']) && $_SESSION['roleUtilisateur'] == 'Admin') { ?>

                <section class="pt-5 pb-5" style="border-radius: 1rem;box-shadow: 0px 1rem 0.5rem rgba(216, 19, 36, 0.5);">
                    <div class="container mt-n1">
                        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                            <h1 class="mb-5">Gérer vos services</h1>
                        </div>
                        <?php
                        // Afficher les messages s'ils existent
                        if (isset($_SESSION['success_message']) && !empty($_SESSION['success_message'])) {
                            echo '<div class="alert alert-success">' . $_SESSION['success_message'] . '</div>';
                            // Supprimer le message pour qu'il ne s'affiche pas à nouveau
                            unset($_SESSION['success_message']);
                        }

                        if (isset($_SESSION['error_message']) && !empty($_SESSION['error_message'])) {
                            echo '<div class="alert alert-danger">' . $_SESSION['error_message'] . '</div>';
                            // Supprimer le message pour qu'il ne s'affiche pas à nouveau
                            unset($_SESSION['error_message']);
                        }
                        ?>
                        <!-- L'attribut enctype du formulaire pour spécifier comment les données doivent être codées 
                avant d'être envoyées au serveur lors de la soumissiondu formulaire 
                la valeur "multipart/form-data" est l'une des valeurs possible de l'enctype -->
                        <form action="generer_service.php" method="post" enctype="multipart/form-data">
                            <!-- Nom du Service -->
                            <div class="mb-3">
                                <label for="nomService" class="form-label">Nom du Service :</label>
                                <input type="text" class="form-control" id="nomService" name="nomService" required>
                            </div>
                            <!-- Description du Service -->
                            <div class="mb-3">
                                <label for="descriptionService" class="form-label">Description du Service :</label>
                                <textarea class="form-control" id="descriptionService" name="descriptionService" rows="3" required></textarea>
                            </div>
                            <!-- Image du Service -->
                            <div class="mb-3">
                                <label for="imageService" class="form-label">Choisir une image :</label>
                                <input type="file" class="form-control" id="imageService" name="imageService" accept="image/*" required>
                            </div>
                            <!-- Bouton Submit -->
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Ajouter un service</button>
                            </div>
                        </form>
                    </div>
                </section>
            <?php
            }
            ?>
            <!-------------->


            <!-- Testimonial Start -->
            <section class="pt-5 pb-5" style="border-radius: 1rem;box-shadow: 0px 1rem 0.5rem rgba(216, 19, 36, 0.5);">

                <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="container">
                        <div class="text-center">
                            <h6 class="text-primary text-uppercase">//TÉMOIGNAGE //</h6>
                            <h1 class="mb-5">Nos Clients Disent!</h1>
                        </div>

                        <div class="owl-carousel testimonial-carousel position-relative">

                            <?php
                            // Traitement des avis des clients
                            $statement_avis = $pdo->prepare("select * from avis where valider_avis=1");
                            $statement_avis->execute();
                            // Récupération des résultats de la requête
                            $row_avis = $statement_avis->fetchAll(PDO::FETCH_ASSOC);
                            // Parcourir les lignes récupérées de la base de données de la table avis
                            foreach ($row_avis as $avis) {
                            ?>
                                <div class="testimonial-item text-center">
                                    <img class="bg-light rounded-circle p-2 mx-auto mb-3" src="../img/<?php echo $avis['image_avis']; ?>" style="width: 80px; height: 80px;">
                                    <h5 class="mb-0"><?php echo $avis['nom_avis']; ?></h5>
                                    <p><?php echo $avis['profession_avis']; ?></p>
                                    <div class="testimonial-text bg-light text-center p-4">
                                        <p class="mb-0"><?php echo $avis['message_avis']; ?></p>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>

        </div>
    </div>
</div>
</div>

<!-- Testimonial End -->
<?php
require_once '../pages-parametres/footer.php';
?>