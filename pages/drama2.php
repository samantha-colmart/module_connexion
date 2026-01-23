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
    'titre' => 'Secret Royal Inspector Joy',
    'img' => '../images/secretroyalejoy.jpg',
    'date' => '08/11/2021 - 28/12/2021',
    'pays' => 'Corée du Sud',
    'age' => '15 ans et +',
    'episodes' => '16 X 70 min',
    'theme' => 'Romance, Historique, Action, Comédie, Détective',
    'plateforme' => 'Viki',
    'suite' => '-',
    'adaptation' => '-',
    'visionnage' => '09/05/2025',
    'synopsis' => 'Kim Joy, femme curieuse et moderne à une époque où les droits des femmes sont limités, cherche un nouveau départ après un mariage malheureux. Elle rencontre Ra Yi Eon, un homme paresseux mais brillant, devenu agent secret royal. Ensemble, ils résolvent des affaires tout en découvrant de nouvelles perspectives pour leur vie.',
    'casting' => [
        ['nom' => 'Kim Hye Yoon', 'photo' => '../images/KimHyeYoon.jpg'],
        ['nom' => 'Ok Taec Yeon', 'photo' => '../images/OkTaecYeon.jpg']
    ],
    'galerie' => [
        '../images/secretrijoy-scene1.jpeg',
        '../images/secretrijoy-scene2.jpeg',
        '../images/secretrijoy-scene3.jpg'
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
        <span>Viki : <span style="color:#ff9900;">9.2/10</span></span>
        <span>Nautiljon : <span style="color:#ff9900;">7.78/10</span></span>
        <span>MyDramaList : <span style="color:#ff9900;">7.8/10</span></span>
        <span>Ma note : <span style="color:#00cc66;">6.5/10</span></span>
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