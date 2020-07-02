<?php
if (isset($_SESSION['id'])) {
    header('Location: home.php'); //If the user is already connected, we redirect him to the home page
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion/Inscription</title>
    <script src="/ressources/javascript/event.js" defer></script>
</head>

<body>
    <div id="divConnexion">
        <form action="/php/loginProcessing.php?action=login" method="post">
            <label for="username">Saisissez votre nom d'utilisateur</label>
            <input type="text" name="username" id="username" placeholder="Votre nom d'utilisateur" required />

            <label for="password">Saisissez votre mot de passe</label>
            <input type="password" name="password" id="password" placeholder="Votre mot de passe" required />

            <button type="submit">Se connecter</button>
            <p id="ShownInscription">Pas encore de compte? S'inscrire</p>
        </form>
    </div>
    <div id="divInscription">
        <form action="/php/loginProcessing.php?action=register" method="post">
            <label for="username">Saisissez votre nom d'utilisateur</label>
            <input type="text" name="username" id="username" placeholder="Votre nom d'utilisateur" required />

            <label for="password">Saisissez votre mot de passe</label>
            <input type="password" name="password" id="password" placeholder="Votre mot de passe" required />

            <label for="passwordConfirm">Confirmez votre mot de passe</label>
            <input type="password" name="passwordConfirm" id="passwordConfirm" placeholder="Votre mot de passe" required />

            <label for="mail">Saisissez votre mail</label>
            <input type="email" name="email" id="mail" required />

            <label for="newsletter">Voulez-vous vous abonner à notre newsletter?</label>
            <input type="checkbox" name="newsletter" id="newsletter" required />

            <button type="submit">S'inscrire</button>
            <button type="reset">Effacer</button>
            <p id="ShownConnexion">Déjà un compte? Se connecter</p>
        </form>
    </div>
</body>

</html>
</html>