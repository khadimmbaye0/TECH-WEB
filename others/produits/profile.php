<?php
session_start();
if (!isset($_SESSION['connecte'])) {
    header('Location: ../form/formulaire.php');
    exit();
}

if ($_POST) {
    $infos = $_POST;
    setcookie('info', json_encode($infos), time() + (30 * 24 * 60 * 60), '/');
    $message = "Profil sauvegardé !";
}

$infos = isset($_COOKIE['info']) ? json_decode($_COOKIE['info'], true) : [];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./profile.css">
    <title>Mon Profil</title>
</head>
<body>
    <div class="ct">
        <h1>Mon Profil</h1>
        <form method="POST" id="formConnexion">
            <?php if (isset($message)): ?><p style="color: green;"><?= $message ?></p><?php endif; ?>
            <input type="text" name="nom" placeholder="Nom" value="<?= $infos['nom'] ?? '' ?>">
            <input type="text" name="prenom" placeholder="Prénom" value="<?= $infos['prenom'] ?? '' ?>">
            <input type="tel" name="telephone" placeholder="Téléphone" value="<?= $infos['telephone'] ?? '' ?>">
            <input type="text" name="adresse" placeholder="Adresse" value="<?= $infos['adresse'] ?? '' ?>">
            <button type="submit">Sauvegarder</button>
        </form>
        <a href="catalogue.php" style="color: #333; text-align: center; display: block; margin-top: 20px;">Retour</a>
    </div>
</body>
</html>