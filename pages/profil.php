<?php
include '../includes/config.php';
include '../includes/header.php';

if (!isset($_SESSION['user'])) {
    header("Location: ../pages/connexion.php");
    exit;
}

$user = $_SESSION['user'];
$message = "";

// Si le formulaire est soumis
if (!empty($_POST)) {
    $login = trim($_POST['login']);
    $prenom = trim($_POST['prenom']);
    $nom = trim($_POST['nom']);
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];

    // Vérifie si rien n'a changé
    if ($login === $user['login'] && $prenom === $user['prenom'] && $nom === $user['nom'] && empty($password)) {
        header("Location: dramas.php"); // retourne directement
        exit;
    }

    // Vérifie mot de passe
    if ($password && $password !== $confirm) {
        $message = "Les mots de passe ne correspondent pas";
    } else {
        // Prépare la requête
        $sql = "UPDATE utilisateurs SET login=:login, prenom=:prenom, nom=:nom";
        $params = [':login'=>$login, ':prenom'=>$prenom, ':nom'=>$nom, ':oldLogin'=>$user['login']];

        if ($password) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql .= ", password=:password";
            $params[':password'] = $hash;
        }

        $sql .= " WHERE login=:oldLogin";
        $stmt = $pdo->prepare($sql);
        try {
            $stmt->execute($params);

            // Met à jour la session
            $_SESSION['user']['login'] = $login;
            $_SESSION['user']['prenom'] = $prenom;
            $_SESSION['user']['nom'] = $nom;
            $user = $_SESSION['user'];

            $message = "Profil mis à jour !";
        } catch (PDOException $e) {
            $message = "Le login choisi est déjà utilisé.";
        }
    }
}
?>

<div class="main-content">
    <h1>Modifier mon profil</h1>

    <form method="post">
        <label>Login :</label>
        <input type="text" name="login" value="<?= htmlspecialchars($user['login']) ?>" required>

        <label>Prénom :</label>
        <input type="text" name="prenom" value="<?= htmlspecialchars($user['prenom']) ?>" required>

        <label>Nom :</label>
        <input type="text" name="nom" value="<?= htmlspecialchars($user['nom']) ?>" required>

        <label>Nouveau mot de passe :</label>
        <input type="password" name="password" placeholder="Laissez vide si pas de changement">

        <label>Confirmation mot de passe :</label>
        <input type="password" name="confirm" placeholder="Laissez vide si pas de changement">

        <button type="submit">Mettre à jour</button>
        <a href="dramas.php" style="margin-left:10px; color:#fff; text-decoration: underline;">Retour à la sélection</a>
    </form>

    <?php if($message): ?>
        <p style="color:#ffb6c1; margin-top: 15px; font-weight: bold;"><?= htmlspecialchars($message) ?></p>
    <?php endif; ?>
</div>

<?php include '../includes/footer.php'; ?>