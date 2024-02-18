<?php
//Démarrer la session si elle n'est pas démarrée
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
require_once '../connexion/connexion.php';
?>
<!-- Footer Start -->
<div class="container-fluid bg-dark text-light footer pt-2 mt-2 wow fadeIn" data-wow-delay="0.1s">
  <div class="container py-2">
    <div class="row g-5">
      <div class="col-lg-4 col-md-6">
        <h4 class="text-light mb-4">Adresse</h4>
        <p class="mb-2"><i class="fa fa-map-marker me-3"></i>2, rue de l'aqueduc, 93100 Montreuil, FRANCE</p>
        <p class="mb-2"><i class="fa fa-phone me-3"></i>+33 7 49 98 67 XX</p>
        <p class="mb-2"><i class="fa fa-envelope me-3"></i>tshaukemulumba@yahoo.com</p>
        <div class="d-flex pt-2">
          <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
          <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
          <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
          <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
        </div>
      </div>
      <!-- Affichage du calendrier -->
      <?php
      // Récupérer les données de la table horairesgarage
      $sql_horaires = "SELECT * FROM horairesgarage INNER JOIN jourssemaine ON horairesgarage.jour_id = jourssemaine.jour_id";
      // Préparation et exécution de la requête
      $statement = $pdo->prepare($sql_horaires);
      // Vérifier s'il y a des résultats
      ?>


      <div class="col-lg-5 col-md-6">
        <h4 class="text-light mb-4">Horaires d'ouvertures 
           <!-- Masquer la section ajout de service pour tous les utilisateurs sauf Administrateur -->
           <?php if (isset($_SESSION['roleUtilisateur']) && $_SESSION['roleUtilisateur'] == 'Admin') { ?>
        <a class="btn btn-primary mb-0 ml-4" href="#" role="button"
            data-slide="next" data-bs-toggle="modal" data-bs-target="#afficherHoraire" data-id="afficherHoraire"
            style="margin-left:26px;">
            Mettre à jour<i class="fa fa-arrow-right"></i>
          </a>
        <?php
        }
        ?>
        </h4>
        <!-- Affichage du calendrier -->
        <?php
        // Récupérer les données de la table horairesgarage
        $sql_horaires = "SELECT * FROM horairesgarage INNER JOIN jourssemaine ON horairesgarage.jour_id = jourssemaine.jour_id";
        // Préparation et exécution de la requête
        $result_horaires = $pdo->prepare($sql_horaires);
        $result_horaires->execute();

        // Vérifier le nombre de lignes retournées
        $rowCount = $result_horaires->rowCount();

        // Vérifier s'il y a des résultats
        if ($rowCount > 0) {
          // Afficher le tableau Bootstrap
          echo '<table width="100%">
                <thead>
                    <tr>
                        <th>Jour</th>
                        <th>Horaires</th>
                    </tr>
                </thead>
                <tbody>';
          // Afficher les données de la table horairesgarage
          while ($row = $result_horaires->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr style="height: 1em;">
        <td style="padding: -2px;"><i class="fa fa-clock"></i>'."  " . $row["nom_jour"] . '</td>
        <td style="padding: -2px;">' . formatHoraires($row) . '</td>
              </tr>';
          }
          echo '</tbody>
          </table>';
        } else {
          echo "Aucun résultat trouvé";
        }

        // Fonction pour formater les horaires selon la présentation souhaitée
        function formatHoraires($row)
        {
          // Récupérer les heures
          $morning_open = $row["premiere_seance_ouverture"];
          $morning_close = $row["premiere_seance_fermeture"];
          $afternoon_open = $row["deuxieme_seance_ouverture"];
          $afternoon_close = $row["deuxieme_seance_fermeture"];

          // Formater les horaires
          $formatted_horaires = '';

          // Jour de repos
          if ($row["nom_jour"] == "Dimanche") {
            $formatted_horaires = 'Jour de repos';
          } else {
            // Matinée
            $formatted_horaires .= $morning_open . ' à ' . $morning_close;

            // Après-midi
            if ($row["nom_jour"] == "Samedi") {
              //$formatted_horaires .= ' et ' . $afternoon_open . ' à ' . $afternoon_close;
            } else {
              $formatted_horaires .= ' et de ' . $afternoon_open . ' à ' . $afternoon_close;
            }
          }

          return $formatted_horaires;
        }


        ?>
      </div>
      <div class="col-lg-3 col-md-6">
        <h4 class="text-light mb-4">Prestations de service</h4>
        <a class="btn btn-link" href="">Test diagnostique </a>
        <a class="btn btn-link" href="">Entretien du moteur </a>
        <a class="btn btn-link" href="">Remplacement des pneus</a>
        <a class="btn btn-link" href="">Changement d'huile</a>
        <a class="btn btn-link" href="">Aspirateur</a>
        <!--  -->

        <!--  -->



      </div>
      <!-- <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Newsletter</h4>
                    <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                        <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div>
                </div> -->
    </div>
  </div>
  <div class="container">
    <div class="copyright">
      <div class="row">
        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
          &copy; <a class="border-bottom" href="#">Garage.V.Parrot</a>, Tous droits reservés.

          Conçu par:  <a class="border-bottom" href="">Salomon TSHAUKE MULUMBA</a>
        </div>
        <div class="col-md-6 text-center text-md-end">
          <div class="footer-menu">
            <a href="../index.php">Accueil</a>
            <a href="../pages/service.php">Services</a>
            <a href="../pages/voitures.php">Nos voitures</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Footer End -->

