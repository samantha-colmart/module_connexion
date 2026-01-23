<?php
include '../includes/config.php';

if (!isset($_SESSION['user'])) {
    header("Location: ../pages/connexion.php");
    exit;
}

$user = $_SESSION['user'];
$pageClass = 'dramas-page';
include '../includes/header.php';

$drama = [
    'titre' => 'Melody of Golden Age',
    'img' => '../images/melody_of_golden_age.jpeg',
    'date' => '26/08/2024 - 13/09/2024',
    'pays' => 'Chine',
    'age' => '-',
    'episodes' => '40 X 45 min',
    'theme' => 'Romance, Historique, Mystère, Enquête, Mariage forcé',
    'plateforme' => 'Viki',
    'suite' => '-',
    'adaptation' => '-',
    'visionnage' => '27/08/2024 - 20/09/2024',
    'synopsis' => 'Dotée d’un grand talent de déduction, Yan Xing rêve de devenir officière et de résoudre des enquêtes. Mais lorsque sa sœur fuit un mariage arrangé, elle est contrainte de prendre sa place et d’épouser Shen Du, commandant de la garde impériale, bouleversant ainsi son destin.',
    'casting' => [
        ['nom' => 'Deng En Xi', 'photo' => '../images/deng_en_xi.jpeg'],
        ['nom' => 'Ding Yu Xi', 'photo' => '../images/dingyuxi.jpeg']
    ],
    'galerie' => [
        '../images/melodyofgage_scene1.jpg',
        '../images/melodyofgage_scene2.jpg',
        '../images/melodyofgage_scene3.jpeg'
    ]
];
?>

<div class="main-content">

    <!-- SECTION HAUT : IMAGE + INFOS -->
    <div class="drama-top" style="display:flex; flex-wrap:wrap; gap:20px; margin-bottom:20px;">
        <div class="drama-img" style="flex:1; min-width:250px;">
            <img src="<?= $drama['img'] ?>" alt="<?= htmlspecialchars($drama['titre']) ?>" style="width:100%; border-radius:12px;">
        </div>
        <div class="drama-info" style="flex:2; min-width:300px; text-align:left;">
            <h1><?= htmlspecialchars($drama['titre']) ?></h1>
            <p><strong>Date de diffusion :</strong> <?= htmlspecialchars($drama['date']) ?></p>
            <p><strong>Pays :</strong> <?= htmlspecialchars($drama['pays']) ?></p>
            <p><strong>Âge conseillé :</strong> <?= htmlspecialchars($drama['age']) ?></p>
            <p><strong>Épisodes :</strong> <?= htmlspecialchars($drama['episodes']) ?></p>
            <p><strong>Thème :</strong> <?= htmlspecialchars($drama['theme']) ?></p>
            <p><strong>Plateforme de visionnage :</strong> <?= htmlspecialchars($drama['plateforme']) ?></p>
            <p><strong>Suites / Précédents :</strong> <?= htmlspecialchars($drama['suite']) ?></p>
            <p><strong>Autres Adaptations :</strong> <?= htmlspecialchars($drama['adaptation']) ?></p>
            <p><strong>Date de mon visionnage :</strong> <?= htmlspecialchars($drama['visionnage']) ?></p>
        </div>
    </div>

    <!-- SYNOPSIS EN DESSOUS --> 
    <div class="drama-synopsis" style="margin-bottom:40px;">
        <h3>Synopsis</h3>
        <p><?= htmlspecialchars($drama['synopsis']) ?></p>

    <!-- NOTES -->
    <div class="drama-notes" style="display:flex; gap:60px; flex-wrap:wrap; font-weight:bold; margin-top:20px; justify-content:center; font-size:1.2em;">
        <span>Viki : <span style="color:#ff9900;">9.4/10</span></span>
        <span>Nautiljon : <span style="color:#ff9900;">8.29/10</span></span>
        <span>MyDramaList : <span style="color:#ff9900;">8.1/10</span></span>
        <span>Ma note : <span style="color:#00cc66;">7/10</span></span>
    </div>
</div>

    <!-- SECTION CASTING -->
    <h2>Cast</h2>
    <div class="casting" style="display:flex; flex-wrap:wrap; gap:20px; margin-bottom:40px;">
        <?php foreach ($drama['casting'] as $actor): ?>
            <div class="actor" style="width:150px; text-align:center;">
                <img src="<?= $actor['photo'] ?>" alt="<?= htmlspecialchars($actor['nom']) ?>" style="width:100%; border-radius:12px;">
                <p><?= htmlspecialchars($actor['nom']) ?></p>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- SECTION GALERIE -->
    <h2>Galerie</h2>
    <div class="drama-gallery" style="display:flex; flex-wrap:wrap; gap:20px; justify-content:center;">
        <?php foreach ($drama['galerie'] as $photo): ?>
            <div class="gallery-item" style="width:250px;">
                <img src="<?= $photo ?>" alt="Photo du drama" style="width:100%; border-radius:12px;">
            </div>
        <?php endforeach; ?>
    </div>

    <p style="margin-top:40px;"><a href="dramas.php">← Retour à la liste des dramas</a></p>
</div>

<?php include '../includes/footer.php'; ?>


    <!-- rajout d'une section commentaire -->