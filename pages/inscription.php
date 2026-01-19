<?php
include '../includes/config.php';
include '../includes/header.php';

$message = "";

// Traitement du formulaire
if (!empty($_POST)) {
    $login = trim($_POST['login']);
    $prenom = trim($_POST['prenom']);
    $nom = trim($_POST['nom']);
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];

    if (empty($login) || empty($prenom) || empty($nom) || empty($password) || empty($confirm)) {
        $message = "Tous les champs sont obligatoires";
    } elseif ($password !== $confirm) {
        $message = "Les mots de passe ne correspondent pas";
    } elseif (strlen($password) < 6) {
        $message = "Mot de passe trop court (minimum 6 caractères)";
    } else {
        // Hash du mot de passe
        $hash = password_hash($password, PASSWORD_DEFAULT);

        // Préparation de l'insertion
        $sql = "INSERT INTO utilisateurs (login, prenom, nom, password) 
                VALUES (:login, :prenom, :nom, :password)";
        $stmt = $pdo->prepare($sql);

        try {
            $stmt->execute([
                ':login' => $login,
                ':prenom' => $prenom,
                ':nom' => $nom,
                ':password' => $hash
            ]);

            // Redirection vers connexion
            header("Location: connexion.php");
            exit;
        } catch (PDOException $e) {
            // Si le login existe déjà
            $message = "Login déjà utilisé ou erreur SQL : " . $e->getMessage();
        }
    }
}
?>

<div class="main-content">
    <h1>Inscription</h1>

    <form method="post">
        <input type="text" name="login" placeholder="Login" value="<?= isset($login) ? htmlspecialchars($login) : '' ?>" required>
        <input type="text" name="prenom" placeholder="Prénom" value="<?= isset($prenom) ? htmlspecialchars($prenom) : '' ?>" required>
        <input type="text" name="nom" placeholder="Nom" value="<?= isset($nom) ? htmlspecialchars($nom) : '' ?>" required>
        <input type="password" name="password" placeholder="Mot de passe" required>
        <input type="password" name="confirm" placeholder="Confirmation mot de passe" required>
        <button type="submit">Créer le compte</button>
    </form>

    <?php if($message): ?>
        <p style="color: #ffb6c1; margin-top: 15px; font-weight: bold;"><?= htmlspecialchars($message) ?></p>
    <?php endif; ?>
</div>

<?php include '../includes/footer.php'; ?>