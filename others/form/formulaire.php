<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST["email"] === "test@esp.sn" && $_POST["motdepasse"] === "passer") {
        $_SESSION['connecte'] = true;
        $_SESSION['userEmail'] = $_POST["email"];
        header('Location: ../produits/catalogue.php');
    } else {
        $erreur = "Identifiants incorrects.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./formulaire.css">
    <title>Connexion | Deco Elegance</title>
</head>
<body>
    <div class="ct">
        <h1>Connexion</h1>
        <form method="POST" id="formConnexion">
            <?php if (isset($erreur)): ?>
                <p style="color: red; text-align: center;"><?= $erreur; ?></p>
            <?php endif; ?>
            <div>
                <input type="email" id="email" name="email" placeholder="Email" required>
            </div>
            <div>
                <input type="password" id="motdepasse" name="motdepasse" placeholder="Mot de passe" required>
            </div>
            <button type="submit">Se connecter</button>
        </form>
    </div>
</body>
</html>