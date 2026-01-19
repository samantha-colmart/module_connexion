<?php
include '../includes/config.php';
include '../includes/header.php';

// Vérifie que l'utilisateur est connecté et que c'est l'admin
if (!isset($_SESSION['user']) || strtolower($_SESSION['user']['login']) !== 'admin6') {
    header("Location: ../pages/connexion.php"); // Redirige vers la connexion si pas admin
    exit;
}

// Récupère tous les utilisateurs
$sql = "SELECT login, prenom, nom FROM utilisateurs ORDER BY login ASC";
$users = $pdo->query($sql)->fetchAll();

// Infos de l'admin connecté
$admin = $_SESSION['user'];
?>

<div class="main-content">
    <h1>Administration</h1>

    <!-- Bloc informations admin -->
    <div style="margin-bottom: 30px; padding: 15px; background: rgba(255,255,255,0.1); border-radius: 15px; text-align: left;">
        <h2>Admin connecté</h2>
        <p><strong>Login :</strong> <?= htmlspecialchars($admin['login']) ?></p>
        <p><strong>Prénom :</strong> <?= htmlspecialchars($admin['prenom']) ?></p>
        <p><strong>Nom :</strong> <?= htmlspecialchars($admin['nom']) ?></p>
    </div>

    <!-- Table des utilisateurs -->
    <h2>Liste des utilisateurs</h2>
    <table>
        <tr>
            <th>Login</th>
            <th>Prénom</th>
            <th>Nom</th>
        </tr>

        <?php foreach ($users as $u): ?>
            <tr>
                <td><?= htmlspecialchars($u['login']) ?></td>
                <td><?= htmlspecialchars($u['prenom']) ?></td>
                <td><?= htmlspecialchars($u['nom']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

<?php include '../includes/footer.php'; ?>