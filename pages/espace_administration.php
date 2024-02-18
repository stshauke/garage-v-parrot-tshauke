<style>
    /* Ajoutez ces styles à votre feuille de style CSS */
    .toggle-password-icon {
        font-size: 2.5rem;
        /* ajustez la taille selon vos besoins */
        position: absolute;
        top: 50%;
        right: 10px;
        transform: translateY(-50%);
        cursor: pointer;
    }

    #messageContainer {
        display: none;
        /* Masquer le div contenant le message de modification par défaut */
    }

    #messageContainerAjout {
        display: none;
        /* Masquer le div contenant le message de modification par défaut */
    }

    .visible {
        display: block !important;
        /* Rendre visible */
    }
</style>
<?php
//Démarrer la session si elle n'est pas démarrée
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
/* Tester si la session n'est pas vide pour visualiser le contenue de la page
 espace_administration.php puisque c'est une page sécurisée que l'administrateur
  et l'employé peuvent la voir.
 si l'utilisateur a violé le lien de cette page il ne paut pas le voir il va etre amené
 vers la page de connexion*/
if (empty($_SESSION['nomUtilisateur'])) {
    header('location: ../connexion/login.php');
}
require_once '../pages-parametres/header.php';
require_once 'charger_profil.php';
require_once 'generer_employe.php';

?>


