<?php
require_once '../pages-parametres/header.php';




//Démarrer la session si elle n'est pas démarrée
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
//Appeler la page connexion.php
require('../connexion/connexion.php');

// Traitement des voitures d'occasion
$statement_voiture = $pdo->prepare("select * from voitures");
$statement_voiture->execute();
// Récupération des résultats de la requête
$row_voiture = $statement_voiture->fetchAll(PDO::FETCH_ASSOC);

?>
<!--Plugin CSS file with desired skin-->
<style>
  .lead {
    font-size: 1.5rem;
    font-weight: 300;
  }
</style>
<link rel="stylesheet" href="../css/al-range-slider.css" />
<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 p-0" style="background-image: url(img/carousel-bg-2.jpg);">
  <div class="container-fluid page-header-inner py-5">
    <div class="container text-center">
      <h1 class="display-3 text-white mb-3 animated slideInDown">Nos voitures</h1>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb justify-content-center text-uppercase">
          <li class="breadcrumb-item"><a href="../index.php">Accueil</a></li>
          <li class="breadcrumb-item text-white active" aria-current="page">Voitures</li>
        </ol>
      </nav>
    </div>
  </div>
</div>
<!-- Page Header End -->


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
        <p>Dans garage V. Parrot vous allez trouver les meilleurs véhicules d'occasion du marché. Notre équipe fait le meilleur pour vous offrir des voitures avec une garanti unique. Nous proposons un large choix d'annonces de voitures d'occasion et la possibilité d'estimer la valeur de reprise de votre ancien véhicule.</p>
      </div>
      <!-- Partie début des onglets pour ajouter une voiture en cas un employé est connecté-->
      <!------------Début Tab Bar-------------->

      <?php if (isset($_SESSION['roleUtilisateur']) && $_SESSION['roleUtilisateur'] == 'Employe') {
      ?>
        <nav>
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Voitures disponibles</button>
            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-generer-voiture" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Ajouter une voiture</button>
          </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <!------------Début nav-visiteur-------------->
          <?php } ?>
          <!-- Début affichage pour un visiteur  -->
          <div class="col-6">
            <h3 class="mb-3"></h3>
          </div>
          <div class="row">
            <div class="col-md-4">
              <!-- Début Filtre -->
              <h5>Quel est votre budget</h5>
              <div class="js-example-class"></div>
              <!-- Fin Filtre -->
            </div>
            <div class="col-md-8">
              <!-- Début card -->
              <div class="resultats-voitures"></div>
              <!-- Fin card -->
            </div>
          </div>
          <!--Fin affichage pour un visiteur  -->
         
          <?php if (isset($_SESSION['roleUtilisateur']) && $_SESSION['roleUtilisateur'] == 'Employe') {
          ?>
           </div>
            <div class="tab-pane fade" id="nav-generer-voiture" role="tabpanel" aria-labelledby="nav-generer-voiture-tab">
              <!------------Début nav-generer-voiture-------------->

              <div class="row">
                            <div class="col-md-12">
                                <div id="messageContainerAjout" class="alert alert-success" role="alert">
                                </div>
                                
                                     <form method="post" id="ajoutVoiture">
                                        <div class="row g-3">
                                            <div class="col-md-3">
                                                <div class="form-floating">                                                    
                                                    <input type="text" name="txtModeleVoiture" class="form-control" id="modeleVoiture" placeholder="Le modèle" value="">
                                                    <label for="modele">Le modèle</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-floating">                                                    
                                                    <input type="text" name="txtMarqueVoiture" class="form-control" id="marqueVoiture" placeholder="La marque" value="">
                                                    <label for="marque">La marque</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-floating">                                                    
                                                    <input type="text" name="txtAnneeVoiture" class="form-control" id="anneeVoiture" placeholder="L'année" value="">
                                                    <label for="annee">L'année</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-floating">                                                    
                                                    <input type="text" name="txtKilomètrageVoiture" class="form-control" id="kilometrageVoiture" placeholder="Kilomètrage" value="">
                                                    <label for="kilometrage">Kilomètrage</label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-floating">
                                                    <input type="email" name="txtEmail" class="form-control" id="emailEmploye" placeholder="L'email de l'Employé" value="">
                                                    <label for="email">L'Email de l'Employé</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-floating">
                                                    <select name="selectSexeEmploye" class="custom-select form-control" id="inlineFormCustomSelectEmploye" style="background-color:white;">
                                                        <option selected>Choisir votre sexe...</option>
                                                        <option value="1" <?php if ($row[0]['sexeUtil'] == 'Homme') {
                                                                                echo 'selected';
                                                                            } ?>>Homme</option>
                                                        <option value="2" <?php if ($row[0]['sexeUtil'] == 'Femme') {
                                                                                echo 'selected';
                                                                            } ?>>Femme</option>
                                                    </select>
                                                    <label for="inlineFormCustomSelect">Le Sexe de l'Employé</label>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-floating position-relative">
                                                    <input type="password" name="txtPasswordEmploye" class="form-control" id="passwordEmploye" placeholder="Le mot de passe Employé" value="<?php echo $row[0]['password']; ?>">
                                                    <i class="bi bi-eye-slash-fill toggle-password-icon text-primary" id="togglePassword" onclick="togglePasswordVisibility()"></i>
                                                    <label for="password">Le mot de passe Employé</label>
                                                </div>


                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="password" name="txtRepeatPasswordEmploye" class="form-control" id="retapezPasswordEmploye" placeholder="Retapez le mot de passe Employé" value="">
                                                    <i id="togglePassword"></i>
                                                    <label for="name">Retaper le mot de passe Employé</label>
                                                </div>
                                            </div>
                                            <?php if (isset($_SESSION['roleUtilisateur']) && $_SESSION['roleUtilisateur'] == 'Employe') {
                                            ?>
                                                <div class="col-12">
                                                    <button class="btn btn-primary w-100 py-3" name="btnmodifierEmploye" id="btnModifierEmploye" type="submit">Ajouter un employé</button>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </form>
                                
                            </div>
                        </div>


              <!------------Fin nav-generer-voiture-------------->
            </div>
            </div>
          <?php } ?>
        

        <!------------Fin Tab Bar-------------->




    </div>

  </div>

  </div>
  </div>
</section>

<!-- END CARS  -->
<!-- Début Page modal -->
<!-- Modal -->
<div class="modal fade" id="affichageDetaiVoiture" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="affichageDetaiVoitureLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg"> <!-- Ajoutez la classe "modal-lg" pour agrandir la largeur -->
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
  document.addEventListener('DOMContentLoaded', function() {
    // Récupérer tous les boutons qui déclenchent le modal
    var buttons = document.querySelectorAll('[data-bs-target="#affichageDetaiVoiture"]');
    // Définir resultatsAffichage à l'extérieur de la fonction success
    var resultatsAffichage = document.getElementById('resultatsAffichage');
    // Ajouter un écouteur d'événements de clic à chaque bouton
    buttons.forEach(function(btn) {
      btn.addEventListener('click', function(event) {
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
          url: 'affichage_details_voiture.php',
          type: 'POST',
          data: {
            id_voiture: voitureId
          },
          dataType: 'json', // Spécifier le type de données attendu comme JSON
          success: function(response) {
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
            divContent += "<div class='col text-center'><img  id='mainImage' src='/Garage_V_Parrot/img/voitures/" + response.image_voiture + "' alt='Image de la voiture' width='200' height='150'></div>";
            divContent += "</div>";

            divContent += "<div class='row'>";
            divContent += "<div class='col'><img class='thumbnail' src='/Garage_V_Parrot/img/voitures/" + response.image_voiture + "' alt='Image de la voiture'></div>";
            divContent += "<div class='col'><img class='thumbnail' src='/Garage_V_Parrot/img/voitures/" + response.image_voiture + "' alt='Image de la voiture'></div>";
            divContent += "<div class='col'><img class='thumbnail' src='/Garage_V_Parrot/img/voitures/" + response.image_voiture + "' alt='Image de la voiture'></div>";

            divContent += "</div>";


            divContent += "</div>";
            divContent += "</div>";
            // Ajouter le contenu HTML à la div des résultats
            resultatsAffichage.innerHTML = divContent;
            //modalBody.innerHTML= divContent;
            console.log(divContent); // Ajout de ce log pour vérifier le contenu de tableHTML
          },

          error: function(xhr, status, error) {
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
  thumbnails.forEach(function(thumbnail) {
    thumbnail.addEventListener('mouseover', function() {
      // Changer l'image principale lors du survol de la miniature
      var mainImage = document.getElementById('mainImage');
      mainImage.src = thumbnail.src;
    });
  });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../js/al-range-slider.js"></script>
<script>
  <?php
  $sql = "SELECT MIN(prix_voiture) as minPrice, MAX(prix_voiture) as maxPrice FROM voitures";
  $statement_voiture = $pdo->prepare($sql);
  $statement_voiture->execute();

  // Récupération des résultats de la requête
  $row_prix_voiture = $statement_voiture->fetch(PDO::FETCH_ASSOC);
  ?>
  // Utilisation des valeurs minimales et maximales pour initialiser le slider
  // Initialisation du slider avec des options
  const options = {
    range: {
      min: <?php echo $row_prix_voiture['minPrice']; ?>,
      max: <?php echo $row_prix_voiture['maxPrice']; ?>,
      step: 1000
    },
    initialSelectedValues: {
      from: <?php echo $row_prix_voiture['minPrice']; ?>,
      to: <?php echo $row_prix_voiture['maxPrice']; ?>
    },
    grid: {
      minTicksStep: 1,
      marksStep: 5
    },
    theme: "dark",
    // onChange est événement utilisé dans le contexte des interfaces utilisateur 
    // Il se réfère à une fonction ou à une action qui est déclanchée lorsque
    //la valeur d'un élément change et dans notre cas nous l'utilise pour détecter
    // le changement des valeurs de notre Slider
    onChange: (state) => {
      // Récupération des valeurs du slider
      const selectedValues = state.selectedValues;

      // Utilisation des valeurs du slider comme vous le souhaitez
      const fromValue = selectedValues.from;
      const toValue = selectedValues.to;

      // Affichage des valeurs dans la console (vous pouvez faire autre chose avec ces valeurs)
      //console.log('Valeur "from" du slider :', fromValue);
      //console.log('Valeur "to" du slider :', toValue);
      // Envoi des valeurs au serveur via Ajax
      $.ajax({
        url: 'recuperer_liste_voitures.php',
        method: 'POST',
        data: {
          minPrice: fromValue,
          maxPrice: toValue
          // Ajoutez d'autres paramètres si nécessaire
        },
        success: function(data) {
          // Parsez les résultats JSON (assurez-vous que le serveur renvoie des données JSON)
          const nouvellesVoitures = JSON.parse(data);

          // Sélectionnez l'élément où vous souhaitez afficher les voitures (à ajuster en fonction de votre structure HTML)
          const containerVoitures = $('.resultats-voitures');

          // Effacez le contenu précédent
          containerVoitures.empty();


          // Parcourez les nouvelles voitures et ajoutez-les au conteneur
          nouvellesVoitures.forEach((voiture, i) => {
            // Construisez le HTML pour une voiture en utilisant les données de la voiture actuelle
            const htmlVoiture = `
    <div class="col-md-6 mb-3 ${i % 2 === 0 ? 'even' : 'odd'}">
      <div class="card border-danger" style="max-height: 550px; min-height: 550px; overflow: hidden; border-radius: 6px;">
        <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light">
          <img class="img-fluid w-100" src="../img/voitures/${voiture.image_voiture}" style="height: 100%; width: 100%; object-fit: cover;">
        </div>
        <div class="card-body d-flex flex-column align-items-start">
        <div class="card-title mb-3">
          <h5 style="display: inline;">${voiture.marque_voiture} | </h5>
          <p class="text-reset" style="display: inline;"><b>${voiture.modele_voiture}</b></p>
        </div>
          <p class="text-reset">${voiture.kilometrage_voiture} Km</p>

          <p class="text-reset">${voiture.annee_fabrication_voiture} (Depuis)</p>
          <p class="card-text" style="color: grey; font-size: 22px;">${voiture.prix_voiture}&euro;</p>
        </div>
        <div class="card-footer bg-transparent d-flex justify-content-end">
          <a class="btn btn-primary mb-0" href="#nos_voitures" role="button" data-slide="next" data-bs-toggle="modal" data-bs-target="#affichageDetaiVoiture" data-id="${voiture.id_voiture}">
            Plus d'information <i class="fa fa-arrow-right"></i>
          </a>
        </div>
      </div>
    </div>
  `;

            // Ajoutez le HTML à la ligne actuelle
            if (i % 2 === 0) {
              containerVoitures.append('<div class="row"></div>');
            }
            containerVoitures.children('.row').last().append(htmlVoiture);
          });

        },
        error: function(error) {
          console.error('Erreur lors de la récupération des données de voitures:', error);
        }
      });

    }
  };

  // Initialisation du slider avec les options
  $('.js-example-class').alRangeSlider(options);

  // Vous pouvez également ajouter d'autres sliders ici si nécessaire
</script>


<?php
require_once '../pages-parametres/footer.php';
?>