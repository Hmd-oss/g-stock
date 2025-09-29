<?php
// Paramètres de connexion
$host = 'localhost';
$dbname = 'g_stock_php';
$username = 'root';
$password = '';

try {
    // Créer une nouvelle instance de connexion PDO
    $connexion = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    
    // Configurer PDO pour afficher les erreurs sous forme d'exceptions
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // echo "Connexion réussie à la base de données!";
} catch (connexionException $e) {
    // En cas d'erreur de connexion
    echo "Erreur de connexion : " . $e->getMessage();
    exit;
}
?>
