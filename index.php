<?php
//Appeler la page header archivée  dans le dossier pages-parametres-index
// La page header pour la page index doive contenir une autre page qui est la ge carousel.php
require('pages-parametres-index/header.php');
$_session_destroy;
?>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Service Start -->
<?php
//Appeler la page connexion.php
require('connexion/connexion.php');

// Préparation et exécution de la requête SQL pour vérifier l'authentification, aussi on a ajouté
// le role,prenomUtil,nomUtil pour les mettres dans des sessions
$statement = $pdo->prepare("select * from services");
$statement->execute();
// Récupération des résultats de la requête
$row = $statement->fetchAll(PDO::FETCH_ASSOC);

// Traitement des avis des clients
$statement_avis = $pdo->prepare("select * from avis where valider_avis=1");
$statement_avis->execute();
// Récupération des résultats de la requête
$row_avis = $statement_avis->fetchAll(PDO::FETCH_ASSOC);

// Traitement des voitures d'occasion
$statement_voiture = $pdo->prepare("select * from voitures");
$statement_voiture->execute();
// Récupération des résultats de la requête
$row_voiture = $statement_voiture->fetchAll(PDO::FETCH_ASSOC);

// Traitement des techniciens
$statement_techniciens = $pdo->prepare("SELECT * FROM techniciens");
$statement_techniciens->execute();
// Récupération des résultats de la requête
$row_techniciens = $statement_techniciens->fetchAll(PDO::FETCH_ASSOC);


?>


<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="d-flex py-5 px-4">
                    <i class="fa fa-certificate fa-3x text-primary flex-shrink-0"></i>
                    <div class="ps-4">
                        <h5 class="mb-3">Service de qualité</h5>
                        <p>Nous vous offrons un service de la plus très grande qualité</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="d-flex bg-light py-5 px-4">
                    <i class="fa fa-users fa-3x text-primary flex-shrink-0"></i>
                    <div class="ps-4">
                        <h5 class="mb-3">Travailleurs experts</h5>
                        <p>Nos travailleurs sont des experts dans nos differents services</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="d-flex py-5 px-4">
                    <i class="fas fa-tools fa-3x text-primary flex-shrink-0"></i>
                    <div class="ps-4">
                        <h5 class="mb-3">Équipement moderne</h5>
                        <p>Nous avons des équipements moderne à la pointe de la technologie</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Service End -->


<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 pt-4" style="min-height: 400px;">
                <div class="position-relative h-100 wow fadeIn" data-wow-delay="0.1s">
                    <img class="position-absolute img-fluid w-100 h-100" src="img/about.jpg" style="object-fit: cover;"
                        alt="">
                    <div class="position-absolute top-0 end-0 mt-n4 me-n4 py-4 px-5"
                        style="background: rgba(0, 0, 0, .08);">
                        <h1 class="display-4 text-white mb-0">15 <span class="fs-4">ans</span></h1>
                        <h4 class="text-white">d'Expérience</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <h6 class="text-primary text-uppercase">// À PROPOS DE NOUS //</h6>
                <h1 class="mb-4"><span class="text-primary">Garage V.Parrot</span> est le meilleur endroit pour vos soins automobiles</h1>
                <p class="mb-4">Pour vous laisser vous occuper de votre véhicule dans les meilleures conditions, nous avons conçu une 
                    charte de qualité  permettant de vous certifier l'exactitude du prix et la qualité de la main d'œuvre.</p>
                <div class="row g-4 mb-3 pb-3">
                    <div class="col-12 wow fadeIn" data-wow-delay="0.1s">
                        <div class="d-flex">
                            <div class="bg-light d-flex flex-shrink-0 align-items-center justify-content-center mt-1"
                                style="width: 45px; height: 45px;">
                                <span class="fw-bold text-secondary">01</span>
                            </div>
                            <div class="ps-3">
                                <h6>Professionnel & Expert</h6>
                                <span>Nos professionnels sont des experts dans tout les services</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 wow fadeIn" data-wow-delay="0.3s">
                        <div class="d-flex">
                            <div class="bg-light d-flex flex-shrink-0 align-items-center justify-content-center mt-1"
                                style="width: 45px; height: 45px;">
                                <span class="fw-bold text-secondary">02</span>
                            </div>
                            <div class="ps-3">
                                <h6>Centre de service qualité</h6>
                                <span>Nous disposons d'un centre de soins auto de qualité</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 wow fadeIn" data-wow-delay="0.5s">
                        <div class="d-flex">
                            <div class="bg-light d-flex flex-shrink-0 align-items-center justify-content-center mt-1"
                                style="width: 45px; height: 45px;">
                                <span class="fw-bold text-secondary">03</span>
                            </div>
                            <div class="ps-3">
                                <h6>Travailleurs primés</h6>
                                <span>Nos collaborateurs sont primés par leur service</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->


