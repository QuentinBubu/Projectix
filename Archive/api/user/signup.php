<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/assets/php/class/User.php');

$user = new User;

if (!isset($_POST['cgus'])) {
    $_SESSION['error'] = 'Veuillez accepeter les coditions générals d\'utilisation';
    header('Location: /login.php');
    exit;
}

if (!isset(
    $_POST['username'],
    $_POST['password'],
    $_POST['passwordConfirm'],
    $_POST['email']
    )
    || empty($_POST['username'])
    || empty($_POST['password'])
    || empty($_POST['passwordConfirm'])
    || empty($_POST['email'])
    ) {
    $_SESSION['error'] = 'Saissisez tout les champs';
    header('Location: /login.php');
    exit;
}

$return = $user->getNewAccount(
    $_POST['username'],
    $_POST['password'],
    $_POST['passwordConfirm'],
    $_POST['email'],
);

if ($return) {
    header('Location: /home.php');
    exit;
} else {
    $_SESSION['error'] = $return;
    header('Location: /login.php');
    exit;
}
