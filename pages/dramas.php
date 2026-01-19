<?php
include '../includes/config.php';
include '../includes/header.php';

// Vérifie si l'utilisateur est connecté
if (!isset($_SESSION['user'])) {
    header("Location: ../pages/connexion.php");
    exit;
}

$user = $_SESSION['user'];

//Liste des dramas
$dramas = [
    ['titre'=>'Crash Landing on You','img'=>'../images/drama1.jpg','short'=>'Romance entre Corée du Sud et Nord','page'=>'drama1.php'],
    ['titre'=>'Itaewon Class','img'=>'../images/drama2.jpg','short'=>'Jeune entrepreneur dans Itaewon','page'=>'drama2.php'],
    ['titre'=>'Vincenzo','img'=>'../images/drama3.jpg','short'=>'Avocat mafieux italien en Corée','page'=>'drama3.php'],
    ['titre'=>'Goblin','img'=>'../images/drama4.jpg','short'=>'Immortel cherche sa fin','page'=>'drama4.php'],
    ['titre'=>'Kingdom','img'=>'../images/drama5.jpg','short'=>'Épidémie zombie en Corée','page'=>'drama5.php'],
    ['titre'=>'Sweet Home','img'=>'../images/drama6.jpg','short'=>'Survivre à des monstres','page'=>'drama6.php']
];
?>

<div class="main-content">
    <h1>Bienvenue, <?= htmlspecialchars($user['prenom']) ?> 🎭</h1>
    <p><a href="profil.php" class="profile-link">Modifier mon profil</a></p>
    <p>Découvrez une sélection de dramas :</p>

    <div class="dramas-container" style="display:flex; flex-wrap:wrap; gap:20px;">
        <?php foreach ($dramas as $drama): ?>
            <div class="drama-card" style="width:calc(33% - 13px); border:1px solid #ccc; border-radius:10px; overflow:hidden; text-align:center; cursor:pointer;">
                <a href="<?= $drama['page'] ?>" style="text-decoration:none; color:inherit;">
                    <img src="<?= $drama['img'] ?>" alt="<?= htmlspecialchars($drama['titre']) ?>" style="width:100%; height:auto;">
                    <h3 style="margin:10px 0;"><?= htmlspecialchars($drama['titre']) ?></h3>
                    <p class="drama-short" style="margin-bottom:10px;"><?= htmlspecialchars($drama['short']) ?></p>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include '../includes/footer.php'; ?>