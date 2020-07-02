<?php
session_start();
if (isset($_SESSION['id']) || isset($_COOKIE['userToken'])) {
  header('Location: /home.php');
  exit;
}
if (isset($_SESSION['error'])) {
  echo $_SESSION['error'];
  unset($_SESSION['error']);
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <title style="color: red;">Connexion - Inscription</title>
  <link href="./assets/style/reset.css" rel="stylesheet" />
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans:600'>
  <link rel="stylesheet" href="./assets/style/LoginRegister/style.css">
</head>

<body style="overflow: hidden;">
  <div class="login-wrap">
    <div class="login-html">
      <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Se
        connecter</label>
      <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">S'inscrire</label>
      <div class="login-form">
        <form class="sign-in-htm" action="<?= $routeur->generate('login-back'); ?>" method="POST">
          <div class="group">
            <label for="user" class="label">Pseudonyme</label>
            <input id="username" name="username" type="text" class="input" required>
          </div>
          <div class="group">
            <label for="passwordL" class="label">Mot de passe</label>
            <input id="passwordL" name="password" type="password" class="input" data-type="password" required>
          </div>
          <div class="group">
            <input id="check" type="checkbox" name="alwaysConnect" class="check" checked>
            <label for="check"><span class="icon"></span> Rester connecté</label>
          </div>
          <div class="group">
            <input type="submit" class="button" value="Se connecter">
          </div>
          <div class="hr"></div>
          <div class="foot-lnk">
            <a href="#forgot">Mot de passe oublié</a>
          </div>
        </form>
        <form class="sign-up-htm" action="<?= $routeur->generate('signup-back'); ?>" method="POST">
          <div class="group">
            <label for="user" class="label">Pseudonyme</label>
            <input id="username" name="username" type="text" class="input" required>
          </div>
          <div class="group">
            <label for="password" class="label">Mot de passe</label>
            <input id="password" name="password" type="password" class="input" data-type="password" required>
          </div>
          <div class="group">
            <label for="pass" class="label">Confirmer le mot de passe</label>
            <input id="pass" type="password" name="passwordConfirm" class="input" data-type="password" required>
          </div>
          <div class="group">
            <label for="email" class="label">Saisissez votre email</label>
            <input id="email" name="email" type="email" class="input" required>
          </div>
          <div class="group">
            <input id="cgus" type="checkbox" name="cgus" class="check">
            <label for="cgus"><span class="icon"></span> En m'inscivant, j'accepte les <a href="">conditions générales
                d'utilisation</a></label>
          </div>
          <div class="group">
            <input type="submit" class="button" value="S'inscrire">
          </div>
          <div class="hr"></div>
          <div class="foot-lnk">
            <label for="tab-1">Déjà membre ?</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>