<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 p-0" style="background-image: url(img/carousel-bg-1.jpg);">
    <div class="container-fluid page-header-inner py-5">
        <div class="container text-center">
            <h1 class="display-3 text-white mb-3 animated slideInDown">
                <?php
                /*
                On vérifie si l'utilisateur connecté est un adinistrateur ou non si
                c'est le cas on affiche Espace d'Administration puis on affiche le prénom et nom de l'administrateur
                 * Pour un employé connecté il peut seulement consulter ces informations sans pouvoir les modifier
                 * Seul l'administrateur oeut changer ces informations personnelles
                */
                if (isset($_SESSION['roleUtilisateur']) && !empty($_SESSION['roleUtilisateur'])) {
                    //Tester si l'utilisateur connecté est un administrateur ou c'est un employé
                    if ($_SESSION['roleUtilisateur'] == 'Admin') {
                        echo "Espace d'Administration";
                    }
                    if ($_SESSION['roleUtilisateur'] == 'Employe') {
                        echo "Espace d'Employé";
                    }
                }


                ?>

            </h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="../index.php">Accueil</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Espace employé</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Contact Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <!-- On affiche le prénom et le nom de l'utilisateur connecté -->
            <h1 class="mb-5">Bonjour Monsieur <?php if (isset($_SESSION['nomUtilisateur']) && !empty($_SESSION['nomUtilisateur'])) {
                                                    echo $_SESSION['nomUtilisateur'];
                                                } ?></h1>
        </div>
        <div class="row g-4">
            <div class="col-12">
                <div class="row gy-4">
                    <div class="col-md-12">
                        <div class="bg-light d-flex flex-column justify-content-center p-4">
                            <h5 class="text-uppercase">// Consulter profil //</h5>
                            <p class="m-0"><i class="fa fa-envelope-open text-primary me-2"></i>employe@example.com</p>
                        </div>
                    </div>

                </div>
            </div>
            <!------------Début Tab Bar-------------->

            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Votre profil</button>
                    <?php if (isset($_SESSION['roleUtilisateur']) && $_SESSION['roleUtilisateur'] == 'Admin') {
                    ?>
                        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-generer-employe" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Générer un employé</button>
                    <?php } ?>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <!------------Début nav-profiler-------------->
                    <div class="row">
                        <div class="col-md-8">
                            <div class="wow fadeInUp" data-wow-delay="0.2s">
                                <p class="mb-4">
                                    Bienvenue! Nous vous offrons la possibilité de personnaliser
                                    et de mettre à jour vos informations professionnelles en toute simplicité.
                                    Profitez de cette fonctionnalité pour vous assurer que votre profil est toujours à jour et reflète précisément qui vous êtes professionnellement.
                                </p>
                                <div id="messageContainer" role="alert">
                                </div>

                                <form method="post" id="profilUtilisateur">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <!--Récupération des résultats de la base de données avec la clé adresse mail-->
                                                <!--On va récupérer les données de la base en utilisant le php et comme on a crée une page
                                        charger_profil.php pour nous rendre les informations de l'utilisateur actuellement connecté 
                                        et pour chaque information dans la base on va l'affecter au zone dédiée  -->
                                                <input type="text" name="txtPrenom" class="form-control" id="prenom" placeholder="Votre prénom" value="<?php echo $row[0]['prenomUtil']; ?>">
                                                <label for="name">Votre prénom</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <!--Afficher le nom de l'utilisateur provenant de résultat de la requ^éte générée 
                                            dans la page charger_profil.php-->
                                                <input type="text" name="txtNom" class="form-control" id="nom" placeholder="Votre nom" value="<?php echo $row[0]['nomUtil']; ?>">
                                                <label for="name">Votre nom</label>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-floating">
                                                <input type="email" name="txtEmail" class="form-control" id="email" placeholder="Votre email" value="<?php echo $row[0]['adresseEmail']; ?>">
                                                <label for="email">Votre Email</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-floating">
                                                <select name="selectSexe" class="custom-select form-control" id="inlineFormCustomSelect" style="background-color:white;">
                                                    <option selected>Choisir votre sexe...</option>
                                                    <option value="1" <?php if ($row[0]['sexeUtil'] == 'Homme') {
                                                                            echo 'selected';
                                                                        } ?>>Homme</option>
                                                    <option value="2" <?php if ($row[0]['sexeUtil'] == 'Femme') {
                                                                            echo 'selected';
                                                                        } ?>>Femme</option>
                                                </select>
                                                <label for="inlineFormCustomSelect">Votre Sexe</label>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-floating position-relative">
                                                <input type="password" name="txtPassword" class="form-control" id="password" placeholder="Votre mot de passe" value="<?php echo $row[0]['password']; ?>" oninput="verifierPasswordSecurise()" onfocus="afficherPasswordSecurise()" onblur="masquerPasswordSecurise()">
                                                <i class="bi bi-eye-slash-fill toggle-password-icon text-primary" id="togglePassword" onclick="togglePasswordVisibility()"></i>
                                                <label for="password">Votre mot de passe</label>
                                                <span id="password-securise" style="display:none">Force du mot de passe:</span>

                                            </div>



                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="password" name="txtRepeatPassword" class="form-control" id="retapezPassword" placeholder="Retapez votre mot de passe" value="<?php echo $row[0]['password']; ?>">
                                                <i id="togglePassword"></i>
                                                <label for="name">Retaper votre mot de passe</label>
                                            </div>
                                        </div>
                                        <?php if (isset($_SESSION['roleUtilisateur']) && $_SESSION['roleUtilisateur'] == 'Admin') {
                                        ?>
                                            <div class="col-12">
                                                <button class="btn btn-primary w-100 py-3" name="btnmodifier" id="btnModifier" type="submit">Modifier vos informations</button>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-4 wow fadeIn" data-wow-delay="0.1s">
                            <iframe class="position-relative rounded w-100 h-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd" frameborder="0" style="min-height: 350px; border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        </div>
                    </div>
                    <!------------Fin nav-profile-------------->

                </div>
                <?php if (isset($_SESSION['roleUtilisateur']) && $_SESSION['roleUtilisateur'] == 'Admin') {
                ?>
                    <div class="tab-pane fade" id="nav-generer-employe" role="tabpanel" aria-labelledby="nav-generer-employe-tab">
                        <!------------Début nav-generer-employe-------------->

                        <div class="row">
                            <div class="col-md-8">
                                <div id="messageContainerAjout" class="alert alert-success" role="alert">
                                </div>

                                <p class="mb-4">
                                    Bienvenue! Nous vous offrons la possibilité de générer un employé
                                    et de mettre à jour ces informations professionnelles en toute simplicité.
                                    Profitez de cette fonctionnalité pour bien gérer vos employés
                                </p>
                                <form method="post" id="profilEmploye">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <!--Récupération des résultats de la base de données avec la clé adresse mail-->
                                                <!--On va récupérer les données de la base en utilisant le php et comme on a crée une page
                                        charger_profil.php pour nous rendre les informations de l'utilisateur actuellement connecté 
                                        et pour chaque information dans la base on va l'affecter au zone dédiée  -->
                                                <input type="text" name="txtPrenomEmploye" class="form-control" id="prenomEmploye" placeholder="Le prénom de l'Employé" value="">
                                                <label for="name">Le prénom de l'Employé</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <!--Afficher le nom de l'utilisateur provenant de résultat de la requ^éte générée 
                                            dans la page charger_profil.php-->
                                                <input type="text" name="txtNomEmploye" class="form-control" id="nomEmploye" placeholder="Le nom de l'Employé" value="">
                                                <label for="nameEmploye">Le nom de l'Employé</label>
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
                                        <?php if (isset($_SESSION['roleUtilisateur']) && $_SESSION['roleUtilisateur'] == 'Admin') {
                                        ?>
                                            <div class="col-12">
                                                <button class="btn btn-primary w-100 py-3" name="btnmodifierEmploye" id="btnModifierEmploye" type="submit">Ajouter un employé</button>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <!------------Fin nav-generer-employe-------------->
                    </div>
                <?php } ?>
            </div>

            <!------------Fin Tab Bar-------------->





        </div>
    </div>
</div>
<!-- Contact End -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.map"></script>

<script>
    function verifierPasswordSecurise() {
        var password = document.getElementById('password').value;

        // Vérification de la longueur minimale

        // Vérification de la présence d'au moins une minuscule, une majuscule, un chiffre et un caractère spécial
        var hasLowerCase = password.match(/[a-z]/);
        var hasUpperCase = password.match(/[A-Z]/);
        var hasDigit = password.match(/[0-9]/);
        var hasSpecialChar = password.match(/[!@#$%^&*(),.?":{}|<>]/);

        if (hasLowerCase && hasUpperCase && hasDigit && hasSpecialChar && password.length >= 8) {
            afficherPasswordSecurise();
            document.getElementById('password-securise').innerHTML = "<span class='text-success '><b>Force du mot de passe : Fort</b></span>";
        } else if ((hasLowerCase && hasUpperCase) || (hasLowerCase && hasDigit) || (hasLowerCase && hasSpecialChar) ||
            (hasUpperCase && hasDigit) || (hasUpperCase && hasSpecialChar) || (hasDigit && hasSpecialChar)) {
            afficherPasswordSecurise();
            document.getElementById('password-securise').innerHTML = "<span class='text-warning '><b>Force du mot de passe : Moyen</b></span>";
        } else {
            afficherPasswordSecurise();
            document.getElementById('password-securise').innerHTML = "<span class='text-danger '><b>Force du mot de passe : Faible</b></span>";
        }

    }

    function afficherPasswordSecurise() {
        document.getElementById('password-securise').style.display = 'block';
    }

    function masquerPasswordSecurise() {
        document.getElementById('password-securise').style.display = 'none';
    }
</script>





<script type="text/javascript">
    $(document).ready(function() {
        $('#btnModifier').click(function(event) {
            event.preventDefault();
            // Récupérer le contenu du champs mot de passe en utilisant  JS 
            //var password=document.getElementById('password').value;
            // Récupérer le contenu du champs mot de passe en utilisant  JQuery
            var password = $("#password").val();
            var passwordRetape = $("#retapezPassword").val();
            if (password === passwordRetape) {
                // Récupération des données du formulaire
                var formData = {
                    txtPrenom: $("#prenom").val(),
                    txtNom: $("#nom").val(),
                    txtEmail: $("#email").val(),
                    selectSexe: $("#inlineFormCustomSelect").val(),
                    txtPassword: $("#password").val(),
                    txtRetapPassword: $("#retapezPassword").val()
                };
                // Appel de la fonction sendDataToServer avec les données du formulaire
                sendDataToServerModidy(formData);
            } else {
                // Votre traitement du succès ici
                var message = "Les mots de passe ne correspondent pas.";
                $('#messageContainer').html('<div class="alert alert-danger">' + message + '</div>');
                // Afficher le message
                $('#messageContainer').addClass('visible');
                // Masquer le message après 20 secondes
                setTimeout(function() {
                    $('#messageContainer').removeClass('visible');
                }, 20000); // 20 secondes en millisecondes

            }

        });
    });

    function sendDataToServerModidy(formData) {
        $.ajax({
            type: 'POST',
            url: 'modifier_profil.php',
            data: formData,
            success: function(response) {
                // Votre traitement du succès ici
                var message = "La modification a été effectuée avec succès.";
                $('#messageContainer').html('<div class="alert alert-success">' + message + '</div>');
                // Afficher le message
                $('#messageContainer').addClass('visible');
                // Masquer le message après 20 secondes
                setTimeout(function() {
                    $('#messageContainer').removeClass('visible');
                }, 20000); // 20 secondes en millisecondes
            },
            error: function(error) {
                console.error('Erreur lors de la requête AJAX :', error);
                alert('Erreur lors de la requête AJAX. Veuillez réessayer.');
            }
        });
    }
</script>

<script>
    function togglePasswordVisibility() {
        const passwordInput = document.getElementById('password');
        const retapezPasswordInput = document.getElementById('retapezPassword');
        const togglePasswordIcon = document.getElementById('togglePassword');

        //console.log(passwordInput, retapezPasswordInput, togglePasswordIcon);

        if (passwordInput.type === 'password' || retapezPasswordInput.type === 'password') {
            passwordInput.type = 'text';
            retapezPasswordInput.type = 'text';
            togglePasswordIcon.classList.remove('bi-eye-slash-fill');
            togglePasswordIcon.classList.add('bi-eye-fill');
        } else {
            passwordInput.type = 'password';
            retapezPasswordInput.type = 'password';
            togglePasswordIcon.classList.remove('bi-eye-fill');
            togglePasswordIcon.classList.add('bi-eye-slash-fill');
        }
    }
</script>


<script type="text/javascript">
    $(document).ready(function() {
        $('#btnModifierEmploye').click(function(event) {
            event.preventDefault();

            // Récupération des données du formulaire
            var formData = {
                txtPrenomEmploye: $("#prenomEmploye").val(),
                txtNomEmploye: $("#nomEmploye").val(),
                txtEmailEmploye: $("#emailEmploye").val(),
                selectSexeEmploye: $("#inlineFormCustomSelectEmploye").val(),
                txtPasswordEmploye: $("#passwordEmploye").val()
            };
            // Appel de la fonction sendDataToServer avec les données du formulaire
            sendDataToServer(formData);
        });
    });
    // Fonction pour envoyer les données au serveur via une requête AJAX
    function sendDataToServer(formData) {
        //Utiliser JQuery pour effectuer une requete AJAX de type POST
        $.ajax({
            type: 'POST',
            //Spécifier l'URL du script PHP d'ajout d'un employé
            url: 'generer_employe.php',
            //Passer les données du formulaire à la fonction
            data: formData,
            //Gérer la réponse du serveur en cas de succès
            success: function(response) {
                // Votre traitement du succès ici
                var message = "L'insertion a été effectuée avec succès.";
                $('#messageContainerAjout').html('<div class="success-message">' + message + '</div>');
                // Afficher le message
                $('#messageContainerAjout').addClass('visible');
                // Masquer le message après 20 secondes
                setTimeout(function() {
                    $('#messageContainerAjout').removeClass('visible');
                }, 20000); // 20 secondes en millisecondes
            },
            error: function(error) {
                console.error('Erreur lors de la requête AJAX :', error);
                alert('Erreur lors de la requête AJAX. Veuillez réessayer.');
            }
        });
    }
</script>

<script>
    function togglePasswordVisibility() {
        const passwordInput = document.getElementById('password');
        const retapezPasswordInput = document.getElementById('retapezPassword');
        const togglePasswordIcon = document.getElementById('togglePassword');

        //console.log(passwordInput, retapezPasswordInput, togglePasswordIcon);

        if (passwordInput.type === 'password' || retapezPasswordInput.type === 'password') {
            passwordInput.type = 'text';
            retapezPasswordInput.type = 'text';
            togglePasswordIcon.classList.remove('bi-eye-slash-fill');
            togglePasswordIcon.classList.add('bi-eye-fill');
        } else {
            passwordInput.type = 'password';
            retapezPasswordInput.type = 'password';
            togglePasswordIcon.classList.remove('bi-eye-fill');
            togglePasswordIcon.classList.add('bi-eye-slash-fill');
        }
    }
</script>


<?php
require_once '../pages-parametres/footer.php';
?>