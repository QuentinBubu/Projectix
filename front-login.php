<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Connexion - Inscription</title>
  
  
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans:600'>
      <link rel="stylesheet" href="./assets/style.css">
  
</head>
<body>
  <div class="login-wrap">
  <div class="login-html">
    <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Se connecter</label>
    <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">S'inscrire</label>
    <div class="login-form">
      <form class="sign-in-htm" action="./api/user/login.php" method="GET">
        <div class="group">
          <label for="user" class="label">pseudonyme</label>
          <input id="username" name="username" type="text" class="input">
        </div>
        <div class="group">
          <label for="pass" class="label">mot de passe</label>
          <input id="password" name="password" type="password" class="input" data-type="password">
        </div>
        <div class="group">
          <input id="check" type="checkbox" class="check" checked>
          <label for="check"><span class="icon"></span> Rester connecté</label>
        </div>
        <div class="group">
          <input type="submit" class="button" value="Se connecter">
        </div>
        <div class="hr"></div>
        <div class="foot-lnk">
          <a href="#forgot">mot de passe oublié</a>
        </div>
      </form>
      <form class="sign-up-htm" action="./api/user/signup.php" method="POST">
        <div class="group">
          <label for="user" class="label">Pseudonyme</label>
          <input id="username" name="username" type="text" class="input">
        </div>
        <div class="group">
          <label for="pass" class="label">mot de passe</label>
          <input id="password" name="password" type="password" class="input" data-type="password">
        </div>
        <div class="group">
          <label for="pass" class="label">Confirmer le mot de passe</label>
          <input id="pass" type="password" class="input" data-type="password">
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