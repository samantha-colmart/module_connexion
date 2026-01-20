<?php 
include '../includes/config.php';
include '../includes/header.php';

// Vérifie que l'utilisateur est connecté et admin
if (!isset($_SESSION['user']) || strtolower($_SESSION['user']['login']) !== 'admin6') {
    header("Location: ../pages/connexion.php");
    exit;
}

// Récupère tous les utilisateurs
try {
    $sql = "SELECT login, prenom, nom FROM utilisateurs ORDER BY login ASC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    $users = [];
    $errorMessage = "Erreur lors de la récupération des utilisateurs : " . $e->getMessage();
}

// Infos admin connecté
$admin = $_SESSION['user'];
?>

<div class="main-content">
    <h1>Administration</h1>

    <!-- INFOS ADMIN -->
    <div class="admin-info">
        <h2>Admin connecté</h2>
        <p><strong>Login :</strong> <?= htmlspecialchars($admin['login']) ?></p>
        <p><strong>Prénom :</strong> <?= htmlspecialchars($admin['prenom']) ?></p>
        <p><strong>Nom :</strong> <?= htmlspecialchars($admin['nom']) ?></p>
    </div>

    <!-- TABLE UTILISATEURS -->
    <h2>Liste des utilisateurs</h2>

    <?php if (!empty($errorMessage)): ?>
        <p style="color: red;"><?= $errorMessage ?></p>
    <?php endif; ?>

    <div class="admin-table-container">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Login</th>
                    <th>Prénom</th>
                    <th>Nom</th>
                </tr>
            </thead>
            <tbody>
            <?php if (!empty($users)): ?>
                <?php foreach ($users as $u): ?>
                    <tr>
                        <td><?= htmlspecialchars($u['login']) ?></td>
                        <td><?= htmlspecialchars($u['prenom']) ?></td>
                        <td><?= htmlspecialchars($u['nom']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3">Aucun utilisateur trouvé</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include '../includes/footer.php'; ?>