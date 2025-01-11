<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $whatsapp = $_POST['whatsapp'];
    $niveau = $_POST['niveau'];

    // Valider que les champs ne sont pas vides
    if (!empty($nom) && !empty($prenom) && !empty($whatsapp) && !empty($niveau)) {
        // Connexion à la base de données (remplacez les valeurs par celles de votre serveur)
        $host = "club";
        $username = "Sawadogo";
        $password = "15123857";
        $dbname = "club informatique";

        $conn = new mysqli($host, $username, $password, $dbname);

        // Vérifier la connexion
        if ($conn->connect_error) {
            die("Erreur de connexion: " . $conn->connect_error);
        }

        // Préparer et exécuter la requête SQL
        $sql = "INSERT INTO inscriptions (nom, prenom, whatsapp, niveau) VALUES ('$nom', '$prenom', '$whatsapp', '$niveau')";

        if ($conn->query($sql) === TRUE) {
            echo "Inscription réussie. Merci de nous avoir rejoint !";
        } else {
            echo "Erreur: " . $sql . "<br>" . $conn->error;
        }

        // Fermer la connexion
        $conn->close();
    } else {
        echo "Veuillez remplir tous les champs.";
    }
}
?>