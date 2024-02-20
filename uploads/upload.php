<?php
if(isset($_FILES['fileInput'])) {
    $file = $_FILES['fileInput'];

    // Vérifie si aucun fichier n'a été téléchargé
    if ($file['error'] === UPLOAD_ERR_OK) {
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileDestination = '../uploads/' . $fileName;

        // Déplace le fichier téléchargé vers le dossier de destination
        if (move_uploaded_file($fileTmpName, $fileDestination)) {
            echo "Le fichier a été téléchargé avec succès.";
            echo "<br>";
            echo "Chemin d'accès de l'image : " . $fileDestination;
        } else {
            echo "Une erreur s'est produite lors du téléchargement du fichier.";
        }
    } else {
        echo "Une erreur est survenue : " . $file['error'];
    }
}
?>