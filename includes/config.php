<?php
// Démarre la session pour toutes les pages
session_start();

// Paramètres de connexion à la base de données
$host = "localhost";        // généralement localhost
$dbname = "moduleconnexion"; // nom de ta base
$user = "root";             // ton utilisateur MySQL
$password = "";             // ton mot de passe MySQL

try {
    // Connexion PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    // Mode exception pour les erreurs PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Si erreur, arrêt du script et affichage du message
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
?>