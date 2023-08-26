CREATE DATABASE `garageparrot`;
CREATE TABLE `garageparrot`.`utilisateur` ( `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY , `nom` VARCHAR(50),`prenom` VARCHAR(50),`email` VARCHAR(100) NOT NULL UNIQUE,`mdp` VARCHAR(32)NOT NULL UNIQUE,`type` VARCHAR(4) NOT NULL) ENGINE = MyISAM;

INSERT INTO utilisateur (`id`,`nom`,`prenom`,`email`,`mdp`,`type`) VALUES (1, 'admin','admin','admin@admin.com','admin','adm');
;
