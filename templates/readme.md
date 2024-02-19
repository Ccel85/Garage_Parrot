GARAGE V PARROT est une application web fournit une large gamme de voitures et les services nécessaires pour vos véhicules. 

Version en ligne :

Prérequis
Pour exécuter cette application en local, vous aurez besoin de :

Git
Serveur WAMP ou autres
PHP 8.1.26 ou supérieur
Un système de gestion de bases de données comme MySQL
Installation
Suivez ces étapes pour installer et exécuter le projet en local :

Cloner le dépôt : git clone 

Aller dans le répertoire du projet : cd GARAGE_PARROT

Configurer votre environnement local en modifiant le fichier .env ou en créant un fichier .env.local :

Définissez la variable DATABASE_URL avec les informations de connexion à la base de données


Création d'un compte administrateur local
Connectez-vous à la base de données;
login: root
password: 3f7zhhRn4NH69R

Accédez à la table "users". Cette table contient six colonnes : "id", "name", "username","email", "password" et "role";

Pour créer un nouvel administrateur, ajoutez une nouvelle ligne dans cette table. Choisissez un "name", "username", "email", "password" et "role" pour le nouvel administrateur. Pour la colonne "role","Administrateur;

Une fois le compte administrateur créé, vous pouvez vous connecter au back-office en utilisant le nom d'utilisateur et le mot de passe que vous avez définis;

Suivez ces étapes pour vous connecter :

CONNEXION AU BACK-OFFICE
Cliquez sur le BOUTTON CONNEXION sous l'icone du menu deroulant en haut à gauche .
Entrez le nom d'utilisateur et le mot de passe precedement créé.
Vous êtes maintenant connecté en tant qu'administrateur et pouvez gérer les employées, les véhicules et les avis des clients, etc;
DECONNEXION
Pour vous déconnecter de l'administration, cliquez simplement sur le BOUTTON DECONNEXION dans le menu déroulant.

L'administrateur peut:
-Gérer les utilisateurs (role:employé ou adlinistrateur);
-Gérer les annonces
-Gérer les avis
-Gérer les services proposés
-Gérer l'affichage des horaires