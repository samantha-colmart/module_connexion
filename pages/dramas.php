<?php
include '../includes/config.php';

// Vérifie si l'utilisateur est connecté
if (!isset($_SESSION['user'])) {
    header("Location: ../pages/connexion.php");
    exit;
}

$user = $_SESSION['user'];

// Liste des dramas
$dramas = [
    ['titre'=>'Strong Girl Bong-Soon 🇰🇷','img'=>'../images/drama1.jpg','short'=>'Une femme dotée d’une force incroyable défie le danger et trouve l’amour.','page'=>'drama1.php'],
    ['titre'=>'Secret Royal Inspector Joy 🇰🇷','img'=>'../images/drama2.jpg','short'=>'Entre complots et amour, il protège le royaume incognito.','page'=>'drama2.php'],
    ['titre'=>'Hello the Sharpshooter 🇨🇳','img'=>'../images/drama3.jpg','short'=>'Précision et sentiments s’entremêlent pour un prodige du tir.','page'=>'drama3.php'],
    ['titre'=>'Melody of Golden Age 🇨🇳','img'=>'../images/drama4.jpg','short'=>'Une chanson du passé change le destin d’aujourd’hui.','page'=>'drama4.php'],
    ['titre'=>'Thame Po : Heart that Skips a Beat 🇹🇭','img'=>'../images/drama5.jpg','short'=>'Une romance fragile naît sur une scène inattendue.','page'=>'drama5.php'],
    ['titre'=>'Vincenzo 🇰🇷','img'=>'../images/drama6.jpg','short'=>'Un avocat mafieux lutte pour la justice.','page'=>'drama6.php']
];

include '../includes/header.php';
?>

<div class="main-content">
    <h1>Bienvenue, <?= htmlspecialchars($user['prenom']) ?> 🎭</h1>
    <p><a href="profil.php" class="profile-link">Modifier mon profil</a></p>
    <p>Découvrez une sélection de dramas :</p>

    <div class="dramas-container">
        <?php foreach ($dramas as $drama): ?>
            <div class="drama-card">
                <a href="<?= $drama['page'] ?>">
                    <img src="<?= $drama['img'] ?>" alt="<?= htmlspecialchars($drama['titre']) ?>">
                    <h3><?= htmlspecialchars($drama['titre']) ?></h3>
                    <p class="drama-short"><?= htmlspecialchars($drama['short']) ?></p>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include '../includes/footer.php'; ?>