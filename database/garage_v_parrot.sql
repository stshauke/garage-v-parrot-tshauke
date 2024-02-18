
-- Création de la base de données
CREATE DATABASE IF NOT EXISTS garage_v_parrot;

-- Utilisation de la base de données créée
USE garage_v_parrot;

-- Structure de la table avis
CREATE TABLE avis (
  id_avis int NOT NULL AUTO_INCREMENT,
  nom_avis varchar(100) NOT NULL,
  email_avis varchar(100) DEFAULT NULL,
  profession_avis varchar(45) DEFAULT NULL,
  message_avis text,
  note_avis int DEFAULT NULL,
  image_avis varchar(100) DEFAULT NULL,
  date_avis datetime DEFAULT NULL,
  valider_avis tinyint DEFAULT NULL,
  PRIMARY KEY (id_avis));
-- Insertion des données
  INSERT INTO avis (id_avis, nom_avis, email_avis, profession_avis, message_avis, note_avis, image_avis, date_avis, valider_avis) VALUES
  (2, 'Sébastien Cauet', 'sebastiencauet@gmail.com', 'Animateur', 'Très bon accueil délai respecté et prix très intéressant pour un changement d embrayage. Je le recommande', 4, 'Sebastien_Cauet.jpg', '2024-01-14 20:36:44', 1);
   INSERT INTO avis (id_avis, nom_avis, email_avis, profession_avis, message_avis, note_avis, image_avis, date_avis, valider_avis) VALUES
  (3, 'Riadh HAJJI', 'hajj@gmail.com', 'Etudiant', 'Un peu tôt pour savoir si le garage que l\'on m\'a conseillé est fiable mais mon expérience sur le site est plutôt bonne', 3, 'Riadh_HAJJI.jpg', '2024-01-15 08:39:51', 1);
    INSERT INTO avis (id_avis, nom_avis, email_avis, profession_avis, message_avis, note_avis, image_avis, date_avis, valider_avis) VALUES
  (4, 'Monica STYLE', 'monicastyle200@gmail.com', 'Animatrice', 'Bon accueil, prix attractif, personnel agréable et professionnel, je recommande.', 5, 'Monica_STYLE.jpg', '2024-01-15 10:39:51', 1);
    INSERT INTO avis (id_avis, nom_avis, email_avis, profession_avis, message_avis, note_avis, image_avis, date_avis, valider_avis) VALUES
  (5, 'Sara SBITT', 'sara.sbittgmail.com', 'Professeur', 'Je ne mets pas 5 étoiles car il manquait le filtre pour ma vidange. Mais ils ont su me satisfaire dans la journée. Equipe pro et sympathique', 4, 'Sara_SBITT.jpg', '2024-01-15 11:39:51', 1);
    INSERT INTO avis (id_avis, nom_avis, email_avis, profession_avis, message_avis, note_avis, image_avis, date_avis, valider_avis) VALUES
  (6, 'Louane  Emera', 'Louane-emra', 'Chanteuse', 'Service client réactif et courtois, la dame a pris en charge ma demande et s\'est souciée d\'y répondre assez rapidement et en professionnalisme', 5, 'Louane_ Emera.jpg', '2024-01-15 13:39:51', 1);

  -- Structure de la table contacts
CREATE TABLE contacts (
  id int NOT NULL AUTO_INCREMENT,
  prenom_nom varchar(255) NOT NULL,
  email varchar(255) NOT NULL,
  sujet varchar(255) NOT NULL,
  message text NOT NULL,
  date_creation timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id));
-- Insertion des données
INSERT INTO contacts (id, prenom_nom, email, sujet, message, date_creation) VALUES
(2, 'cwxcwcwc', 'camaramagname65@gmail.com', 'vxcxcvxcvxcv', 'gdfgfgdfgdfgdf', '2024-01-24 19:53:36');

