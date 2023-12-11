-- Active: 1701944934345@@127.0.0.1@3307@garageparrot
CREATE DATABASE `garageparrot`;
CREATE TABLE `garageparrot`.`users` ( `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY , `name` VARCHAR(100),`surname` VARCHAR(100),`email` VARCHAR(255) NOT NULL UNIQUE,`password` VARCHAR(255)NOT NULL);
-- Création de l’utilisateur
CREATE USER 'user'@'localhost' IDENTIFIED BY '3f7zhhRn4NH69R';
-- Attribution des droits sur la table "users"
GRANT SELECT, INSERT, UPDATE, DELETE ON garageparrot.users TO 'user'@'localhost';
CREATE TABLE roles ( id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT
, name varchar(100) NOT NULL UNIQUE);
GRANT SELECT, INSERT, UPDATE, DELETE ON garageparrot.roles TO 'user'@'localhost';
CREATE TABLE userRoles ( userID varchar (36) NOT NULL, roleId INTEGER(11) NOT NULL,PRIMARY KEY (userId, roleID),FOREIGN KEY (userId) REFERENCES users(id), FOREIGN KEY (roleId) REFERENCES roles(id));
INSERT INTO roles (name) VALUES ('administrateur'),('collaborateur');
GRANT SELECT, INSERT, UPDATE, DELETE ON garageparrot.userRoles TO 'user'@'localhost';
CREATE TABLE `garageparrot`.`cars` (`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY , `modele` VARCHAR(100) NOT NULL,`energy` VARCHAR(50) NOT NULL,`km`INT (6) NOT NULL ,`year` INT (4)NOT NULL,`carContent` VARCHAR(200) NOT NULL) ENGINE = MyISAM;
ALTER TABLE `garageparrot`.`cars` ADD COLUMN `price` VARCHAR(6) NOT NULL;
ALTER TABLE `garageparrot`.`cars`ADD COLUMN `firstPicture` BLOB NOT NULL;
ALTER TABLE `garageparrot`.`cars`ADD COLUMN (`secondPicture` BLOB NOT NULL,`ThirdPicture` BLOB NOT NULL);
CREATE TABLE `garageparrot`.`services`(`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY , `title` VARCHAR(20) NOT NULL,`servicesContent` VARCHAR(250) NOT NULL,`servicesPicture` BLOB NOT NULL) ENGINE = MyISAM;