<?php
$basePath = (strpos($_SERVER['PHP_SELF'], '/pages/') !== false) ? '../' : '';

$cssPath = (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'css/style.css' : '../css/style.css';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Module Connexion - Thème Dramas 🎭</title>
    <link rel="stylesheet" href="<?= $cssPath ?>">
</head>
<body>
<header>
    <div class="header-container">
        <a href="<?= $basePath ?>index.php" class="home-btn">Accueil</a>

        <h1 class="center-title">Dramas 🎭</h1>

        <nav class="genre-buttons">
            <a href="<?= $basePath ?>pages/inscription.php" class="genre-btn">Inscription</a>
            <a href="<?= $basePath ?>pages/connexion.php" class="genre-btn">Connexion</a>
        </nav>
    </div>
</header>

<main>