-- Structure de la table horairesgarage
CREATE TABLE horairesgarage (
  horaire_id int NOT NULL AUTO_INCREMENT,
  jour_id int DEFAULT NULL,
  premiere_seance_ouverture time NOT NULL,
  premiere_seance_fermeture time NOT NULL,
  deuxieme_seance_ouverture time NOT NULL,
  deuxieme_seance_fermeture time NOT NULL,
  PRIMARY KEY (horaire_id),
  KEY jour_id (jour_id));
-- Insertion des données
INSERT INTO horairesgarage (horaire_id, jour_id, premiere_seance_ouverture, premiere_seance_fermeture, deuxieme_seance_ouverture, deuxieme_seance_fermeture) VALUES
(1, 1, '08:15:00', '12:00:00', '14:00:00', '17:30:00');
INSERT INTO horairesgarage (horaire_id, jour_id, premiere_seance_ouverture, premiere_seance_fermeture, deuxieme_seance_ouverture, deuxieme_seance_fermeture) VALUES
(2, 2, '08:40:00', '12:05:00', '14:00:00', '18:00:00');
INSERT INTO horairesgarage (horaire_id, jour_id, premiere_seance_ouverture, premiere_seance_fermeture, deuxieme_seance_ouverture, deuxieme_seance_fermeture) VALUES
(3, 3, '08:45:00', '12:00:00', '14:00:00', '18:00:00');
INSERT INTO horairesgarage (horaire_id, jour_id, premiere_seance_ouverture, premiere_seance_fermeture, deuxieme_seance_ouverture, deuxieme_seance_fermeture) VALUES
(4, 4, '08:45:00', '12:00:00', '14:00:00', '18:00:00');
INSERT INTO horairesgarage (horaire_id, jour_id, premiere_seance_ouverture, premiere_seance_fermeture, deuxieme_seance_ouverture, deuxieme_seance_fermeture) VALUES
(5, 5, '08:45:00', '12:00:00', '14:00:00', '18:00:00');
INSERT INTO horairesgarage (horaire_id, jour_id, premiere_seance_ouverture, premiere_seance_fermeture, deuxieme_seance_ouverture, deuxieme_seance_fermeture) VALUES
(6, 6, '08:45:00', '12:00:00', '18:00:00', '18:00:00');
INSERT INTO horairesgarage (horaire_id, jour_id, premiere_seance_ouverture, premiere_seance_fermeture, deuxieme_seance_ouverture, deuxieme_seance_fermeture) VALUES
(7, 7, '00:00:00', '00:00:00', '00:00:00', '00:00:00');

-- Structure de la table jourssemaine
CREATE TABLE jourssemaine (
  jour_id int NOT NULL AUTO_INCREMENT,
  nom_jour varchar(20) NOT NULL,
  date_ferie date DEFAULT NULL,
  PRIMARY KEY (jour_id));
-- Insertion des données
INSERT INTO jourssemaine (jour_id, nom_jour, date_ferie) VALUES
(1, 'Lundi', NULL);
INSERT INTO jourssemaine (jour_id, nom_jour, date_ferie) VALUES
(2, 'Mardi', NULL);
INSERT INTO jourssemaine (jour_id, nom_jour, date_ferie) VALUES
(3, 'Mercredi', NULL);
INSERT INTO jourssemaine (jour_id, nom_jour, date_ferie) VALUES
(4, 'Jeudi', NULL);
INSERT INTO jourssemaine (jour_id, nom_jour, date_ferie) VALUES
(5, 'Vendredi', NULL);
INSERT INTO jourssemaine (jour_id, nom_jour, date_ferie) VALUES
(6, 'Samedi', NULL);
INSERT INTO jourssemaine (jour_id, nom_jour, date_ferie) VALUES
(7, 'Dimanche', NULL);
  
-- Structure de la table reserver_services
CREATE TABLE reserver_services (
  id int NOT NULL AUTO_INCREMENT,
  nom varchar(255) NOT NULL,
  email varchar(255) NOT NULL,
  id_service int NOT NULL,
  date_service date NOT NULL,
  demande_speciale text,
  created_at timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id));
  -- Insertion des données
INSERT INTO reserver_services (id, nom, email, id_service, date_service, demande_speciale, created_at) VALUES
(4, 'MULUMBA ', 'camaramagname65@gmail.com', 3, '2024-01-08', 'R.A.S', '2024-01-24 19:47:11');


