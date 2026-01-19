<?php
include '../includes/config.php';
include '../includes/header.php';

// Vérifie si l'utilisateur est connecté
if (!isset($_SESSION['user'])) {
    header("Location: ../pages/connexion.php");
    exit;
}

$user = $_SESSION['user'];

// Liste des dramas
$dramas = [
    ['titre'=>'Crash Landing on You','img'=>'../images/drama1.jpg','short'=>'Romance entre Corée du Sud et Nord','desc'=>'Une romance entre une héritière sud-coréenne et un officier nord-coréen...'],
    ['titre'=>'Itaewon Class','img'=>'../images/drama2.jpg','short'=>'Jeune entrepreneur dans Itaewon','desc'=>'Un jeune entrepreneur lutte pour ouvrir son bar dans le quartier d\'Itaewon...'],
    ['titre'=>'Vincenzo','img'=>'../images/drama3.jpg','short'=>'Avocat mafieux italien en Corée','desc'=>'Un avocat mafieux italien retourne en Corée et se bat contre la corruption...'],
    ['titre'=>'Goblin','img'=>'../images/drama4.jpg','short'=>'Immortel cherche sa fin','desc'=>'L\'histoire d\'un immortel cherchant à mettre fin à sa vie éternelle...'],
    ['titre'=>'Kingdom','img'=>'../images/drama5.jpg','short'=>'Épidémie zombie en Corée','desc'=>'Un prince découvre une épidémie qui transforme les gens en morts-vivants...'],
    ['titre'=>'Sweet Home','img'=>'../images/drama6.jpg','short'=>'Survivre à des monstres','desc'=>'Des habitants d’un immeuble tentent de survivre à une apocalypse de monstres...']
];
?>

<div class="main-content">
    <h1>Bienvenue, <?= htmlspecialchars($user['prenom']) ?> 🎭</h1>
    <p><a href="profil.php" class="profile-link">Modifier mon profil</a></p>
    <p>Découvrez une sélection de dramas :</p>

    <div class="dramas-container">
        <?php foreach ($dramas as $drama): ?>
            <div class="drama-card" onclick="openDrama('<?= addslashes($drama['titre']) ?>','<?= $drama['img'] ?>','<?= addslashes($drama['desc']) ?>')">
                <img src="<?= $drama['img'] ?>" alt="<?= htmlspecialchars($drama['titre']) ?>">
                <h3><?= htmlspecialchars($drama['titre']) ?></h3>
                <p class="drama-short"><?= htmlspecialchars($drama['short']) ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- Modal drama -->
<div id="dramaModal" class="drama-modal">
    <span class="drama-close" onclick="closeDrama()">×</span>
    <h1 id="dramaTitle"></h1>
    <img id="dramaImg" alt="" class="drama-img">
    <p id="dramaDesc"></p>
</div>

<?php include '../includes/footer.php'; ?>

<script>
function openDrama(title,img,desc){
    document.getElementById('dramaTitle').innerText = title;
    document.getElementById('dramaImg').src = img;
    document.getElementById('dramaDesc').innerText = desc;
    document.getElementById('dramaModal').style.display = 'flex';
}
function closeDrama(){
    document.getElementById('dramaModal').style.display = 'none';
}
</script>