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
    'titre' => 'Hello the Sharpshooter',
    'img' => '../images/hellosharpshooter.jpg',
    'date' => '02/02/2022 - 10/03/2022',
    'pays' => 'Chine',
    'age' => '15 ans et +',
    'episodes' => '40 X 45 min',
    'theme' => 'Romance, Sport, Université, Seconde Chance, Amnésie, Journaliste, Ex, Colocation, Premier Amour',
    'plateforme' => 'Viki',
    'suite' => '-',
    'adaptation' => '-',
    'visionnage' => '02/02/2022 - 10/03/2022',
    'synopsis' => 'Tang Xin, journaliste sportive, est chargée d’interviewer Shen Qing Yuan, champion de tir et ancien amour de jeunesse. S’il ne se souvient pas d’elle, sa présence le trouble pourtant inexplicablement, ravivant des sentiments enfouis.',
    'casting' => [
        ['nom' => 'Xing Fei', 'photo' => '../images/xingfei.jpeg'],
        ['nom' => 'Hu Yi Tian', 'photo' => '../images/huyitian.jpeg']
    ],
    'galerie' => [
        '../images/hellosharpshooter_scene1.jpg',
        '../images/hellosharpshooter_scene2.jpg',
        '../images/hellosharpshooter_scene3.jpg'
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
        <span>Viki : <span style="color:#ff9900;">9.3/10</span></span>
        <span>Nautiljon : <span style="color:#ff9900;">7.6/10</span></span>
        <span>MyDramaList : <span style="color:#ff9900;">7.8/10</span></span>
        <span>Ma note : <span style="color:#00cc66;">8,5/10</span></span>
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