-- Structure de la table services
CREATE TABLE services (
  id_service int NOT NULL AUTO_INCREMENT,
  nom_service varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  description_service text COLLATE utf8mb4_general_ci,
  image_service varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (id_service));
 -- Insertion des données
INSERT INTO services (id_service, nom_service, description_service, image_service) 
VALUES (1, 'Test diagnostique', 'Notre diagnostic auto est une étape cruciale pour assurer la sécurité et la santé de votre véhicule. Il s\'agit d\'un processus d\'analyse et de détection des problèmes mécaniques ou électroniques dans votre véhicule. Notre diagnostic est réalisé par nos mécaniciens expérimentés pour sonder l\'ensemble de véhicule et y détecter le moindre problème avant que celui-ci ne se transforme en panne.', 'service-1.jpg');

INSERT INTO services (id_service, nom_service, description_service, image_service) 
VALUES (2, 'Entretien du moteur', 'L\'entretien du moteur est une opération indispensable pour assurer son fonctionnement, sa fiabilité, sa longévité, la sécurité ainsi que réduire son niveau de pollution. L\'opération d\'entretien la plus courante est la vidange de l\'huile moteur, tandis que certains composants, comme les bougies, les filtres ou encore la courroie de distribution, nécessitent également une attention particulière.', 'service-2.jpg');

INSERT INTO services (id_service, nom_service, description_service, image_service) 
VALUES (3, 'Remplacement des pneus', 'Le montage pneu, le gonflage pneu, le démontage et l\'équilibrage des pneumatiques doit être effectué avec du matériel approprié et réalisé par des professionnels qualifiés.', 'service-3.jpg');

INSERT INTO services (id_service, nom_service, description_service, image_service) 
VALUES (4, 'Changement d\'huile', 'L\'huile est essentielle pour maximiser la durée de vie et les performances de votre moteur. Elle refroidit les pièces, minimisant ainsi les pertes d\'énergie et la détérioration du moteur. Elle combat également la rouille et la corrosion tout en agissant comme un espace d\'étanchéité entre le piston et le cylindre.', 'service-4.jpg');

INSERT INTO services (id_service, nom_service, description_service, image_service) 
VALUES (5, 'Réparation de la carrosserie', 'Notre garage a fait des réparations de votre carrosserie sa spécialité. Ainsi, en vous tournant vers l\'expertise des membres de notre équipe de professionnels, vous pourrez bénéficier de toutes les réparations nécessaires pour redonner à la carrosserie de votre véhicule toute sa splendeur.', 'Service_exemple.jpg');

INSERT INTO services (id_service, nom_service, description_service, image_service) 
VALUES (6, 'Service exemple', 'service exemple', 'service-5.jpg');


-- Structure de la table techniciens
CREATE TABLE techniciens (
  id_technicien int NOT NULL AUTO_INCREMENT,
  nom_technicien varchar(200) NOT NULL,
  specialite_technicien varchar(100) NOT NULL,
  image_technicien varchar(100) NOT NULL,
  PRIMARY KEY (id_technicien));
  -- Insertion des données
INSERT INTO techniciens (id_technicien, nom_technicien, specialite_technicien, image_technicien) VALUES
(1, 'Jean Dupont', 'Electricien', 'Jean_Dupont.jpg');
INSERT INTO techniciens (id_technicien, nom_technicien, specialite_technicien, image_technicien) VALUES
(2, 'Martin Vincent', 'Carrossier', 'Martin_Vincent.jpg');
INSERT INTO techniciens (id_technicien, nom_technicien, specialite_technicien, image_technicien) VALUES
(3, 'Olivier Dubois', 'Dépanneur', 'Olivier_Dubois.jpg');
INSERT INTO techniciens (id_technicien, nom_technicien, specialite_technicien, image_technicien) VALUES
(4, 'Alexandre Leroy', 'Mécanicien', 'Alexandre_Leroy.jpg');



