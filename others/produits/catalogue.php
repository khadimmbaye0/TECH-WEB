<?php
session_start();
if (!isset($_SESSION['connecte']) || !$_SESSION['connecte']) {
    header('Location: ../form/formulaire.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./catalogue.css">
    <title>Catalogue | Produits</title>
</head>
<body>
    <header>
        <h1>Déco Élégance</h1>
        <nav>
            <a href="../../index.html">Acceuil</a>
            <a href="./mes-commandes.php">Mes commandes</a>
            <a href="./../form/formulaireRv.php">Prendre rendez-vous</a>
            <a href="./profile.php">Mes Coordonnees</a>
            <a href="./deconnexion.php">Se déconnecter</a>
            <div id="iconePanier" class="panier-icon">
                <img src="./../../assets/panier2.png" width="30" height="30" alt="Panier"><span id="nbrProduits">0</span>
            </div>
        </nav>
    </header>

    <div class="catalogue">
        <div class="filtres">
            <h2>Categorie</h2>
            <select name="" id="filtreCategorie">
                <option value="tous">Tous</option>
                <option value="meuble">Meubles</option>
                <option value="luminaire">Luminaires</option>
                <option value="décoration">Décoration</option>
            </select>

            <h2>Trier par</h2>
            <select name="" id="trie">
                <option value="popularite">Popularité</option>
                <option value="prix-bas">Prix faible</option>
                <option value="prix-haut">Prix élevé</option>
            </select>
        </div>

        <section class="produits" id="produitsListe">

        </section>

        <div id="panier" class="panier">
            <h2>Mon panier</h2>
            <ul id="panierListe"></ul>
            <p>Total : <span id="panierTotal">0</span> CFA</p>
            <button id="btnPayer" style="display: none;">Passer au paiement</button>
        </div>

    </div>

    <script src="./catalogue.js"></script>
    
</body>
</html>