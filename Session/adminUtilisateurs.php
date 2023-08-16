<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Garage V.Parrot</title>
    <!--Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!--feuille CSS -->
    <link rel="stylesheet" href="style.css">
</head>
    <body>
        <?php
            $servname = 'localhost';
            $dbname = 'garageparrot';
            $user = 'admin';
            $pass = 'admin';

            try{

                $dbco = new PDO("mysql : host=$servname;dbname=$dbname", $user,$pass);

                $dbco-> setAttribute(PDO :: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = " INSERT INTO 
                utilisateurs('login',pass_md5)
                VALUES('admin','admin')";

                $dbco->exec($sql);
                echo 'Entrée ajoutée à la table';
            }

            catch (PDOException $e) {
                echo "Erreur : ". $e->getMessage();
            }
        ?>
    </body>
</html>