-- Structure de la table utilisateur
CREATE TABLE utilisateur (
  idUtil int NOT NULL AUTO_INCREMENT,
  prenomUtil varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  nomUtil varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  sexeUtil varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  adresseEmail varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  password varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  role varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (idUtil));
  -- Insertion des données
INSERT INTO utilisateur (idUtil, prenomUtil, nomUtil, sexeUtil, adresseEmail, password, role) VALUES
(1, 'salomon', 'tshauke', 'Homme', 'tshaukemulumba@yahoo.com', '123', 'Admin');
INSERT INTO utilisateur (idUtil, prenomUtil, nomUtil, sexeUtil, adresseEmail, password, role) VALUES
(2, 'Riadh', 'HAJJI', 'Homme', 'hajjriadh@gmail.com', '123', 'Employe');
INSERT INTO utilisateur (idUtil, prenomUtil, nomUtil, sexeUtil, adresseEmail, password, role) VALUES
(3, 'jane', 'doe', 'Femme', 'jane@gmail.com', '123', 'Employe');
INSERT INTO utilisateur (idUtil, prenomUtil, nomUtil, sexeUtil, adresseEmail, password, role) VALUES
(6, 'ghhghgh', 'kjkjkj', 'Homme', 'kjkj', '123', 'Employe');

-- Structure de la table voitures
CREATE TABLE voitures (
  id_voiture int NOT NULL AUTO_INCREMENT,
  marque_voiture varchar(100) NOT NULL,
  modele_voiture varchar(100) NOT NULL,
  annee_fabrication_voiture int NOT NULL,
  kilometrage_voiture decimal(10,3) DEFAULT NULL,
  type_boite_voiture varchar(50) DEFAULT NULL,
  couleur_voiture varchar(50) DEFAULT NULL,
  nombre_porte_voiture int DEFAULT NULL,
  carburant_voiture varchar(50) DEFAULT NULL,
  co2_voiture int DEFAULT NULL,
  prix_voiture decimal(10,2) DEFAULT NULL,
  image_voiture varchar(100) DEFAULT NULL,
  puissance_moteur_voiture varchar(45) DEFAULT NULL,
  nombre_sieges_voiture varchar(45) DEFAULT NULL,
  type_carrosserie_voiture varchar(45) DEFAULT NULL,
  PRIMARY KEY (id_voiture));
  -- Insertion des données
  INSERT INTO voitures (id_voiture, marque_voiture, modele_voiture, annee_fabrication_voiture, kilometrage_voiture, type_boite_voiture, couleur_voiture, nombre_porte_voiture, carburant_voiture, co2_voiture, prix_voiture, image_voiture, puissance_moteur_voiture, nombre_sieges_voiture, type_carrosserie_voiture) VALUES
(1, 'TESLA', 'Max 5', 2009, 299.000, 'automatique', 'blanche', 4, 'élétrique', 0, 43890.00, 'TESLA_MAX.png', '450', '5', 'Berline');
  INSERT INTO voitures (id_voiture, marque_voiture, modele_voiture, annee_fabrication_voiture, kilometrage_voiture, type_boite_voiture, couleur_voiture, nombre_porte_voiture, carburant_voiture, co2_voiture, prix_voiture, image_voiture, puissance_moteur_voiture, nombre_sieges_voiture, type_carrosserie_voiture) VALUES
(2, 'Dodge', 'RAM', 2010, 43.200, 'Manuelle', 'noir', 5, 'Diesel', 234, 45120.00, 'Dodge_RAM.png', '300', '5', 'Berline');
  INSERT INTO voitures (id_voiture, marque_voiture, modele_voiture, annee_fabrication_voiture, kilometrage_voiture, type_boite_voiture, couleur_voiture, nombre_porte_voiture, carburant_voiture, co2_voiture, prix_voiture, image_voiture, puissance_moteur_voiture, nombre_sieges_voiture, type_carrosserie_voiture) VALUES
