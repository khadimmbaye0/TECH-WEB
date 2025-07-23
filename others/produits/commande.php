<?php
session_start();
if (!isset($_SESSION['connecte'])) {
    header('Location: ../form/formulaire.php');
}

if ($_POST && isset($_POST['donneesCommande'])) {

    $commande = [
      'id' => time(),
      'date' => date('Y-m-d H:i:s'),
      'produits' => json_decode($_POST['donneesCommande'], true),
      'total' => $_POST['total'],
      'nom' => $_POST['nom'],
      'adresse' => $_POST['adresse'],
      'telephone' => $_POST['telephone']
    ];
    $commandes = isset($_COOKIE['Ucommandes']) ? json_decode($_COOKIE['Ucommandes'], true) : [];
    $commandes[] = $commande;
    setcookie('Ucommandes', json_encode($commandes), time() + (365 * 24 * 60 * 60), '/');

    $message = "Commande #" . $commande['id'] . " enregistrée !";
} 
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Finaliser la commande</title>
  <link rel="stylesheet" href="./commande.css">
</head>
<body>
  <?php if (isset($message)): ?>
    <p class="success" style="color: green; text-align: center;"><?= $message; ?></p>
  <?php endif; ?>
  <h1>Détails de la commande</h1>
  <ul id="commandeListe"></ul>
  <p align="center">Total : <span id="totalCommande"></span> CFA</p>

  <h2>Informations de livraison</h2>
  <form id="formCommande" method="POST">
    <input type="hidden" name="donneesCommande" id="donneesCommande">
    <input type="hidden" name="total" id="total">
    <input type="text" name="nom" placeholder="Nom complet" required><br>
    <input type="text" name="adresse" placeholder="Adresse de livraison" required><br>
    <input type="tel" name="telephone" placeholder="Téléphone" required><br>
    <button type="submit">Confirmer la commande</button>
  </form>
  <a href="catalogue.php" style="color: #333; text-align: center; display: block; margin-top: 20px;">Retour</a>

  <script src="./commande.js"></script>
</body>
</html>
