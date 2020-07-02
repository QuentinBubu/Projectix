<?php

use App\User;

$user = new User;

if (isset($_POST['username'], $_POST['password'])) {
  $return = $user->getConnexion($_POST['username'], $_POST['password']);
  if ($return === true && isset($_POST['alwaysConnect'])) {
      setcookie('userToken', $user->getToken(), time() + 60 * 60 * 24 * 30);
      $_SESSION['id'] = $user->getId();
      header('Location: /home');
      exit;
  } else {
    $_SESSION['error'] = $return;
    header('Location: /login');
    exit;
  }
} else {
  $_SESSION['error'] = 'Veuillez saisir tout les champs!';
  header('Location: /login');
  exit;
}