(3, 'Volvo', ' volvo 23', 2014, 345.343, 'Manuelle', 'blanche', 5, 'diesel', 345, 25120.00, 'Volvo_volvo23.png', '450', '5', 'Berline');
  INSERT INTO voitures (id_voiture, marque_voiture, modele_voiture, annee_fabrication_voiture, kilometrage_voiture, type_boite_voiture, couleur_voiture, nombre_porte_voiture, carburant_voiture, co2_voiture, prix_voiture, image_voiture, puissance_moteur_voiture, nombre_sieges_voiture, type_carrosserie_voiture) VALUES
(7, 'Ford', 'Mustang', 2015, 30.000, 'automatique', 'rouge', 2, 'essence', 250, 55000.00, 'Ford_Mustang.png', '450', '2', 'Coupé');
  INSERT INTO voitures (id_voiture, marque_voiture, modele_voiture, annee_fabrication_voiture, kilometrage_voiture, type_boite_voiture, couleur_voiture, nombre_porte_voiture, carburant_voiture, co2_voiture, prix_voiture, image_voiture, puissance_moteur_voiture, nombre_sieges_voiture, type_carrosserie_voiture) VALUES
(8, 'Honda', 'Civic', 2018, 20.000, 'automatique', 'bleu', 4, 'essence', 120, 18000.00, 'Honda_Civic.png', '150', '5', 'Berline');
  INSERT INTO voitures (id_voiture, marque_voiture, modele_voiture, annee_fabrication_voiture, kilometrage_voiture, type_boite_voiture, couleur_voiture, nombre_porte_voiture, carburant_voiture, co2_voiture, prix_voiture, image_voiture, puissance_moteur_voiture, nombre_sieges_voiture, type_carrosserie_voiture) VALUES
(9, 'BMW', 'X5', 2020, 15.000, 'automatique', 'noir', 4, 'essence', 180, 75000.00, 'BMW_X5.png', '300', '5', 'VUS');
  INSERT INTO voitures (id_voiture, marque_voiture, modele_voiture, annee_fabrication_voiture, kilometrage_voiture, type_boite_voiture, couleur_voiture, nombre_porte_voiture, carburant_voiture, co2_voiture, prix_voiture, image_voiture, puissance_moteur_voiture, nombre_sieges_voiture, type_carrosserie_voiture) VALUES
(10, 'Toyota', 'Corolla', 2017, 25.000, 'automatique', 'argent', 4, 'essence', 110, 22000.00, 'Toyota_Corolla.png', '120', '5', 'Berline');
  INSERT INTO voitures (id_voiture, marque_voiture, modele_voiture, annee_fabrication_voiture, kilometrage_voiture, type_boite_voiture, couleur_voiture, nombre_porte_voiture, carburant_voiture, co2_voiture, prix_voiture, image_voiture, puissance_moteur_voiture, nombre_sieges_voiture, type_carrosserie_voiture) VALUES
(11, 'Chevrolet', 'Camaro', 2016, 18.000, 'automatique', 'jaune', 2, 'essence', 220, 45000.00, 'Chevrolet_Camaro.png', '400', '2', 'Coupé');
  INSERT INTO voitures (id_voiture, marque_voiture, modele_voiture, annee_fabrication_voiture, kilometrage_voiture, type_boite_voiture, couleur_voiture, nombre_porte_voiture, carburant_voiture, co2_voiture, prix_voiture, image_voiture, puissance_moteur_voiture, nombre_sieges_voiture, type_carrosserie_voiture) VALUES
(12, 'Mercedes-Benz', 'E-Class', 2019, 22.000, 'automatique', 'noir', 4, 'essence', 150, 58000.00, 'Mercedes_EClass.png', '300', '5', 'Berline');
  INSERT INTO voitures (id_voiture, marque_voiture, modele_voiture, annee_fabrication_voiture, kilometrage_voiture, type_boite_voiture, couleur_voiture, nombre_porte_voiture, carburant_voiture, co2_voiture, prix_voiture, image_voiture, puissance_moteur_voiture, nombre_sieges_voiture, type_carrosserie_voiture) VALUES
(13, 'Audi', 'Q5', 2018, 28.000, 'automatique', 'gris', 5, 'diesel', 180, 65000.00, 'Audi_Q5.png', '250', '5', 'VUS');
