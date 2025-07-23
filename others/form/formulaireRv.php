<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./formulaireRv.css">
    <title>Prendre rendez-vous | Deco Elegance</title>
</head>
<body>
    <div class="ct">
        <h1>Prendre rendez-vous</h1>
        <form id="formConnexion" action="./traitement.php" method="POST">
            <div>
                <input type="email" id="email" name="email" placeholder="Email" required>
            </div>
            <div>
                <textarea id="message" name="message" placeholder="Message" required></textarea>
            </div>
            <button type="submit" onclick="alert('Formulaire soumis !'); window.location.href='./../produits/catalogue.php';">Envoyer</button>
        </form>
    </div>
</body>
</html>