<!-- Fact Start -->
<div class="container-fluid fact bg-dark my-5 py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.1s">
                <i class="fa fa-check fa-2x text-white mb-3"></i>
                <h2 class="text-white mb-2" data-toggle="counter-up">15</h2>
                <p class="text-white mb-0">Années d'expérience</p>
            </div>
            <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.3s">
                <i class="fa fa-users-cog fa-2x text-white mb-3"></i>
                <h2 class="text-white mb-2" data-toggle="counter-up">12</h2>
                <p class="text-white mb-0">Techniciens experts</p>
            </div>
            <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.5s">
                <i class="fa fa-users fa-2x text-white mb-3"></i>
                <h2 class="text-white mb-2" data-toggle="counter-up">5294</h2>
                <p class="text-white mb-0">Clients satisfaits</p>
            </div>
            <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.7s">
                <i class="fa fa-car fa-2x text-white mb-3"></i>
                <h2 class="text-white mb-2" data-toggle="counter-up">1234</h2>
                <p class="text-white mb-0">Projets complets</p>
            </div>
        </div>
    </div>
</div>
<!-- Fact End -->


<!-- Service Start -->
<section class="pt-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h3 class="mb-3">Nos Services </h3>
            </div>
            <div class="col-6 d-flex justify-content-end">
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
                                <div class="card border-danger"
                                    style="max-height: 800px;min-height: 800px; overflow: hidden;border-radius:6px;">
                                    <!-- Afficher l'image du service -->
                                    <img class="img-fluid" alt="100%x280"
                                        src="img/<?php echo $service['image_service']; ?>">
                                    <div class="card-body">
                                        <!-- Afficher les noms du service -->
                                        <h4 class="card-title">
                                            <?php echo $service['nom_service']; ?>
                                        </h4>
                                        <!-- Afficher la description du service avec points de suspension -->
                                        <p class="card-text" style="overflow: hidden; text-overflow: ellipsis;">
                                            <?php echo $service['description_service']; ?>
                                        </p>
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
<!-- Service End -->

<!-- CARS  -->
<!-- CARS Start -->
<section class="pt-5 pb-5">
    <div class="container">
        <div class="row">

            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="text-primary text-uppercase">// Voitures //</h6>
                <h1 class="mb-5">NOS VOITURES D'OCCASIONS</h1>
            </div>


            <div class="text-left wow fadeInUp" data-wow-delay="0.1s">
                <p>Dans garage V. Parrot vous allez trouver les meilleurs véhicules d'occasion du marché. Notre équipe
                    fait le meilleur pour vous offrir des voitures avec une garanti unique. Nous proposons un large
                    choix d'annonces de voitures d'occasion et la possibilité d'estimer la valeur de reprise de votre
                    ancien véhicule.</p>
            </div>




            <div class="col-6">
                <h3 class="mb-3"></h3>
            </div>
            <div class="col-6 d-flex justify-content-end">
                <a class="btn btn-primary mb-3 mr-1" href="#nos_voitures" role="button" data-slide="prev">
                    <i class="fa fa-arrow-left"></i>
                </a>
                <a class="btn btn-primary mb-3 " href="#nos_voitures" role="button" data-slide="next">
                    <i class="fa fa-arrow-right"></i>
                </a>
            </div>

            <div class="col-12">
                <div id="nos_voitures" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php
                        // Déclarer une variable pour l'utiliser au niveau des cards (multiple de 3)
                        $rowCount_voiture = 0;
                        // Parcourir les lignes récupérées de la base de données
                        foreach ($row_voiture as $voiture) {
                            // Tester si le nombre des enregistrements est divisible par 3 pour l'adapter au nombre des
                            // card au niveau du carousel
                            if ($rowCount_voiture % 3 == 0) {
                                // Si c'est la première vague de trois cartes, on applique la classe active à cette vague (3 cartes)
                                $activeClass = ($rowCount_voiture == 0) ? 'active' : '';
                                // Afficher l'élément du carousel
                                echo '<div class="carousel-item ' . $activeClass . '"><div class="row">';
                            }
                            ?>
                            <div class="col-md-4 mb-3">
                                <div class="card border-danger"
                                    style="max-height: 550px; min-height: 550px; overflow: hidden; border-radius: 6px;">
                                    <!-- Afficher l'image du service -->
                                    <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light"
                                        data-mdb-ripple-color="light">
                                        <img class="img-fluid" class="w-100"
                                            src="img/voitures/<?php echo $voiture['image_voiture']; ?>"
                                            style="height: 100%; width: 100%; object-fit: cover;">
                                    </div>
                                    <div class="card-body d-flex flex-column align-items-start">
                                        <!-- Afficher les voitures -->
                                        <div class="card-title mb-3">
                                            <h5 style="display: inline;">
                                                <?php echo $voiture['marque_voiture']; ?> |
                                            </h5>
                                            <p class="text-reset" style="display: inline;"><b>
                                                    <?php echo $voiture['modele_voiture']; ?>
                                                </b></p>
                                        </div>
                                        <p class="text-reset"><b>
                                                <?php echo $voiture['kilometrage_voiture']; ?> Km
                                            </b></p>

                                        <p class="text-reset">
                                            <?php echo $voiture['annee_fabrication_voiture']; ?> (Depuis)
                                        </p>


                                        <!-- Afficher la description du service avec points de suspension -->
                                        <p class="card-text" style="color: grey;font-size: 22px;">
                                            <?php echo number_format($voiture['prix_voiture'], 2, ',', ' '); ?>&euro;
                                        </p>
                                    </div>
                                    <div class="card-footer bg-transparent d-flex justify-content-end">
                                        <a class="btn btn-primary mb-0" href="#nos_voitures" role="button" data-slide="next"
                                            data-bs-toggle="modal" data-bs-target="#affichageDetaiVoiture"
                                            data-id="<?php echo $voiture['id_voiture']; ?>">

                                            Plus d'information <i class="fa fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <?php
                            if ($rowCount_voiture % 3 == 2 || $rowCount_voiture == count($row_voiture) - 1) {
                                echo '</div></div>';
                            }
                            $rowCount_voiture++;
                        }
                        ?>
                    </div>

                    <!-- Add carousel controls here if needed -->
                </div>

            </div>
        </div>
