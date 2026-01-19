<?php
include '../includes/config.php';
include '../includes/header.php';

$message = "";

if (!empty($_POST)) {
    $login = trim($_POST['login']);
    $password = $_POST['password'];

    // Recherche l'utilisateur dans la base
    $sql = "SELECT * FROM utilisateurs WHERE login = :login";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':login' => $login]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        // Stocke l'utilisateur dans la session
        $_SESSION['user'] = $user;

        // Redirection selon le login
        $login_lower = strtolower($user['login']); // pour éviter problème majuscule
        if ($login_lower === 'admin6') {
            header("Location: admin.php"); // chemin relatif correct
        } else {
            header("Location: dramas.php"); // chemin relatif correct
        }
        exit;
    } else {
        $message = "Identifiants incorrects";
    }
}
?>

<div class="main-content">
    <h1>Connexion</h1>

    <form method="post">
        <input type="text" name="login" placeholder="Login" value="<?= isset($login) ? htmlspecialchars($login) : '' ?>" required>
        <input type="password" name="password" placeholder="Mot de passe" required>
        <button type="submit">Connexion</button>
    </form>

    <?php if($message): ?>
        <p style="color: #ffb6c1; margin-top: 15px; font-weight: bold;"><?= htmlspecialchars($message) ?></p>
    <?php endif; ?>
</div>

<?php include '../includes/footer.php'; ?>