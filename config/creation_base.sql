-- Active: 1701944934345@@127.0.0.1@3306
CREATE DATABASE `garageparrot`
  CHARACTER SET utf8
  COLLATE utf8_general_ci;

-- Création de l’utilisateur BDD backoffice pour la création de compte
  CREATE USER 'user'@'localhost' IDENTIFIED BY '3f7zhhRn4NH69R';

  -- Attribution des droits sur la table "users"
GRANT SELECT, INSERT, UPDATE, DELETE ON garageparrot.users TO 'user'@'localhost';

--création de compte utilisateur BDd tous privilèges 
  CREATE USER 'root'@'localhost' IDENTIFIED BY '';

  GRANT ALL PRIVILEGES ON * . * TO 'root'@'localhost';
 
-- Création des tables et insertion de données
CREATE TABLE `garageparrot`.`users` (
    `id` INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY ,
    `name` VARCHAR(100),`surname` VARCHAR(100),
    `email` VARCHAR(255) NOT NULL UNIQUE,
    `password` VARCHAR(255)NOT NULL
    );
ALTER TABLE `garageparrot`.`users`ADD COLUMN (
    `role` varchar(14));

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `password`, `role`) VALUES
(1, 'Parrot', 'Vincent', 'vparrot@mail.com', '3f7zhhRn4NH69', 'Administrateur'),
(2, 'Martin', 'jean', 'jmartin@mail.com', '$2y$10$pGJL9cmOdZBV8E6LmgsUP.r129Gt0KHW.eM5DzYQM2VnGAh.p7VCK', 'Employé');


CREATE TABLE `garageparrot`.`cars` (
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
    `modele` VARCHAR(100) NOT NULL,
    `energy` VARCHAR(50) NOT NULL,
    `km`INT (6) NOT NULL ,
    `year` INT (4)NOT NULL,
    `carContent` VARCHAR(200) NOT NULL
    ) ENGINE = MyISAM;
ALTER TABLE `garageparrot`.`cars` ADD COLUMN 
    `price` VARCHAR(6) NOT NULL;

  ALTER TABLE `garageparrot`.`cars`ADD COLUMN (
    `carBoite` varchar(10),
    `color` varchar(20),
    `carDoor` int,
    `puissanceFiscale` int,
    `Puissance` int,
    `guarantie` int  );

    ALTER TABLE `garageparrot`.`cars`ADD COLUMN (
    `interieur` varchar(250),
    `chassis` varchar(250),
    `autre` varchar(250));

    ALTER TABLE `garageparrot`.`cars`ADD COLUMN (
    `img1` varchar(250),
    `img2` varchar(250),
    `img3` varchar(250),
    `img4` varchar(250)      
    );

    INSERT INTO `cars` (`id`, `modele`, `energy`, `km`, `year`, `carContent`, `price`, `firstPicture`, `carBoite`, `color`, `carDoor`, `puissanceFiscale`, `Puissance`, `guarantie`, `interieur`, `chassis`, `autre`, `archive`, `img1`, `img2`, `img3`, `img4`, `img5`) VALUES
(1, 'JEEP COMPASS II phase 2', 'Gasoil', 77628, '2021', '1.6 MJET 130 LIMITED ', 24995, '', 'manuelle', 'Blanc nacré', 5, 7, 131, 12, 'Climatisation,Affichage tête haute,Alerte franchissement de ligne', 'Toit panoramique,Retroviseur electrique', '', NULL, '../uploads/W102834019_STANDARD_1.jpg', '../uploads/W102834019_STANDARD_2.jpg', '../uploads/E112536985_STANDARD_7.jpg', NULL, NULL),
(2, 'AUDI RS4 V', 'Essence', 56900, '2018', 'AUDI RS4 V AVANT V6 2.9 TFSI 450 QUATTRO TIPTRONIC', 75990, '', 'automatic', 'Gris', 5, 34, 450, 12, 'Camera de recul,Climatisation,Régulateur de vitesse,Siege chauffant,Vitre surteintées,Intérieur cuir,Alerte franchissement de ligne', 'Chassis sport,Jantes Alu,Retroviseur electrique', '', NULL, '../uploads/E113347647_STANDARD_1.jpg', '../uploads/E113347647_STANDARD_3.jpg', '../uploads/E112536985_STANDARD_16.jpg', '../uploads/E113347647_STANDARD_5.jpg', NULL),
(3, 'RENAULT ESPACE V', 'Gasoil', 97500, '2017', 'RENAULT ESPACE V 1.6 DCI 160 ENERGY INITIALE PARIS EDC 5PL', 20900, '', 'automatic', 'Gris clair', 5, 8, 161, 12, 'Camera de recul,Climatisation,Régulateur de vitesse,Affichage tête haute,Alerte franchissement de ligne', 'Toit panoramique,Retroviseur electrique', '', NULL, '../uploads/E112536985_STANDARD_2.jpg', '../uploads/E112536985_STANDARD_3.jpg', '../uploads/E113527411_STANDARD_7.jpg', '../uploads/E113527411_STANDARD_20.jpg', NULL),
(4, 'DACIA DUSTER 2', 'Essence', 10, '2023', 'DACIA DUSTER JOURNEY 1.3 TCE 130CH MANUELLE', 23670, '', 'manuelle', 'Noir', 5, 7, 130, 36, 'Camera de recul,Climatisation,Alerte franchissement de ligne', 'Retroviseur electrique', '', NULL, '../uploads/E113210533_STANDARD_1.jpg', '../uploads/E113210533_STANDARD_7.jpg', '../uploads/W102834019_STANDARD_7.jpg', NULL, NULL);