</section>
<!-- Service End -->
<!-- END CARS  -->




<!-- Booking Start -->
<div class="container-fluid bg-secondary booking my-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="row gx-5">
            <div class="col-lg-5">
                <div class="py-5">
                    <h1 class="text-white mb-4">Fournisseur de services de réparation automobile certifié</h1>
                    <p class="text-white mb-0">Le garage V.Parrot se spécialise dans l’entretien et la réparation de
                        tous types de véhicules. Notre expertise s’étend à l’installation de systèmes de dépollution
                        pour une gamme diversifiée de véhicules, tant pour les particuliers que pour les professionnels.
                    </p>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="bg-primary h-100 d-flex flex-column justify-content-center text-center p-5 wow zoomIn"
                    data-wow-delay="0.6s">
                    <h1 class="text-white mb-4">Réserver pour un service</h1>
                    <form id="reservationForm">
                        <div class="row g-3">
                            <div class="col-12 col-sm-6">
                                <input type="text" class="form-control border-0" placeholder="Votre nom" name="nom"
                                    style="height: 55px;">
                            </div>
                            <div class="col-12 col-sm-6">
                                <input type="email" class="form-control border-0" placeholder="Votre email" name="email"
                                    style="height: 55px;">
                            </div>
                            <div class="col-12 col-sm-6">
                                <select class="form-select border-0" style="height: 55px;" name="id_service">
                                    <option selected>Selectionnez un service</option>
                                    <?php
                                    // pour afficher toutes les service parcourir la base de données
                                    foreach ($row as $nom_service) {
                                        // Afficher l'Id et le nom du service
                                        ?>
                                        <option value="<?php echo $nom_service['id_service']; ?>">
                                            <?php echo $nom_service['nom_service']; ?>
                                        </option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-12 col-sm-6">
                            <div class="date" id="date1" data-target-input="nearest" style="position: relative;">
    <input type="text" class="form-control border-0 datetimepicker-input" name="date_service"
           placeholder="Date du service" data-target="#date1" data-toggle="datetimepicker"
           style="height: 55px;">
</div>

                            </div>
                            <div class="col-12">
                                <textarea class="form-control border-0" placeholder="Demande spéciale" name="demande_speciale">R.A.S</textarea>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-secondary w-100 py-3" type="submit">Réserver maintenant</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Booking End -->


<!-- Team Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="text-primary text-uppercase">// Nos techniciens //</h6>
            <h1 class="mb-5">Nos techniciens experts</h1>
        </div>


        <div class="row g-4">
            <?php
            foreach ($row_techniciens as $techniciens) {
                ?>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="img/<?php echo $techniciens['image_technicien']; ?>" alt="">
                            <div class="team-overlay position-absolute start-0 top-0 w-100 h-100">
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="bg-light text-center p-4">
                            <h5 class="fw-bold mb-0">
                                <?php echo $techniciens['nom_technicien']; ?>
                            </h5>
                            <small>
                                <?php echo $techniciens['specialite_technicien']; ?>
                            </small>
                        </div>
                    </div>
                </div>

                <?php
            }
            ?>


        </div>
    </div>
</div>
<!-- Team End -->


<!-- Testimonial Start -->
<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">





        <div class="text-center">
            <h6 class="text-primary text-uppercase">// TÉMOIGNAGE //</h6>
            <h1 class="mb-5">Nos clients disent !</h1>
        </div>
        <div class="owl-carousel testimonial-carousel position-relative">
            <?php
            // Parcourir les lignes récupérées de la base de données de la table avis
            foreach ($row_avis as $avis) {
                ?>
                <div class="testimonial-item text-center">
                    <img class="bg-light rounded-circle p-2 mx-auto mb-3" src="img/<?php echo $avis['image_avis']; ?>"
                        style="width: 80px; height: 80px;">
                    <h5 class="mb-0">
                        <?php echo $avis['nom_avis']; ?>
                    </h5>
                    <p>
                        <?php echo $avis['profession_avis']; ?>
                    </p>
                    <div class="testimonial-text bg-light text-center p-4">
                        <p class="mb-0">
                            <?php echo $avis['message_avis']; ?>
                        </p>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>
<!-- Testimonial End -->


<!-- Début Page modal -->
<!-- Modal -->
<div class="modal fade" id="affichageDetaiVoiture" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="affichageDetaiVoitureLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <!-- Ajoutez la classe "modal-lg" pour agrandir la largeur -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="affichageDetaiVoitureLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="resultatsAffichage"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>
<!-- Ajouter le script JavaScript -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Récupérer tous les boutons qui déclenchent le modal
        var buttons = document.querySelectorAll('[data-bs-target="#affichageDetaiVoiture"]');
        // Définir resultatsAffichage à l'extérieur de la fonction success
        var resultatsAffichage = document.getElementById('resultatsAffichage');
        // Ajouter un écouteur d'événements de clic à chaque bouton
        buttons.forEach(function (btn) {
            btn.addEventListener('click', function (event) {
                // Empêcher le comportement par défaut du lien
                event.preventDefault();

                // Récupérer l'ID de la voiture à partir de l'attribut data-id du bouton cliqué
                var voitureId = btn.getAttribute('data-id');

                // Mettre à jour le contenu du modal avec l'ID de la voiture
                var modalTitle = document.querySelector('#affichageDetaiVoitureLabel');
                var modalBody = document.querySelector('#affichageDetaiVoiture.modal-body');

                // Mettre à jour le titre du modal
                modalTitle.innerHTML = 'Détails de la voiture (ID : ' + voitureId + ')';

                // Mettre à jour le corps du modal
                // Vous pouvez charger les détails réels de la voiture ici
                // Pour l'instant, je montre simplement l'ID de la voiture
                //modalBody.innerHTML = 'ID de la voiture : ' + voitureId;
                // Charger les résultats de l'apprenant via AJAX
                $.ajax({
                    url: 'pages/affichage_details_voiture.php',
                    type: 'POST',
                    data: {
                        id_voiture: voitureId
                    },
                    dataType: 'json', // Spécifier le type de données attendu comme JSON
                    success: function (response) {
                        // console.log('Réponse AJAX réussie :', response);
                        // Manipuler les données pour les afficher dans votre page modal

                        resultatsAffichage.innerHTML = ''; // Réinitialiser le contenu de la div

                        // Ajouter le contenu HTML des résultats dans la div
                        var divContent = "";

                        divContent += "<div class='row'>";
                        divContent += "<div class='col-5'>";

                        divContent += "<div class='row'>";
                        divContent += "<div class='col'><strong>ID Voiture</strong></div>";
                        divContent += "<div class='col'>" + (response.id_voiture || '') + "</div>";
                        divContent += "</div>";

                        divContent += "<div class='row'>";
                        divContent += "<div class='col'><strong>Marque</strong></div>";
                        divContent += "<div class='col'>" + (response.marque_voiture || '') + "</div>";
                        divContent += "</div>";

                        divContent += "<div class='row'>";
                        divContent += "<div class='col'><strong>Modèle</strong></div>";
                        divContent += "<div class='col'>" + (response.modele_voiture || '') + "</div>";
                        divContent += "</div>";

                        divContent += "<div class='row'>";
                        divContent += "<div class='col'><strong>Année de fabrication</strong></div>";
                        divContent += "<div class='col'>" + (response.annee_fabrication_voiture || '') + "</div>";
                        divContent += "</div>";
                        divContent += "<div class='row'>";
                        divContent += "<div class='col'><strong>Kilomètrage</strong></div>";
                        divContent += "<div class='col'>" + (response.kilometrage_voiture || '') + "</div>";
                        divContent += "</div>";
                        divContent += "<div class='row'>";
                        divContent += "<div class='col'><strong>Type boite</strong></div>";
                        divContent += "<div class='col'>" + (response.type_boite_voiture || '') + "</div>";
                        divContent += "</div>";
                        divContent += "<div class='row'>";
                        divContent += "<div class='col'><strong>Couleur</strong></div>";
                        divContent += "<div class='col'>" + (response.couleur_voiture || '') + "</div>";
                        divContent += "</div>";
                        divContent += "<div class='row'>";
                        divContent += "<div class='col'><strong>Nombre de porte</strong></div>";
                        divContent += "<div class='col'>" + (response.nombre_porte_voiture || '') + "</div>";
                        divContent += "</div>";
                        divContent += "<div class='row'>";
                        divContent += "<div class='col'><strong>Carburant</strong></div>";
                        divContent += "<div class='col'>" + (response.carburant_voiture || '') + "</div>";
                        divContent += "</div>";
                        divContent += "<div class='row'>";
                        divContent += "<div class='col'><strong>CO2</strong></div>";
                        divContent += "<div class='col'>" + (response.co2_voiture || '') + "</div>";
                        divContent += "</div>";

                        divContent += "</div>";

                        divContent += "<div class='col-7'>";


                        divContent += "<div class='col text-center'><strong>Image de la voiture</strong></div>";
                        divContent += "<div class='row'>";
                        divContent += "<div class='col text-center'><img  id='mainImage' src='img/voitures/" + response.image_voiture + "' alt='Image de la voiture' width='200' height='150'></div>";
                        divContent += "</div>";

                        divContent += "<div class='row'>";
                        divContent += "<div class='col'><img class='thumbnail' src='img/voitures/" + response.image_voiture + "' alt='Image de la voiture'></div>";
                        divContent += "<div class='col'><img class='thumbnail' src='img/voitures/" + response.image_voiture + "' alt='Image de la voiture'></div>";
                        divContent += "<div class='col'><img class='thumbnail' src='img/voitures/" + response.image_voiture + "' alt='Image de la voiture'></div>";

                        divContent += "</div>";


                        divContent += "</div>";
                        divContent += "</div>";
                        // Ajouter le contenu HTML à la div des résultats
                        resultatsAffichage.innerHTML = divContent;
                        //modalBody.innerHTML= divContent;
                        console.log(divContent); // Ajout de ce log pour vérifier le contenu de tableHTML
                    },

                    error: function (xhr, status, error) {
                        // Gérer les erreurs AJAX si nécessaire
                        console.error(error);
                    }
                });
            });
        });
    });