<!-- Modal -->
<div class="modal fade" id="afficherHoraire" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="afficherHoraireLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg">
    <!-- Ajoutez la classe "modal-lg" pour agrandir la largeur -->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="afficherHoraireLabel">Modifier les Horaires du Garage</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Début formulaire de modification des horaires -->
        <div class="container">
          <form action="" id="formulaire_modification_horaires" method="post">
            <select class="form-control" id="jour_id" name="jour_id" required>
              <?php
              $i = 1;
              // Liste des jours de la semaine
              $joursSemaine = array("Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche");
              echo "<option value=0>Sélectionnez un jour </option>";
              // Boucle pour générer les options
              foreach ($joursSemaine as $jour) {
                echo "<option value='" . $i . "'>" . $jour . "</option>";
                $i += 1;
              }
              ?>
            </select>
            <!-- Première séance ouverture et fermeture -->
            <div class="form-group">
              <label for="premiere_seance_ouverture">Première séance ouverture :</label>
              <input type="text" class="form-control" id="premiere_seance_ouverture" name="premiere_seance_ouverture"
                value="" required>
            </div>
            <div class="form-group">
              <label for="premiere_seance_fermeture">Première séance fermeture :</label>
              <input type="text" class="form-control" id="premiere_seance_fermeture" name="premiere_seance_fermeture"
                value="" required>
            </div>
            <!-- Deuxième séance ouverture et fermeture -->
            <div class="form-group">
              <label for="deuxieme_seance_ouverture">Deuxième séance ouverture :</label>
              <input type="text" class="form-control" id="deuxieme_seance_ouverture" name="deuxieme_seance_ouverture"
                value="" required>
            </div>
            <div class="form-group">
              <label for="deuxieme_seance_fermeture">Deuxième séance fermeture :</label>
              <input type="text" class="form-control" id="deuxieme_seance_fermeture" name="deuxieme_seance_fermeture"
                value="" required>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
              <button type="button" class="btn btn-primary" id="btnMettreAJour">Mettre à jour</button>
            </div>
          </form>
          <!-- Fin formulaire de modification des horaires -->
        </div>

      </div>


    </div>
  </div>
</div>





<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="../lib/wow/wow.min.js"></script>
<script src="../lib/easing/easing.min.js"></script>
<script src="../lib/waypoints/waypoints.min.js"></script>
<script src="../lib/counterup/counterup.min.js"></script>
<script src="../lib/owlcarousel/owl.carousel.min.js"></script>
<script src="../lib/tempusdominus/js/moment.min.js"></script>
<script src="../lib/tempusdominus/js/moment-timezone.min.js"></script>
<script src="../lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- Template Javascript -->
<script src="../js/main.js"></script>
<script>
  $(document).ready(function () {
    // Écouteur d'événement sur le changement de sélection
    $("#jour_id").change(function () {
      // Récupération de la valeur sélectionnée
      var selectedDay = $(this).val();

      // Envoi de la requête AJAX
      $.ajax({
        url: '../pages-parametres/recuperer_horaires.php', // Remplacez par le chemin de votre script de récupération des horaires
        type: 'POST',
        data: { jour_id: selectedDay },
        dataType: 'json',
        success: function (data) {
          // Remplissage des champs avec les données récupérées
          $("#premiere_seance_ouverture").val(data.premiere_seance_ouverture);
          $("#premiere_seance_fermeture").val(data.premiere_seance_fermeture);
          $("#deuxieme_seance_ouverture").val(data.deuxieme_seance_ouverture);
          $("#deuxieme_seance_fermeture").val(data.deuxieme_seance_fermeture);
        },
        error: function (xhr, status, error) {
          console.error(error);
        }
      });
    });
  });
</script>
<script>
// Supposons que tu utilises jQuery pour simplifier les appels AJAX
$(document).ready(function() {
    // Attache un gestionnaire d'événements au clic du bouton de mise à jour
    $('#btnMettreAJour').click(function() {
        // Exécute la requête AJAX lorsque le bouton est cliqué
        $.ajax({
            type: 'POST',
            url: '../pages-parametres/traitement_modification_horaires.php',
            data: $('#formulaire_modification_horaires').serialize(),
            success: function(response) {
                if (response.success) {
                    // Succès de la mise à jour, effectue les actions nécessaires ici
                    alert('Mise à jour réussie.');
                    // Tu peux rediriger ou faire d'autres actions ici
                } else {
                    // Échec de la mise à jour, gestion des erreurs
                    alert('Erreur : ' + response.message);
                }
            },
            error: function() {
                // Erreur lors de la requête AJAX
                alert('Une erreur s\'est produite lors de la mise à jour.');
            }
        });
    });
});
</script>



</body>

</html>