CREATE TABLE `garageparrot`.`services`(
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
    `title` VARCHAR(20) NOT NULL,
    `servicesContent` VARCHAR(250) NOT NULL,
    `servicesPicture` VARCHAR(250)
    );

INSERT INTO `services` (`id`, `title`, `servicesContent`, `servicesPicture`) VALUES
(1, 'MECANIQUE', 'Nous intervenons sur tous types de travaux, sur de l’entretien classique aussi bien que sur de la mécanique lourde.\r\n\r\nLe garage effectue vos révisons périodiques et vidanges sur tous types de véhicules, même les plus récents.\r\n', '../uploads/img_service_mecanique.png'),
(2, 'CARROSSERIE', 'Nous disposons de notre propre atelier de carosserie et de sa cabine de peinture.\r\n\r\nNous proposons du:\r\n\r\n-Redressage et remise en état\r\n-Débosselage\r\n-Peinture de votre carrosserie\r\n-Lustrage\r\n-Vernissage', '../uploads/img_service_carrosserie.png');

    CREATE TABLE `garageparrot`.`message` (
    `id` INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY ,
    `name` VARCHAR(100),
    `surname` VARCHAR(100),
    `email` VARCHAR(255) NOT NULL UNIQUE,
    `phone` VARCHAR(15)NOT NULL,
    `message` VARCHAR(255)NOT NULL,
    `date` DATE NOT NULL
    );
    ALTER TABLE `garageparrot`.`message`ADD COLUMN (
    `archive` varchar(1));

    INSERT INTO `message` (`id`, `name`, `surname`, `email`, `phone`, `message`, `date`, `archive`) VALUES
(1, 'PITT', 'BRAD', 'bradpitt@mail.com', '00.10.11.12.13', 'Bonjour, faites vous de la location de voiture,\r\nmerci', '2024-02-08', 'Y'),
(2, 'LEMARCHAND', 'elisabeth', 'elemarchand@gmail.com', '06.23.47.83.79', 'Bonjour,faites vous l\'entretien des vehicule hybride.Merci', '2024-02-09', ''),
(3, 'Rousselin', 'Louis', 'rousselin@mail.com', '02.32.65.83.46', 'Bonjour,vendez vous des voitures neuves.Dans l\'attente de votre retour.', '2024-02-09', 'Y'),
(4, 'Jolie', 'Angelina', 'jolieangellina@gmail.com', '02.44.57.23.12', 'Bonjour,faites vous la pose de pneu', '2024-02-09', 'Y');

CREATE TABLE `garageparrot`.`horaires` (
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `day` VARCHAR (25) NOT NULL,
    `heure_debut_am` TIME,
    `heure_fin_am` TIME,
    `heure_debut_pm` TIME,
    `heure_fin_Pm` TIME
  );

INSERT INTO `horaires` (`id`, `day`, `heure_debut_am`, `heure_fin_am`, `heure_debut_pm`, `heure_fin_pm`) VALUES
(1, 'Lundi', '08:00:00', '12:00:00', '14:00:00', '18:00:00'),
(2, 'Mardi', '08:00:00', '12:00:00', '14:00:00', '18:00:00'),
(3, 'Mercredi', '08:00:00', '12:00:00', '14:00:00', '18:00:00'),
(4, 'Jeudi', '08:00:00', '12:00:00', '14:00:00', '18:00:00'),
(5, 'Vendredi', '08:00:00', '12:00:00', '14:00:00', '18:00:00'),
(6, 'Samedi', '08:00:00', '13:00:00', '00:00:00', '00:00:00');

  CREATE TABLE `garageparrot`.`comments` (
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `date` DATE NOT NULL,
    `pseudo` VARCHAR (25) ,
    `comments` VARCHAR (255) NOT NULL,
    `rating` INT );

    ALTER TABLE `garageparrot`.`comments`ADD COLUMN (
    `archive` varchar(1));

    INSERT INTO `comments` (`id`, `date`, `pseudo`, `comments`, `rating`, `publication`) VALUES
(1, '2024-02-10', 'Mme Blanchet', 'Nous somme ravi de notre nouveau véhicule,Mr Parrot a su nous conseiller par rapport a nos besoin et attente.Merci', 5, 'P'),
(2, '2024-02-10', 'Bernadette', 'Je suis très contente de ce garage que je recommande !!! ', 4, 'P'),
(3, '2024-02-13', '', 'Vraiment satisfait de l’intervention merci encore.\r\n', 5, 'P'),
(4, '2024-02-13', '', 'Equipe Pro très sympa et disponible.\r\nTarif honnête.\r\nJe recommande ce garage +++\r\n', 4, 'P'),
(5, '2024-02-13', '', 'C était une bonne surprise. L accueil était très sympathique et le technicien précautionneux, il a tout vérifié et pris le temps de m expliquer.\r\nAucun souci pour me garer c était pratique.\r\nJe recommande', 5, 'P'),
(6, '2024-02-13', 'Cothurnal', 'Rien à redire\r\nAccueil excellent\r\nTarif très convenable\r\nDelai de rendez vous et de réparation rapide', 5, 'P'),
(7, '2024-02-17', 'Mme Picq', 'Rien à redire\r\nAccueil excellent\r\nTarif très convenable\r\nDélai de rendez vous et de réparation rapide', 4, 'P'),
(8, '2024-02-17', 'Mr Diz', 'Je n\'ai pas appréciés l\'accueil . A revoir', 3, 'P'),
(10, '2024-02-10', 'Mme Blanchet', 'Nous somme ravi de notre nouveau véhicule,Mr Parrot a su nous conseiller par rapport a nos besoin et attente.Merci', 5, 'P');