</script>

<!-- Fin Page modal -->
<script>
    // Récupérer toutes les miniatures
    var thumbnails = document.querySelectorAll('.thumbnail');

    // Ajouter un écouteur d'événement sur chaque miniature
    thumbnails.forEach(function (thumbnail) {
        thumbnail.addEventListener('mouseover', function () {
            // Changer l'image principale lors du survol de la miniature
            var mainImage = document.getElementById('mainImage');
            mainImage.src = thumbnail.src;
        });
    });
</script>

<script>
    $(document).ready(function() {
        // Event listener for form submission
        $("#reservationForm").submit(function(event) {
            // Prevent the default form submission
            event.preventDefault();

            // Get form data
            var formData = $("#reservationForm").serialize();

            // Make an AJAX request
            $.ajax({
                type: "POST",
                url: "pages/save_reservation.php", // Replace with your server-side script URL
                data: formData,
                success: function(response) {
                    // Handle the response from the server (e.g., show success message)
                    //console.log(response);
                    alert("Données enregistrées avec succès");
                },
                error: function(error) {
                    // Handle errors (e.g., show error message)
                    //console.error(error);
                    alert("Erreur d'enregistrement des données");
                }
            });
        });
    });
</script>

<?php
//Appeler la page footer.php
require_once 'pages-parametres-index/footer.php';
?>