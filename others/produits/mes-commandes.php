<?php
session_start();
if (!isset($_SESSION['connecte'])) {
    header('Location: ../form/formulaire.php');
    exit();
}

$commandes = isset($_COOKIE['Ucommandes']) ? json_decode($_COOKIE['Ucommandes'], true) : [];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./catalogue.css">
    <title>Mes Commandes</title>
</head>
<body>
    <header>
        <h1>Mes Commandes</h1>
        <nav>
            <a href="./catalogue.php">Retour au catalogue</a>
            <a href="./deconnexion.php">Déconnexion</a>
        </nav>
    </header>
    <div style="padding: 20px;">
        <?php if (empty($commandes)): ?>
            <p>Aucune commande.</p>
        <?php else: ?>
            <?php foreach (array_reverse($commandes) as $commande): ?>
                <div style="border: 1px solid #ccc; margin: 10px 0; padding: 15px; border-radius: 10px;">
                    <h3>Commande #<?= $commande['id'] ?></h3>
                    <p>Date: <?= $commande['date'] ?></p>
                    <p>Total: <?= number_format($commande['total']) ?> CFA</p>
                    <p>Livraison: <?= $commande['nom'] ?> - <?= $commande['adresse'] ?></p>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</body>
</html>